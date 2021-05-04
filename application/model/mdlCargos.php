<?php

class mdlCargos
{
  public $IdCargo;
  public $cargo;
  public $db;

  public function __construct($db)
    {
    try {
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

  public function validarCargo()
  {
  $sql = "SELECT Cargo FROM cargos";
  $stm = $this->db->prepare($sql);//protege de injeccion sql
  $stm->execute();//ejecutar la consulta en la base de datos Mysql
  return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
  }

  public function crearCargo()
  {
  $sql= "INSERT INTO cargos(Cargo) values (?)";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->cargo);
  $cargo=$stm->execute();
  return $cargo;
  }

  public function listarCargos()
  {
  $sql="SELECT * FROM cargos ";
  $stm= $this->db->prepare($sql);
  $stm->execute();
  $cargo=$stm->fetchAll(PDO::FETCH_ASSOC);
  return $cargo;

  }

  public function cargoId()
  {
    $sql ="SELECT IdCargo, Cargo FROM cargos WHERE IdCargo=?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->IdCargo);
    $stm->execute();
    $user = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $user;
  }
public function editarCargo(){
  $sql = "UPDATE cargos SET Cargo = ? WHERE IdCargo = ?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->cargo);
  $stm->bindParam(2, $this->IdCargo);
  $update = $stm->execute();
  return $update;//bool true or false
}

public function eliminarCargo(){
  $sql = "DELETE FROM cargos WHERE IdCargo = ?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->IdCargo);
  $eliminar = $stm->execute();
  return $eliminar;//bool true or false
}
}
 ?>
