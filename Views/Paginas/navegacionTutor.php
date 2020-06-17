<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="Public/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <?php
                echo '<p>'.$_SESSION['nombre'].'</p>';
                echo '<a href="#">' . $_SESSION['tipoUsuario'] . '</a>';
            ?>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--ENCABEZADO-->
            <li class="header"> <center> <strong> ADMINISTRACION </strong> </center> </li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="index.php?action=dashboard_tutor">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li> 
            <!--OPCION DE TUTORIAS-->
                    <li>
                        <a href="index.php?action=tutorias">
                            
                            <i class="fas fa-list-ol"></i> Lista de tutorias
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=agregar_tutoria">
                            <i class="fas fa-plus-square"></i> Nueva tutoria 
                        </a>
                    </li>
            <!--OPCION DE ALUMNOS-->
                    <li>
                        <a href="index.php?action=alumnos">
                            
                            <i class="far fa-list-alt"></i> Lista de alumnos
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=reportes_alumno">
                            <i class="fa fa-user"></i> Reporte Por alumno
                        </a>
                    </li>
            
        </ul>
    </section>
</aside>