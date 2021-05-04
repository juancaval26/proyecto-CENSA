<?php


class Programa extends Controller
{
  public $modeloPrograma;
  function __construct()
  {
    $this->modeloPrograma = $this->loadModel("mdlProgramas");
  }

  public function adminPrograma(){
    if (isset($_POST['btnCrear'])){
      $estado = 1;
      $this->modeloPrograma->__SET("CodigoPrograma", $_POST['txtCodigo']);
      $this->modeloPrograma->__SET("NombrePrograma", $_POST['txtPrograma']);
      $this->modeloPrograma->__SET("estado", $estado);
      $res = $this->modeloPrograma->crearPrograma();
      if (!$res) {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "¡Error al realizar el registro!",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Programa/adminPrograma");
        exit;
      }else {
        $_SESSION['alerta']='
          swal({
            title: "Listo",
            text: "¡Registro exitoso!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
          header("Location: ".URL."Programa/adminPrograma");
          exit;
      }
    }

    if (isset($_POST['btnActualizar']))
    {

      $this->modeloPrograma->__SET("CodigoPrograma", $_POST['txtCodigo1']);
      $this->modeloPrograma->__SET("NombrePrograma", $_POST['txtPrograma1']);
      $this->modeloPrograma->__SET("IdPrograma", $_POST["txtIdPrograma"]);
      $res = $this->modeloPrograma->editarPrograma();

      if (!$res) {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "Error al actualizar ¡Por favor comunicarse con el soporte del Censa a este correo!:",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });'; // FORMA CORTA
        header("Location: ".URL."Programa/adminPrograma");
        exit;
      }else {
        $_SESSION['alerta']='
          swal({
            title: "Listo",
            text: "Actualización exitosa!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
          header("Location: ".URL."Programa/adminPrograma");
          exit;
      }
    }

    $tablaProgramas = $this->modeloPrograma->listarPrograma();
    require APP . 'view/_templates/header.php';
    require APP . 'view/programa/administrarPrograma.php';
    require APP . 'view/_templates/footer.php';

  }

  public function editarPrograma()
  {
  $this->modeloUsuario->__SET('IdPrograma',$_POST['id']); //manda valor
  $usuario = $this->modeloPrograma->programaId();
  echo json_encode($usuario); //
  }

  public function eliminarPrograma()
  {
    $this->modeloPrograma->__SET("IdPrograma", $_POST['id']);
    $programa = $this->modeloPrograma->eliminarPrograma();
    if ($programa) {
      echo json_encode("1");
    }else{
      echo json_encode("0");
    }
  }

  public function cambiarEP()
  {
    $this->modeloPrograma->__SET("IdPrograma", $_POST['id']);
    $res = $this->modeloPrograma->cambiarEstadoPrograma();
    if ($res) {
      echo json_encode("1");
    }else{
      echo json_encode("0");
    }
  }

}


 ?>
