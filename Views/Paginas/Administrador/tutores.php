<?php
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosTutores = $controlador -> obtenerDatosTutores();

?>

<section class="content-header">
    <h1>
        Tutores
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutores </a></li>
        <li class="active"> Lista de tutores </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="index.php?action=agregar_tutor" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nuevo tutor </a>
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
                    <th>Fecha de Inscripci&oacute;n</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Foto</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosTutores); $i++ ){

                        echo '<tr>';
                            echo '<td>'. $datosTutores[$i]['fecha_inscripcion'] .'</td>';
                            echo '<td>'. $datosTutores[$i]['nombre'] .'</td>';
                            echo '<td>'. $datosTutores[$i]['carrera'] .'</td>';
                            echo '<td>'. $datosTutores[$i]['correo'] .'</td>';
                            echo '<td>'. $datosTutores[$i]['telefono'] .'</td>';
                            echo '<td><img src="fotos/'. $datosTutores[$i]['foto'] .'" width="30px" height="30px"></td>';
                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina que se ellama editar y eliminar, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="index.php?action=editar_tutor&id='.$datosTutores[$i]['numero_empleado'].'" type="button" class="btn btn-warning"> <i class="fas fa-address-card"></i> </a> </td>';
                            
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

</section>
<!-- /.content -->

<script type="text/javascript">
    function eliminar(id){
        if(confirm("Seguro que desea eliminar el tutor?")){
            window.location.href = "index.php?action=tutores&accion=eliminar_tutor&id="+id;
        }
    }
</script>
<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_tutor"){
        $controlador -> eliminarTutor();
    }
}

?>