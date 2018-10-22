<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosSesiones = array();

//Y se llena ese array con la respuesta con los datos
$datosSesiones = $controlador -> obtenerDatosSesiones();


?>


<section class="content-header">
    <h1>
        Reporte de tutoria por turoria dada
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reportes </a></li>
        <li class="active"> Por tutoria </li>
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
                        <label for="tutoria">Id de sesion: <br/> </label> <br/>
                        <select class="form-control" name="tutoria">
                            <?php
                                for($i = 0; $i < count($datosSesiones); $i++ ){
                                    echo '<option value="'.$datosSesiones[$i]['sesion_id'].'"> '. $datosSesiones[$i]['sesion_id'] .' </option>';
                                }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="box-footer">
                    <center> <input type="submit" name="submit" class="btn btn-primary" value="Ver reporte"/> </center>
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
                <center> <h2 class="box-title">Reporte de Sesion de tutoria </h2> </center>
            </div>

            <div class="box-body">

                <?php

                    if(isset($_POST['tutoria']) ){

                        echo '<table id="reporte" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!--Columnas de la cabecera de la tabla-->
                                <th>Id Sesion</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Tema</th>
                                <th>Observaciones</th>
                                <th>Alumno (s)</th>
                            </tr>
                        </thead>
                        <tbody>';
                        
                        for($i=0; $i < count($datosSesiones); $i++ ){

                            if($_POST['tutoria'] == $datosSesiones[$i]['sesion_id'] ){
                                
                                echo '<tr>';
                                    echo '<td>'. $datosSesiones[$i]['sesion_id'] .'</td>';
                                    echo '<td>'. $datosSesiones[$i]['fecha'] .'</td>';
                                    echo '<td>'. $datosSesiones[$i]['hora'] .'</td>';
                                    echo '<td>'. $datosSesiones[$i]['tipo'] .'</td>';
                                    echo '<td>'. $datosSesiones[$i]['tema_nombre'] .'</td>';
                                    echo '<td>'. $datosSesiones[$i]['observaciones'] .'</td>';
        
                                    $alumnosDeSesion = $controlador->obtenerAlumnosSesion($datosSesiones[$i]['sesion_id']);
                                    
                                    $alumnosEnUnaVariable = "";
                                
                                    for($j=0; $j <count($alumnosDeSesion); $j++){
                                        $alumnosEnUnaVariable = $alumnosEnUnaVariable . ' ' . $alumnosDeSesion[$j]['nombre'] . '<br/>';
                                    }
        
                                    echo '<td>' . $alumnosEnUnaVariable . '</td>';

                                echo '</tr>';
                            }
                            
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
<!-- /.content -->