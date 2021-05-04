<?php


class mdlEmpleados
{
  public $IdEmpleado;
  public $Nombre;
  public $Apellido;
  public $Correo;
  public $Celular;
  public $IdCargo;
  public $Telefono;
  public $IdTipoDocumento;
  public $Documento;
  public $Estado;
  public $Usuario;
  public $IdRol;
  public $db;

  public function __construct($db)
  {
    try
    {
      $this->db = $db;
    } catch (PDOException $e)
    {
      $this->db = "Falló la conexión comuníquese con
      soporte al Correo doneprincipios@gmail.com \n Error: ".$e->getMessage();
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

  public function validarEmpleado()
  {
  $sql = "SELECT E.Nombre, E.Apellido, E.Correo, C.IdCargo, C.Cargo, E.Estado FROM empleados AS E INNER JOIN Cargos AS C ON C.IdCargo = E.IdCargo";
  $stm = $this->db->prepare($sql);//protege de injeccion sql
  $stm->execute();//ejecutar la consulta en la base de datos Mysql
  return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
  }

  public function crearEmpleado()
  {
  $sql= "INSERT INTO empleados(Nombre, Apellido, Correo, Celular, IdCargo, Telefono, IdTipoDocumento, Documento, Estado)values (?,?,?,?,?,?,?,?,?)";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->Nombre);
  $stm->bindParam(2, $this->Apellido);
  $stm->bindParam(3, $this->Correo);
  $stm->bindParam(4, $this->Celular);
  $stm->bindParam(5, $this->IdCargo);
  $stm->bindParam(6, $this->Telefono);
  $stm->bindParam(7, $this->IdTipoDocumento);
  $stm->bindParam(8, $this->Documento);
  $stm->bindParam(9, $this->Estado);
  $empleado=$stm->execute();
  return $empleado;
  }

  public function ultimoIdEmp()
  {
    $sql="SELECT MAX(IdEmpleado) FROM empleados";
    $stm= $this->db->prepare($sql);
    $stm->execute();
    $id=$stm->fetch(PDO::FETCH_COLUMN);
    return $id;
  }

  public function listarEmpleados()
  {
  $sql="SELECT E.IdEmpleado, E.Nombre, E.Apellido, E.Correo, E.Celular, C.IdCargo, C.Cargo, E.Telefono,
        TD.IdTipoDocumento, TD.DocumentoIdentidad, E.Documento, E.Estado, U.IdUsuario FROM empleados AS E
        INNER JOIN Cargos AS C ON C.IdCargo = E.IdCargo
        INNER JOIN tiposDocumento AS TD ON TD.IdTipoDocumento = E.IdTipoDocumento
        INNER JOIN usuarios AS U ON U.IdEmpleado = E.IdEmpleado";
  $stm= $this->db->prepare($sql);
  $stm->execute();
  $usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
  return $usuario;
  }

  public function editarEmpleado()
  {
     $sql ="UPDATE empleados E INNER JOIN usuarios U ON E.IdEmpleado = U.IdEmpleado
            SET E.Nombre=?, E.Apellido=?, E.Correo=?, E.Telefono=?, E.Celular=?, E.IdCargo=?,
            E.IdTipoDocumento=?, U.Usuario=?, U.IdRol=?
            WHERE E.IdEmpleado = ?;";
     $stm= $this->db->prepare($sql);
     $stm->bindParam(1, $this->Nombre);
     $stm->bindParam(2, $this->Apellido);
     $stm->bindParam(3, $this->Correo);
     $stm->bindParam(4, $this->Telefono);
     $stm->bindParam(5, $this->Celular);
     $stm->bindParam(6, $this->IdCargo);
     $stm->bindParam(7, $this->IdTipoDocumento);
     $stm->bindParam(8, $this->Usuario);
     $stm->bindParam(9, $this->IdRol);
     $stm->bindParam(10, $this->IdEmpleado);
     $update = $stm->execute();
     return $update;//bool true or false
  }
 public function cambiarEstadoEmpleado(){
    $sql = "UPDATE empleados SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE IdEmpleado = ?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->IdEmpleado);
    $res = $stm->execute();
    return $res; //bool true or false
  }
 public function empleadoId(){
   $sql="SELECT E.IdEmpleado, E.Nombre, E.Apellido, E.Correo, E.Celular, C.IdCargo, C.Cargo, E.Telefono,
   TD.IdTipoDocumento, TD.DocumentoIdentidad, E.Documento, E.Estado, E.IdCargo, U.Usuario, U.IdRol
   FROM empleados AS E INNER JOIN Cargos AS C ON C.IdCargo = E.IdCargo
   INNER JOIN tiposDocumento AS TD ON TD.IdTipoDocumento= E.IdTipoDocumento
   INNER JOIN usuarios AS U ON U.IdEmpleado = E.IdEmpleado
   WHERE e.IdEmpleado=? ";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->IdEmpleado);
   $stm->execute();
   $usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
   return $usuario;
   }

   public function validarDocumento()
   {
     $sql="CALL SP_ValidarDocumento(?)";
     $stm= $this->db->prepare($sql);
     $stm->bindParam(1, $this->Documento);
     $stm->execute();
     $doc=$stm->fetch(PDO::FETCH_COLUMN);
     return $doc;
   }


  }

 ?>
