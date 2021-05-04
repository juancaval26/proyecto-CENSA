<?php

class CriteriosEvaluar extends Controller
{
  private $modeloCriteriosEvaluar;

  function __construct()
  {
    $this->modeloCriteriosEvaluar = $this->loadModel("mdlCriteriosEvaluar");
  }

  public function criterios()
  {
    if (isset($_POST['btnGuarde']))
    {

      $this->modeloCriteriosEvaluar->__SET("criteriosEvaluar", $_POST['txtCriterios']);
      $valorar = $this->modeloCriteriosEvaluar->criterioEvaluar();
      // var_dump($valorar);
      // exit;
      if (!$valorar)
      {
        $_SESSION['alerta']='
          swal({
            title: "Error",
            text: "¡Error al realizar el regsitro!",
            type:"error",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
          header("Location: ".URL."CriteriosEvaluar/criterios");
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
          header("Location: ".URL."CriteriosEvaluar/criterios");
          exit;
      }
     }

    if (isset($_POST['btnActualize']))
    {
      $this->modeloCriteriosEvaluar->__SET("criteriosEvaluar", $_POST['txtCriterioEvaluar']);
      $this->modeloCriteriosEvaluar->__SET("idCriteriosEvaluar", $_POST['txtIdCriteriosEvaluar']);
      $update = $this->modeloCriteriosEvaluar->criteriosEditar();

      if ($update == true)
      {
        $_SESSION['alerta']='
          swal({
            title: "Actualización",
            text: "¡Los cambios se realizarón correctamente!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("Location: ".URL."CriteriosEvaluar/criterios");

          exit;
      }else
        { // FORMA LARGA
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "¡Error al realizar la actualización!",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
          header("Location: ".URL."CriteriosEvaluar/criterios");
          exit;
        }
    }
    // $criterios=$this->modeloCriteriosEvaluar->__GET('respuesta');
    $listaCriterios=$this->modeloCriteriosEvaluar->listaCriterios();
    //$criterios1=$this->modeloCriteriosEvaluar->listaCriterios1();

    // $estudiantes=$this->modeloEstudiante->estudianteId();
      //cabeza
      require APP . 'view/_templates/header.php';
      //cuerpo
      require APP.'view/criterioEvaluar/criteriosEvaluar.php';
      //pie
      require APP . 'view/_templates/footer.php';
    }

    public function criterioId()
  {
    $this->modeloCriteriosEvaluar->__SET('idCriteriosEvaluar',$_POST['id']); //manda valor
    $usuario = $this->modeloCriteriosEvaluar->criterioId();
    echo json_encode($usuario); //
  }

      public function eliminarCriterio()
  {
    $this->modeloCriteriosEvaluar->__SET('idCriteriosEvaluar',$_POST['id']); //manda valor
    $criterio = $this->modeloCriteriosEvaluar->eliminarCriterio();
    echo json_encode($criterio); //
  }


  }
 ?>
