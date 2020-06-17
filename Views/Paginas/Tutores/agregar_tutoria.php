<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnosPorProfe();

//Se crea un array que va a recibir todos los obejtos 
$datosTemas = array();

//Y se llena ese array con la respuesta con los datos
$datosTemas = $controlador -> obtenerDatosTemas();

?>


<section class="content-header">
    <h1>
        Registrar tutoria
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutorias </a></li>
        <li class="active"> Nueva tutoria </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos de la tutoria</h3>
            </div>


            <form method="POST">

                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>                                                 
                        <input type="text" name="fecha" class="form-control pull-right" id="datepicker" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input type="text" name="hora" class="form-control timepicker" value="<?php echo gmdate('H:i', time() + 3600*(-3)); ?>">
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo">
                            <option>whatsapp</option>
                            <option>email</option>
                            <option>telefono</option>
                            <option>otro (aclarar)</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="tema">Tema: <br/> </label> <br/>
                        <select class="form-control" name="tema">
                            <?php
                                for($i = 0; $i < count($datosTemas); $i++ ){
                                    echo '<option value="'.$datosTemas[$i]['tema_id'].'"> '. $datosTemas[$i]['tema_nombre'] .' </option>';
                                }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="carrera">Alumno(s): <br/> </label> <br/>
                        <?php
                            for($i=0; $i < count($datosAlumnos); $i++ )
                            {
                                if ( isset( $_GET['alumno'] ) && $_GET['alumno']=$datosAlumnos[$i]['matricula'] ){
                                    echo '<input type="hidden" name="check_list[]" value="'.$datosAlumnos[$i]['matricula'].'" ><div id="msg" class="alert alert-info" role="alert">'.$datosAlumnos[$i]['alumno'].'</div>';
                                }else{
                                    echo '<input class="minimal" type="radio" name="check_list[]" value="'.$datosAlumnos[$i]['matricula'].'" > <label>'.$datosAlumnos[$i]['alumno'].' </label> <br/>';
                                }
                            }
                        ?>
                    </div>


                    <div class="form-group">
                        <label for="observaciones">Observaciones: <br/> </label> <br/>
                        <textarea name="observaciones" class="form-control" rows="3" placeholder="Escriba las observaciones ..."></textarea>

                    </div>
                    
                </div>

                <div class="box-footer">
                    <center> <input type="submit" name="submit" class="btn btn-primary" value="Submit"/> </center>
                </div>

            </form>

        </div>
    </div>
</div>

</section>
<!-- /.content -->
<script type="text/javascript">
window.onload = function() {
//    $('#datePicker').val(new Date().toDateInputValue());
}

</script>
<?php

//if(isset( $_POST['alumnos'] ) ){

  //  echo 'Datos en el select-multiple: ' . $_POST['hola'];

if(isset($_POST['submit'])){
    
    if(!empty($_POST['check_list'])){

        $controlador->guardarDatosTutoria();
    }

}

//}


?>