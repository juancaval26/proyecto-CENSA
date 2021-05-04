  <?php

  class Estudiantes extends Controller{
    private $modeloEstudiante;
    private $modeloUsuario;
    private $modeloDocumento;
    private $modeloPrograma;
    private $modeloRoles;
    private $modeloEmpresa;

  public function __construct(){
    $this->modeloUsuario= $this->loadModel("mdlUsuario");
    $this->modeloEstudiante= $this->loadModel("mdlEstudiantes");
    $this->modeloDocumento= $this->loadModel("mdlTipoDocumento");
    $this->modeloPrograma= $this->loadModel("mdlProgramas");
    $this->modeloRoles= $this->loadModel("mdlRoles");
    $this->modeloUsuarioEstudiante= $this->loadModel("mdlUsuarioEstudiantes");
    $this->modeloEmpresa = $this->loadModel("mdlEmpresas");
  }

  function crearEstudiante()
  {
   if(isset($_POST['btnCambiosEstudiante']))
   {
       $Estado=1;
       $activo = 1;
       $this->modeloEstudiante->__SET("idProgramas", trim($_POST['txtPrograma']));
       $this->modeloEstudiante->__SET("Documento", trim($_POST['txtDocumento']));
       $estudiante = $this->modeloEstudiante->validarDocumentoProgramaEstudiante();

       if (count($estudiante) == 0) {
       $this->modeloEstudiante->__SET('Nombre', $_POST['txtNombres']);
       $this->modeloEstudiante->__SET('Apellido', $_POST['txtApellido']);
       $this->modeloEstudiante->__SET('Documento', $_POST['txtDocumento']);
       $this->modeloEstudiante->__SET('CorreoEstudiante', $_POST['txtEmail']);
       $this->modeloEstudiante->__SET('Celular', $_POST['txtCelular']);
       $this->modeloEstudiante->__SET('IdTipoDocumento', $_POST['tipDoc']);
       $this->modeloEstudiante->__SET('Telefono', $_POST['txtTelefono']);
       $this->modeloEstudiante->__SET('NumeroFolio', $_POST['txtFolio']);
       $respuesta =$this->modeloEstudiante->CrearEstudiante();
       $idEst = $this->modeloEstudiante->ultimoId();

       $this->modeloEmpresa->__SET("Estado", $Estado);
       $this->modeloEmpresa->__SET("IdEstudiante", $idEst);
       $this->modeloEmpresa->__SET("Empresa", $_POST['txtEmpresa']);
       $this->modeloEmpresa->__SET("Nit", $_POST['txtNit']);
       $this->modeloEmpresa->__SET("NombreContacto", $_POST['txtNombre']);
       $this->modeloEmpresa->__SET("CargoContacto", $_POST['txtCargoContacto']);
       $this->modeloEmpresa->__SET("Telefono", $_POST['txtTelefono']);
       $this->modeloEmpresa->__SET("CorreoEmpresa", $_POST['txtCorreo']);
       $this->modeloEmpresa->__SET("DireccionEmpresa", $_POST['txtDirección']);
       $this->modeloEmpresa->__SET("CargoPracticante", $_POST['txtCargo']);
       $this->modeloEmpresa->__SET("FechaInicio", $_POST['txtFechaI']);
       $this->modeloEmpresa->__SET("FechaFinalizacion", $_POST['txtFechaF']);
       $this->modeloEmpresa->__SET("Modalidad", $_POST['txtModalidad']);
       $this->modeloEmpresa->__SET("Activo", $activo);
       $empresa = $this->modeloEmpresa->empresaPracticas();
       $this->modeloPrograma->__SET("IdPrograma", $_POST['txtPrograma']);
       $this->modeloPrograma->__SET("IdEstudiante", $idEst);
       $this->modeloPrograma->__SET("Estado", $Estado);
       $respuestaP =$this->modeloPrograma->registroEstudiantePrograma();

    if ($respuesta==true && $empresa == true && $respuestaP == true) {
         $id = $this->modeloEstudiante->ultimoId();
         if ($id>0 || !empty($id)) {
           $passE = password_hash($_POST['txtDocumento'], PASSWORD_DEFAULT);
           $this->modeloUsuarioEstudiante->__SET('Usuario', $_POST['txtEmail']);
           $this->modeloUsuarioEstudiante->__SET('Clave',$passE);
           $this->modeloUsuarioEstudiante->__SET('Estado', $Estado);
           $this->modeloUsuarioEstudiante->__SET('IdEstudiante', $id);

           $Usuario = $this->modeloUsuarioEstudiante->crearUsuarioEstudiante();
            if ($Usuario) {
              $_SESSION['alerta']='
                swal({
                  title: "Listo",
                  text: "¡Registro exitoso!",
                  type:"success",
                  confirmButtonText: "Aceptar",
                  closeOnConfirm:false,
                  closeOnCancel:false
                });';
              header("Location: ".URL."Estudiantes/CrearEstudiante");
              exit;
            }else{
              $_SESSION['alerta']='swal({
                title: "Error!!",
                text: "Error al registrar el estudiante por favor comuniquese con soporte al correo ",
                type:"error",
                confirmButtonText: "Aceptar",
                closeOnConfirm:false,
                closeOnCancel:false
              });';
              header("Location: ".URL."Estudiantes/CrearEstudiante");
              exit;
            }
          }
        }
      }else if(count($estudiante) == 1){
        $doc; $prog; $est;
        foreach ($estudiante as $data) {
          $doc=$data['Documento'];
          $prog=$data['IdPrograma'];
          $est=$data['IdEstudiante'];
        }
        if (($doc == trim($_POST['txtDocumento'])) && ($prog == trim($_POST['txtPrograma']))) {
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "¡El estudiante ya se encuentra registrado con el mismo programa!",
              type:"error",
              confirmButtonText: "Error",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
          header("Location: ".URL."Estudiantes/CrearEstudiante");
          exit;
        }else if(($doc == trim($_POST['txtDocumento'])) && ($prog != trim($_POST['txtPrograma']))){
          $this->modeloPrograma->__SET("IdPrograma", $_POST['txtPrograma']);
          $this->modeloPrograma->__SET("IdEstudiante", $est);
          $this->modeloPrograma->__SET("Estado", $Estado);
          $respuestaP =$this->modeloPrograma->registroEstudiantePrograma();
          $this->modeloEmpresa->__SET("Estado", $Estado);
          $this->modeloEmpresa->__SET("IdEstudiante", $est);
          $this->modeloEmpresa->__SET("Empresa", $_POST['txtEmpresa']);
          $this->modeloEmpresa->__SET("Nit", $_POST['txtNit']);
          $this->modeloEmpresa->__SET("NombreContacto", $_POST['txtNombre']);
          $this->modeloEmpresa->__SET("CargoContacto", $_POST['txtCargoContacto']);
          $this->modeloEmpresa->__SET("Telefono", $_POST['txtTelefono']);
          $this->modeloEmpresa->__SET("CorreoEmpresa", $_POST['txtCorreo']);
          $this->modeloEmpresa->__SET("DireccionEmpresa", $_POST['txtDirección']);
          $this->modeloEmpresa->__SET("CargoPracticante", $_POST['txtCargo']);
          $this->modeloEmpresa->__SET("FechaInicio", $_POST['txtFechaI']);
          $this->modeloEmpresa->__SET("FechaFinalizacion", $_POST['txtFechaF']);
          $this->modeloEmpresa->__SET("Modalidad", $_POST['txtModalidad']);
          $this->modeloEmpresa->__SET("Activo", $activo);
          $empresa = $this->modeloEmpresa->empresaPracticas();
          if ($respuestaP && $empresa) {
            $_SESSION['alerta']='
              swal({
                title: "Listo",
                text: "¡Registro exitoso!",
                type:"success",
                confirmButtonText: "Aceptar",
                closeOnConfirm:false,
                closeOnCancel:false
              });';
            header("Location: ".URL."Estudiantes/CrearEstudiante");
            exit;
          }else{
            $_SESSION['alerta']='swal({
              title: "Error!!",
              text: "Error al registrar el estudiante por favor comuniquese con soporte al correo ",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
            header("Location: ".URL."Estudiantes/CrearEstudiante");
            exit;
          }
        }

      }else if(count($estudiante) >= 2){
        $cont = 0;
        $id=0;
        foreach ($estudiante as $data) {
            if ($data['IdPrograma'] == $_POST['txtPrograma']) {
                $cont++;
            }
            $id=$data['IdEstudiante'];
        }

        if ($cont==0) {
          $this->modeloPrograma->__SET("IdPrograma", $_POST['txtPrograma']);
          $this->modeloPrograma->__SET("IdEstudiante", $id);
          $this->modeloPrograma->__SET("Estado", $Estado);
          $respuestaP =$this->modeloPrograma->registroEstudiantePrograma();
          $this->modeloEmpresa->__SET("Estado", $Estado);
          $this->modeloEmpresa->__SET("IdEstudiante", $id);
          $this->modeloEmpresa->__SET("Empresa", $_POST['txtEmpresa']);
          $this->modeloEmpresa->__SET("Nit", $_POST['txtNit']);
          $this->modeloEmpresa->__SET("NombreContacto", $_POST['txtNombre']);
          $this->modeloEmpresa->__SET("CargoContacto", $_POST['txtCargoContacto']);
          $this->modeloEmpresa->__SET("Telefono", $_POST['txtTelefono']);
          $this->modeloEmpresa->__SET("CorreoEmpresa", $_POST['txtCorreo']);
          $this->modeloEmpresa->__SET("DireccionEmpresa", $_POST['txtDirección']);
          $this->modeloEmpresa->__SET("CargoPracticante", $_POST['txtCargo']);
          $this->modeloEmpresa->__SET("FechaInicio", $_POST['txtFechaI']);
          $this->modeloEmpresa->__SET("FechaFinalizacion", $_POST['txtFechaF']);
          $this->modeloEmpresa->__SET("Modalidad", $_POST['txtModalidad']);
          $this->modeloEmpresa->__SET("Activo", $activo);
          $empresa = $this->modeloEmpresa->empresaPracticas();
          var_dump($empresa, $respuestaP);
          if ($respuestaP && $empresa) {
            $_SESSION['alerta']='
              swal({
                title: "Listo",
                text: "¡Registro exitoso!",
                type:"success",
                confirmButtonText: "Aceptar",
                closeOnConfirm:false,
                closeOnCancel:false
              });';
            header("Location: ".URL."Estudiantes/CrearEstudiante");
            exit;
          }else{
            $_SESSION['alerta']='swal({
              title: "Error!!",
              text: "Error al registrar el estudiante por favor comuniquese con soporte al correo ",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
            header("Location: ".URL."Estudiantes/CrearEstudiante");
            exit;
          }
        }else{
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "¡El estudiante ya se encuentra registrado con el mismo programa!",
              type:"error",
              confirmButtonText: "Error",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
          header("Location: ".URL."Estudiantes/CrearEstudiante");
          exit;
        }


      }

    }
   $modalidades=$this->modeloEstudiante->__GET('modalidad');
   $documento = $this->modeloDocumento->TipoDocumento();
   $programas = $this->modeloPrograma->listarPrograma();

   //cabeza
   require APP . 'view/_templates/header.php';
   //cuerpo
   require APP.'view/estudiantes/CrearEstudiante.php';
   //pie
   require APP . 'view/_templates/footer.php';
  }


