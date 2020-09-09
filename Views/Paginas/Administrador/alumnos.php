<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnos();

?>

<section class="content-header">
    <h1>
        Alumnos
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active"> Lista de Alumnos </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="index.php?action=agregar_alumno" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nuevo alumno </a>
        <hr>
    </div>

    <!-- Alerta al usuario -->
    <?php if(isset($_GET['msg'])){ ?>
        <div id="msg" class="alert alert-success" role="alert"><?php echo $_GET['msg']?></div><script type="text/javascript">window.onload = function() {$("#msg").delay(2000).slideUp(200, function() {$(this).alert('close');});}</script>
    <?php } ?>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Escuela</th>
                    <th>Grado</th>
                    <th>Tel&eacute;fono</th>
                    <th>Tutor</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
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
                            echo '<td>'. $datosAlumnos[$i]['telefono'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['tutor'] .'</td>';
                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina que se ellama editar y eliminar, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="index.php?action=editar_alumno&id='.$datosAlumnos[$i]['matricula'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="index.php?action=alumnos&accion=eliminar_alumno&id='.$datosAlumnos[$i]['matricula'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

    

</section>


<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_alumno"){
        $controlador -> eliminarAlumno();
    }
}

?>