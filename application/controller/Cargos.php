<?php

class Cargos extends Controller
{
  private $modeloCargo;

  function __construct()
  {
    $this->modeloCargo = $this->loadModel("mdlCargos");
  }

  public function crearCargo()
  {
    if (isset($_POST['btnCrear']))
    {
      $this->modeloCargo->__SET("cargo", $_POST['txtCargo']);

      $respuesta = $this->modeloCargo->crearCargo();
      var_dump($respuesta);
      if (!$respuesta)
      {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "Error al registrar el cargo por favor comuniquese con soporte al correo ",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Cargos/crearCargo");
        exit;

      }else
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
          header("Location: ".URL."Cargos/crearCargo");
          exit;
      }
    }

    if (isset($_POST['actualizarCargo']))
    {
      // var_dump($_POST);
      // exit;
      $this->modeloCargo->__SET("cargo", $_POST['txtCargo1']);
      $this->modeloCargo->__SET("IdCargo", $_POST['txtIdCargo1']);

      $update = $this->modeloCargo->editarCargo();
      if (!$update)

      {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "Error al actualizar el cargo por favor comuniquese con soporte al correo ",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Cargos/crearCargo");
        exit;

      }else
      {
        $_SESSION['alerta']='
          swal({
            title: "Listo",
            text: "Actualización exitosa!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
          header("Location: ".URL."Cargos/crearCargo");
          exit;
      }
    }

      $cargo = $this->modeloCargo->listarCargos();
      //cabeza
      require APP . 'view/_templates/header.php';
      //cuerpo
      require APP.'view/cargos/administrarCargos.php';
      //pie
      require APP . 'view/_templates/footer.php';
    }



      public function editarCargo()
      {
      $this->modeloCargo->__SET('IdCargo',$_POST['id']); //manda valor
      $usuario = $this->modeloCargo->cargoId();
      echo json_encode($usuario); //

      }

      public function eliminarCargo()
      {
      $this->modeloCargo->__SET('IdCargo',$_POST['id']); //manda valor
      $cargo = $this->modeloCargo->eliminarCargo();
      echo json_encode($cargo); //

      }


  }
 ?>