// administrador
  public function listarEstudiantes()
  {
    if (isset($_POST['actualizarEstudiante']))
    {
      // var_dump($update);
      // exit;
      $this->modeloEstudiante->__SET('Nombre', $_POST['txtNombre2']);
      $this->modeloEstudiante->__SET('IdTipoDocumento', $_POST['tipDoc']);
      $this->modeloEstudiante->__SET('Apellido', $_POST['txtApellido2']);
      $this->modeloEstudiante->__SET('Telefono', $_POST['txtTelefono2']);
      $this->modeloEstudiante->__SET('Celular', $_POST['txtCelular2']);
      $this->modeloEstudiante->__SET('CorreoEstudiante', $_POST['txtCorreo2']);
      $this->modeloEstudiante->__SET('NumeroFolio', $_POST['txtFolio']);
      $this->modeloEstudiante->__SET('Empresa', $_POST['txtEmpresa']);
      $this->modeloEstudiante->__SET('Nit', $_POST['txtNit']);
      $this->modeloEstudiante->__SET('NombreContacto', $_POST['txtNombreContacto']);
      $this->modeloEstudiante->__SET('CargoContacto', $_POST['txtCargoContacto']);
      $this->modeloEstudiante->__SET('TelefonoE', $_POST['txtTelefonoEmpresa']);
      $this->modeloEstudiante->__SET('CorreoE', $_POST['txtCorreoContacto']);
      $this->modeloEstudiante->__SET('DireccionE', $_POST['txtDireccionEmpresa']);
      $this->modeloEstudiante->__SET('idProgramas', $_POST['txtPrograma']);
      $this->modeloEstudiante->__SET('CargoPracticante', $_POST['txtCargoPracticante']);
      $this->modeloEstudiante->__SET('FechaInicio', $_POST['txtFechaI']);
      $this->modeloEstudiante->__SET('FechaFinalizacion', $_POST['txtFechaF']);
      $this->modeloEstudiante->__SET('Mod', $_POST['txtModalidad']);
      $this->modeloEstudiante->__SET('Usuario', $_POST['txtUsuario']);
      $this->modeloEstudiante->__SET('IdEstudiante', $_POST['txtIdEstudiante']);
      $update = $this->modeloEstudiante->actualizarEstudiante();
      //var_dump($update);
      //exit;
      if ($update == true) {
        $_SESSION['alerta']='
          swal({
            title: "Informacón",
            text: "¡Actualización exitosa!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
        header("location:".URL."Estudiantes/listarEstudiantes");
      exit; // otra form de redirijir a la misma pagina

      }else
        { // FORMA LARGA
        $_SESSION['alerta'] ='swal({
          title:"Error",
          text: "No se actualizo el estudiante, por favor comuniquese con soporte técnico al correo",
          type:"error",
          confirmButtonText:"aceptar"
        });';
          header("location:".URL."Estudiantes/listarEstudiantes");
          exit;
        }
    }
    if (isset($_POST['btnClave']))
    {
      $this->modeloEstudiante->__SET('Clave', md5(md5(sha1(trim($_POST['txtClave'])))));
      //var_dump(md5(md5(sha1(trim($_POST['txtClave'])))));exit;
      $this->modeloEstudiante->__SET('idUsuarioEstudiante', $_POST['txtIdUsuarioEs']);
      $update = $this->modeloEstudiante->cambioClave();
      if ($update == true)
      {
        $_SESSION['alerta']='
          swal({
            title: "Cambio de contraseña",
            text: "¡Actualización exitosa!",
            type:"success",
            confirmButtonText: "Aceptar",
            closeOnConfirm:false,
            closeOnCancel:false
          });';
          header("location:".URL."Estudiantes/listarEstudiantes");
          exit;
      }else
        { // FORMA LARGA
        $_SESSION['alerta'] ='swal({
          title:"No se cambio la contraseña, por favor comuniquese con soporte al correo",
          type:"error",
          confirmButtonText:"Aceptar"
        });';
          header("location:".URL."Estudiantes/listarEstudiantes");
          exit;
        }
    }
    $modalidades=$this->modeloEstudiante->__GET('modalidad');
    $documento = $this->modeloDocumento->TipoDocumento();
    $estudiantes = $this->modeloEstudiante->listarEstudiantes();
    $roles = $this->modeloRoles->listarRol();
    $programas = $this->modeloPrograma->listarPrograma();
    //cabeza
    require APP . 'view/_templates/header.php';
    //cuerpo
    require APP .'view/estudiantes/ListarEstudiantes.php';
    //pie
    require APP . 'view/_templates/footer.php';
  }

  public function editarEstudiante()
  {
  $this->modeloEstudiante->__SET('IdEstudiante',$_POST['id']); //manda valor
  $Usuario = $this->modeloEstudiante->estudianteId();
  echo json_encode($Usuario); //
  }

  public function cambiarEE()
  {
    $this->modeloUsuarioEstudiante->__SET("IdEstudiante", $_POST['id']);
    $programas = $this->modeloUsuarioEstudiante->cambiarEstadoEstudiante();
    if ($programas) {
      echo json_encode("1");
    }else
    {
      echo json_encode("0");
    }
  }

  public function validarDocumentoProgramaE(){
    $this->modeloEstudiante->__SET("idProgramas", trim($_POST['idprog']));
    $this->modeloEstudiante->__SET("Documento", trim($_POST['doc']));
    $estudiante = $this->modeloEstudiante->validarDocumentoProgramaE();
    if ($estudiante == "null") {
      echo json_encode("0");
    }else{
      echo json_encode("1");
    }
  }
}
?>
