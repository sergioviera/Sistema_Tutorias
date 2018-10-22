<section class="content-header">
    <h1>
        Agregar Nuevo Usuario
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Agregar Nuevo Usuario</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">

                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre" name="nombre">
                </div>

                <div class="form-group">
                  <label for="rol">Rol</label>
                  <div class="form-group has-feedback">
                	<select name="rol" class="form-control">
                    <option value="Tutor"> Tutor </option>
                    <option value="superadmin"> Administrador </option>
                	</select>
            		</div>
                </div>

                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" id="correo" placeholder="Escribe tu correo" name="correo">
                </div>

                <div class="form-group">
                  <label for="contra">Contraseña</label>
                  <input type="password" class="form-control" id="contra" placeholder="Escribe tu contraseña" name="contra">
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

    $controlador -> agregarUsuario();
?>