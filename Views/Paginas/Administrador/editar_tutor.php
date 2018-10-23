<?php
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosCarreras = array();
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosCarreras = $controlador -> obtenerDatosCarreras();
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
        $correo = $datosTutores[$i]['correo'];
        $contrasena = $datosTutores[$i]['contrasena'];
        
    }
}


?>

<section class="content-header">
    <h1>
        Editar Tutor
        
    </h1>
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

                        
                        
                        <div class="form-group">
                            <label for="numero">Numero: </label>
                            <input type="text" class="form-control" name="numero" placeholder="Numero del tutor" value="<?= $numero_empleado ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre completo del tutor" value="<?= $nombre ?>">
                        </div>

                        <div class="form-group">    
                            <label for="carrera">Carrera: </label>
                            <select class="form-control" name="carrera">
                                <?php

                                    for($i = 0; $i < count($datosCarreras); $i++ ){
                                        echo '<option value="'.$datosCarreras[$i]['carrera_id'].'"> '. $datosCarreras[$i]['nombre'] .' </option>';
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo: </label>
                            <input type="email" class="form-control" name="correo" placeholder="Correo del tutor" value="<?= $correo ?>">
                        </div>

                        <div class="form-group">
                            <label for="contrasena">Contrasena: </label>
                            <input type="password" class="form-control" name="contrasena" placeholder="Contrasena para ingreso de tutor" value="<?= $contrasena ?>">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                    <center> <input type="submit" class="btn btn-primary input-lg" value="Editar Datos" /> </center>
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