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
                <a href="index.php?action=dashboard">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li> 
            <!--OPCION DE ALUMNOS-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=alumnos">
                            
                            <i class="far fa-list-alt"></i> Lista de alumnos
                        </a>
                    </li>
                    <li active>
                        <a href="index.php?action=agregar_alumno">
                            <i class="fas fa-user-plus"></i> Agregar alumno
                        </a>
                    </li>
                </ul>
            </li>
            <!--OPCION DE TUTORES-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span>Tutores</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=tutores">
                            
                            <i class="fas fa-list-ol"></i> Lista de tutores 
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=agregar_tutor">
                            <i class="fas fa-plus-square"></i> Agregar tutor
                        </a>
                    </li>
                </ul>
            </li>
            <!--OPCION DE CARRERAS-->
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-graduation-cap"> </i> 
                    <span>Carreras</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=carreras">
                            
                            <i class="fas fa-list-ol"></i> Lista de carreras
                        </a>
                    </li>
                    <li>
                    <a href="index.php?action=agregar_carrera">
                            <i class="fas fa-plus-square"></i> Agregar carrera
                        </a>
                    </li>
                </ul>
            </li>
            <!--OPCION DE REPORTES-->
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-chart-bar"></i> 
                    <span>Reportes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=reportes_maestro">
                            
                            <i class="fa fa-chalkboard-teacher"></i> Por tutor
                        </a>
                    </li>

                    <li>
                        <a href="index.php?action=reportes_alumno">
                            <i class="fa fa-user"></i> Por alumno 
                        </a>
                    </li>

                    <li>
                        <a href="index.php?action=reportes_tutoria">
                            <i class="fas fa-hands-helping"></i> Por tutoria 
                        </a>
                    </li>


                </ul>
            </li>
            <!--OPCION DE TEMAS DE TUTORIAS-->
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-book-reader"></i>
                    <span>Temas de Tutoria</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=temas">
                            
                            <i class="fas fa-list-ol"></i> Lista de temas 
                        </a>
                    </li>
                    <li>
                    <a href="index.php?action=agregar_tema">
                            <i class="fas fa-plus-square"></i> Agregar tema
                        </a>
                    </li>
                </ul>
            </li>
            <!--OPCION DE USUARIOS-->
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=usuarios">
                            
                            <i class="fas fa-list-ol"></i> Lista de usuarios
                        </a>
                    </li>
                    <li>
                    <a href="index.php?action=agregar_usuario">
                            <i class="fas fa-plus-square"></i> Agregar usuario
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </section>
</aside>