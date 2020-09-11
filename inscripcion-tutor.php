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
        body, input, select, h3, textarea{
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
        <p class="login-box-msg " ><b><h2 align="center">Programa de Tutorias</h2></b></p>
        <div class="box box-primary">
            <div id="msg" class="alert" role="alert">
            </div>
            <div class="box-header with-border">
                <h3>Qu&eacute; se espera de un Tutor</h3>
                <p>QUE DEMUESTRE ACTITUDES QUE POSIBILITEN LA RELACIÓN HONESTA, RICA Y EFICAZ CON LOS OTROS.</p>
                <p>Se considera que todo tutor tendría que estar dotado por cualidades como:</p>
                <ul>
                    <li><b>Empat&iacute;a</b>, como capacidad para simpatizar, para ponerse en el lugar del otro, para hacer suyos los sentimientos del otro, para comprenderlo sin juzgarlo.</li>
                    <li><b>Autenticidad</b>, que se refiere a la armonía y congruencia que debe haber entre lo que el  tutor dice y hace y lo que realmente es.</li>
                    <li><b>Madurez</b>, que hace al tutor una persona flexible, capaz de comprender, asimilar ideas, adaptarse a situaciones nuevas y diferenciar lo que pertenece a la subjetividad, y lo convierte en una persona en búsqueda permanente del bien común; capaz de tomar decisiones y modificarlas cuando sea necesario.</li>
                    <li><b>Responsabilidad o compromiso personal</b> para asumir riesgos, aceptar éxitos y fracasos, calcular consecuencias tanto para sí mismo como para sus estudiantes tutorados.</li>
                    <li><b>Sociabilidad</b>, que implica estar capacitados para desarrollar en sí mismo y en los otros criterios y valores sociales.</li>
                </ul>
                <p>Si te sent&iacute;s capaz para participar de este proyecto, por favor, ingresá tus datos para postularse como Tutor. En breve nos comunicaremos para informarte sobre los pasos a seguir.</p>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                
                <div class="box-body">

                    <div class="form-group">
                        <label for="numero">N&uacute;mero de legajo: </label>
                        <input type="text" class="form-control required" name="numero" placeholder="Numero de legajo">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre Completo: </label>
                        <input type="text" class="form-control required" name="nombre" placeholder="Nombre completo">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="numero">DNI: </label>
                        <input type="text" class="form-control required" name="dni" placeholder="DNI">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo electrónico: </label>
                        <input type="email" class="form-control required" name="correo" placeholder="Correo electrónico">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Tel&eacute;fono: </label>
                        <input type="text" class="form-control required" id="telefono" name="telefono" placeholder="Teléfono">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="carrera">Carrera: </label>
                        <select class="form-control" name="carrera">
                            <option>UTN-FRD - Ingeniería Eléctrica</option>
                            <option>UTN-FRD - Ingeniería Mecánica</option>
                            <option>UTN-FRD - Ingeniería Química</option>
                            <option>UTN-FRD - Ingeniería en Sistemas</option>
                            <option>Otra Institución/Carrera</option>
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
                        <input type="text" class="form-control required" name="promAplazo" placeholder="Promedio con aplazos">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="regularizadas">Materias Regularizadas:</label>
                        <input type="text" class="form-control required" name="regularizadas" placeholder="Materias Regularizadas">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="aprobadas">Materias Aprobadas:</label>
                        <input type="text" class="form-control required" name="aprobadas" placeholder="Materias Aprobadas">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="anioInicio">A&ntilde;o de inicio:</label>
                        <input type="text" class="form-control required" name="anioInicio" placeholder="Año de inicio de la carrera">
                        <span class="help-block hidden">Debe ingresar este valor</span>
                    </div>

                    <div class="form-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea class="form-control" name="comentarios"></textarea>
                    </div>

                    <!--Campo que subre la fotografia al servidor, lo coloca en una carpeta temporal desde donde se toma y se almacena en una carpeta especificada, para poder subir la imagen en el formulario se debe cambiar el encabezado a tipo  enctype="multipart/form-data" -->
                    <div class="form-group">
                        <label for="foto">Foto de perfil:</label> <br>
                        <input type="file" class="form-control input-lg" name="foto"/>
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

            $(".required").change(function(){
                $(this).parent().removeClass('has-error');
                $(this).next().addClass('hidden');
            })

            $("form").submit(function( event ) {
                $(".required").parent().removeClass('has-error');
                $(".required").next().addClass('hidden');
                $(".required").each(function() {
                    if($(this).val()==''){
                        event.preventDefault();
                        $(this).focus();
                        $(this).parent().addClass('has-error');
                        $(this).next().removeClass('hidden');
                    }
                });
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