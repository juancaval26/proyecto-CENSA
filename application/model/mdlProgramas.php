<?php

class mdlProgramas
{
 public $IdPrograma;
 public $NombrePrograma;
 public $CodigoPrograma;
 public $IdEstudiante;
 public $Estado;
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

 public function crearPrograma(){
   $sql = "INSERT INTO programas(NombrePrograma, Codigo, Estado) VALUES (?, ?, ?);";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->NombrePrograma);
   $stm->bindParam(2, $this->CodigoPrograma);
   $stm->bindParam(3, $this->estado);
   $res = $stm->execute();
   return $res;//bool true or false
 }
 
 public function editarPrograma(){
   $sql = "UPDATE programas SET NombrePrograma = ?, Codigo = ? WHERE IdPrograma = ?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->NombrePrograma);
   $stm->bindParam(2, $this->CodigoPrograma);
   $stm->bindParam(3, $this->IdPrograma);
   $res = $stm->execute();
   return $res;//bool true or false
 }

 public function listarPrograma()
 {
   $sql = "SELECT * FROM programas";
   $stm = $this->db->prepare($sql);
   $stm->execute();
   return $stm->fetchAll(PDO::FETCH_ASSOC);
 }

 public function Programa()
 {
   $sql = "SELECT NombrePrograma FROM programas";
   $stm = $this->db->prepare($sql);
   $stm->execute();
   return $stm->fetch(PDO::FETCH_COLUMN);
 }


 public function cambiarEstadoPrograma()
 {
   $sql = "UPDATE programas SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE IdPrograma = ?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->IdPrograma);
   $res = $stm->execute();
   return $res; //bool true or false
 }

 public function eliminarPrograma()
 {
   $sql = "DELETE FROM programas WHERE IdPrograma = ?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->IdPrograma);
   $eliminar = $stm->execute();
   return $eliminar; //bool true or false
 }

 //traer el usuario seleccionado
public function programaId()
{
  $sql ="SELECT Codigo, NombrePrograma FROM programas WHERE IdPrograma=?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->IdPrograma);
  $stm->execute();
  $user = $stm->fetchAll(PDO::FETCH_ASSOC);
  return $user;

}
public function registroEstudiantePrograma()
{
  $sql = "INSERT INTO estudiantesprogramas(IdPrograma,IdEstudiante,Estado) VALUES (?,?,?);";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->IdPrograma);
  $stm->bindParam(2, $this->IdEstudiante);
  $stm->bindParam(3, $this->Estado);
  $res = $stm->execute();
  return $res; //bool true or false
}

}
 ?>
