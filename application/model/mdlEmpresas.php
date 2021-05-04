<?php
class mdlEmpresas
 {

// tabla bitacoras
public $IdEmpresa;
public $Empresa;
public $IdEstudiante;
public $Nit;
public $NombreContacto;
public $CargoContacto;
public $Telefono;
public $CorreoEmpresa;
public $DireccionEmpresa;
public $CargoPracticante;
public $FechaInicio;
public $FechaFinalizacion;
public $Activo;
public $Modalidad = array("modalidad1" => "Contrato de Aprendizaje", "modalidad2" => "Pasantia");
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

  public function empresaPracticas()
  {
    $sql= "INSERT INTO empresas(Empresa, IdEstudiante, Nit, NombreContacto, CargoContacto, TelefonoEmpresa, CorreoEmpresa, DireccionEmpresa, CargoPracticante,
                       FechaInicio, FechaFinalizacion, Modalidad, Activo)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Empresa);
    $stm->bindParam(2, $this->IdEstudiante);
    $stm->bindParam(3, $this->Nit);
    $stm->bindParam(4, $this->NombreContacto);
    $stm->bindParam(5, $this->CargoContacto);
    $stm->bindParam(6, $this->Telefono);
    $stm->bindParam(7, $this->CorreoEmpresa);
    $stm->bindParam(8, $this->DireccionEmpresa);
    $stm->bindParam(9, $this->CargoPracticante);
    $stm->bindParam(10, $this->FechaInicio);
    $stm->bindParam(11, $this->FechaFinalizacion);
    $stm->bindParam(12, $this->Modalidad);
    $stm->bindParam(13, $this->Activo);
    $estudiante=$stm->execute();
    return $estudiante;
  }

  public function actualizarDatos()
  {
    $sql = "UPDATE empresas SET Empresa =?, NombreContacto =?, TelefonoEmpresa =?, CorreoEmpresa =?,
                   CargoPracticante =? WHERE IdEmpresa = ? AND IdEstudiante=?";
     $stm= $this->db->prepare($sql);
     $stm->bindParam(1, $this->Empresa);
     $stm->bindParam(2, $this->NombreContacto);
     $stm->bindParam(3, $this->Telefono);
     $stm->bindParam(4, $this->CorreoEmpresa);
     $stm->bindParam(5, $this->CargoPracticante);
     $stm->bindParam(6, $this->IdEmpresa);
     $stm->bindParam(7, $this->IdEstudiante);
     $update = $stm->execute();
     return $update;//bool true or false
  }

  public function actualizarDatosBitacora()
  {
    $sql = "UPDATE empresas SET NombreContacto =?, TelefonoEmpresa =?, CorreoEmpresa =?,DireccionEmpresa=?,
                   CargoPracticante =? WHERE IdEmpresa = ?";
     $stm= $this->db->prepare($sql);
     $stm->bindParam(1, $this->NombreContacto);
     $stm->bindParam(2, $this->Telefono);
     $stm->bindParam(3, $this->CorreoEmpresa);
     $stm->bindParam(4, $this->DireccionEmpresa);
     $stm->bindParam(5, $this->CargoPracticante);
     $stm->bindParam(6, $this->IdEmpresa);
     $update = $stm->execute();
     return $update;//bool true or false
  }

  public function nombreEstudiante()
  {
  $sql="SELECT E.IdEmpresa, ES.IdEstudiante FROM empresas AS E
        INNER JOIN Estudiantes AS ES ON ES.IdEstudiante = E.IdEstudiante WHERE ES.Nombre=?";
  $stm= $this->db->prepare($sql);
  $stm->bindParam(1, $this->IdEstudiante);
  $stm->execute();
  $Usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
  return $Usuario;
  }
  // public function empresaId(){
  //   $sql="SELECT E.IdEmpleado, E.nombre, E.apellido, E.correo, E.celular, C.IdCargo, C.cargo, E.telefonoEmpresa,
  //   TD.IdTipoDocumento, TD.documentoIdentidad, E.documento, E.estado
  //   FROM empleados AS E INNER JOIN cargos AS C ON C.IdCargo = E.IdCargo
  //   INNER JOIN tiposdocumento AS TD ON TD.IdTipoDocumento= E.IdTipoDocumento WHERE e.IdEmpleado=? ";
  //   $stm = $this->db->prepare($sql);
  //   $stm->bindParam(1, $this->IdEmpleado);
  //   $stm->execute();
  //   $usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
  //   return $usuario;
  //   }

}
?>
