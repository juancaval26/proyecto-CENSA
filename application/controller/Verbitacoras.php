<?php

class Verbitacoras extends Controller
{
private $modeloPrograma;
private $modeloBitacoras;
public function __construct()
{
  $this->modeloPrograma= $this->loadModel("mdlProgramas");
  $this->modeloBitacoras= $this->loadModel("mdlBitacoras");
}

public function listarBitacorasEstudiante(){

  $programas = $this->modeloPrograma->listarPrograma();
  //cabeza
  require APP . 'view/_templates/header.php';
  //cuerpo
  require APP .'view/verbitacoras/Bitacoras.php';
  //pie
  require APP . 'view/_templates/footer.php';
}

public function listaProgramasEstudiantes(){
  $this->modeloBitacoras->__SET('documento', $_POST['doc']); //manda valor
  $programas = $this->modeloBitacoras->buscarEstudianteBitacoras();
  $cont = 0;
  foreach ($programas as $value){
      if ($value['IdEstudiante'] == null) {
        $cont++;
      }
  }
  if($cont>0){
    echo "null";
  }else{
    echo json_encode($programas);
  }

}

public function ListarBitacorasEstudianteP(){

  $this->modeloBitacoras->__SET('documento', $_POST['doc']); //manda valor
  $this->modeloBitacoras->__SET('idPrograma', $_POST['prog']); //manda valor
  $bitacoras = $this->modeloBitacoras->BitacorasEstudiantePrograma();
  echo json_encode($bitacoras);

}

public function getEstudianteBitacora()
{
   $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
   $estudianteB = $this->modeloBitacoras->detallesBitacoraId();
   echo json_encode($estudianteB);
}

public function getFuncionesBitacora()
{
   $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
   $funcionesB = $this->modeloBitacoras->respuetasBitacoraFunciones();
   echo json_encode($funcionesB);
}

public function getSeguimientoBitacora()
{
   $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
   $evaluacionB = $this->modeloBitacoras->respuetasBitacoraEvaluacion();
   echo json_encode($evaluacionB);
}

public function getCriteriosBitacora()
{
   $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
   $criteriosB = $this->modeloBitacoras->respuetasBitacoraCriterios();
   echo json_encode($criteriosB);
}


}
?>
