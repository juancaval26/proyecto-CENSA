<?php
class mdlCriteriosEvaluar
 {

// tabla bitacoras
public $idCriteriosEvaluar;
public $criteriosEvaluar;
public $idBitacora;
public $calificacion;
public $respuesta = array('numero1' => 1, 'numero2' => 2, 'numero3' => 3, 'numero4' => 4, 'numero5' => 5);
public $db;


//contructor
  public function __construct($db)
  {
  try
  {
    $this->db = $db;
  } catch (PDOException $e)
  {
    $this->db = "Falló la conexión comuníquese con
    soporte al correo doneprincipios@gmail.com \n Error: ".$e->getMessage();
  }
}
  //metodos SET y GET
  public function __SET($atributo, $valor)
  {
    $this->$atributo = $valor;
  }
  public function __GET($atributo)
  {
    return $this->$atributo;
  }

  public function criterioEvaluar()
  {
    $sql= "INSERT INTO criteriosevaluar(CriterioEvaluar)VALUES (?)";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->criteriosEvaluar);
    $estudiante=$stm->execute();
    return $estudiante;
  }

  public function registarBitacoraCriterioEvaluar(){
    $sql= "INSERT INTO criteriosevaluarbitacoras(IdBitacora, IdCriterioEvaluar, Respuesta)values (?,?,?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->bindParam(2, $this->idCriteriosEvaluar);
    $stm->bindParam(3, $this->calificacion);
    $valor=$stm->execute();
    return $valor;
  }

  public function listaCriterios()
  {
    $sql="SELECT IdCriteriosEvaluar,CriterioEvaluar FROM criteriosevaluar";
    $stm= $this->db->prepare($sql);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }

  public function eliminarCriterio()
  {
    $sql="DELETE FROM criteriosevaluar WHERE IdCriteriosEvaluar=?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idCriteriosEvaluar);
    $eliminar=$stm->execute();
    return $eliminar;
  }

  public function criterioId()
  {
    $sql="SELECT IdCriteriosEvaluar, CriterioEvaluar FROM criteriosevaluar WHERE IdCriteriosEvaluar=?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idCriteriosEvaluar);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }

  public function criteriosEditar()
  {
   $sql = "UPDATE criteriosevaluar SET CriterioEvaluar=? WHERE IdCriteriosEvaluar=?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->criteriosEvaluar);
   $stm->bindParam(2, $this->idCriteriosEvaluar);
   $update = $stm->execute();
     return $update;
  }




}
?>
