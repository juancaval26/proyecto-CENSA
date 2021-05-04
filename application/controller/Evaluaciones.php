<?php

class Evaluaciones extends Controller
{
  private $modeloEvaluaciones;

  function __construct()
  {
    $this->modeloEvaluaciones = $this->loadModel("mdlEvaluaciones");
  }

  public function aspectoEvaluar()
  {

    if (isset($_POST['btnGuardar1']))
    {
      //$evaluar = $this->modeloEvaluaciones->deshabilitar();
      $this->modeloEvaluaciones->__SET("area", $_POST['txtArea']);
      $this->modeloEvaluaciones->__SET("aspectosEvaluar", $_POST['txtAspectos']);
      $this->modeloEvaluaciones->__SET("descripcion", $_POST['txtDescripcion']);
      $valorar = $this->modeloEvaluaciones->aspectosEvaluar();
      if (!$valorar)
      {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "¡Error al realizar el registro!",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."Evaluaciones/aspectoEvaluar");
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
          header("Location: ".URL."Evaluaciones/aspectoEvaluar");
          exit;
      }
     }


    if (isset($_POST['btnActualizarValor']))
    {

      $this->modeloEvaluaciones->__SET("area", $_POST['txtAreaE']);
      $this->modeloEvaluaciones->__SET("aspectosEvaluar", $_POST['txtAspectosE']);
      $this->modeloEvaluaciones->__SET("descripcion", $_POST['txtDescripcionE']);
      $this->modeloEvaluaciones->__SET("idEvaluacion", $_POST['txtIdEvaluacion']);
      $update = $this->modeloEvaluaciones->editarValoracion();
      // var_dump($update);
      // exit;
      if ($update == true)
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

        header("Location: ".URL."Evaluaciones/aspectoEvaluar");

          exit;
      }else
        { // FORMA LARGA
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "Error al actualizar el aspecto a evaluar, por favor comuniquese con soporte al correo",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });'; // FORMA CORTA
        header("Location: ".URL."Evaluaciones/aspectoEvaluar");
          exit;
        }
    }
    $valoracion=$this->modeloEvaluaciones->listarValoraciones();
    // $estudiantes=$this->modeloEstudiante->estudianteId();
      //cabeza
      require APP . 'view/_templates/header.php';
      //cuerpo
      require APP.'view/evaluaciones/evaluacion.php';
      //pie
      require APP . 'view/_templates/footer.php';
    }

    public function valoracionesId()
  {
    $this->modeloEvaluaciones->__SET('idEvaluacion',$_POST['id']); //manda valor
    $usuario = $this->modeloEvaluaciones->valoracionId();
    echo json_encode($usuario); //
  }

     public function eliminarEvaluacion()
  {
    $this->modeloEvaluaciones->__SET('idEvaluacion',$_POST['id']); //manda valor
    $evaluacion = $this->modeloEvaluaciones->eliminarEvaluacion();
    echo json_encode($evaluacion); //
  }


  }
 ?>
