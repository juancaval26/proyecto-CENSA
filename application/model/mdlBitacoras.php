<?php
class mdlBitacoras
 {

// tabla bitacoras
public $idBitacora;
public $fecha;
public $codigoGrupo;
public $observaciones;
public $idEstudiante;
public $idPrograma;
public $documento;
public $idEmpresa;
public $numBitacora;
public $db;
public $calificacion = array('numero1' => 1, 'numero2' => 2, 'numero3' => 3, 'numero4' => 4, 'numero5' => 5);


//contructor
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

  public function validarBitacora(){
    $sql="CALL SP_ValidarBitacora(?, ?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idPrograma);
    $stm->bindParam(2, $this->idEstudiante);
    $stm->execute();
    $id=$stm->fetch(PDO::FETCH_COLUMN);
    return $id;
  }

  public function registrarBitacora(){
    $sql= "INSERT INTO bitacoras(Fecha, NumFolio,Observaciones, NumBitacora, IdEstudiante, IdPrograma, IdEmpresa) values (?,?,?,?,?,?,?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->fecha);
    $stm->bindParam(2, $this->codigoGrupo);
    $stm->bindParam(3, $this->observaciones);
    $stm->bindParam(4, $this->numBitacora);
    $stm->bindParam(5, $this->idEstudiante);
    $stm->bindParam(6, $this->idPrograma);
    $stm->bindParam(7, $this->idEmpresa);
    $cargo=$stm->execute();
    return $cargo;
  }

  public function getIdBitacora(){
    $sql="CALL SP_GetBitacoraId(?, ?)";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idEstudiante);
    $stm->bindParam(2, $this->idPrograma);
    $stm->execute();
    $id=$stm->fetch(PDO::FETCH_COLUMN);
    return $id;
  }

  public function listarBitacorasPorEstudiante(){
    $sql="SELECT * FROM bitacoras WHERE IdEstudiante = ? AND IdPrograma = ?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idEstudiante);
    $stm->bindParam(2, $this->idPrograma);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }

  public function detallesBitacoraId(){
    $sql="SELECT B.IdBitacora, B.Fecha, B.NumFolio, B.Observaciones, B.NumBitacora, E.IdEstudiante, E.Nombre, E.Apellido, E.Documento, E.CorreoEstudiante, E.Telefono, E.Celular, E.NumeroFolio, TD.DocumentoIdentidad, P.NombrePrograma, EM.Empresa, EM.Nit, EM.NombreContacto,
     EM.CargoContacto, EM.TelefonoEmpresa, EM.CorreoEmpresa, EM.DireccionEmpresa, EM.FechaInicio, EM.FechaFinalizacion, EM.Modalidad, EM.Activo
     FROM bitacoras AS B
     INNER JOIN estudiantes AS E ON B.IdEstudiante = E.IdEstudiante
     INNER JOIN programas AS P ON P.IdPrograma = B.IdPrograma
     INNER JOIN empresas AS EM  ON EM.IdEstudiante = E.IdEstudiante
     INNER JOIN tiposdocumento AS TD ON TD.IdTipoDocumento = E.IdTipoDocumento
     WHERE B.IdBitacora = ? AND EM.Activo = 1;";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->execute();
    $bitacora=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $bitacora;
  }

  public function respuetasBitacoraEvaluacion(){
    $sql="SELECT B.IdBitacora, BE.IdEvaluacion, EV.Area, EV.AspectosEvaluar, BE.Respuesta FROM evaluaciones AS EV
    INNER JOIN bitacorasevaluaciones AS BE ON EV.IdEvaluacion = BE.IdEvaluacion
    INNER JOIN bitacoras AS B ON B.IdBitacora = BE.IdBitacora
    WHERE B.IdBitacora = ?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }

  public function respuetasBitacoraFunciones(){
    $sql="SELECT B.IdBitacora,F.IdFuncion, F.Descripcion, BF.Respuesta FROM funciones AS F
    INNER JOIN bitacorasfunciones AS BF ON F.IdFuncion = BF.IdFuncion
    INNER JOIN bitacoras AS B ON B.IdBitacora = BF.IdBitacora
    WHERE B.IdBitacora = ?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }
  public function respuetasBitacoraCriterios(){
    $sql="SELECT B.IdBitacora, CE.IdCriteriosEvaluar, CE.CriterioEvaluar, CEB.Respuesta FROM criteriosevaluar AS CE
    INNER JOIN criteriosevaluarbitacoras AS CEB ON CEB.IdCriterioEvaluar = CE.IdCriteriosEvaluar
    INNER JOIN bitacoras AS B ON B.IdBitacora = CEB.IdBitacora
    WHERE B.IdBitacora = ?";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idBitacora);
    $stm->execute();
    $id=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $id;
  }

  public function verBitacorasEstudiante(){

  }

  public function buscarEstudianteBitacoras(){
    $sql="SELECT E.IdEstudiante, E.Documento, B.IdPrograma, P.NombrePrograma, COUNT(B.IdBitacora) FROM estudiantes AS E 
    INNER JOIN bitacoras AS B ON E.IdEstudiante = B.IdEstudiante 
    INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
    INNER JOIN programas AS P ON P.IdPrograma = EP.IdPrograma
          WHERE E.Documento = ?;";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->documento);
    $stm->execute();
    $programas=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $programas;
  }

  public function BitacorasEstudiantePrograma(){

    $sql="SELECT TD.DocumentoIdentidad, E.Documento, CONCAT(E.Nombre, ' ', E.Apellido) AS 'NombreCompleto', 
    B.NumFolio, B.Fecha, B.NumBitacora, B.IdBitacora FROM bitacoras AS B 
    INNER JOIN estudiantes AS E ON B.IdEstudiante = E.IdEstudiante 
    INNER JOIN programas AS P ON B.IdPrograma = P.IdPrograma 
    INNER JOIN tiposdocumento AS TD ON TD.IdTipoDocumento=E.IdTipoDocumento 
    WHERE P.IdPrograma = ? AND E.Documento = ?;";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->idPrograma);
    $stm->bindParam(2, $this->documento);
    $stm->execute();
    $bitacoras=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $bitacoras;


  }

}
?>
