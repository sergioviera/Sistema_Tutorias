<section class="content-header">
    <h1>
        Agregar Escuela
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escuelas</a></li>
        <li class="active">Agregar Escuela</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">

                <div class="form-group">
                  <label for="nombre">Nombre de la Escuela</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Escribe nombre de la carrera" name="nombre">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>

</section>

<?php
    $controlador= new Controlador();

    $controlador -> agregarCarrera();
?>