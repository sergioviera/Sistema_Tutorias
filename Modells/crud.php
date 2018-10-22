<?php
require_once('conexion.php');

class Datos extends Conexion{

    //Funcion que compara si existe el usuario que intenta logearse, pasandole los datos a traves de un objeto y ademas el nombre de la tabla,
    //Asi como se convierte a la contraseña con la funcion MD5 para que se compare correctamente con la almacenada en la base de datos
    public function validarUsuario($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo AND contrasena = md5(:contra) ");

        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;

    }

    public function agregarUsuarioModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,rol,correo,contrasena) VALUES(:nombre,:rol,:correo,md5(:contrasena)) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosModel["rol_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosModel["contra_usuario"] , PDO::PARAM_STR);
        
        return $stmt->execute();

    }

    public function obtenerDatosDeUsuarioId($usuario_id){

        //Se prepara el query
       $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario_id = :usuario_id");

        //Se pasan los parametros de ese query
        $stmt->bindParam(":usuario_id", $usuario_id , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }

    public function editarDatosUsers($datosUsuario, $tabla){

        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET nombre = :nombre,
                                               rol = :rol,
                                               correo = :correo,
                                               contrasena=md5(:contrasena)
                                               WHERE usuario_id = :usuario_id ");
        
        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
        $stmt->bindParam(":nombre", $datosUsuario["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosUsuario["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosUsuario["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosUsuario["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id", $datosUsuario["usuario_id"] , PDO::PARAM_INT);
        
        print_r($datosUsuario);

        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();


    }

    public function traerDatosUsuarios($tabla){

        //Conexion::conectar() -> es igual a un objeto PDO el cual sirve para conectarse a la base de datos
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        //Metodo que ejecuta el query previamente preparado
        $stmt->execute();

        //Se crea un objeto tipo array para recibir los datos
        $r = array();
        //se traen todos los datos con la funcion fetchAll
        $r = $stmt->FetchAll();
        
        //Se retornan los datos para el modelo
        return $r;
    
    }

    public function eliminarDatosUsuario($usuario_id, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario_id = :usuario_id ");

        $stmt->bindParam(":usuario_id", $usuario_id , PDO::PARAM_INT);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }

    public function agregarCarreraModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre_carrera"] , PDO::PARAM_STR);
        
        return $stmt->execute();

    }

    public function obtenerDatosDeCarreraId($carrera_id){

        //Se prepara el query
       $stmt = Conexion::conectar()->prepare("SELECT * FROM carreras WHERE carrera_id = :carrera_id");

        //Se pasan los parametros de ese query
        $stmt->bindParam(":carrera_id", $carrera_id , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }

    public function editarDatosCarrera($datosCarrera, $tabla){

        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET nombre = :nombre
                                               WHERE carrera_id = :carrera_id ");
        
        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
        $stmt->bindParam(":nombre", $datosCarrera["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera_id", $datosCarrera["carrera_id"] , PDO::PARAM_INT);
        
        print_r($datosCarrera);

        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();


    }

     public function eliminarDatosCarrera($carrera_id, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE carrera_id = :carrera_id ");

        $stmt->bindParam(":carrera_id", $carrera_id , PDO::PARAM_INT);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }

    /* FUNCION PARA LA ADMINISTRACION DE LOS ALUMNOS */

    //Funcion que envia al controlador todos los datos de la tabla carreras, la cual contiene las carreras de la universdiad
    public function traerDatosCarreras($tabla){

        //Conexion::conectar() -> es igual a un objeto PDO el cual sirve para conectarse a la base de datos
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        //Metodo que ejecuta el query previamente preparado
        $stmt->execute();

        //Se crea un objeto tipo array para recibir los datos
        $r = array();
        //se traen todos los datos con la funcion fetchAll
        $r = $stmt->FetchAll();
        
        //Se retornan los datos para el modelo
        return $r;
    
    }

    //Igualita a la funcion para traer carreras solo que esta trae los tutores
    public function traerDatosTutores($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        $r = array();

        $r = $stmt->FetchAll();
        
        return $r;
    
    }

    //Funcion que trae todos los registros de la tabla alumnos para mostrarlos,
    //Como todas las tablas pertenecientes a esta base de datos estan relacionados, se ocupo de una union de las mismas, para de esta forma mandar todo como si fuera una unica tabla con la informacion necesaria por la tabla principal que es de alumnos, por ejemplo digamos que se relacion la tabla alumnos con la re tutores, pero solo es por un id, para poder ver el nombre del tutor es necesario esta union
    public function traerDatosAlumnos(){

        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT t1.matricula as matricula, t1.nombre as alumno, t2.nombre as carrera, t1.situacion as situacion, t1.correo as correo, t3.nombre as tutor,t1.foto as foto FROM alumnos as t1 INNER JOIN carreras AS t2 ON t2.carrera_id = t1.carrera INNER JOIN tutores AS t3 ON t3.numero_empleado = t1.tutor_id");

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();
        
        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;

    }

    //Funcion que retorna solo los datos de un alumno, esta de igual forma utiliza la union de las tres tablas para mostrar toda la informacion del usuario de uan mejor forma, la diferencia es que a esta se le pasa un parametro para identificiar el registro que se quiere, que en este caso pra identificarlo se hace uso del id que es la matricula
    public function traerDatosAlumno($matricula){

        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT t1.matricula as matricula, t1.nombre as alumno, t2.nombre as carrera, t1.situacion as situacion, t1.correo as correo, t3.nombre as tutor,t1.foto as foto FROM alumnos as t1 INNER JOIN carreras AS t2 ON t2.carrera_id = t1.carrera INNER JOIN tutores AS t3 ON t3.numero_empleado = t1.tutor_id WHERE matricula = :matricula");

        //Se pasan los parametros de ese query
        $stmt->bindParam(":matricula", $matricula , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }

    //Funcion que almacena todos los datos de un alumno en su respectiva tabla, tabmien pasada por parametro (el nombre)
    public function guardarDatosUsuario($datosAlumno, $tabla){

        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(matricula, nombre, carrera, situacion, correo, tutor_id, foto) VALUES(:matricula, :nombre, :carrera_id, :situacion, :correo, :tutor_id, :foto) ");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":matricula", $datosAlumno["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera_id", $datosAlumno["carrera"], PDO::PARAM_INT);
        $stmt->bindParam(":situacion", $datosAlumno["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor_id", $datosAlumno["tutor"], PDO::PARAM_INT);
        $stmt->bindParam(":foto", $datosAlumno["foto"], PDO::PARAM_STR);

        print_r($datosAlumno);
        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            //$stmt->close();
            return "success";
        }else{
            //$stmt->close();
            return "error";
        }

    }

    //Funcion que se usa para editar un cierto registro de la tabla alumnos, Este de giual forma tiene dos parametros, uno para especificar los datos en una arreglo asociativo y otro para indicar el nombre de la tabla donde se editaran dichos datos
    public function editarDatosUsuario($datosAlumno, $tabla){

        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET nombre = :nombre, carrera = :carrera, situacion = :situacion, correo = :correo, tutor_id = :tutor, foto = :foto
                                               WHERE matricula = :matricula ");
        
        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
        $stmt->bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosAlumno["carrera"], PDO::PARAM_INT);
        $stmt->bindParam(":situacion", $datosAlumno["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor", $datosAlumno["tutor"], PDO::PARAM_INT);
        $stmt->bindParam(":foto", $datosAlumno["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":matricula", $datosAlumno["matricula"] , PDO::PARAM_STR);
        
        print_r($datosAlumno);

        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();


    }

    //Funcion que elimina un registro pasandole la matricula para identificarlo asi como la tabla donde se encuentra ese registro
    public function eliminarDatosAlumno($matricula, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula ");

        $stmt->bindParam(":matricula", $matricula , PDO::PARAM_STR);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }

    //Funcion que guarda un nuevo tema de tutoria en la tabla de tema_sion, pasandole como parametro el nombre del nuevo tema exclusivamente, que aunque la tabla tenga dos datos, uno es el id el cual es autoincrementable
    public function guardarDatosTema($tema){

        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = Conexion::conectar()->prepare("INSERT INTO sesion_tema(tema_nombre) VALUES(:tema) ");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":tema", $tema , PDO::PARAM_STR);

        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    //Funcion que extraer todos los registros de la tabla de los temas de la tutoria almacenados en la tabla sesion_tema, y lso retorna al controlador a traves de un arreglo asociativo llamado $r
    public function traerDatosTemas(){

        //Se prepara la consulta, de esta forma para hacerlo mas seguro
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sesion_tema");

        //Se ejecuta el query definido anteriormente 
        $stmt->execute();

        //Se crea un array en donde se guardaran todos los datos traidos por la consulta
        $r = array();

        //Se llena el arrayo con los datos provenientes de la base de datos
        $r = $stmt->FetchAll();
        
        //Se retornan esos datos al controlador para llevarlos a la vista
        return $r;

    }

    //Funcion que trae los datos de la tabla de los temas, pero en este caso es unicamente un solo tema, para identificar que tema se va a traer se pasa como parametro el id de dicho tema, esto es para llenar los campos de los datos al momento de actualizarlos, en la vista de editar_tema.php
    public function traerDatosTema($id_tema){

        //Se prepara la consulta pasandole como parametro el id, con la funcion bindParam se hace la relacion
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sesion_tema WHERE tema_id = :tema");

        //Se hace relacion a la variable :tema con esta funcion, y ademas se le dice como tratar al dato, (string)
        $stmt->bindParam(":tema", $id_tema, PDO::PARAM_STR);

        //Se ejecuta la consulta
        $stmt->execute();

        //Se declara un arreglo para almacenar los datos obtenidos por la base de datos
        $r = array();

        //Se pobla el arreglo
        $r = $stmt->FetchAll();

        //y se retorna al controlador para que lo ponga en la vista
        return $r;

    }

    //Funcion para eliminar un determinado dato de la tabla de los temas de la sesion de tutoria, para ello se pasa el id del tema como parametro asi como la tabla donde se almacena dicha informacion
    public function eliminarDatosTema($tema, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE tema_id = :tema ");

        $stmt->bindParam(":tema", $tema , PDO::PARAM_STR);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }

    //Funcion para editar los datos de un tema actualmente existente en la tabla, para poder identificarlo y saber cual es el nuevo dato, se pasa un objeto con esta informacion proveniente del controlador en donde a partir de la vista se saca esta informacion en un formultario en la vista
    public function editarDatosTema($datosTema, $tabla){

        //Se prepara la consulta
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET tema_nombre = :tema
                                               WHERE tema_id   = :id ");

        //Se relacionan los parametros con las variables que contienen los datos a editar y que dato editar
        $stmt->bindParam(":tema", $datosTema['tema'] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosTema['id'], PDO::PARAM_INT );

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

        

    }


    //Funcion que trae todos los alumnos en la tabla asociados a un tutor en especifico
    public function traerDatosAlumnosPorProfe($idTutor){

        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT t1.matricula as matricula, t1.nombre as alumno, t2.nombre as carrera, t1.situacion as situacion, t1.correo as correo, t3.nombre as tutor,t1.foto as foto FROM alumnos as t1 INNER JOIN carreras AS t2 ON t2.carrera_id = t1.carrera INNER JOIN tutores AS t3 ON t3.numero_empleado = t1.tutor_id WHERE t3.numero_empleado = :tutor ");

        $stmt->bindParam(":tutor", $idTutor , PDO::PARAM_INT);

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();
        
        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;

    }

    public function guardarDatosTutoria($datosTutoria){

        $pdo = Conexion::conectar();
        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = $pdo->prepare("INSERT INTO sesiones(tutor, fecha, hora, tipo, tema, observaciones) VALUES(:tutor, :fecha, :hora, :tipo, :tema, :observaciones)");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":tutor", $datosTutoria["tutor"] , PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datosTutoria["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datosTutoria["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datosTutoria["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datosTutoria["tema"], PDO::PARAM_INT);
        $stmt->bindParam(":observaciones", $datosTutoria["observaciones"], PDO::PARAM_STR);


        //print_r($datosTutoria);

        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            return $pdo->lastInsertId();
        }else{
            return 0;
        }


    }

    public function guardarAlumnosSesiones($idSesion, $matricula){

        $pdo = Conexion::conectar();
        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = $pdo->prepare("INSERT INTO sesion_alumnos(sesion_id, matricula) VALUES(:idSesion, :matricula)");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":idSesion",  $idSesion,  PDO::PARAM_INT);
        $stmt->bindParam(":matricula", $matricula , PDO::PARAM_STR);

        $stmt->execute();

    }

    public function traerDatosSesiones(){

        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sesiones as t1 INNER JOIN sesion_tema AS t2 ON t2.tema_id = t1.tema WHERE tutor = :tutor");

        $stmt->bindParam(":tutor",  $_SESSION['idUsuario'] ,  PDO::PARAM_INT);

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();
        
        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;


    }

    public function traerDatosAlumnosSesiones($idSesion){

        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sesion_alumnos as t1 INNER JOIN alumnos AS t2 ON t2.matricula = t1.matricula WHERE sesion_id = :id");

        $stmt->bindParam(":id",  $idSesion,  PDO::PARAM_INT);

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();
        
        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;


    }

    //Funcion para eliminar un determinado dato de la tabla de los temas de la sesion de tutoria, para ello se pasa el id del tema como parametro asi como la tabla donde se almacena dicha informacion
    public function eliminarDatosSesion($sesion, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE sesion_id = :id ");

        $stmt->bindParam(":id", $sesion , PDO::PARAM_INT);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }

    public function traerDatosAlumnoSesion($idAlumno){
        
        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT * FROM sesion_alumnos as t1 INNER JOIN alumnos AS t2 ON t2.matricula = t1.matricula INNER JOIN sesiones AS t3 ON t3.sesion_id = t1.sesion_id INNER JOIN sesion_tema as t4 ON t4.tema_id = t3.tema WHERE t2.matricula = :matricula ");

        $stmt->bindParam(":matricula",  $idAlumno ,  PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();
        
        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;

    }

    

}

?>