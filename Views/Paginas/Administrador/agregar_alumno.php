<section class="content-header">
    <h1>
        Agregar Alumno
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active">Agregar Alumno</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="matricula">Matricula</label>
                  <input type="text" class="form-control" id="matricula" placeholder="Escribe matricula" name="matricula">
                </div>

                <div class="form-group">
                  <label for="nombre">Nombre del alumno</label>
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
                  <label for="situacion">Situación Academica</label>
                  <input type="text" class="form-control" id="situacion" placeholder="Escribe situación actual" name="situacion">
              </div>

              <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" id="correo" placeholder="Escribe correo institucional" name="correo">
              </div>

              <div class="form-group">
                <label>Profesor</label>
                <select class="form-control select2" style="width: 100%;" name=profesor>
                  <option selected="selected" value="1">ITI</option>
                  <option value="2">MECA</option>
                  <option value="3">ISA</option>
                  <option value="4">PYMES</option>
                  <option value="5">MANU</option>
                </select>
              </div>

                <div class="form-group">
                  <label for="foto">Selecciona foto del alumno</label>
                  <input type="file" id="foto">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>

</section>

