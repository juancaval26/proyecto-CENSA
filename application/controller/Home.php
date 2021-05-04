<?php

  class Home extends Controller
  {
  public $modeloUsuario;
  public $modeloEstudiante;
  public $modeloRoles;
  public $modeloBitacoras;
  // public $modeloEmpleados;

    function __construct(){
      $this->modeloUsuario = $this->loadModel("mdlUsuario");
      $this->modeloEstudiante = $this->loadModel("mdlUsuarioEstudiantes");
      $this->modeloRoles = $this->loadModel("mdlRoles");
      $this->modeloBitacoras = $this->loadModel("mdlBitacoras");
      // $this->modeloEmpleado = $this->loadModel("mdlEmpleados");
    }
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login()
    {
      // validar que la sesion esta iniciada no deje salir del sistema
        if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true){
           header('Location:'.URL.'Home/index');
           exit();
         }
        if (isset($_SESSION['sesion_estudiante']) && $_SESSION['sesion_estudiante']==true){
           header('Location:'.URL.'Bitacoras/inicioBitacora');
           exit();
         }
        if (isset($_POST['btnIngresar'])) {
          $usuario= $_POST["txtUsuario"];
          $this->modeloUsuario->__SET('Usuario', $usuario);
          $this->modeloUsuario->__SET('IdRol', $_POST["selrol"]);

          $this->modeloEstudiante->__SET('Usuario', $_POST["txtUsuario"]);
          if ($_POST["selrol"]=="2") {
              $estudiante = $this->modeloEstudiante->validarEstudiante();

              if (password_verify($_POST['txtClaves'], $estudiante['Clave'])) {
                $_SESSION['sesion_estudiante'] = true;
                $_SESSION['usuarioEstudiante'] = $estudiante['IdUsuarioEstudiante'];
                $_SESSION['estudiante'] = $estudiante['IdEstudiante'];
                $_SESSION['nombre'] = $estudiante['Nombre'];
                $_SESSION['apellidos'] = $estudiante['Apellido'];
                $_SESSION['Programa'] = $estudiante['IdPrograma'];
                $this->modeloBitacoras->__SET('idEstudiante', $estudiante['IdEstudiante']);
                $this->modeloBitacoras->__SET('idPrograma',$estudiante['IdPrograma']);
                $_SESSION['numBitacoras'] =$this->modeloBitacoras->validarBitacora();
                header('location:'.URL.'Bitacoras/inicioBitacora');
                 exit();
             } else {
               $error = "<div id='alerta' class='alert alert-danger alert-dismissible'>
                   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                   <h6><i class='icon fa fa-ban'></i> error!</h6>
                   usuario y/o contraseña incorrecta.
                 </div>";
             }
          }

          if ($_POST["selrol"]=="1") {
            $usuario = $this->modeloUsuario->validarUsuario();
            if (password_verify($_POST['txtClaves'], $usuario['Clave'])) {
             $_SESSION['sesion_iniciada'] = true;
             $_SESSION['usuario'] = $usuario['IdUsuario'];
             $_SESSION['empleado'] = $usuario['IdEmpleado'];
             $_SESSION['nombre'] = $usuario['Nombre'];
             $_SESSION['Rol'] = $usuario['IdRol'];
             $_SESSION['rol'] = $usuario['Rol'];
             header('location:'.URL.'Home/index');
               exit();
            }else
            {
              $error = "<div id='alerta' class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h6><i class='icon fa fa-ban'></i> error!</h6>
                  usuario y/o contraseña incorrecta.
                </div>";
            }
          }
        }

        $lista =$this->modeloRoles->listarRol();

        require APP . 'view/home/login.php';

    }

     public function cerrarSesion()
     {
      if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada'])
      {
              $_SESSION['sesion_iniciada'] = false;
              session_destroy();
              header("location: ".URL."Home/login");
              exit();
        }
        else if (isset($_SESSION['sesion_estudiante']) && $_SESSION['sesion_estudiante'])
        {
          $_SESSION['sesion_estudiante'] = false;
          session_destroy();
          header("location: ".URL."Home/login");
          exit();

        }else
        {
        $error = "<div id='alerta' class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h6><i class='icon fa fa-ban'></i> error!</h6>
                  usuario y/o contraseña incorrecta.
                </div>";
        }
    }
}
