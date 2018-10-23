<?php

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnos();

$totalAlumnos = count($datosAlumnos);

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosCarreras = array();
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosCarreras = $controlador -> obtenerDatosCarreras();
$datosTutores = $controlador -> obtenerDatosTutores();

$totalCarreras = count($datosCarreras);
$totalTutores = count($datosTutores);

//Se crea un array que va a recibir todos los obejtos 
$datosTemas = array();

//Y se llena ese array con la respuesta con los datos
$datosTemas = $controlador -> obtenerDatosTemas();

$totalTemas = count($datosTemas);

?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h1><?= $totalAlumnos ?> </h1>

                <h1>Alumnos registrados</h1>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h1><?= $totalCarreras ?> </h1>

                <h1>Carreras </h1>
            </div>

            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>

        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h1><?= $totalTemas ?> </h1>

                <h1>Temas de tutorias</h1>
            </div>
            <div class="icon">
                <i class="ion-android-bookmark"></i>
            </div>

        </div>
    </div>

    
    <div class="col-lg-6 col-xs-6">

        <div class="small-box bg-red">

            <div class="inner">
                <h1><?= $totalTutores ?> </h1>

                <h1>Tutores al servicio de los alumnos</h1>
            </div>

            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            

        
        </div>
    
    </div>


</div>


</section>
<!-- /.content -->
