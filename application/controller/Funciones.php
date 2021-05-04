<?php

class Funciones extends Controller
{
  private $modeloFuncion;
  private $modeloPrograma;

  function __construct()
  {
    $this->modeloFuncion = $this->loadModel("mdlFunciones");
    $this->modeloPrograma = $this->loadModel("mdlProgramas");
  }

  public function crearFuncion()
  {
      $programas = $this->modeloPrograma->listarPrograma();
      $funciones = $this->modeloFuncion->programasFuncion();
      //cabeza
      require APP . 'view/_templates/header.php';
      //cuerpo
      require APP.'view/funciones/funcion.php';
      //pie
      require APP . 'view/_templates/footer.php';
    }

    public function eliminarFuncion(){
      $this->modeloFuncion->__SET("idFuncion", $_POST['id']);
      $this->modeloFuncion->__SET("idPrograma", $_POST['idP']);
      $delete = $this->modeloFuncion->eliminarFuncion();
      if ($delete) {
        echo json_encode("1");
      }else{
        echo json_encode("0");
      }
    }

    public function registroFuncion()
    {
      $funciones = $_POST['funciones']; //se trae del script agregarFuncion.js
      $tamanio = count($funciones);
      $cont=0;
      foreach ($funciones as $key => $value)
      {
        $this->modeloFuncion->__SET('Descripcion', $value['funcion']); //manda valor al ajax
        $this->modeloFuncion->__SET('idPrograma', $value['idprograma']); //manda valor al ajax
        $funcion = $this->modeloFuncion->crearFuncion();
        if ($funcion) {
          $cont++;
        }
      }
      if ($cont == $tamanio)
      {
        echo json_encode("1"); //
      }else{
        echo json_encode("0"); //
      }

    }

    public function editarFuncion()
    {
      $funciones = $_POST['datos']; //se trae del script agregarFuncion.js
      $tamanio = count($funciones);
      $cont=0;
      foreach ($funciones as $key => $value)
      {
        $this->modeloFuncion->__SET('idFuncion', $value['id']); //manda valor al ajax
        $this->modeloFuncion->__SET('Descripcion', $value['funcion']); //manda valor al ajax
        $this->modeloFuncion->__SET('idPrograma', $value['idprograma']); //manda valor al ajax
        $funcion = $this->modeloFuncion->editarFuncion();
        if ($funcion) {
          $cont++;
        }
      }
      if ($cont == $tamanio)
      {
        echo json_encode("1");
      }else{
        echo json_encode("0");
      }

    }
    public function FuncionesPrograma()
      {
      $this->modeloFuncion->__SET('idPrograma', $_POST['id']); //manda valor
      $funciones = $this->modeloFuncion->FuncionId();
      echo json_encode($funciones); //
      }

      }

 ?>
