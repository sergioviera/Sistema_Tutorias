<?php
require_once('conexion.php');

class Datos extends Conexion{

    public function validarUsuario($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo AND contrasena = md5(:contra) ");

        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;

    }

    public function agregarCarreraModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre_carrera"] , PDO::PARAM_STR);
        
        return $stmt->execute();

    }

    public function obtenerDatosCarrera($id, $tabla){
        //Esta consulta sirve para obtener los datos del id que va ingresar para ver la tabla de los "usuarios"
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE carrera_id = :carrera_id");
            $stmt->bindParam(":carrera_id", $id , PDO::PARAM_STR);
            $stmt->execute();
            $respuesta = array();
            $respuesta = $stmt->FetchAll();
            
            return $respuesta;
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

        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            //$stmt->close();
            return "success";
        }else{
            //$stmt->close();
            return "error";
        }

    }

}

?>