<?php
class mdlEvaluaciones
{
  public $idEvaluacion;
  public $area;
  public $aspectosEvaluar;
  public $descripcion;
  public $idBitacora;
  public $respuesta;
  public $db;

  public function __construct($db)
  {
    try
    {
      $this->db=$db;
    } catch (\Exception $e)
    {
      $this->db = "Falló la conexión comuníquese con
      soporte al correo doneprincipios@gmail.com \n Error: ".$e->getMessage();
    }
  }
  public function __SET($atributo, $valor)
  {
   $this->$atributo=$valor;
  }

  public function __GET($atributo)
  {
   return $this->$atributo;
  }

  public function listarValoraciones()
  {
  $sql="SELECT * FROM evaluaciones";
  $stm= $this->db->prepare($sql);
  $stm->execute();
  $usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
  return $usuario;
  }

  public function aspectosEvaluar()
  {
  $sql= "INSERT INTO evaluaciones(Area, AspectosEvaluar, Descripcion)values (?,?,?)";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->area);
  $stm->bindParam(2, $this->aspectosEvaluar);
  $stm->bindParam(3, $this->descripcion);
  $valor=$stm->execute();
  return $valor;
  }

  public function registarBitacoraEvaluaciones(){
    $sql= "INSERT INTO bitacorasevaluaciones(IdBitacora, IdEvaluacion, Respuesta)values (?,?,?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->bindParam(2, $this->idEvaluacion);
    $stm->bindParam(3, $this->respuesta);
    $valor=$stm->execute();
    return $valor;
  }

  public function editarValoracion()
  {
   $sql = "UPDATE evaluaciones SET Area=?, AspectosEvaluar=?, Descripcion = ? WHERE IdEvaluacion=?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->area);
   $stm->bindParam(2, $this->aspectosEvaluar);
   $stm->bindParam(3, $this->descripcion);
   $stm->bindParam(4, $this->idEvaluacion);
   $update = $stm->execute();
     return $update;
  }

  public function valoracionId()
  {
    $sql="SELECT * FROM evaluaciones WHERE IdEvaluacion=?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idEvaluacion);
    $stm->execute();
    $usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $usuario;
  }

  public function deshabilitar()
  {
    $sql="SELECT COUNT(*) FROM evaluaciones";
    $stm= $this->db->prepare($sql);
    $stm->execute();
    $off=$stm->fetch(PDO::FETCH_COLUMN);
    return $off;
  }

  public function eliminarEvaluacion()
  {
    $sql="DELETE FROM evaluaciones WHERE IdEvaluacion=?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idEvaluacion);
    $eliminar=$stm->execute();
    return $eliminar;
  }
}



 ?>
