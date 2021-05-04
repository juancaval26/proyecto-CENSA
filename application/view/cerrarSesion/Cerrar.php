<!-- Codigo para que no se devuelva -->

<?php
function destroySession() {

    $_SESSION = [];

    if (ini_get('session.use_cookies')) {

        $params = session_get_cookie_params();
        setcookie(session_name(),
                  '',
                  time() - 42000,
                  $params['path'],
                  $params['domain'],
                  $params['secure'],
                  $params['httponly']);
    }
    @session_destroy();
}
require_once('todas_tus_funciones.php');

session_start();
destroySession();
header('Location: index.php');
exit;



 ?>
