<section class="content-header">
    <h1>
        Editar Tutor
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutores </a></li>
        <li class="active">Editar Tutor</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="numero">Numero del empleado</label>
                  <input type="text" class="form-control" id="numero" placeholder="Escribe numero de empleado" name="numero">
                </div>

                <div class="form-group">
                  <label for="nombre">Nombre del tutor</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Escribe nombre" nmae="nombre">
                </div>

              <div class="form-group">
                <label>Carrera</label>
                <select class="form-control select2" style="width: 100%;" name=carrera>
                  <option selected="selected" value="1">ITI</option>
                  <option value="2">MECA</option>
                  <option value="3">ISA</option>
                  <option value="4">PYMES</option>
                  <option value="5">MANU</option>
                </select>
              </div>


              <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" id="correo" placeholder="Escribe correo institucional" name="correo">
              </div>

              <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" id="correo" placeholder="Escribe contraseña" name="password">
              </div>


                <div class="form-group">
                  <label for="foto">Selecciona foto del tutor</label>
                  <input type="file" id="foto">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>