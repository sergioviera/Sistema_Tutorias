<?php

class Controlador
{

    private $enlace = '';
    private $pagina = '';

    //Llamar a la plantilla
    public function cargarPlantilla()
    {
        session_start();
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        
        if( isset($_SESSION['iniciada']) ){
            include 'Views/plantilla.php';
        }else{
            include 'login.php';
        }
        
    }

    //Interacción con el usuario
    public function mostrarPagina()
    {
        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php

        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlace = $_GET['action'];
        }else{
            //Si viene vacio inicializo con el dashboard dependiendo del tipo de usuario loggeado
            if($_SESSION['tipoUsuario'] == 'Tutor'){
                $enlace = 'dashboard_tutor';
            }else{
                $enlace = 'dashboard';
            }
        }

        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions

        $pagina = Modelo::mostrarPagina($enlace);

        include $pagina;
    }

    public function iniciarSesion()
    {

        if( isset($_POST['correo']) && isset( $_POST['contrasena'] ) && isset($_POST['tipoUsuario']) )
        {

            $datos = array( 'correo'      => $_POST['correo'],
                            'contrasena'  => $_POST['contrasena'],
                            'tipoUsuario' => $_POST['tipoUsuario'] );
            
            if($datos['tipoUsuario'] == 'Administrador' ){
                $respuesta = Datos::validarUsuario($datos, 'usuarios');
                $tipoUsuario = $respuesta['rol'];
            }else{
                $respuesta = Datos::validarUsuario($datos, 'tutores');
                $tipoUsuario = 'Tutor';
            }
           
            if( $respuesta )
            {
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['tipoUsuario'] = $tipoUsuario;


                header("location:index.php?action=dashboard");
                //echo 'Bienvenido al sistema';
            }else
            {
                echo '<script> alert("Correo o contraseña incorrectos") </script>';
                header("location:index.php");
                //echo 'Correo o contraseña incorrecto';
            }

        }
        
    }

    public function agregarCarrera(){
        if(isset($_POST['nombre'])){
            $nombre_carrera=$_POST['nombre'];
            $datos=array('nombre_carrera'=>$nombre_carrera);
            $respuesta = Datos::agregarCarreraModel($datos, 'carreras');
        }

    }

    public function obtenerCarreras(){
        if(isset($_GET["carrera_id"])){
            $id = $_GET["carrera_id"];//Conseguir el id del usuario a ingresar

            $respuesta = Datos::obtenerDatosCarrera($id, "carreras");//Aqui manda los datos al crud para que haga la funcion de obtenerDatosUsuario

            return $respuesta;//Manda la respuesta
        }
    }

    /*** FUNCIONES PARA LA ADMINISTRACION DE LOS ALUMNOS ***/

    //Funcion que retorna a la vista de registro los datos de las carreras disponibles para ponerlos en una lista seleccionable
    public function obtenerDatosCarreras()
    {

        $datosDeCarreras = array();
        
        //Manda llamar el metodo desde el modelo y pasandole la tabla de donde se van a extraer los datos como parametro
        $datosDeCarreras = Datos::traerDatosCarreras("carreras");

        return $datosDeCarreras;
    }

    //Funcion para obtener los datos de los tutores registros, esto debido a que cuando se registra o actualiza el registro de un alumno necesita vincular un tutor, estos datos son desplegados en un lista
    public function obtenerDatosTutores()
    {

        $datosDeTutores = array();
        
        //Manda llamar una funcion desde el modelo pasandole el nombre de la tabla desde dodne va a traer los datos
        $datosDeTutores = Datos::traerDatosTutores("tutores");

        return $datosDeTutores;
    }


    //Funcion que trae a todos los alumnos registrados en la dicha tabla para mostrarlos en la pagina de alumnos.php, se muestra ademas un boton para actualizar y eliminar para administrarlos
    public function obtenerDatosAlumnos()
    {
        $datosDeAlumnos = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosDeAlumnos = Datos::traerDatosAlumnos();

        return $datosDeAlumnos;
    }

    //Funcion que se manda llamar al registrar un usuario nuevo a la aplicacion, todos los datos son enviados a traves de un formulario el cual esta funcion cacha con los parametros POST identificandolos con el respectivo nombre de campo de la vista agregar_alumno.php
    public function guardarDatosAlumno(){
        
        //Datos recibidos de la vista, necesarios para identificar al usuario
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $situacion = $_POST['situacion'];
        $correo = $_POST['correo'];
        $tutor = $_POST['tutor'];

        //Para saber el nombre de la foto se manda llamar esta funcion
        $nombreArchivo = basename($_FILES['foto']['name']);
        
        //Se concatena al nombre la carpeta en donde se guardaran todas las fotos cargadas por los usuarios
        $directorio = 'fotos/' . $nombreArchivo;

        //Para hacer algunas validaciones y el usuario por ejemplo no pase como foto una archivo pdf se extrae la extencion de la foto
        $extension = pathinfo($directorio , PATHINFO_EXTENSION);

        //Todos los datos obtenidos del formulario son guardados en un objeto para luego ser pasados al modelo en donde serna almacenados en su respectiva tabla
        $datosAlumno = array('matricula' => $matricula,
                            'nombre' => $nombre,
                            'carrera' => $carrera,
                            'situacion' => $situacion,
                            'correo' => $correo,
                            'tutor' => $tutor,
                            'foto' => $matricula.'.'.$extension ); //El nombre de la foto de cada uusario sera el nombre de su matricula, para de esta forma llevar un control y que las fotos no se repiten y se sobreescriban


        //Aqui es donde se hace la validacion de el archivo sea una foto con extensiones de imagenes frecuentes y no un formato .docs o un pdf por ejemplo
        if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){
            echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
        }else{

            //Una vez que se ha cargado la imagen a los archivos temporales de php, esta funcion la mueve de ahi y la coloca en la direccion donde se guardaran las fotos ya con el nombre presonalizado por cada usuario, que es su matricula
            move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$matricula . '.' . $extension);

            //Despues de que se ha guardado la imagen en la carpeta, se manda llamar la funcion del modelo en la cual se pasan el objeto con los datos del formulario para ser guardado
            $respuesta = Datos::guardarDatosUsuario($datosAlumno, "alumnos");

            //Se recibe la respuesta del metodo y si esta es exitosa se manda un mensaje de notificacion al cliente y se reenvia al usuario a la lista de todos los usuarios para que vea la insercion del nuevo alumno.
            if($respuesta == "success"){
                /*echo '<script> 
                            alert("Datos guardados correctamente");
                            window.location.href = "index.php?action=alumnos"; 
                      </script>';*/
                header('index.php?action=alumnos');
            }else{
                //En caso de haber un error se queda en la misma pagina y le notifica al ususario
                echo '<script> alert("Error al guardar") </script>';
            }
        }
    }
    

}