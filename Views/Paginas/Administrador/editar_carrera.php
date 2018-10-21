<?php
    $datoCarrera = array();//Hacer array para los datos
    $datos = new Controlador();//Llamar al controlador
    $datoCarrera = $datos->obtenerDatosCarreraId();//Obtener los datos del usuario
?>
<section class="content-header">
    <h1>
        Editar Carrera
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Carreras</a></li>
        <li class="active">Editar Carrera</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">

                <div class="form-group">
                  <label for="carrera_id">Id de la carrera</label>
                  <input type="text" name="carrera_id" value="<?= $datoCarrera[0]['carrera_id'] ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre de la carrera</label>
                  <input type="text" placeholder="nombre" name="nombre" value="<?= $datoCarrera[0]['nombre'] ?>" required>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" value="Actualizar">Enviar</button>
              </div>
            </form>
          </div>

</section>
<?php
//Enviar los datos a la clase del controlador para llamar a una función
$actualizar = new Controlador();
//Llama a la funcion de actualizar los datos del usuario
$actualizar -> actualizarDatosCarrera();
?>