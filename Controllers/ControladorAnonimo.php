<?php
require_once('Modells/crud.php');

class ControladorAnonimo
{
	public function inscribirTutor(){
$hint = "<h2>ControladorAnonimo-inscribirTutor</h2>".'{numero:'. $_POST['numero'].' ,nombre:'.$_POST['nombre'].', dni:'.$_POST['dni'].', correo:'.$_POST['correo'].' ,telefono:'.$_POST['telefono'].' ,carrera:'.$_POST['carrera'].' ,nivel:'.$_POST['nivel'].' ,promAplazo:'.$_POST['promAplazo'].' ,regularizadas:'.$_POST['regularizadas'].' ,aprobadas:'.$_POST['aprobadas'].' ,anioInicio:'.$_POST['anioInicio'].' ,comentarios:'.$_POST['comentarios'].'}<br>';

        $datosTutor = array(
            'numero' => $_POST['numero'], //numero de legajo
            'nombre' => $_POST['nombre'], //nombre del tutor
            'dni' => $_POST['dni'],       //dni
            'correo' => $_POST['correo'], //correo electrónico
            'telefono' => $_POST['telefono'], //telefono
            'carrera' => $_POST['carrera'], //carrera
            'nivel' => $_POST['nivel'],   //año de cursada
            'promAplazo' => $_POST['promAplazo'], //promedio con aplazos
            'regularizadas' => $_POST['regularizadas'], //Materias regularizadas
            'aprobadas' => $_POST['aprobadas'], //materias aprobadas
            'anioInicio' => $_POST['anioInicio'], //año de inicio de la carrera
            'comentarios' => $_POST['comentarios'] //comentarios
        );


$hint = $hint."<h1>DatosTutor</h1>$datosTutor".print_r($datosTutor)."<br>";
        //print_r($datosTutor);

        $respuesta = Datos::inscribirTutor($datosTutor);
$hint = $hint."<h1>Respuesta</h1>$respuesta";
        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> alert("Inscripto correctamente") </script>';
        }else{
            echo '<script> $("#msg").html("Error al guardar - '.$respuesta.$hint.'") </script>';
        }

    }

    //Funcion que se manda llamar al registrar un usuario nuevo a la aplicacion, todos los datos son enviados a traves de un formulario el cual esta funcion cacha con los parametros POST identificandolos con el respectivo nombre de campo de la vista agregar_alumno.php
    public function guardarDatosAlumno(){
        
        //Datos recibidos de la vista, necesarios para identificar al usuario
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $situacion = $_POST['situacion'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        
        //Para saber el nombre de la foto se manda llamar esta funcion
        $nombreArchivo = basename($_FILES['foto']['name']);

        if($nombreArchivo == "" ){
            $nombreFoto = 'user';
            $extension = 'png';
        }else{
            //Se concatena al nombre la carpeta en donde se guardaran todas las fotos cargadas por los usuarios
            $directorio = 'fotos/' . $nombreArchivo;

            $nombreFoto = $matricula;

            //Para hacer algunas validaciones y el usuario por ejemplo no pase como foto una archivo pdf se extrae la extencion de la foto
            $extension = pathinfo($directorio , PATHINFO_EXTENSION);            
        }
        
        //Todos los datos obtenidos del formulario son guardados en un objeto para luego ser pasados al modelo en donde serna almacenados en su respectiva tabla
        $datosAlumno = array('matricula' => $matricula,
                            'nombre' => $nombre,
                            'carrera' => $carrera,
                            'situacion' => $situacion,
                            'correo' => $correo,
                            'telefono' => $telefono,
                            'foto' => $nombreFoto.'.'.$extension ); //El nombre de la foto de cada uusario sera el nombre de su matricula, para de esta forma llevar un control y que las fotos no se repiten y se sobreescriban


        if($nombreArchivo != ""){
            //Aqui es donde se hace la validacion de el archivo sea una foto con extensiones de imagenes frecuentes y no un formato .docs o un pdf por ejemplo
            if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){
                echo '<script> alert("Error al subir el archivo intenta con otro"); </script>';
            }else{
                //Una vez que se ha cargado la imagen a los archivos temporales de php, esta funcion la mueve de ahi y la coloca en la direccion donde se guardaran las fotos ya con el nombre presonalizado por cada usuario, que es su matricula
                move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$matricula . '.' . $extension);
            }
        }
        //Despues de que se ha guardado la imagen en la carpeta, se manda llamar la funcion del modelo en la cual se pasan el objeto con los datos del formulario para ser guardado
        $respuesta = Datos::inscribirAlumno($datosAlumno, "alumnos");

        //Se recibe la respuesta del metodo y si esta es exitosa se manda un mensaje de notificacion al cliente y se reenvia al usuario a la lista de todos los usuarios para que vea la insercion del nuevo alumno.
        if($respuesta == "success"){
            echo '<script> 
                        window.location.href = "index.php?action=alumnos&msg=Datos guardados correctamente"; 
                  </script>';
            //header('index.php?action=alumnos');
        }else{
            //En caso de haber un error se queda en la misma pagina y le notifica al ususario
            echo '<script> alert("Error al guardar"); </script>';
        }

    }

    //Funcion que retorna a la vista de registro los datos de las carreras disponibles para ponerlos en una lista seleccionable
    public function obtenerDatosCarreras()
    {

        $datosDeCarreras = array();
        
        //Manda llamar el metodo desde el modelo y pasandole la tabla de donde se van a extraer los datos como parametro
        $datosDeCarreras = Datos::traerDatosCarreras("carreras");

        return $datosDeCarreras;
    }
}