  <?php

  class mdlUsuarioEstudiantes
  {
  public $IdUsuarioEstudiantes;
  public $Usuario;
  public $Clave;
  public $token;
  public $fechaRecuperacion;
  public $Estado;
  public $IdEstudiante;
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
  $sql = "SELECT UE.IdUsuarioEstudiante, UE.Clave, E.IdEstudiante, E.Nombre, E.Apellido, E.Documento, E.CorreoEstudiante, E.IdTipoDocumento, P.IdPrograma, P.NombrePrograma, UE.Usuario, UE.Clave
          FROM estudiantes AS E
          INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
          INNER JOIN usuarioestudiantes UE ON UE.IdEstudiante = E.IdEstudiante
          INNER JOIN programas P ON P.IdPrograma = EP.IdPrograma
          WHERE UE.Estado = 1 AND UE.Usuario = ? AND EP.Estado = 1 LIMIT 1;";
  $stm = $this->db->prepare($sql);//protege de injeccion sql
  $stm->bindParam(1, $this->Usuario);//Primer parametro ?
  $stm->execute();//ejecutar la consulta en la base de datos Mysql
  return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
}


//traer el usuario seleccionado
  public function usuarioEstudianteId(){
  $sql ="SELECT * FROM usuarioEstudiantes WHERE IdUsuarioEstudiante=?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->$IdUsuarioEstudiantes);
  $stm->execute();
  $user = $stm->fetchAll(PDO::FETCH_ASSOC);
  return $user;
  }

  public function crearUsuarioEstudiante()
  {
    $sql= "INSERT INTO usuarioEstudiantes(Usuario, Clave, Estado, IdEstudiante) VALUES(?,?,?,?) ";
    $stm= $this->db->prepare($sql);
    $stm->bindParam(1, $this->Usuario);
    $stm->bindParam(2, $this->Clave);
    $stm->bindParam(3, $this->Estado);
    $stm->bindParam(4, $this->IdEstudiante);
    $Estudiante=$stm->execute();
    return $Estudiante;
  }

  public function cambiarEstadoEstudiante()
  {
     $sql = "UPDATE usuarioEstudiantes SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE IdEstudiante = ?";
     $stm = $this->db->prepare($sql);
     $stm->bindParam(1, $this->IdEstudiante);
     $res = $stm->execute();
     return $res; //bool true or false
   }

   public function cambioClave()
{
  $sql= "UPDATE usuarioEstudiantes SET IdUsuarioEstudiante=?, Usuario=?, Clave=?, Estado=?  WHERE IdEstudiante=?";
  $stm = $this->db->prepare($sql);
  $stm =bindParam(1, $this->IdUsuarioEstudiantes);
  $stm =bindParam(2, $this->Usuario);
  $stm =bindParam(3, $this->Clave);
  $stm =bindParam(4, $this->Estado);
  $stm =bindParam(5, $this->IdEstudiante);
  $res = $stm->execute();
  return $res;
}

public function validarUsuario(){
$sql= "SELECT * FROM usuarios WHERE Usuario=?";
$stm = $this->db->prepare($sql);
$stm->bindParam(1, $this->Usuario);
$stm->execute();
return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
}

public function token(){
  $sql = "SELECT IdUsuarioEstudiante, fechaRecuperacion, Estado FROM usuarioestudiantes WHERE token = ?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->token);
  $stm->execute();
  return $stm->fetch(PDO::FETCH_ASSOC);
}
public function recoverPassword(){
  $sql = "UPDATE usuarioestudiantes SET token = ?, fechaRecuperacion = ? WHERE Usuario = ?";
  $stm = $this->db->prepare($sql);
  $stm->bindParam(1, $this->token);
  $stm->bindParam(2, $this->fechaRecuperacion);
  $stm->bindParam(3, $this->Usuario);
  $update = $stm->execute();
  return $update;
}

public function updatePasswordRecover(){
    $sql = "UPDATE usuarioestudiantes SET Clave = ?, token = null, fechaRecuperacion = ? WHERE IdUsuarioEstudiante = ?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Clave);
    $stm->bindParam(2, $this->fechaRecuperacion);
    $stm->bindParam(3, $this->IdUsuarioEstudiante);
    $update = $stm->execute();
    return $update;
}

public function traerUsuario(){
    $sql = "SELECT IdUsuarioEstudiante, Clave, token, fechaRecuperacion, Estado FROM usuarioestudiantes WHERE Usuario = ? LIMIT 1";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Usuario);
    $stm->execute();
    $user = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

  }

?>
