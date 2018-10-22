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
                $idUsuario = $respuesta['usuario_id'];
            }else{
                $respuesta = Datos::validarUsuario($datos, 'tutores');
                $tipoUsuario = 'Tutor';
                $idUsuario = $respuesta['numero_empleado'];
            }
           
            if( $respuesta )
            {
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['idUsuario'] = $idUsuario;


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

    public function agregarUsuario(){
        if(isset($_POST['nombre'])){
            $nombre_usuario=$_POST['nombre'];
            $rol_usuario=$_POST['rol'];
            $correo_usuario=$_POST['correo'];
            $contra_usuario=$_POST['contra'];
            $datos=array('nombre_usuario'=>$nombre_usuario,
                         'rol_usuario'=>$rol_usuario,
                         'correo_usuario'=>$correo_usuario,
                         'contra_usuario'=>$contra_usuario);
            $respuesta = Datos::agregarUsuarioModel($datos, 'usuarios');
        }

    }

    public function obtenerDatosUsuarios()
    {

        $datosDeUsuarios = array();
        
        //Manda llamar el metodo desde el modelo y pasandole la tabla de donde se van a extraer los datos como parametro
        $datosDeUsuarios = Datos::traerDatosUsuarios("usuarios");

        return $datosDeUsuarios;
    }

    public function obtenerDatosUsuarioId(){
        $usuario_id = $_GET['id'];

        $datosDeUsuarios = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del usuario a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $datosDeUsuarios = Datos::obtenerDatosDeUsuarioId($usuario_id);

        return $datosDeUsuarios;
    }

    public function editarDatosUser(){

        $usuario_id = $_GET['id'];
        $nombre_usuario=$_POST['nombre'];
        $rol_usuario=$_POST['rol'];
        $correo_usuario=$_POST['correo'];
        $contra_usuario=$_POST['contra'];

        $datosUsuario=array('usuario_id'=>$usuario_id,
                         'nombre_usuario'=>$nombre_usuario,
                         'rol_usuario'=>$rol_usuario,
                         'correo_usuario'=>$correo_usuario,
                         'contra_usuario'=>$contra_usuario);
        
        

        //Se finaliza de crear los datos, ya con la  foto nueva o en caso de que haya elegido una nueva
        //Se manda ese objeto con los datos al modelo para que los almacenen en la tabla pasada por parametro aqui abajo
        $respuesta = Datos::editarDatosUsers($datosUsuario, "usuarios");
        
        //El metodo responde con un success o un error y se realiza las notificaciones pertinentes al usuario
        if($respuesta == "success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "index.php?action=usuarios"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    public function eliminarUsuario(){

        $usuario_id = $_GET['id'];
        
        $respuesta = Datos::eliminarDatosUsuario($usuario_id, "usuarios");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Usuario eliminado");
                    window.location.href = "index.php?action=usuarios";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }

    }

    public function agregarCarrera(){
        if(isset($_POST['nombre'])){
            $nombre_carrera=$_POST['nombre'];
            $datos=array('nombre_carrera'=>$nombre_carrera);
            $respuesta = Datos::agregarCarreraModel($datos, 'carreras');
        }

    }

    public function obtenerDatosCarreraId(){
        $carrera_id = $_GET['id'];

        $datosDeCarreras = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del usuario a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $datosDeCarreras = Datos::obtenerDatosDeCarreraId($carrera_id);

        return $datosDeCarreras;
    }

    public function editarDatosCarrera(){

        $carrera_id = $_GET['id'];
        $nombre = $_POST['nombre'];
        
        

        //Se finaliza de crear los datos, ya con la  foto nueva o en caso de que haya elegido una nueva
        $datosCarrera = array('carrera_id' => $carrera_id,
                            'nombre' => $nombre);
        
        //Se manda ese objeto con los datos al modelo para que los almacenen en la tabla pasada por parametro aqui abajo
        $respuesta = Datos::editarDatosCarrera($datosCarrera, "carreras");
        
        //El metodo responde con un success o un error y se realiza las notificaciones pertinentes al usuario
        if($respuesta == "success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "index.php?action=carreras"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    public function eliminarCarrera(){

        $carrera_id = $_GET['id'];
        
        $respuesta = Datos::eliminarDatosCarrera($carrera_id, "carreras");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Carrera eliminada");
                    window.location.href = "index.php?action=carreras";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
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

    //Funcion que trae los datos de UN solo alumno, esto con el fin de actualizarlo en la vista editar_alumno, para saber que usario se va a editar se manda un parametro GET llamado id en el cual va el id del usuario que en este caso es la matricula
    public function obtenerDatosAlumno(){

        $matriculaAlumno = $_GET['id'];

        $datosDeAlumnos = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del usuario a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $datosDeAlumnos = Datos::traerDatosAlumno($matriculaAlumno);

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
                echo '<script> 
                            alert("Datos guardados correctamente");
                            window.location.href = "index.php?action=alumnos"; 
                      </script>';
                //header('index.php?action=alumnos');
            }else{
                //En caso de haber un error se queda en la misma pagina y le notifica al ususario
                echo '<script> alert("Error al guardar") </script>';
            }
        }
    }

    //Funcion que permite editar los datos de un alumno pasandole los datos por medio de un formualrio, esta funcion es muy parecida a la de arriba a diferencia que manda a otra funcion al modelo la cual sirve para actualizar los datos de un respectivo alumno
    public function editarDatosAlumno(){

        $matricula = $_GET['id'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $situacion = $_POST['situacion'];
        $correo = $_POST['correo'];
        $tutor = $_POST['tutor'];
        //$foto = $_POST['fotoActual'];
        
        $nombreArchivo = basename($_FILES['foto']['name']);
        
        $directorio = 'fotos/' . $nombreArchivo;

        $extension = pathinfo($directorio , PATHINFO_EXTENSION);
        

        //Tambien se compara si el usuario solo quiere actualizar los datos o tambien la foto de perfil, en caso de que solo quiera editar los datos y quiera conservar la foto entra en el if de acontinuacion para almacenar el nombre de la misma foto que tenia previamente
        if($nombreArchivo == "" ){
            $foto = $_POST['fotoActual'];
        }else{
            
            if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){
                echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
                
                $foto = $_POST['fotoActual'];

            }else{

                //En caso de que el usuario haya querido ademas de actualizar sus datos en tipo texto, tambien editar la foto, entra aesta parte del if en donde crea una nueva foto, o sobreescibe la existente y la almacena en la variable foto la cual sera almacenada con los datos realizado.

                move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$matricula . '.' . $extension);

                $foto = $matricula . '.' . $extension;

            }
        }

        //Se finaliza de crear los datos, ya con la  foto nueva o en caso de que haya elegido una nueva
        $datosAlumno = array('matricula' => $matricula,
                            'nombre' => $nombre,
                            'carrera' => $carrera,
                            'situacion' => $situacion,
                            'correo' => $correo,
                            'tutor' => $tutor,
                            'foto' => $foto );
        
        //Se manda ese objeto con los datos al modelo para que los almacenen en la tabla pasada por parametro aqui abajo
        $respuesta = Datos::editarDatosUsuario($datosAlumno, "alumnos");
        
        //El metodo responde con un success o un error y se realiza las notificaciones pertinentes al usuario
        if($respuesta == "success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "index.php?action=alumnos"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    //Funcion que sirve para eliminar los datos de un alumno de la tabla, para saber que alumno eliminar se pasa como parametro GET la matricula del alumno, y posterioremte se pasa como parametro junto con el nombre de la tabla para que el modelo haga el resto
    public function eliminarAlumno(){

        $matriculaAlumno = $_GET['id'];
        
        $respuesta = Datos::eliminarDatosAlumno($matriculaAlumno, "alumnos");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Alumno eliminado");
                    window.location.href = "index.php?action=alumnos";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }

    }

    //Funcion que obtiene los datos de una vista del archivo agregar_tema.php y los manda al archivo del modelo que realiza las operaciones con los datos, lo que le pasa al modelo para almacenar es el nuevo tema de tutorias, solo eso pues el id que es el otro campo de la tabla es autoincrementable y no es neceario pasarselo explicitamente
    public function guardarDatosTema(){
        $nuevoTema = $_POST['tema'];

        $respuesta = Datos::guardarDatosTema($nuevoTema);

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Tema insertado correctamente");
                    window.location.href = "index.php?action=temas";
                  </script>';
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    //Funcion que obitene todos los datos de los temas almacenados en su respectiva tabla, estso son TODOS los registros
    public function obtenerDatosTemas(){

        $datosDeTemas = array();
        
        $datosDeTemas = Datos::traerDatosTemas();

        return $datosDeTemas;

    }

    //Funcion que obitene solo uno los datos de los temas almacenados en su respectiva tabla, es unicamente un dato de los registros, el cual se escpecifica pasandole el id de dicho tema por parametro a la funcion del modelo que recupera los datos de la base de datos
    public function obtenerDatosTema(){

        $idTema = $_GET['id'];

        $datosDeTema = array();

        $datosDeTema = Datos::traerDatosTema($idTema);

        return $datosDeTema;

    }


    //Funcion que elimina un dato de la tabla de los temas que se tratan en las tutorias, el registro a eliminar se especifica pasandole el id al metodo de la parte del modleo que interactua con los datos, asi como se pasa el nombre de la tabla a la que se refiere
    public function eliminarTema(){

        $tema = $_GET['id'];
        
        $respuesta = Datos::eliminarDatosTema($tema, "sesion_tema");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Tema eliminado correctamente");
                    window.location.href = "index.php?action=temas";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }


    }

    //Funcion que edita los datos de un registro existente en la tabla de los temas de las tutorias (tema_sesion), para saber que dato se va a eliminar y que nueva informacion se le va a añadir se le manda esta informacion al modelo a traves  de un objeto el cual dicha informacion porviene de la vista en donde esta el formulario en donde el usuario puede editar esta informacion
    public function editarDatosTema(){

        $datosTema = array( 'id'   => $_GET['id'],
                            'tema' => $_POST['tema'] );

        
        $respuesta = Datos::editarDatosTema($datosTema, "sesion_tema");

        if($respuesta == "success"){
            echo '<script> 
                    alert("Tema editado correctamente");
                    window.location.href = "index.php?action=temas";
                  </script>';
        }else{
            echo '<script> alert("Error al editar") </script>';
        }

    }


    //Funcion que trae todos los alumnos en la tabla asociados a un tutor en especifico, sacando el id del tutor de la sesion en donde se le asigno al momento en que el tutor inicia sesion
    public function obtenerDatosAlumnosPorProfe(){

        $datosDeAlumnos = array();
        $idTutor = $_SESSION['idUsuario'];
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosDeAlumnos = Datos::traerDatosAlumnosPorProfe($idTutor);

        return $datosDeAlumnos;

    }
    

    /* FUNCIONES PARA ADMINSITRAR LOS DATOS DE LAS TUTORIAS */

    public function guardarDatosTutoria(){

        $alumnos = array();

        // Recorre la lista de los checks para saber cuales estan selecionados
        foreach($_POST['check_list'] as $selected){
            array_push($alumnos, $selected);
        }
        
        $datosTutoria = array('tutor' => $_SESSION['idUsuario'],
                              'fecha' => $_POST['fecha'],
                              'hora' => $_POST['hora'],
                              'tipo' => $_POST['tipo'],
                              'tema' => $_POST['tema'],
                              'observaciones' => $_POST['observaciones']);

        
        //PDO::lastInsertId();
        //echo 'Datos alumnos: ';
        //print_r($alumnos);
        

        $resultado = Datos::guardarDatosTutoria($datosTutoria);

        if($resultado != 0 ){
            
            for($i = 0; $i < count($alumnos); $i++ ){
                Datos::guardarAlumnosSesiones($resultado, $alumnos[$i]);
            }

            echo '<script> 
                    alert("Sesion guardada correctamente");
                    window.location.href = "index.php?action=tutorias";
                  </script>';

        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

        //echo 'Datos de la tutoria: ';
        //print_r($datosTutoria);


    }


    public function obtenerDatosSesiones(){


        $datosSesiones = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosSesiones = Datos::traerDatosSesiones();

        return $datosSesiones;


    }

    public function obtenerAlumnosSesion($idSesion){

        $datosAlumnos = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosAlumnos = Datos::traerDatosAlumnosSesiones($idSesion);

        return $datosAlumnos;

    }

    public function eliminarSesion(){

        $sesion = $_GET['id'];
        
        $respuesta = Datos::eliminarDatosSesion($sesion, "sesiones");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Sesion eliminada correctamente");
                    window.location.href = "index.php?action=tutorias";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }


    }

    public function obtenerDatosAlumnoSesion($idAlumno){

        $datosSesion = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosSesion = Datos::traerDatosAlumnoSesion($idAlumno);

        return $datosSesion;

    }


    public function datosDashboardTutor(){

        

    }

}