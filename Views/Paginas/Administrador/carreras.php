<?php
  //Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
   $controlador = new Controlador();

  //Se crea un array que va a recibir todos los obejtos 
  $datosCarrera = array();

  //Y se llena ese array con la respuesta con los datos
  $datosCarrera = $controlador -> obtenerDatosCarreras();
?>

<section class="content-header">
    <h1>
        Carreras
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Carrera </a></li>
        <li class="active"> Lista de Carreras </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
    <!--<h3 class="box-title">Data Table With Full Features</h3> -->
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosCarrera); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosCarrera[$i]['carrera_id'] .'</td>';
                            echo '<td>'. $datosCarrera[$i]['nombre'] .'</td>';
                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina que se ellama editar y eliminar, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="index.php?action=editar_carrera&id='.$datosCarrera[$i]['carrera_id'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="index.php?action=carreras&accion=eliminar_carrera&id='.$datosCarrera[$i]['carrera_id'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
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
    if( $_GET['accion'] == "eliminar_carrera"){
        $controlador -> eliminarCarrera();
    }
}

?>