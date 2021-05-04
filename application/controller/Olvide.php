<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APP.'PHPMailer/Exception.php';
require APP.'PHPMailer/PHPMailer.php';
require APP.'PHPMailer/SMTP.php';

class Olvide extends Controller{
    private $modeloUsuario;
    private $modeloUsuarioEstudiante;

    public function __construct(){
      $this->modeloUsuario= $this->loadModel("mdlUsuario");
      $this->modeloUsuarioEstudiante= $this->loadModel("mdlUsuarioEstudiantes");
    }

    public function createRandomCode(){
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
      srand((double)microtime()*1000000);
      $i = 0;
      $pass = '' ;
        while ($i <= strlen($chars)) {
          $num = rand() % 33;
          $tmp = substr($chars, $num, 1);
          $pass = $pass . $tmp;
          $i++;
        }

        return time().$pass;
    }
    public function olvidarClave(){
      if (isset($_POST['btnIngresar'])) {
        if (isset($_POST["correoRecuperacion"]) && $_POST["correoRecuperacion"] != '') {
            $correo = $_POST['correoRecuperacion'];
            $token = $this->createRandomCode();
            // usuario admin
            $fecha = date("Y-m-d H:i:s", strtotime('+24 hours'));
            $this->modeloUsuario->__SET("Usuario", $correo);
            $this->modeloUsuario->__SET("fechaRecuperacion", $fecha);
            $this->modeloUsuario->__SET("token",$token);
            $userAdmin = $this->modeloUsuario->traerUsuario();
            $respuesta = $this->modeloUsuario->recoverPassword();

            // usuario estudiante
            $this->modeloUsuarioEstudiante->__SET("Usuario", $correo);
            $this->modeloUsuarioEstudiante->__SET("fechaRecuperacion", $fecha);
            $this->modeloUsuarioEstudiante->__SET("token",$token);
            $student = $this->modeloUsuarioEstudiante->traerUsuario();
            $respuesta1 = $this->modeloUsuarioEstudiante->recoverPassword();

            if ($userAdmin == false && $student == false) {
                echo 'El correo electrónico no se encuentra registrado en el sistema.';
            } else {
                if ($respuesta || $respuesta1) {
                    $this->sendMail($correo, $token);
                } else {
                    echo 'No se puede recuperar la cuenta. Si los errores persisten comuniquese con el administrador del sitio.';
                }
            }
        }
      }
      require APP.'view/olvideClave/olvidarClave.php';
    }

    public function sendMail($correo, $token){
        $template = file_get_contents(APP.'view/_templates/template.php');
        $template = str_replace("{{action_url_2}}",'<b>http:'.URL."Olvide/actualizarClaves/?token=$token".'<br>', $template);
        $template = str_replace("{{year}}", date('Y'), $template);
        $template = str_replace("{{operating_system}}", Helper::sistemasOperativos(), $template);
        $template = str_replace("{{browser_name}}", Helper::navegadores(), $template);


        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username  = 'correo';
            $mail->Password  = "clave";
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('quien envia', 'nombre');
            $mail->addAddress($correo);

            $mail->isHTML(true);

            $mail->Subject = 'Recuperación de contraseña - CENSA';
            $mail->Body    = $template;

            if (!$mail->send()) {
                return false;
            } else {
              echo 'Se ha enviado un correo electrónico con las instrucciones para el cambio de tu contraseña. Por favor verifica la información enviada.';
            }
        } catch (Exception $e) {
            // return false;
            echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function actualizarClaves(){
      $token = $_GET['token'];
      $fecha = date("Y-m-d H:i:s");

      // admin
      $this->modeloUsuario->__SET('token',$token);
      $traerId = $this->modeloUsuario->token();

      // estudiante
      $this->modeloUsuarioEstudiante->__SET('token',$token);
      $traerIdE = $this->modeloUsuarioEstudiante->token();

      var_dump($traerId, $traerIdE);

      if (!$traerId && !$traerIdE) {
          $traerId = null;
          $traerIdE = null;
          $mensaje = "El código de recuperación no es valido, Por favor intenta de nuevo.";
      }
      if ($traerId) {
        if (strtotime($fecha) > strtotime($traerId['fechaRecuperacion'])) {
          $traerId = null;
          $mensaje = "El código de recuperación ha expirado, Por favor intenta de nuevo.";
        }
      }
      if ($traerIdE) {
        if (strtotime($fecha) > strtotime($traerIdE['fechaRecuperacion'])) {
          $traerIdE = null;
          $mensaje = "El código de recuperación ha expirado, Por favor intenta de nuevo.";
        }
      }

      if (isset($_POST['cambioClave'])) {
        $idUsuario = $_POST['txtIdUsuario'];
        $contrasena = password_hash($_POST['txtContrasena'], PASSWORD_DEFAULT);


        // admin
        $this->modeloUsuario->__SET('Clave',$contrasena);
        $this->modeloUsuario->__SET('fechaRecuperacion',$fecha);
        $this->modeloUsuario->__SET('IdUsuario',$idUsuario);
        $resultado = $this->modeloUsuario->updatePasswordRecover();


        // estudiante
        $this->modeloUsuarioEstudiante->__SET('Clave',$contrasena1);
        $this->modeloUsuarioEstudiante->__SET('fechaRecuperacion',$fecha);
        $this->modeloUsuarioEstudiante->__SET('IdUsuario',$idUsuario);
        $resultadoE = $this->modeloUsuarioEstudiante->updatePasswordRecover();

        if ($resultado == true && !empty($idUsuario)) {
            $traerId = null;
            $mensaje = 'Su contraseña ha sido cambiada con éxito.';
        }else if ($resultadoE == true && !empty($idUsuario)) {
            $traerIdE = null;
            $mensaje = 'Su contraseña ha sido cambiada con éxito.';
        }else {
          $mensaje = "ha ocurrido un error al intentar actualizar el usuario";
        }
      }
      $traerIdE = $this->modeloUsuarioEstudiante->token();
      require APP.'view/olvideClave/actualizarClave.php';
    }
  }
?>
