<?php

  class Bitacoras extends Controller
  {

    private $modeloUsuarioEstudiante;
    private $modeloPrograma;
    private $modeloFuncion;
    private $modeloEmpresa;
    private $modeloBitacoras;
    private $modeloEvaluacion;
    private $modeloEstudiante;
    private $modeloDocumento;
    private $modeloCriteriosEvaluar;


    public function __construct()
    {
    $this->modeloUsuarioEstudiante= $this->loadModel("mdlUsuarioEstudiantes");
    $this->modeloPrograma= $this->loadModel("mdlProgramas");
    $this->modeloFuncion = $this->loadModel("mdlFunciones");
    $this->modeloEmpresa = $this->loadModel("mdlEmpresas");
    $this->modeloBitacoras = $this->loadModel("mdlBitacoras");
    $this->modeloEvaluacion = $this->loadModel("mdlEvaluaciones");
    $this->modeloEstudiante = $this->loadModel("mdlEstudiantes");
    $this->modeloDocumento = $this->loadModel("mdlTipoDocumento");
    $this->modeloCriteriosEvaluar = $this->loadModel("mdlCriteriosEvaluar");

    }

    public function inicioBitacora()
  {
    $this->modeloBitacoras->__SET('idEstudiante',$_SESSION['estudiante']);
    $this->modeloBitacoras->__SET('idPrograma', $_SESSION['Programa']);
    $numBitacora = $this->modeloBitacoras->validarBitacora();
    require APP . 'view/bitacoras/bitacora.php';
  }


    public function datosEstudiante1()
    {
      if (isset($_POST['btnActualizarE']))
      {

        $this->modeloEstudiante->__SET("telefono", $_POST['txtCelular']);
        $this->modeloEstudiante->__SET("correo", $_POST['txtEmail']);

        $Estudiante=$this->modeloEstudiante->editarEstudiantes();
        if (!$Estudiante)
        {
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "¡Error al realizar el registro!",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
          header("Location: ".URL."Bitacoras/datosEstudiante1");
          exit;

        }else
        {
          $_SESSION['alerta']='
            swal({
              title: "Listo",
              text: "¡Registro exitoso!",
              type:"success",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
            header("Location: ".URL."Bitacoras/datosEstudiante1");
            exit;
        }
      }
      $this->modeloBitacoras->__SET('idEstudiante',$_SESSION['estudiante']);
      $this->modeloBitacoras->__SET('idPrograma', $_SESSION['Programa']);
      $numBit = $this->modeloBitacoras->validarBitacora();
      $tablaProgramas = $this->modeloPrograma->Programa();
      $this->modeloEstudiante->__SET("idUsuarioEstudiante", $_SESSION['usuarioEstudiante']);
      $actualizar = $this->modeloEstudiante->traerDatos();
      $documento = $this->modeloDocumento->TipoDocumento();
      $listaValor = $this->modeloEvaluacion->listarValoraciones();
      $calificaciones=$this->modeloBitacoras->__GET('calificacion');

      if (isset($_POST['btnActualizarEm']))
      {

        $this->modeloEmpresa->__SET("Empresa", $_POST['txtEmpresa']);
        $this->modeloEmpresa->__SET("Apellido", $_POST['txtDireccion']);
        $this->modeloEmpresa->__SET("NombreContacto", $_POST['txtContacto']);
        $this->modeloEmpresa->__SET("Telefono", $_POST['txtTelefono']);
        $this->modeloEmpresa->__SET("CorreoEmpresa", $_POST['txtCorreo']);
        $this->modeloEmpresa->__SET("CargoPracticante", $_POST['txtPracticante']);

        $empresa=$this->modeloEmpresa->actualizarEstudiante();

        if (!$empresa)
        {
          $_SESSION['alerta']='
            swal({
              title: "Error",
              text: "¡Error al realizar la actualización!",
              type:"error",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';
          header("Location: ".URL."Bitacoras/datosEstudiante1");
          exit;

        }else
        {
          $_SESSION['alerta']='
            swal({
              title: "Listo",
              text: "¡Registro exitoso!",
              type:"success",
              confirmButtonText: "Aceptar",
              closeOnConfirm:false,
              closeOnCancel:false
            });';;
            header("Location: ".URL."Bitacoras/datosEstudiante1");
            exit;
        }
      }
      $criterio=$this->modeloCriteriosEvaluar->__GET('respuesta');
      $listaCriterio=$this->modeloCriteriosEvaluar->listaCriterios();
      $respuesta = $this->modeloBitacoras->__GET('calificacion');
      $this->modeloFuncion->__SET('idPrograma', $_SESSION['Programa']);
      $desempenio = $this->modeloFuncion->listarFuncionesPorPrograma();
      $this->modeloEstudiante->__SET("idUsuarioEstudiante", $_SESSION['usuarioEstudiante']);
      $actualizar = $this->modeloEstudiante->traerDatos();
      $Estudiante1=$this->modeloEmpresa->actualizarDatos();
      require APP . 'view/bitacoras/datosEstudiante1.php';
    }

    public function traerDato()
    {
    $this->modeloEstudiante->__SET('idEstudiantesProgramas',$_POST['id']); //manda valor
    $usuario = $this->modeloEstudiante->traerDatos();
    echo json_encode($usuario); //
    }

    public function listaBitacorasEstudiante(){
      $this->modeloBitacoras->__SET('idPrograma',$_SESSION['Programa']);
      $this->modeloBitacoras->__SET('idEstudiante',$_SESSION['estudiante']);
      $numBitacora = $this->modeloBitacoras->validarBitacora();
      $bitacoras = $this->modeloBitacoras->listarBitacorasPorEstudiante();
      require APP . 'view/bitacoras/listaBitacoras.php';
    }


    public function getEstudianteBitacora()
    {
       $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
       $estudianteB = $this->modeloBitacoras->detallesBitacoraId();
       echo json_encode($estudianteB);
    }

    public function getFuncionesBitacora()
    {
       $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
       $funcionesB = $this->modeloBitacoras->respuetasBitacoraFunciones();
       echo json_encode($funcionesB);
    }

    public function getSeguimientoBitacora()
    {
       $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
       $evaluacionB = $this->modeloBitacoras->respuetasBitacoraEvaluacion();
       echo json_encode($evaluacionB);
    }

    public function getCriteriosBitacora()
    {
       $this->modeloBitacoras->__SET('idBitacora', $_POST['id']); //manda valor
       $criteriosB = $this->modeloBitacoras->respuetasBitacoraCriterios();
       echo json_encode($criteriosB);
    }

    public function actualizarBitacoraEstudiante()
    {
       $this->modeloEstudiante->__SET('CorreoEstudiante', $_POST['correo']);
       $this->modeloEstudiante->__SET('Celular', $_POST['celular']);
       $this->modeloEstudiante->__SET('IdEstudiante', $_POST['idEst']);
       $res = $this->modeloEstudiante->editarEstudianteBitacora();
       if ($res) {
         echo json_encode("1");
       }else{
         echo json_encode("0");
       }

    }

    public function actualizarDatosBitacora()
    {
       $this->modeloEmpresa->__SET('NombreContacto', $_POST['nomContacto']);
       $this->modeloEmpresa->__SET('Telefono', $_POST['telefonoE']);
       $this->modeloEmpresa->__SET('CorreoEmpresa', $_POST['correo']);
       $this->modeloEmpresa->__SET('CargoPracticante', $_POST['cargoPracticante']);
       $this->modeloEmpresa->__SET('DireccionEmpresa', $_POST['direccion']);
       $this->modeloEmpresa->__SET('IdEmpresa', $_POST['idEmpresa']);
       $res = $this->modeloEmpresa->actualizarDatosBitacora();
       if ($res) {
         echo json_encode("1");
       }else{
         echo json_encode("0");
       }

    }

    public function registroBitacoraEstudiante()
    {
       $this->modeloBitacoras->__SET('fecha', $_POST['fecha']);
       $this->modeloBitacoras->__SET('codigoGrupo', $_POST['codigoGrupo']);
       $this->modeloBitacoras->__SET('observaciones', $_POST['observaciones']);
       $this->modeloBitacoras->__SET('numBitacora', $_POST['actBitacora']);
       $this->modeloBitacoras->__SET('idEstudiante', $_POST['idEstudiante']);
       $this->modeloBitacoras->__SET('idPrograma', $_POST['idPrograma']);
       $this->modeloBitacoras->__SET('idEmpresa', $_POST['idEmpresa']);
       $res = $this->modeloBitacoras->registrarBitacora();
       if ($res) {
         echo json_encode("1");
       }else{
         echo json_encode("0");
       }

    }

    public function registarBitacoraEvaluaciones()
    {
       $this->modeloBitacoras->__SET('idEstudiante', $_SESSION['estudiante']);
       $this->modeloBitacoras->__SET('idPrograma', $_SESSION['Programa']);
       $id = $this->modeloBitacoras->getIdBitacora();
       $evaluaciones = $_POST['seguimiento'];
       //se trae del script agregarFuncion.js
       $tamanio = count($evaluaciones);
       $cont=0;
       foreach ($evaluaciones as $key => $value)
       {
         $this->modeloEvaluacion->__SET('idBitacora', $id);
         $this->modeloEvaluacion->__SET('idEvaluacion', $value['id']);
         $this->modeloEvaluacion->__SET('respuesta', $value['calificacion']);
         $res = $this->modeloEvaluacion->registarBitacoraEvaluaciones();
         if ($res) {
           $cont++;
         }
       }
       if ($cont == $tamanio)
       {
         echo json_encode("1"); //
       }else{
         echo json_encode("0"); //
       }

    }


    public function registarBitacoraFunciones()
    {
       $this->modeloBitacoras->__SET('idEstudiante', $_SESSION['estudiante']);
       $this->modeloBitacoras->__SET('idPrograma', $_SESSION['Programa']);
       $id = $this->modeloBitacoras->getIdBitacora();
       $funciones = $_POST['funciones'];
       //se trae del script agregarFuncion.js
       $tamanio = count($funciones);
       $cont=0;
       foreach ($funciones as $value)
       {
         $this->modeloFuncion->__SET('idBitacora', $id);
         $this->modeloFuncion->__SET('idFuncion', $value['id']);
         $this->modeloFuncion->__SET('respuesta', $value['calificacion']);
         $res = $this->modeloFuncion->registarBitacoraFunciones();
         if ($res) {
           $cont++;
         }
       }
       if ($cont == $tamanio)
       {
         echo json_encode("1"); //
       }else{
         echo json_encode("0"); //
       }

    }
  }
 ?>
