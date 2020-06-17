<?php

//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

?>

<section class="content-header">
    <h1>
        Agregar Tutor
    </h1>
        <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutores </a></li>
        <li class="active">Agregar Tutor</li>
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
                        <input type="text" class="form-control" name="numero" placeholder="Numero del tutor">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo del tutor">
                    </div>

                    <div class="form-group">    
                        <label for="carrera">Carrera: </label>
                        <select class="form-control" name="carrera">
                            <option>Ingeniería Eléctrica</option>
                            <option>Ingeniería Mecánica</option>
                            <option>Ingeniería Química</option>
                            <option>Ingeniería en Sistemas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo: </label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo del tutor">
                    </div>


                    <div class="form-group">
                        <label for="telefono">Tel&eacute;fono: </label>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono del tutor">
                    </div>

                    <div class="form-group">
                        <label for="contrasena">Contrasena: </label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contrasena para ingreso de tutor">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary input-lg" value="Guardar Datos" /> </center>
                </div>
                
            </form>

        </div>
        <!-- /.box -->
    </div>
</div>


</section>

<?php

if(isset($_POST['numero']) ){


    $controlador->agregarDatosTutor();

}

?>