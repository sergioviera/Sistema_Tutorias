<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="Public/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>Alexander Pierce </p>
            <a href="#"> Superadmin </a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--ENCABEZADO-->
            <li class="header">ADMINISTRACION</li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="index.php?action=dashboard">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li> 
            <!--OPCION DE ALUMNOS-->
            <li class="treeview">
                <a href="index.php?action=listado_alumnos">
                    <i class="fa fa-user"></i>
                    <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?action=listado_alumnos">
                            
                            <i class="fas fa-list-ol"></i> Listar Alumnos
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=agregar_alumno">
                            <i class="fas fa-plus-square"></i> Agregar Alumno
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
                        <a href="pages/layout/top-nav.html">
                            
                            <i class="fas fa-list-ol"></i> Listado 
                        </a>
                    </li>
                    <li>
                        <a href="pages/layout/boxed.html">
                            <i class="fas fa-plus-square"></i> Agregar 
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
                        <a href="pages/layout/top-nav.html">
                            
                            <i class="fas fa-list-ol"></i> Listado 
                        </a>
                    </li>
                    <li>
                        <a href="pages/layout/boxed.html">
                            <i class="fas fa-plus-square"></i> Agregar 
                        </a>
                    </li>
                </ul>
            </li>

            
        </ul>
    </section>
</aside>