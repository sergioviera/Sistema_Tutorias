<?php
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosTutores = $controlador -> obtenerDatosTutores();


$tutorAEditar = $_GET['id'];

$numero_empleado = 0.0;
$nombre = "";
$correo = "";
$contrasena = "";

for($i=0; $i < count($datosTutores); $i++ ){
    if($datosTutores[$i]['numero_empleado'] == $tutorAEditar ){

        $numero_empleado = $datosTutores[$i]['numero_empleado'];
        $nombre = $datosTutores[$i]['nombre'];
        $dni = $datosTutores[$i]['dni'];
        $correo = $datosTutores[$i]['correo'];
        $telefono = $datosTutores[$i]['telefono'];
        $carrera = $datosTutores[$i]['carrera'];
        $nivel = $datosTutores[$i]['nivel'];
        $promAplazo = $datosTutores[$i]['promAplazo'];
        $regularizadas = $datosTutores[$i]['regularizadas'];
        $aprobadas = $datosTutores[$i]['aprobadas'];
        $anioInicio = $datosTutores[$i]['anioInicio'];
        $comentarios = $datosTutores[$i]['comentarios'];
        $fechaInscripcion = $datosTutores[$i]['fecha_inscripcion'];
        $foto = $datosTutores[$i]['foto'];

        //$contrasena = $datosTutores[$i]['contrasena'];
    }
}


?>

<section class="content-header">
    <h1>Editar Tutor</h1>
    <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutores </a></li>
        <li class="active">Editar Tutor</li>
    </ol>

</section>


<!-- Main content -->
<section class="content">

    <div class="row">

        <div class="col-md-10">

            <!-- general form elements -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregue los datos del tutor</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST">
                    
                    <div class="box-body">

                        <div class="form-group" style="text-align: center;">
                            <img src="fotos/<?= $foto ?>" name="fotoActual" height="200px" width="200px"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="numero">Legajo: </label>
                            <input type="text" class="form-control" name="numero" placeholder="Numero del tutor" value="<?= $numero_empleado ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre completo del tutor" value="<?= $nombre ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">DNI: </label>
                            <input type="text" class="form-control" name="dni" value="<?= $dni ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Correo Electr&oacute;nico: </label>
                            <input type="text" class="form-control" name="correo" value="<?= $correo ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Tel&eacute;fono: </label>
                            <input type="text" class="form-control" name="telefono" value="<?= $telefono ?>">
                        </div>

                        <div class="form-group">    
                            <label for="carrera">Carrera: </label>
                            <select class="form-control" name="carrera">
                                <option <?php echo ($carrera == "UTN-FRD - Ingeniería Eléctrica")?'selected="selected"':'' ?>>UTN-FRD - Ingeniería Eléctrica</option>
                                <option <?php echo ($carrera == "UTN-FRD - Ingeniería Mecánica")?'selected="selected"':'' ?>>UTN-FRD - Ingeniería Mecánica</option>
                                <option <?php echo ($carrera == "UTN-FRD - Ingeniería Química")?'selected="selected"':'' ?>>UTN-FRD - Ingeniería Química</option>
                                <option <?php echo ($carrera == "UTN-FRD - Ingeniería en Sistemas")?'selected="selected"':'' ?>>UTN-FRD - Ingeniería en Sistemas</option>
                                <option <?php echo ($carrera == "Otra Institución/Carrera")?'selected="selected"':'' ?>>Otra Institución/Carrera</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nivel: </label>
                            <input type="text" class="form-control" name="nivel" value="<?= $nivel ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Promedio con Aplazos: </label>
                            <input type="text" class="form-control" name="promAplazo" value="<?= $promAplazo ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Cantidad de materias regularizadas: </label>
                            <input type="text" class="form-control" name="regularizadas" value="<?= $regularizadas ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Cantidad de materias aprobadas: </label>
                            <input type="text" class="form-control" name="aprobadas" value="<?= $aprobadas ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">A&ntilde;o de inicio de la carrera: </label>
                            <input type="text" class="form-control" name="anioInicio" value="<?= $anioInicio ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Comentarios: </label>
                            <input type="text" class="form-control" name="comentarios" value="<?= $comentarios ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Fecha de Inscripci&oacute;n: </label>
                            <input type="text" class="form-control" name="fechaInscripcion" value="<?= $fechaInscripcion ?>">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                    <center> <input type="submit" class="btn btn-primary input-lg" value="Editar Datos" disabled /> </center>
                    </div>
                    
                </form>

            </div>
            <!-- /.box -->
        </div>
    </div>

</section>


<?php

if(isset($_POST['numero']) ){


    $controlador->editarDatosTutor();

}

?>