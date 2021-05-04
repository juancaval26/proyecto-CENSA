  <?php

  class mdlEstudiantes
  {
  public $IdEstudiante;
  public $Nombre;
  public $Apellido;
  public $Documento;
  public $IdTipoDocumento;
  public $Telefono;
  public $Celular;
  public $CorreoEstudiante;
  public $NumeroFolio;
  public $Estado;
  public $idProgramas;
  public $Usuario;
  public $Clave;
  public $idEstudiantesProgramas;
  public $idUsuarioEstudiante;
  public $Empresa;
  public $Nit;
  public $DireccionE;
  public $TelefonoE;
  public $CorreoE;
  public $NombreContacto;
  public $CargoContacto;
  public $CargoPracticante;
  public $FechaInicio;
  public $FechaFinalizacion;
  public $Mod;
  public $modalidad = array("modalidad1" => "Contrato de Aprendizaje", "modalidad2" => "Pasantia");
  public $db;



//contructor
public function __construct($db)
{
  try
  {
    $this->db = $db;
  }
  catch (PDOException $e)
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

  public function validarEstudiante()
  {
  $sql = "SELECT E.IdEstudiante, E.Nombre, E.Apellido, E.Documento, E.CorreoEstudiante, E.IdTipoDocumento, P.IdPrograma, P.NombrePrograma, UE.Usuario, UE.Clave
          FROM estudiantes AS E INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
          INNER JOIN usuarioestudiantes UE ON UE.IdEstudiante = E.IdEstudiante
          INNER JOIN programas P ON P.IdPrograma = EP.IdPrograma
          WHERE UE.Estado = 1 AND UE.Usuario = ? AND UE.Clave = ? AND EP.Estado = 1";
  $stm = $this->db->prepare($sql);//protege de injeccion sql
  $stm->bindParam(1, $this->Usuario);
  $stm->bindParam(2, $this->Clave);
  $stm->execute();//ejecutar la consulta en la base de datos Mysql
  return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
  }

// crear usuarios
  public function CrearEstudiante()
  {
    $sql= "INSERT INTO estudiantes(Nombre, Apellido, Documento, CorreoEstudiante, IdTipoDocumento, Telefono, Celular, NumeroFolio)VALUES (?,?,?,?,?,?,?,?)";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Nombre);
    $stm->bindParam(2, $this->Apellido);
    $stm->bindParam(3, $this->Documento);
    $stm->bindParam(4, $this->CorreoEstudiante);
    $stm->bindParam(5, $this->IdTipoDocumento);
    $stm->bindParam(6, $this->Telefono);
    $stm->bindParam(7, $this->Celular);
    $stm->bindParam(8, $this->NumeroFolio);
    $estudiante=$stm->execute();
    return $estudiante;
  }

  public function ultimoId(){
    $sql="SELECT MAX(IdEstudiante) FROM estudiantes WHERE  Documento=?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->Documento);
    $stm->execute();
    $id=$stm->fetch(PDO::FETCH_COLUMN);
    return $id;
  }
// listar usuarios
  public function listarEstudiantes()
  {
    $sql="SELECT E.IdEstudiante, E.Nombre, E.Apellido, E.Documento,
    TD.IdTipoDocumento, E.Telefono, E.Celular, E.CorreoEstudiante, TD.DocumentoIdentidad, UE.Usuario, UE.Estado, UE.IdUsuarioEstudiante
    FROM estudiantes AS E
    INNER JOIN tiposdocumento AS TD ON E.IdTipoDocumento = TD.IdTipoDocumento
    INNER JOIN usuarioestudiantes AS UE ON E.IdEstudiante = UE.IdEstudiante";
    $stm= $this->db->prepare($sql);
    $stm->execute();
    $Usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $Usuario;
  }

  // actualizar estudiante bitacoras
    public function editarEstudianteBitacora()
    {
     $sql = "UPDATE estudiantes SET Celular=?, CorreoEstudiante=?
      WHERE IdEstudiante=?";
     $stm = $this->db->prepare($sql);
     $stm->bindParam(1, $this->Celular);
     $stm->bindParam(2, $this->CorreoEstudiante);
     $stm->bindParam(3, $this->IdEstudiante);
     $update = $stm->execute();
      return $update;
    }

//traer el usuario seleccionado
  public function estudianteId()
  {
    $sql="SELECT E.IdEstudiante, E.Nombre, E.Apellido, E.Documento,TD.IdTipoDocumento, TD.DocumentoIdentidad,
    E.Telefono, E.Celular, E.CorreoEstudiante,UE.IdUsuarioEstudiante, UE.Usuario, UE.Estado, EM.Empresa, EM.Nit,
    EM.NombreContacto, EM.CargoContacto, EM.TelefonoEmpresa, EP.IdPrograma, E.NumeroFolio,
    EM.CorreoEmpresa, EM.DireccionEmpresa, EM.CargoPracticante, EM.FechaInicio, EM.FechaFinalizacion, EM.Modalidad
    FROM estudiantes AS E
    INNER JOIN tiposdocumento AS TD ON E.IdTipoDocumento = TD.IdTipoDocumento
    INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
    INNER JOIN usuarioestudiantes AS UE ON E.IdEstudiante = UE.IdEstudiante
    INNER JOIN empresas AS EM ON EM.IdEstudiante = E.IdEstudiante
    WHERE E.IdEstudiante=? AND UE.Estado = 1 LIMIT 1";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->IdEstudiante);
    $stm->execute();
    $Usuario=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $Usuario;
  }

//traer de bitacoras
  public function traerDatos()
  {
    $sql="SELECT E.IdEstudiante, E.Nombre, E.Apellido, E.Documento, E.CorreoEstudiante, E.Telefono, E.Celular, E.NumeroFolio,TD.DocumentoIdentidad, EM.Empresa , EM.Nit,
                EM.NombreContacto, EM.CargoContacto, EM.TelefonoEmpresa, EM.CorreoEmpresa, EM.DireccionEmpresa, EM.CargoPracticante, EM.FechaInicio, EM.FechaFinalizacion, EM.Modalidad,
                PRO.NombrePrograma, EP.IdPrograma, EM.IdEmpresa
         FROM estudiantesProgramas AS EP
         INNER JOIN programas AS PRO ON PRO.IdPrograma = EP.IdPrograma
         INNER JOIN estudiantes AS E ON E.IdEstudiante = EP.IdEstudiante
         INNER JOIN tiposdocumento AS TD ON TD.IdTipoDocumento = E.IdTipoDocumento
         INNER JOIN empresas AS EM ON EM.IdEstudiante = E.IdEstudiante
         INNER JOIN usuarioestudiantes AS UE ON UE.IdEstudiante = E.IdEstudiante
         WHERE UE.IdUsuarioEstudiante=? AND EP.Estado = 1 AND EM.Activo = 1";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idUsuarioEstudiante);
    $stm->execute();
    $Usuario=$stm->fetch(PDO::FETCH_ASSOC);
    return $Usuario;
  }

//actualizar de administrador
  public function actualizarEstudiante()
  {
   $sql = "UPDATE estudiantes AS E
          INNER JOIN empresas AS EM ON E.IdEstudiante = EM.IdEstudiante
          INNER JOIN usuarioestudiantes AS UE ON UE.IdEstudiante = E.IdEstudiante
          INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
          SET E.Nombre=?, E.IdTipoDocumento=?, E.Apellido=?, E.Telefono=?,  E.CorreoEstudiante=?, E.Celular=?,
          E.NumeroFolio=?, EM.Empresa=?, EM.Nit=?, EM.NombreContacto=?, EM.CargoContacto=?,
          EM.TelefonoEmpresa=?, EM.CorreoEmpresa=?, EM.DireccionEmpresa=?, EP.IdPrograma=?,
          EM.CargoPracticante=?, EM.FechaInicio=?, EM.FechaFinalizacion=?, EM.Modalidad=?, UE.Usuario=?
          WHERE E.IdEstudiante=?";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->Nombre);
   $stm->bindParam(2, $this->IdTipoDocumento);
   $stm->bindParam(3, $this->Apellido);
   $stm->bindParam(4, $this->Telefono);
   $stm->bindParam(5, $this->CorreoEstudiante);
   $stm->bindParam(6, $this->Celular);
   $stm->bindParam(7, $this->NumeroFolio);
   $stm->bindParam(8, $this->Empresa);
   $stm->bindParam(9, $this->Nit);
   $stm->bindParam(10, $this->NombreContacto);
   $stm->bindParam(11, $this->CargoContacto);
   $stm->bindParam(12, $this->TelefonoE);
   $stm->bindParam(13, $this->CorreoE);
   $stm->bindParam(14, $this->DireccionE);
   $stm->bindParam(15, $this->idProgramas);
   $stm->bindParam(16, $this->CargoPracticante);
   $stm->bindParam(17, $this->FechaInicio);
   $stm->bindParam(18, $this->FechaFinalizacion);
   $stm->bindParam(19, $this->Mod);
   $stm->bindParam(20, $this->Usuario);
   $stm->bindParam(21, $this->IdEstudiante);
   $update = $stm->execute();
     return $update;
  }




 public function validarDocumentoProgramaE()
 {
   $sql="CALL SP_ValidarDocumentoProgramaE(?,?)";
   $stm= $this->db->prepare($sql);
   $stm->bindParam(1, $this->idProgramas);
   $stm->bindParam(2, $this->Documento);
   $stm->execute();
   $doc=$stm->fetch(PDO::FETCH_COLUMN);
   return $doc;
 }

 public function validarDocumentoProgramaEstudiante()
 {
   $sql="SELECT E.IdEstudiante, E.Documento, EP.IdPrograma FROM estudiantes AS E
   INNER JOIN estudiantesprogramas AS EP ON E.IdEstudiante = EP.IdEstudiante
   WHERE E.Documento = ?";
   $stm= $this->db->prepare($sql);
   $stm->bindParam(1, $this->Documento);
   $stm->execute();
   $doc=$stm->fetchAll(PDO::FETCH_ASSOC);
   return $doc;
 }

 public function actualizarEstudianteBitacora()
 {
  $sql = "UPDATE estudiantes AS E
         INNER JOIN empresas AS EM ON E.IdEstudiante = EM.IdEstudiante
         INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
         SET E.CorreoEstudiante=?, E.Celular=?
         WHERE E.IdEstudiante=?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->CorreoEstudiante);
  $stm->bindParam(2, $this->Celular);
  $stm->bindParam(3, $this->IdEstudiante);
  $update = $stm->execute();
  return $update;
 }

 public function cambioClave()
{
 $sql= "UPDATE usuarioestudiantes SET Clave=? WHERE IdUsuarioEstudiante=?";
 $stm = $this->db->prepare($sql);
 $stm->bindParam(1, $this->Clave);
 $stm->bindParam(2, $this->idUsuarioEstudiante);
 $update = $stm->execute();
 return $update;
}


}

?>
