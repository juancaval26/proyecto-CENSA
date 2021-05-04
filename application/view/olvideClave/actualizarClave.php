<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cambio Clave</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo URL; ?>login/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div id="formContent">

            <!-- Icon -->
            <div><img src="<?php echo URL; ?>img/CENSA.png" id="icon" alt="User Icon" /></div>

            <!-- Login Form -->
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input type="number" id="txtIdUsuario" name="txtIdUsuario"
                value="<?php




                 echo $traerId['IdUsuario']; echo $traerIdE['IdUsuarioEstudiante']; ?>" readonly>
                <input type="password" id="txtContrasena" name="txtContrasena" placeholder="Nueva Contraseña" required>
                <input type="password" id="txtRepetirContrasena" name="txtRepetirContrasena" placeholder="Repetir Contraseña" required>

                <div class="loginButton">
                    <input type="submit" id="btnGuardar" name="cambioClave" placeholder="Cambiar Contraseña" onclick="return comparePassword();">
                </div>
            </form>

        </div>
    </div>

    <script>
        var url = "<?php echo URL; ?>";

         function comparePassword(){
                var contrasena = document.getElementById('txtContrasena').value;
                var repetirContrasena = document.getElementById('txtRepetirContrasena').value;

                if(contrasena != repetirContrasena){
                    alert('Las contraseñas no coinciden.');
                    return false;
                }else{
                    return true;
                }

            }

    </script>

    <script src="<?php echo URL; ?>login_libs/jquery.min.js"></script>
    <script src="<?php echo URL; ?>login_libs/bootstrap.min.js"></script>

    <?php if(isset($mensaje)){ ?>

        <script>

            window.onload = function(){
                alert('<?php echo $mensaje; ?>');
            }

        </script>

    <?php } ?>

</body>

</html>
