<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosTemas = array();

//Y se llena ese array con la respuesta con los datos
$datosTemas = $controlador -> obtenerDatosTema();

?>

<section class="content-header">
    <h1>
        Editar tema de tutoria
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Temas de tutorias </a></li>
        <li class="active"> Editar tema </li>
    </ol>

</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-md-10">

    <!-- general form elements -->
    <div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Complete los datos del tema de tutoria</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST">
        
        <div class="box-body">

        <div clas="form-group">
            <label for="id"> Id </label>
            <input type="text" class="form-control" name="id" value="<?= $datosTemas[0][0] ?>" disabled >
        </div>

        <div class="form-group">
            <label for="nombre">Tema</label>
            <input type="text" class="form-control" name="tema" value="<?= $datosTemas[0][1] ?>" >
        </div>

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

//Toda la informacion la cacha el metodo del controlador para editar los datos del usuario que se le paso como parametro GET la matricula
if(isset($_POST['tema'])){
      
    

    $controlador->editarDatosTema();
    //$controlador -> editarDatosTema();
    //echo '<h1> sahdfasjkihfalhjsfkjlh sfkjhsdfkjlhsaflhsfhshsfhakhljsjhjdfhfdlhjfs </h1>';

}

?>