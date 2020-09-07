<?php
require_once('Controllers/ControladorAnonimo.php');
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new ControladorAnonimo();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscripción Tutor</title>

    <link rel="shortcut icon" href="Public/img/logo.jpg">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="Public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Public/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css" media="screen">
        body, input, select, h3{
            font-size: 150% !important;
            height: 150% !important;
        }
    </style>
</head>
<body class="hold-transition login-page">

<div class="login-box" style="width:70%;margin:7% auto;">
  
    <div class="login-box-body">
        <!-- Alerta al usuario -->
        <?php if(isset($_GET['msg'])){ ?>
            <div id="msg" class="alert alert-danger" role="alert"><?php echo $_GET['msg']?></div><script type="text/javascript">window.onload = function() {$("#msg").delay(4000).slideUp(200, function() {$(this).alert('close');});}</script>
        <?php } ?>

        <img class="center-block img-circle" src="Public/img/logo.png" width="150px" height="150px">
        <p class="login-box-msg " ><b><h3 align="center">Registrarse como Tutor</h3></b></p>
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Por favor, ingrese sus datos para postularse como tutor. En breve nos comunicaremos para informarle sobre los pasos a seguir.</h3>
            </div>

            <div id="msg" class="alert alert-secondary">
                x
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="off">
                
                <div class="box-body">

                    <div class="form-group">
                        <label for="numero">N&uacute;mero de legajo: </label>
                        <input type="text" class="form-control" name="numero" placeholder="Numero de legajo">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre Completo: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                    </div>

                    <div class="form-group">
                        <label for="numero">DNI: </label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI">
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo electrónico: </label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo electrónico">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Tel&eacute;fono: </label>
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                    </div>

                    <div class="form-group">
                        <label for="carrera">Carrera: </label>
                        <select class="form-control" name="carrera">
                            <option>Ingeniería Eléctrica</option>
                            <option>Ingeniería Mecánica</option>
                            <option>Ingeniería Química</option>
                            <option>Ingeniería en Sistemas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nivel">Cursando el A&ntilde;o: </label>
                        <select class="form-control" name="nivel">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="promAplazo">Promedio con aplazos:</label>
                        <input type="text" class="form-control" name="promAplazo" placeholder="Promedio con aplazos">
                    </div>

                    <div class="form-group">
                        <label for="regularizadas">Materias Regularizadas:</label>
                        <input type="text" class="form-control" name="regularizadas" placeholder="Materias Regularizadas">
                    </div>

                    <div class="form-group">
                        <label for="aprobadas">Materias Aprobadas:</label>
                        <input type="text" class="form-control" name="aprobadas" placeholder="Materias Aprobadas">
                    </div>

                    <div class="form-group">
                        <label for="anioInicio">A&ntilde;o de inicio:</label>
                        <input type="text" class="form-control" name="anioInicio" placeholder="Año de inicio de la carrera">
                    </div>

                    <div class="form-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea class="form-control" name="comentarios"></textarea>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary input-lg" value="Inscribirse" /> </center>
                </div>
                
            </form>

        </div>

    </div>
    <!-- /.login-box-body -->

</div>


    <!-- jQuery 3 -->
    <script src="Public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- iCheck -->
    <script src="Public/plugins/iCheck/icheck.min.js"></script>
    
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

</body>
</html>

<?php

if(isset($_POST['numero']) ){

    $controlador -> inscribirTutor();

}

?>