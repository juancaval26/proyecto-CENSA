<?php

class mdlTipoDocumento
{
 public $IdTipoDocumento;
 public $documento;
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
 public function __SET($atributo, $valor)
 {
   $this->$atributo = $valor;
 }
 public function __GET($atributo)
 {
   return $this->$atributo;
 }

 //metodo listar tipodocumento
 public function TipoDocumento()
 {
   $sql = "SELECT IdTipoDocumento, DocumentoIdentidad FROM tiposdocumento";
   $stm = $this->db->prepare($sql); // evita injection sql
   $stm->execute();
   $documentos = $stm->fetchAll(PDO::FETCH_ASSOC); // array asociativo
   return $documentos;
 }

 public function TipoDocumento2()
 {
   $sql = "SELECT * FROM tiposdocumento";
   $stm = $this->db->prepare($sql); // evita injection sql
   $stm->execute();
   $documentos = $stm->fetchAll(PDO::FETCH_ASSOC); // array asociativo
   return $documentos;
 }
}
 ?>
