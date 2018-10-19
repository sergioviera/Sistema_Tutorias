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

}

?>