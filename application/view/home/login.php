<!DOCTYPE html>
<html lang="es">
<head>
	<title>Iniciar Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	<!--  responsive -->
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo URL; ?>login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>login/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/login.css">

<!--===============================================================================================-->
</head>
<body style="background-image: url('<?= URL; ?>img/fondoCensa.jpg');" id="tamanio">
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-t-85 p-b-20" id="login">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-70">
						Iniciar Sesión
					</span>
					<span class="login100-form-avatar">
						<img src="<?php echo URL; ?>img/censa1.png" alt="CENSA">
					</span>
					<label for="">Usuario</label>
					<div class="form-group has-feedback">
        <input type="user" name="txtUsuario" class="form-control" placeholder="Documento" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
			<label for="">Contraseña</label>
			<div class="input-group">
      <input ID="txtPassword" type="Password" name="txtClaves" id="txtClaves" placeholder="Contraseña" Class="form-control">
          <div class="input-group-append">
            <button id="show_password" class="btn btn-success" type="button"  onclick="mostrarPassword()"required> <span class="fa fa-eye-slash icon" title="mostrar/ocultar"></span> </button>
          </div>
    	</div>
			<br>
			<div class="form-group text-center">
				<?php if (isset($error)) {
					echo $error;
				} ?>
			</div>

			<div class="form-group">
				<label for="">Ingresar como: </label>
				<select class="form-control" name="selrol" required>
					<option selected="selected">Seleccionar</option>
					<?php foreach ($lista as $value): ?>
						<option value="<?= $value['IdRol']; ?>"><?= $value['Rol']; ?></option>
					<?php endforeach; ?>
				</select>
				</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btnIngresar" type="submit">
							ingresar
						</button>
					</div>
					<hr>
						<span class="">Olvidó</span>
							<a href="<?php echo URL; ?>Olvide/olvidarClave" class="" target="_blank" name="btnOlvide">usuario / contraseña?</a>
				</form>
			</div>
		 </div>
		</div>

		<div id="dropDownSelect1"></div>


<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!-- ver clave -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo URL; ?>login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo URL; ?>login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo URL; ?>login/js/main.js"></script>
	<script src="<?php echo URL; ?>login/js/verOcultarClave.js"></script>
	<!-- mensaje error -->
	<script src="<?php echo URL; ?>js/alertaSesion.js"></script>

</body>
</html>
