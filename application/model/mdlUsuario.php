<?php

 class mdlUsuario{
   public $IdUsuario;
   public $Usuario;
   public $Clave;
   public $token;
   public $password_request;
   public $fechaRecuperacion;
   public $IdRol;
   public $IdEmpleado;
   public $Estado;
   public $db;

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

   public function validarUsuario(){
     $sql = "SELECT U.IdUsuario, U.Clave, U.Usuario, U.Estado, R.IdRol, R.Rol, E.IdEmpleado, E.Nombre FROM usuarios AS U
             INNER JOIN roles AS R ON R.IdRol = U.IdRol INNER JOIN empleados AS E ON E.IdEmpleado = U.IdEmpleado
             WHERE U.Usuario = ? AND  R.IdRol = ? AND U.Estado = 1 LIMIT 1";
     $stm = $this->db->prepare($sql);//protege de injeccion sql
     $stm->bindParam(1, $this->Usuario);//Primer parametro ?
     $stm->bindParam(2, $this->IdRol);//Segundo parametro ?
     $stm->execute();//ejecutar la consulta en la base de datos Mysql
     return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
   }

   public function crearUsuariosEmpleado(){
     $sql= "INSERT INTO usuarios(Usuario, Clave, IdRol, IdEmpleado, Estado)VALUES (?,?,?,?,?,?)";
       $stm= $this->db->prepare($sql);
       $stm->bindParam(1, $this->Usuario);
       $stm->bindParam(2, $this->Clave);
       $stm->bindParam(3, $this->IdRol);
       $stm->bindParam(4, $this->IdEmpleado);
       $stm->bindParam(5, $this->Online);
       $stm->bindParam(6, $this->Estado);
       $usuarios=$stm->execute();
       return $usuarios;
   }

   //traer el usuario seleccionado
   public function usuarioId(){
     $sql ="SELECT * FROM usuarios WHERE IdUsuario=?";
     $stm = $this->db->prepare($sql);
     $stm->bindParam(1, $this->IdUsuario);
     $stm->execute();
     $user = $stm->fetchAll(PDO::FETCH_ASSOC);
     return $user;
   }

   // crear actualizar Usuarios
   public function editarUsuario(){
     $sql = "UPDATE usuarios SET Documento=?, Nombres=?, Correo=?, Telefono=?, Usuario=?, IdRol=? WHERE IdUsuario=?";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(1, $this->documento);
      $stm->bindParam(2, $this->nombres);
      $stm->bindParam(3, $this->correo);
      $stm->bindParam(4, $this->telefono);
      $stm->bindParam(5, $this->Usuario);
      $stm->bindParam(6, $this->IdRol);
      $stm->bindParam(7, $this->IdUsuario);
      $update = $stm->execute();
        return $update;
   }
   // eliminar usuario
   public function eliminarUsuario(){
     $sql="DELETE FROM usuarios WHERE IdUsuario=?";
     $stm= $this->db->prepare($sql);
     $stm->bindParam(1, $this->IdUsuario);
     $resultado=$stm->execute();
     return $resultado;
   }

    public function validarAdmin(){
    $sql= "SELECT * FROM usuarios WHERE Usuario=?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Usuario);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);// Retornan un array de la consulta ejecutada
   }

   public function token(){
     $sql = "SELECT IdUsuario, fechaRecuperacion, Estado FROM usuarios WHERE token = ?";
     $stm = $this->db->prepare($sql);
     $stm->bindParam(1, $this->token);
     $stm->execute();
     return $stm->fetch(PDO::FETCH_ASSOC);
   }
   public function recoverPassword(){
     $sql = "UPDATE usuarios SET token = ?, fechaRecuperacion = ? WHERE Usuario = ?";
     $stm = $this->db->prepare($sql);
     $stm->bindParam(1, $this->token);
     $stm->bindParam(2, $this->fechaRecuperacion);
     $stm->bindParam(3, $this->Usuario);
     $update = $stm->execute();
     return $update;
   }

   public function updatePasswordRecover(){
       $sql = "UPDATE usuarios SET Clave = ?, token = null, fechaRecuperacion = ? WHERE IdUsuario = ?";
       $stm = $this->db->prepare($sql);
       $stm->bindParam(1, $this->Clave);
       $stm->bindParam(2, $this->fechaRecuperacion);
       $stm->bindParam(3, $this->IdUsuario);
       $update = $stm->execute();
       return $update;
   }

   public function traerUsuario(){
         $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
       $stm = $this->db->prepare($sql);
       $stm->bindParam(1, $this->Usuario);
       $stm->execute();
       $user = $stm->fetchAll(PDO::FETCH_ASSOC);
       return $user;
   }

}

 ?>
