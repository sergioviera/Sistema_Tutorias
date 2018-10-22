<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnosPorProfe();

?>

<section class="content-header">
    <h1>
        Alumnos
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active"> Listado de alumnos </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <h3 class="box-title"> Lista de alumnos asociados a usted </h3>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Situacion</th>
                    <th>Correo</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosAlumnos); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosAlumnos[$i]['matricula'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['alumno'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['carrera'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['situacion'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['correo'] .'</td>';
                            echo '<td> <img src=fotos/'. $datosAlumnos[$i]['foto'] .' height="100px" width="100px" /></td>';
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

    

</section>
