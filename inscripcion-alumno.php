<?php
require_once('Controllers/ControladorAnonimo.php');
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new ControladorAnonimo();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosCarreras = array();
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosCarreras = $controlador -> obtenerDatosCarreras();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscripción Alumno</title>

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
</head>
<body class="hold-transition login-page">

<div class="login-box" style="width:70%;margin:7% auto;">
  
    <div class="login-box-body">
        <!-- Alerta al usuario -->
        <?php if(isset($_GET['msg'])){ ?>
            <div id="msg" class="alert alert-danger" role="alert"><?php echo $_GET['msg']?></div><script type="text/javascript">window.onload = function() {$("#msg").delay(4000).slideUp(200, function() {$(this).alert('close');});}</script>
        <?php } ?>

        <img class="center-block img-circle" src="Public/img/logo.png" width="150px" height="150px">
        <p class="login-box-msg " ><b><h3 align="center">Necesito un Tutor!</h3></b></p>
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Por favor, ingres&aacute; tus datos para que nos comuniquemos contigo.</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
                <div class="box-body">

                    <div class="form-group">
                        <label for="nombre">Nombre de la persona responsable:</label>
                        <input type="text" class="form-control" name="nombreResponsable" placeholder="Nombre completo de la persona a cargo del alumno">
                    </div>

                    <div class="form-group">
                        <label for="matricula">DNI del estudiante:</label>
                        <input type="number" class="form-control" name="matricula" placeholder="Ingrese el DNI">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre del estudiante:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo del alumno">
                    </div>

                    <div class="form-group">    
                        <label for="carrera">Colegio:</label>
                        <select class="form-control" name="carrera">
                            <?php

                                for($i = 0; $i < count($datosCarreras); $i++ ){
                                    echo '<option value="'.$datosCarreras[$i]['carrera_id'].'"> '. $datosCarreras[$i]['nombre'] .' </option>';
                                }
                            
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="situacion">Grado:</label>
                        <select class="form-control" name="situacion">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Electr&oacute;nico:</label>
                        <input type="text" class="form-control" name="correo" placeholder="alguien@ejemplo.com">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Tel&eacute;fono:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono con prefijo">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary input-lg" value="Guardar Datos" /> </center>
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

//Compara si la variable exista, para que cuando entre sin que se le haya pulsado al boton esto no se accione y trate de hacer algo, eso solo se habilitara cuando el usaurio de click en el boton, es lo que significa
if(isset($_POST['matricula'])){
    
    //Funcion del controlador que permite la lecutra de todas las variables del formulario para reunirlas en un objeto y posteriormente pasarlas al modelo apra que la almacene
    $controlador ->  guardarDatosAlumno();

}

?>