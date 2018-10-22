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
        Reporte de tutorias por alumno
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reportes </a></li>
        <li class="active"> Por alumno </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title"> Seleccione el alumno a mostrar reporte </h3>
            </div>


            <form method="POST">

                <div class="box-body">
                    
                    

                    <div class="form-group">
                        <label for="alumno">Alumno: <br/> </label> <br/>
                        <select class="form-control" name="alumno">
                            <?php
                                for($i = 0; $i < count($datosAlumnos); $i++ ){
                                    echo '<option value="'.$datosAlumnos[$i]['matricula'].'"> '. $datosAlumnos[$i]['alumno'] .' </option>';
                                }
                            ?>
                        </select>
                    </div>


                    
                    
                </div>

                <div class="box-footer">
                    <center> <input type="submit" name="submit" class="btn btn-primary" value="ver reporte"> </center>
                </div>

            </form>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-danger">
            
            <div class="box-header with-border">
                <center> <h2 class="box-title">Reporte de Alumno </h2> </center>
            </div>
            
            <div class="box-body">

                <?php
                    if(isset($_POST['alumno']) ){
                        
                        $datos = $controlador->obtenerDatosAlumnoSesion($_POST['alumno']);

                        echo '<h3> Alumno: '. $datos[0]['nombre'] .' </h3>';

                        echo '<table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!--Columnas de la cabecera de la tabla-->
                                <th>Id Sesion</th>
                                <th>fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Tema</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>';
                        
                        

                        for($i=0; $i < count($datos); $i++ ){
                            
                            
                                echo '<tr>';
                                    echo '<td>'. $datos[$i]['sesion_id'] .'</td>';
                                    echo '<td>'. $datos[$i]['fecha'] .'</td>';
                                    echo '<td>'. $datos[$i]['hora'] .'</td>';
                                    echo '<td>'. $datos[$i]['tipo'] .'</td>';
                                    echo '<td>'. $datos[$i]['tema_nombre'] .'</td>';
                                    echo '<td>'. $datos[$i]['observaciones'] .'</td>';
                                echo '</tr>';
                            
                            
                            
                        }
                        
                        echo '</tbody>
                        </table>';
                    }
                            
                            
                        
                                
                ?>
            </div>
            
            <div class="box-footer">
                <center> <a href="javascript:window.print()" target="_blank" class="btn btn-primary"> Imprimir </a> </center>
            </div>

            

        </div>
    </div>
</div>

</section>

