<?php

//Vista que despliega el formulario para editar los datos de un alumno, este formulario es llenado automatiamente con la informacion del usuario que le corresponde la matricula pasada en el metodo GET

$controlador = new Controlador();

$datosAlumno = array();
$datosCarreras = array();
$datosTutores = array();

//Se manda llamar las funciones que traen los datos en arreglos apra listarlos en los campos que requieren de la informacion que exista en otra tabla, son listados dinamicamente respecto al numero de campos que tengan en la tabla
$datosCarreras = $controlador -> obtenerDatosCarreras();
$datosTutores = $controlador -> obtenerDatosTutores();
$datosAlumno = $controlador -> obtenerDatosAlumno();

?>

<section class="content-header">
    <h1>
        Editar Alumno
        
    </h1>
        <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active">Editar Alumno</li>
    </ol>
           
</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Edite los datos del alumno</h3>
            </div>

            <form role="form" method='post' enctype="multipart/form-data">
                
                <div class="box-body">

                <div class="form-group" style="text-align: center;">
                    <img src="fotos/<?= $datosAlumno[0]['foto'] ?>" name="fotoActual" height="200px" width="200px"/> 
                </div>

                <input type="hidden" name="fotoActual" value="<?= $datosAlumno[0]['foto'] ?>">

                <div class="form-group">
                    <label for="matricula">DNI</label>
                    <input type="text" class="form-control" name="matricula" placeholder="1800001" value=" <?= $datosAlumno[0]['matricula'] ?> " disabled/>
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Juanito Perez" value="<?= $datosAlumno[0]['alumno'] ?>" >
                </div>

                <div class="form-group">    
                    <label for="carrera">Escuela</label>
                    <select class="form-control" name="carrera">
                        <?php

                            for($i = 0; $i < count($datosCarreras); $i++ ){
                                if( ! ($datosAlumno[0]['carrera'] == $datosCarreras[$i]['nombre']) ){
                                    echo '<option value="'.$datosCarreras[$i]['carrera_id'].'"> '. $datosCarreras[$i]['nombre'] .' </option>';
                                }else{
                                    echo '<option value="'.$datosCarreras[$i]['carrera_id'].'" selected="selected"> '. $datosCarreras[$i]['nombre'] .' </option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="situacion">Grado</label>
                    <select class="form-control" name="situacion">
                        <option <?php echo ($datosAlumno[0][3] == "1")?'selected="selected"':'' ?>>1</option>
                        <option <?php echo ($datosAlumno[0][3] == "2")?'selected="selected"':'' ?>>2</option>
                        <option <?php echo ($datosAlumno[0][3] == "3")?'selected="selected"':'' ?>>3</option>
                        <option <?php echo ($datosAlumno[0][3] == "4")?'selected="selected"':'' ?>>4</option>
                        <option <?php echo ($datosAlumno[0][3] == "5")?'selected="selected"':'' ?>>5</option>
                        <option <?php echo ($datosAlumno[0][3] == "6")?'selected="selected"':'' ?>>6</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="alguien@ejemplo.com" value=" <?= $datosAlumno[0]['correo'] ?>" >
                </div>
                
                <div class="form-group">
                    <label for="telefono">Tel&eacute;fono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese un teléfono" value=" <?= $datosAlumno[0]['telefono'] ?>" >
                </div>
                
                <div class="form-group">
                    <label for="tutor">Tutor</label>
                    <select class="form-control" name="tutor">
                        <?php
                            for($i = 0; $i < count($datosTutores); $i++ ){
                                

                                if( ! ($datosAlumno[0]['tutor'] == $datosTutores[$i]['nombre'] ) ){
                                    echo '<option value="'.$datosTutores[$i]['numero_empleado'].'"> '. $datosTutores[$i]['nombre'] .' </option>';
                                }else{
                                    echo '<option value="'.$datosTutores[$i]['numero_empleado'].'" selected="selected"> '. $datosTutores[$i]['nombre'] .' </option>';
                                }
                            }
                        ?>
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="foto">Cambiar Foto:</label> <br>
                    <input type="file" class="form-control" name="foto"  />
                </div>
                
                

                </div>
                    <div class="box-footer">
                    <center> <button type="submit" class="btn btn-primary">Guardar Datos</button> </center>
                </div>

            </form>

        </div>
    </div>
</div>

</section>


<?php

//Toda la informacion la cacha el metodo del controlador para editar los datos del usuario que se le paso como parametro GET la matricula
if(isset($_POST['nombre'])){
        
    $controlador -> editarDatosAlumno();

}

?>