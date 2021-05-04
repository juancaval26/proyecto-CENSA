<!DOCTYPE html>
<html lang="es">
<head>
  <title>Estudiante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo URL; ?>bootstrap34/css/bootstrap.css" rel="stylesheet">
<style media="screen">

.enlace_desactivado { pointer-events: none;

color:grey;
cursor: not-allowed;
opacity: 0.5;
}

</style>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <img src="<?php echo URL; ?>img/censita.png"width="65px" height="50px"alt="CENSA">
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>Bitacoras/inicioBitacora">Inicio</a>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"> Bitácoras <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php for ($i=1; $i <= 6; $i++): ?>
            <?php if ($numBitacora+1 == $i): ?>
                <li><a  href="<?php echo URL; ?>bitacoras/datosEstudiante1">Bitácora <?php echo $i ?></a></li>
            <?php else: ?>
                <li><a class="enlace_desactivado" href="<?php echo URL; ?>bitacoras/datosEstudiante1">Bitácora <?php echo $i ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>
        </ul>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>Bitacoras/listaBitacorasEstudiante"> Lista Bitácoras</a>
        </li>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo URL; ?>Home/cerrarSesion"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>

  </div>
  </div>
  </nav>

<div class="container">

    <h3><center><b>Bienvenido <?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']; ?></h3></b><hr></center>
  <center><img src="<?php echo URL; ?>img/image.png" width="100%" height="" alt="CENSA">
</div>

</body>
</html>
<script src="<?php echo URL; ?>bootstrap34/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo URL; ?>bootstrap34/js/bootstrap.min.js"></script>

<script type="text/javascript">
$("#mitext2").click(function(e){

        $(this).css({cursor:"default"});
        e.preventDefault();

});
</script>
