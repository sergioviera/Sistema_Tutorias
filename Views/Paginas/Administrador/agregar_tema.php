<section class="content-header">
    <h1>
        Agregar nuevo tema de tutorias
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Temas de tutorias </a></li>
        <li class="active"> Agregar tema </li>
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

        <div class="form-group">
            <label for="nombre">Tema</label>
            <input type="text" class="form-control" name="tema" placeholder="Nombre del tema de tutoria">
        </div>

        <div class="box-footer">
            <center> <input type="submit" class="btn btn-primary input-lg" value="Guardar Datos" /> </center>
        </div>
        
    </form>
    </div>
    <!-- /.box -->
</div>
</div>
<!-- /.row -->

</section>
<!-- /.content -->


<?php

//Compara si la variable exista, para que cuando entre sin que se le haya pulsado al boton esto no se accione y trate de hacer algo, eso solo se habilitara cuando el usaurio de click en el boton, es lo que significa
if(isset($_POST['tema'])){
    
    $controlador = new Controlador();
    //Funcion del controlador que permite la lecutra de todas las variables del formulario para reunirlas en un objeto y posteriormente pasarlas al modelo apra que la almacene
    $controlador -> guardarDatosTema();

}

?>