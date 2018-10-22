<?php
    $controlador = new Controlador();//Llamar al controlador
    $datosCarrera = array();//Hacer array para los datos
    $datosCarrera = $controlador->obtenerDatosCarreraId();//Obtener los datos del usuario
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
                  <input type="text" name="carrera_id" value="<?= $datosCarrera[0]['carrera_id'] ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre de la carrera</label>
                  <input type="text" placeholder="Escribe nombre de la carrera" name="nombre" value="<?= $datosCarrera[0]['nombre'] ?>" required>
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
if(isset($_POST['nombre'])){
        
    $controlador -> editarDatosCarrera();

}

?>