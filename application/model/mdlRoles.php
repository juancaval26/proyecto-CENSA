<?php

class mdlRoles
{
 public $IdRol;
 public $Rol;
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
 //metodo listar roles
 public function listarRol(){
   $sql = "SELECT * FROM roles";
   $stm = $this->db->prepare($sql); // evita injection sql
   $stm->execute();
   $roles = $stm->fetchAll(PDO::FETCH_ASSOC); // array asociativo
   return $roles;
 }
}
 ?>
