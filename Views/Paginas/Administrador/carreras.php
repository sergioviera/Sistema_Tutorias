<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoCarrera = array();//Hacer array para los datos
    $datos = new Controlador();//Llamar al controlador
    $datoCarrera = $datos-> obtenerCarreras();//Obtener los datos del usuario
?>

<section class="content-header">
    <h1>
        Carreras
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Carreras </a></li>
        <li class="active">Lista de Carreras</li>
    </ol>
    <div class="box box-primary">
    <div class="box">
            <div class="box-header">
              <!--<h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre de la Carrera</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($datoCarrera); $i++) { ?>
                <tr>
                  <td><?php echo $datoCarrera[$i]['carrera_id'] ?></td>
                  <td><?php echo $datoCarrera[$i]['nombre'] ?></td>
                  <td><a href="index.php?action=editar_carrera&id=<?=$datoCarrera[$i]['id']?>"><i class="fas fa-pencil"></i></a></td>
                  <td><a href="index.php?action=eliminar&id=<?=$datoCarrera[$i]['id']?>"><i class="fas fa-trash-o"></i></a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nombre de la Carrera</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</section>