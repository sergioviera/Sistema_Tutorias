<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>

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
<body class="container-fluid hold-transition login-page">
    <div class="row">
        
        <div class="login-box">
            <div class="login-box-body">
                <!-- Alerta al usuario -->
                <?php if(isset($_GET['msg'])){ ?>
                    <div id="msg" class="alert alert-danger" role="alert"><?php echo $_GET['msg']?></div><script type="text/javascript">window.onload = function() {$("#msg").delay(4000).slideUp(200, function() {$(this).alert('close');});}</script>
                <?php } ?>

                <img class="center-block img-circle" src="Public/img/logo.png" width="150px" height="150px">
                <p class="login-box-msg " ><b><h3 align="center">Sistema de Tutorias</h3></b></p>
                <!--<p class="login-box-msg"><b>INICIO DE SESIÓN<b></p>-->
                <div class="row">
                    <div class="col-md-6">
                        <a href="inscripcion-tutor.php" class="btn btn-success">Quiero ser Tutor!</a>
                    </div>
                    <div class="col-md-6">
                        <a href="inscripcion-alumno.php" class="btn btn-warning">Necesito un Tutor!</a>
                    </div>
                </div>
                <br/>
                <form  method="post">
                    <div class="form-group has-feedback">
                        <input name="correo" type="email" class="form-control" placeholder="Correo">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <input name= "contrasena" type="password" class="form-control" placeholder="Contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Quienes somos?</h2>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <span class="col-sm-12"><h2>Karen Villalba</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Directora del proyecto</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <span class="col-sm-12"><h2>Sergio Viera</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Integrante</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                   <span class="col-sm-12"><h2>Nancy Carrizo</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Integrante</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                   <span class="col-sm-12"><h2>Nicol&aacute;s Ulmete</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Desarrollo de Software</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <span class="col-sm-12"><h2>Nombre Apellido</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Psicopedagoga</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <div class="profiles col-xs-8 col-xs-push-2  col-sm-10 col-sm-push-1 thumbnail">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <span class="col-sm-12"><h2>Nombre Apellido</h2></span>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <h3>Abogada</h3>
                                        <ul>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                            <li><span>Lorem ipsum</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    $controlador= new Controlador();

    $controlador -> iniciarSesion();
?>