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

    

}