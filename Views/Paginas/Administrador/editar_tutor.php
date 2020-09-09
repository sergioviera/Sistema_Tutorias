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

        $foto = $datosTutores[$i]['foto'];
        $numero_empleado = $datosTutores[$i]['numero_empleado'];
        $nombre = $datosTutores[$i]['nombre'];
        $carrera = $datosTutores[$i]['carrera'];
        $correo = $datosTutores[$i]['correo'];
        $contrasena = $datosTutores[$i]['contrasena'];
        $telefono = $datosTutores[$i]['telefono'];
        
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
                            <label for="carrera">Carrera: </label>
                            <select class="form-control" name="carrera">
                                <option <?php echo ($carrera == "Ingeniería Eléctrica")?'selected="selected"':'' ?>>Ingeniería Eléctrica</option>
                                <option <?php echo ($carrera == "Ingeniería Mecánica")?'selected="selected"':'' ?>>Ingeniería Mecánica</option>
                                <option <?php echo ($carrera == "Ingeniería Química")?'selected="selected"':'' ?>>Ingeniería Química</option>
                                <option <?php echo ($carrera == "Ingeniería en Sistemas")?'selected="selected"':'' ?>>Ingeniería en Sistemas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo: </label>
                            <input type="email" class="form-control" name="correo" placeholder="Correo del tutor" value="<?= $correo ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Tel&eacute;fono: </label>
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono del tutor" value="<?= $telefono ?>">
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