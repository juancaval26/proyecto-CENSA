<?php

class mdlFunciones
{
public $idFuncion;
public $Descripcion;
public $idPrograma;
public $idBitacora;
public $respuesta;
public $db;

public function __construct($db){
  try {
    $this->db = $db;
  } catch (PDOException $e) {
    $this->db = "Falló la conexión comuníquese con
    soporte al correo doneprincipios@gmail.com \n Error: ".$e->getMessage();
  }
}
//metodos SET y GET
  public function __SET($atributo, $valor){
    $this->$atributo = $valor;
  }
  public function __GET($atributo){
    return $this->$atributo;
  }

  public function validarfuncion(){
  $sql = "SELECT Descripcion FROM funciones ";
  $stm = $this->db->prepare($sql);//protege de injeccion sql
  $stm->execute();//ejecutar la consulta en la base de datos Mysql
  return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
  }

  public function crearFuncion()
  {
    $sql = "INSERT INTO funciones(Descripcion, IdPrograma)VALUES(?,?)";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->Descripcion);
  $stm->bindParam(2, $this->idPrograma);
  $funcion=$stm->execute();
  return $funcion;
  }


  public function registarBitacoraFunciones(){
    $sql= "INSERT INTO bitacorasfunciones(IdBitacora, IdFuncion, Respuesta)values (?,?,?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->bindParam(2, $this->idFuncion);
    $stm->bindParam(3, $this->respuesta);
    $valor=$stm->execute();
    return $valor;
  }
//Bitacoras funciones
  public function listarFuncionesPorPrograma()
  {
  $sql="SELECT IdFuncion, Descripcion FROM funciones WHERE IdPrograma = ?;";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->idPrograma);
  $stm->execute();
  $funcion=$stm->fetchAll(PDO::FETCH_ASSOC);
  return $funcion;
  }

  public function eliminarFuncion(){
    $sql = "DELETE FROM funciones WHERE IdFuncion = ? AND IdPrograma =?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->idFuncion);
    $stm->bindParam(2, $this->idPrograma);
    $funcion = $stm->execute();
    return $funcion; //bool true or false
  }

  public function programasFuncion()
  {
    $sql="SELECT F.IdFuncion, P.IdPrograma, P.NombrePrograma, P.Codigo, COUNT(F.IdFuncion) AS cantidad FROM programas AS P INNER JOIN funciones AS F ON P.IdPrograma = F.IdPrograma GROUP BY P.IdPrograma";
    $stm= $this->db->prepare($sql);
    $stm->execute();
    $funcion=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $funcion;
  }

  public function editarFuncion()
  {
    $sql="UPDATE funciones SET Descripcion=? WHERE IdFuncion=? AND IdPrograma = ?";
    $stm=$this->db->prepare($sql);
    $stm->bindParam(1, $this->Descripcion);
    $stm->bindParam(2, $this->idFuncion);
    $stm->bindParam(3, $this->idPrograma);
    $update= $stm->execute();
    return $update;
  }

  public function FuncionId()
  {
  $sql="SELECT * FROM funciones AS F INNER JOIN programas AS P ON P.IdPrograma = F.IdPrograma
        WHERE F.IdPrograma = ?";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->idPrograma);
  $stm->execute();
  $funciones = $stm->fetchAll(PDO::FETCH_ASSOC);
  return $funciones;
  }



  }
 ?>
