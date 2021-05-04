<?php

class Empleados extends Controller
{
  private $modeloEmpleado;
  private $modeloDocumento;
  private $modeloCargo;
  private $modeloRol;
  private $modeloUsuario;

  function __construct()
  {
    $this->modeloEmpleado = $this->loadModel("mdlEmpleados");
    $this->modeloDocumento = $this->loadModel("mdlTipoDocumento");
    $this->modeloCargo = $this->loadModel("mdlCargos");
    $this->modeloRol = $this->loadModel("mdlRoles");
    $this->modeloUsuario = $this->loadModel("mdlUsuario");

  }

  public function crearEmpleado()
  {

    if (isset($_POST['btnGuardar']))
    {
      $estado = 1;
      $this->modeloEmpleado->__SET("Estado", $estado);
      $this->modeloEmpleado->__SET("IdTipoDocumento", $_POST['tipDoc']);
      $this->modeloEmpleado->__SET("Documento", trim($_POST['txtnumeroDocumento']));
      $validar = $this->modeloEmpleado->validarDocumento();
      if ($validar == trim($_POST['txtnumeroDocumento'])) {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "El empleado ya se encuentra registrado",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Empleados/crearEmpleado");
        exit;
      }
      $this->modeloEmpleado->__SET("Nombre", $_POST['txtNombres']);
      $this->modeloEmpleado->__SET("Apellido", $_POST['txtApellido']);
      $this->modeloEmpleado->__SET("IdCargo", $_POST['tipCargo']);
      $this->modeloEmpleado->__SET("Telefono", $_POST['txtTelefono']);
      $this->modeloEmpleado->__SET("Celular", $_POST['txtCelular']);
      $this->modeloEmpleado->__SET("Correo", $_POST['txtEmail']);
      $empleado = $this->modeloEmpleado->crearEmpleado();
      $idEmp = $this->modeloEmpleado->ultimoIdEmp();
      $this->modeloUsuario->__SET("Usuario", $_POST['txtUsuario']);
      $this->modeloUsuario->__SET("Clave",  password_hash($_POST['txtClave'], PASSWORD_DEFAULT);
      $this->modeloUsuario->__SET("Estado", $estado);
      $this->modeloUsuario->__SET("IdRol", $_POST['tipRol']);
      $this->modeloUsuario->__SET("IdEmpleado", $idEmp);
      $this->modeloUsuario->__SET("Online", null);
      $respuestaE =$this->modeloUsuario->crearUsuariosEmpleado();
      if ($empleado && $respuestaE)
      {
        $_SESSION['alerta']='
          swal({
            title: "Listo",
            text: "¡Registro exitoso!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Empleados/crearEmpleado");
        exit;

      }else
      {
        $_SESSION['alerta']='swal({
          title: "Error!!",
          text: "Error al registrar el empleado por favor comuniquese con soporte al correo ",
          type:"error",
          confirmButtonText: "Aceptar",
          closeOnConfirm:false,
          closeOnCancel:false
        });';
        header("Location: ".URL."Empleados/crearEmpleado");
        exit;

      }
    }
    $documento = $this->modeloDocumento->TipoDocumento2();
    $cargos=$this->modeloCargo->listarCargos();
    $rol = $this->modeloRol->listarRol();
    //cabeza
    require APP . 'view/_templates/header.php';
    //cuerpo
    require APP.'view/empleados/crearEmpleado.php';
    //pie
    require APP . 'view/_templates/footer.php';
  }

   public function validarDocumento(){
     $this->modeloEmpleado->__SET("Documento", trim($_POST['doc']));
     $empleado = $this->modeloEmpleado->validarDocumento();
     if ($empleado == trim($_POST['doc'])) {
       echo json_encode("1");
     }else{
       echo json_encode("0");
     }
   }

    public function listarEmpleados()
    {
      if (isset($_POST['btnActualizar']))
      {
        $this->modeloEmpleado->__SET('Nombre', $_POST['txtNombreEmpleado']);
        $this->modeloEmpleado->__SET('Apellido', $_POST['txtApellidoEmpleado']);
        $this->modeloEmpleado->__SET('Correo', $_POST['txtCorreoEmpleado']);
        $this->modeloEmpleado->__SET('IdCargo', $_POST['tipCargo']);
        $this->modeloEmpleado->__SET('Telefono', $_POST['txtTelefono1']);
        $this->modeloEmpleado->__SET('Celular', $_POST['txtCelular1']);
        $this->modeloEmpleado->__SET('IdTipoDocumento', $_POST['tipDoc']);
        $this->modeloEmpleado->__SET('IdEmpleado', $_POST['txtIdEmpleado']);
        $this->modeloEmpleado->__SET("Usuario", $_POST['txtUsuario']);
        $this->modeloEmpleado->__SET("IdRol", $_POST['tipRol']);
        $update = $this->modeloEmpleado->editarEmpleado();
        if ($update == true)
        {
          $_SESSION['alerta']='
            swal({
              title: "Información",
              text: "¡Actualización exitosa!",
              type:"success",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
            header("location:".URL."Empleados/listarEmpleados");
            exit;
        }else
          { // FORMA LARGA
            $_SESSION['alerta']='swal({
              title: "Error!!",
              text: "Error al actualizar el empleado por favor comuniquese con soporte al correo ",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
            header("location:".URL."Empleados/listarEmpleados");
            exit;
          }
      }

        if (isset($_POST['btnClave']))
        {
          $this->modeloUsuario->__SET('Clave', md5(md5(sha1(trim($_POST['txtClave'])))));
          $this->modeloUsuario->__SET('IdUsuario', $_POST['txtIdUsuarioEm']);
          $update = $this->modeloUsuario->cambioClave();
          if ($update == true)
          {
            $_SESSION['alerta']='
              swal({
                title: "Cambio de contraseña",
                text: "¡Actualización exitosa!",
                type:"success",
                confirmButtonText: "Aceptar",
                closeOnConfirm:false,
                closeOnCancel:false
              });';
              header("location:".URL."Empleados/listarEmpleados");
              exit;
          }else
            { // FORMA LARGA
            $_SESSION['alerta'] ='swal({
              title:"No se cambio la contraseña, por favor comuniquese con soporte al correo",
              type:"error",
              confirmButtonText:"Aceptar"
            });';
              header("location:".URL."Empleados/listarEmpleados");
              exit;
            }
        }

      $rol = $this->modeloRol->listarRol();
      $documento = $this->modeloDocumento->TipoDocumento();
      $cargos=$this->modeloCargo->listarCargos();
      $empleados = $this->modeloEmpleado->listarEmpleados();
      require APP . 'view/_templates/header.php';
      require APP . 'view/empleados/listarEmpleados.php';
      require APP . 'view/_templates/footer.php';
    }

    public function empleadoId()
    {
    $this->modeloEmpleado->__SET('IdEmpleado',$_POST['id']); //manda valor
    $usuario = $this->modeloEmpleado->empleadoId();
    echo json_encode($usuario); //
    }
    public function cambiarEE()
    {
      $this->modeloEmpleado->__SET("IdEmpleado",$_POST['id']);
      $empleado = $this->modeloEmpleado->cambiarEstadoEmpleado();
      if ($empleado) {
        echo json_encode("1");
      }else{
        echo json_encode("0");
      }
    }

    public function usuarioId()
    {
    $this->modeloUsuario->__SET('IdUsuario',$_POST['id']); //manda valor
    $usuario = $this->modeloUsuario->usuarioId();
    echo json_encode($usuario); //
    }

}
 ?>
