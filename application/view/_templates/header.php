<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">

    <title>Sistema Administrativo </title>
    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL; ?>Gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL; ?>Gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="<?php echo URL; ?>bootstrap34/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo URL; ?>Gentelella/build/css/custom.css" rel="stylesheet">
      <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>css/header.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo URL; ?>css/sweetalert.css">



  </head>
</html>

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <!-- <img src="<?php echo URL; ?>img/censalogo.ico" alt=""> -->
                <a href="" class="site_title">   <img src="<?php echo URL; ?>img/censalogo3.ico" alt=""><span>CENSA</span></a>
              <!-- <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo URL; ?>Gentelella/images/img.jpg" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <?php if (1 == 1): ?>
                  <div id="inLine"></div><span>Conectado</span>
                <?php else: ?>
                  <div id="offLine"></div><span>Desconectado</span>
                <?php endif; ?>
            <h2><?php echo $_SESSION['nombre']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>

                <ul class="nav side-menu">
                  <li><a><i class="fa fa-graduation-cap"></i>Gestión de Estudiantes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo URL; ?>Estudiantes/CrearEstudiante">Registrar Estudiante</a></li>
                      <li><a href="<?php echo URL; ?>Estudiantes/listarEstudiantes">Listar Estudiantes</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i>Gestión de Programas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo URL; ?>Programa/adminPrograma">Administrar Programas</a></li>
                    </ul>
                  </li>
                  <?php if ($_SESSION['Rol'] == 2): ?>
                    <li><a><i class="fa fa-users"></i>Gestión de Empleados <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo URL; ?>Empleados/crearEmpleado">Registrar Empleados</a></li>
                        <li><a href="<?php echo URL; ?>Empleados/listarEmpleados">Ver Empleados</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i>Gestión de Cargos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo URL; ?>Cargos/crearCargo">Administrar Cargos</a></li>
                      </ul>
                    </li>
                  <?php endif; ?>

	                <!-- fa fa-th-list -->
                  <li><a><i class="fa fa-list-ol"></i>Gestión de Funciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo URL; ?>Funciones/crearFuncion">Administrar Funciones</a></li>
                    </ul>
                  </li>

                <li><a><i class="fa fa-calendar-check-o"></i>Gestión Bitácoras<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo URL; ?>Verbitacoras/listarBitacorasEstudiante">Bitácoras</a></li>
                  </ul>
                </li>

              <li><a><i class="fa fa-list-alt"></i>Evaluacion Estudiantes<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo URL; ?>Evaluaciones/aspectoEvaluar">Evaluación</a></li>
                </ul>
              </li>

            <li><a><i class="fa fa-check-square-o"></i>Criterios a Evaluar<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo URL; ?>CriteriosEvaluar/criterios">Criterios a Evaluar por Programa</a></li>
              </ul>
            </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo URL; ?>Gentelella/images/img.jpg" alt=""><?php echo $_SESSION['rol']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="javascript:;">Configuraciones</a></li>
                    <span class="badge bg-red pull-right"></span>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="<?php echo URL; ?>Home/cerrarSesion"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <!-- <div class="page-title">
              <div class="title_left"> -->
