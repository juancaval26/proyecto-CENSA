 <!DOCTYPE html>
<html lang="es">
<head>
  <title>Estudiante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo URL; ?>bootstrap34/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/css/color.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/datosEstudiante.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>css/sweetalert.css">
  <script type="text/javascript">
     var url = "<?php echo URL; ?>";
  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <img src="<?php echo URL; ?>img/censita.png"width="65px" height="50px"alt="CENSA">
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>Bitacoras/inicioBitacora">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>Bitacoras/datosEstudiante1">Bitácoras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>Bitacoras/listaBitacorasEstudiante"> Lista Bitácoras</a>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo URL; ?>Home/cerrarSesion"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>

  </div>
  </div>
  </nav>

<div class="container" id="formulario">

  <div class="x_panel" >
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> <center>Bitácora N° <?php echo ($numBit+1); ?> </h2></center>
      <hr>

      <ul class="nav navbar-right panel_toolbox">

        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <!-- start accordion -->
      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel estudiante">
        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h4 class="panel-title" onclick="editarDatos(<?php echo $data['idEstudiantesProgramas']; ?>);">Datos del Estudiante</h4>
        </a>

        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <div class="x_panel">
              <h2><center>Datos del Estudiante</h2></center>
              <hr>
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <form id="demo-form" data-parsley-validate method="post">
            <div class="form-group">
              <label for="">Fecha Realizacion Bitácora<span style="color: red; font-size: 15px; ">*</span> </label>
              <input type="text" name="txtFecha" id="txtFecha" class="form-control" value="<?php echo date("d-m-Y"); ?>" readonly>
              <input type="text" hidden name="txtIdEstudiante1" id="txtIdEstudiante1"  value="<?php echo $actualizar['IdEstudiante']; ?>">
            </div>
            <div class="form-group">
              <label for="">Número de Folio<span style="color: red; font-size: 15px;">*</span> </label>
               <input type="text" name="txtFolioEs" id="txtFolioEs" class="form-control" value="<?php echo $actualizar['NumeroFolio']; ?>" readonly>
               <input type="text" hidden ame="txtNumBitacora" id="txtNumBitacora"  value="<?php echo $_SESSION['numBitacoras']; ?>">
            </div>
            <div class="form-group">
              <label for="">Programa de Formación<span style="color: red; font-size: 15px;">*</span> </label>
               <input type="text" name="txtPrograma" id="txtProgramaEs" class="form-control" value="<?php echo $actualizar['NombrePrograma']; ?>" readonly>
               <input type="text" hidden name="txtIdPrograma" id="txtIdPrograma"  value="<?php echo $actualizar['IdPrograma']; ?>">
               <input type="text" hidden name="txtIdProgramaSesion" id="txtIdProgramaSesion"  value="<?php echo $_SESSION['Programa']; ?>">
            </div>
            <div class="form-group">
              <label for="">Tipo de Documento<span style="color: red; font-size: 15px;">*</span> </label>
              <input type="text" name="txtTipoDocumentoEs" id="txtTipoDocumentoEs" class="form-control" value="<?php echo $actualizar['DocumentoIdentidad']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Número de Documento</label>
              <input type="text" name="txtDocumentoEs" id="txtDocumentoEs" class="form-control" value="<?php echo $actualizar['Documento']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Nombre Completo</label>
              <input type="text" name="txtNombresEs" id="txtNombresEs" class="form-control" value="<?php echo $actualizar['Nombre']; ?>" readonly>
            </div>

             <div class="form-group">
              <label for="">Apellido Completo</label>
              <input type="text" name="txtApellidosEs" id="txtApellidosEs" class="form-control" value="<?php echo $actualizar['Apellido']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="">Celular</label>
              <input type="text" name="txtCelularEs" id="txtCelularEs" class="form-control" value="<?php echo $actualizar['Celular']; ?>" >
            </div>

            <div class="form-group">
              <label for="">Correo</label>
              <input type="email" name="txtEmailEs" id="txtEmailEs" class="form-control" value="<?php echo $actualizar['CorreoEstudiante']; ?>" >
            </div>

          </div>
        </div>
          </div>
        </div>
      </div>

      <div class="panel estudiante" >
        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

          <h4 class="panel-title">Datos Empresa</h4>
        </a>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="x_panel">
            <h2><center>Datos Empresa<small></small></h2></center>
            <hr>
          <div class="panel-body">

            <div class="form-group">
              <label for="">NIT de Empresa<span style="color: red; font-size: 15px; ">*</span> </label>
              <input type="text" name="txtNitEmpresa" id="NitEmpresaE" class="form-control" value="<?php echo $actualizar['Nit']; ?>"required readonly>
              <input type="text" hidden name="txtIdEmpresa" id="txtIdEmpresa" value="<?php echo $actualizar['IdEmpresa']; ?>">
            </div>
            <div class="form-group">
              <label for="">Razón Social<span style="color: red; font-size: 15px; ">*</span> </label>
              <input type="text" name="txtEmpresa" id="EmpresaE" class="form-control" value="<?php echo $actualizar['Empresa']; ?>"required readonly>
            </div>

            <div class="form-group">
              <label for="">Dirección de Empresa<span style="color: red; font-size: 15px;">*</span> </label>
              <input type="text" name="txtDireccionEmpresa" id="DireccionE" class="form-control" value="<?php echo $actualizar['DireccionEmpresa']; ?>"required>
            </div>

            <div class="form-group">
              <label for="">Nombre Contacto<span style="color: red; font-size: 15px;">*</span> </label>
              <input type="text" name="txtContactoEmpresa" id="ContactoE" class="form-control" value="<?php echo $actualizar['NombreContacto']; ?>"required>
            </div>


            <div class="form-group">
              <label for="">Teléfono Contacto<span style="color: red; font-size: 15px;">*</span> </label>
              <input type="text" name="txtTelefonoEmpresa" id="TelefonoE" class="form-control" value="<?php echo $actualizar['Telefono']; ?>" required>
            </div>

            <div class="form-group">
              <label for="">Correo Contacto</label>
              <input type="email" name="txtCorreoEmpresa" id="CorreoE" class="form-control" value="<?php echo $actualizar['CorreoEmpresa']; ?>" >
            </div>

            <div class="form-group">
              <label for="">Cargo/Proceso(Practicante)  </label>
              <input type="text" name="txtPracticanteE" id="PracticanteE" class="form-control" value="<?php echo $actualizar['CargoPracticante']; ?>" >
            </div>
          </div>
        </div>
      </div>
      </div>


      <div class="panel estudiante">
        <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h4 class="panel-title">Seguimiento</h4>
        </a>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
          <div class="x_panel" >
            <center><h2>Seguimiento</h2>
              <small>Califique de 1 a 5 el nivel de satisfacción con el seguimiento en el proceso de prácticas (1: Malo, 2 Regular, 3:Bueno, 4:Sobresaliente, 5: Excelente).  </small>
            </center>
            <hr>
          <div class="panel-body">

            <table class="table table-bordered" id="tablaSeguimiento">
              <thead>
                <tr>
                  <th style="text-align:center">Item</th>
                  <th style="text-align:center">Área</th>
                  <th style="text-align:center">Aspectos a Evaluar</th>
                  <th style="text-align:center">Calificación</th>
                </tr>
              </thead>
              <tbody>
                <?php $num=count($listaValor); ?>
                <?php foreach ($listaValor as $key => $value): ?>
                <tr>
                  <td class="n0">
                    <?= $value['IdEvaluacion']; ?>
                  </td>
                  <td class="n1">
                    <?= $value['Area']; ?>
                    <input type="text" name="txtIdEvaluacionS" id="txts<?= $value['IdEvaluacion']; ?>" value="<?= $value['IdEvaluacion']; ?>" hidden>
                  </td>
                  <td class="n2" title="<?= $value['Descripcion']; ?>">
                    <?= $value['AspectosEvaluar']; ?>
                  </td>
                  <td class="n3">
                    <select class="form-control" id="select<?php echo $key; ?>" name="cal" required>
                    <option value="" selected="selected">Seleccionar</option>
                      <?php foreach ($calificaciones as $key => $value): ?>
                    <option value="<?= $value;?>"><?= $value;?></option>
                      <?php endforeach; ?>
                  </select>
                  </select></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

      <div class="panel estudiante">
        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h4 class="panel-title"> Funciones Desempeñadas</h4>
        </a>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="x_panel" style="">
            <h2><center>Perfil Ocupacional</h2></center>
            <hr>
          <div class="panel-body">
            <center><h4>Evaluación de funciones desempeñadas según perfil ocupacional del programa</h4>
              <small>Califique de 1 a 5 el nivel de funciones desempeñadas con el proceso de prácticas (1: Malo, 2 Regular, 3:Bueno, 4:Sobresaliente, 5: Excelente).  </small>
            </center>
            <table class="table table-bordered" id="tablaFunciones">
              <thead>
                <tr>
                  <th >Código</th>
                  <th >Funciones</th>
                  <th >Evaluación</th>
                </tr>
              </thead>
              <tbody id="PerfilOcupacional">
                <?php $numF=count($desempenio); ?>
                <?php foreach ($desempenio as $key => $value): ?>
                <tr>
                  <td class="nf0"><span id="txtf<?= $value['IdFuncion']; ?>"><?= $value['IdFuncion']; ?></span></td>
                  <td class="nf1"><textarea class="form-control" readonly><?= $value['Descripcion'];  ?></textarea></td>
                  <td class="nf2">
                    <select id="selectf<?php echo $key; ?>" class="form-control" name="txtCalificar" id="txtCalificarF" required>
                      <option value="" selected="selected">Seleccionar</option>
                      <?php foreach ($respuesta as $valor): ?>
                          <option value="<?= $valor;  ?>"><?= $valor;  ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>



          </div>
        </div>
      </div>
    </div>

    <div class="panel estudiante">
      <a class="panel-heading collapsed" role="tab" id="headingThree4" data-toggle="collapse" data-parent="#accordion" href="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
        <h4 class="panel-title"> Observaciones</h4>
      </a>
      <div id="collapseThree4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="x_panel">
        <div class="panel-body">
          <center><center><h2>Observaciones</h2></center></h4></center>
            <table class="table table-bordered">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="form-group">
                        <textarea class="form-control" name="txtObservaciones" id="txtObservaciones" rows="8" cols="80" placeholder="Ingrese las observaciones de como se sintió en la etapa productiva."></textarea>
                    </div>

                  </td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

      <div class="panel estudiante">
        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h4 class="panel-title">Seguimiento Empresa</h4>
        </a>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="x_panel">
            <h2><center>Satisfacción de la Empresa</h2></center>
            <hr>
          <div class="panel-body">
            <center><h4>Nivel de satisfacción de la empresa con el proceso de practicas</h4>
              <small>Califique de 1 a 5 el nivel de satisfacción con el proceso de prácticas (1: Malo, 2 Regular, 3:Bueno, 4:Sobresaliente, 5: Excelente).  </small>
            </center>

            <table class="table table-bordered" id="tablaSeguimientoEmpresa">
              <thead>
                <tr>
                  <th style="text-align:center">Item </th>
                  <th style="text-align:center">Criterios a Evaluar </th>
                  <th style="text-align:center">Escala de Valoración</th>
                </tr>
              </thead>
              <tbody id="SeguimientoEmpresa">
                <?php $numC=count($listaCriterio); ?>
                <?php foreach ($listaCriterio as $key => $value): ?>
                <tr>
                  <td class="nC0"><span id="txtc<?= $value['IdCriteriosEvaluar']; ?>"><?= $value['IdCriteriosEvaluar']; ?></span></td>
                  <td class="nC1"><textarea class="form-control" readonly><?= $value['CriterioEvaluar'];  ?></textarea></td>
                  <td class="nC2">
                    <select class="form-control" name="txtCalificarSe" id="selectc<?php echo $key; ?>" required>
                      <option value="" selected="selected">Seleccionar</option>
                      <?php foreach ($criterio as $valor): ?>
                          <option value="<?= $valor;  ?>"><?= $valor;  ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
    <!-- end of accordion -->
    <div class="row">

  </div>
  </div>
</div>

<div style="margin-bottom: 15px;" class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
  <button type="button" onclick="guardarBitacora(event); inhabilitar();"class="btn btn-primary pull-right" name="guardarBitacora" id="guardarBitacora" >Guardar</button>
  <br>
</div>



</div>
<script src="<?php echo URL; ?>js/acordeon.js"></script>

<script src="<?php echo URL; ?>Gentelella/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>js/sweetalert.min.js"></script>
<script type="text/javascript">
//funciones por eventos
function inhabilitar(){

$("#guardarBitacora").prop('disabled', true);

}
function guardarBitacora(event){
  //array  = {"id":valor.IdFuncion, "funcion": valor.Descripcion, "idprograma": valor.IdPrograma};
  //datos.push(array);
  bitacora.registroBitacora();
  bitacora.actualizarEstudiante();
  bitacora.actualizarEmpresa();
  bitacora.registroSeguimiento();
  bitacora.registroFunciones();

  //event.preventDefault();

  //bitacora.registroCriterios();

}


//objetos en javascript
  var bitacora={
    actualizarEstudiante:function(){
        var idProgSesion = $('#txtIdProgramaSesion').val();
        var idEst = $('#txtIdEstudiante1').val();
        var idProg = $('#txtIdPrograma').val();
        var doc = $('#txtDocumentoEs').val();
        var celular = $('#txtCelularEs').val();
        var correo = $('#txtEmailEs').val();
        var res="";
        //console.log(idProgSesion+ " "+idEst+" "+idProg+" "+doc+" "+celular+" "+correo);
        $.ajax({
          url: url+"Bitacoras/actualizarBitacoraEstudiante",// ruta
          type: "POST",   // en que forma manda los parametros
          dataType: "json", // formato de datos
          data: {'idEst': idEst, 'celular': celular,'correo':correo } // parametro de agregar Funcion
        }).done(function(data){
          if (data=="1") {
            console.log("1");
          }
          else {
            console.log("0");
          }
          }).fail(function(error){
            console.log(error);
        });

    },
    actualizarEmpresa: function(){
      var idEmpresa = $('#txtIdEmpresa').val();
      var direccion = $('#DireccionE').val();
      var nomContacto = $('#ContactoE').val();
      var telefonoE = $('#TelefonoE').val();
      var correoE = $('#CorreoE').val();
      var cargoPracticante = $('#PracticanteE').val();
      //console.log(idEmpresa+ " "+direccion+" "+nomContacto+" "+telefonoE+" "+correoE+" "+cargoPracticante);
      $.ajax({
        url: url+"Bitacoras/actualizarDatosBitacora",// ruta
        type: "POST",   // en que forma manda los parametros
        dataType: "json", // formato de datos
        data: {'idEmpresa': idEmpresa, 'direccion': direccion,'correo':correoE, 'telefonoE': telefonoE, 'nomContacto':nomContacto, 'cargoPracticante': cargoPracticante} // parametro de agregar Funcion
      }).done(function(data){
        if (data=="1") {
          console.log("Bien");
        }
        else {
          console.log("Mal");
        }
        }).fail(function(error){
          console.log(error);
      });
    },
    registroSeguimiento: function(){
      var seguimientoBitacora = [];
      var seguimiento = new Array();
      var num = '<?php echo $num; ?>';
          var id="";
          for (var i = 0; i < num; i++) {
            var idS;
            var area;
            var desc;
            var calif;
            for (var j = 0; j < 4; j++) {
              switch (j) {
                case 0:
                  idS = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 1:
                  area = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 2:
                  desc = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#select'+i).val();
            seguimiento  = {"id":idS.trim() ,"area": area.trim(),"descripcion": desc.trim(), "calificacion": sele};
            seguimientoBitacora.push(seguimiento);
          }
            //console.log(seguimientoBitacora);
          $.ajax({
            // parametros para ejecutar las instrucciones
            url: url+"Bitacoras/registarBitacoraEvaluaciones",// ruta
            type: "POST",   // en que forma manda los parametros
            dataType: "json", // formato de datos
            data: {'seguimiento' : seguimientoBitacora} // parametro de agregar Funcion
          }).done(function(data){
            // respuesta correcta
            if (data=="1") {
              console.log("B");
            }
            else {
              console.log("M");
            }
            }).fail(function(error){
            // si pasa algo muestre el error
            console.log(error);
          });


    },
    registroFunciones: function(){
      var funcionesBitacora = [];
      var funciones = new Array();
      var numF = '<?php echo $numF; ?>';
          var id="";
          for (var i = 0; i < numF; i++) {
            var idS;
            var desc;
            var calif;
            for (var j = 0; j < 3; j++) {
              switch (j) {
                case 0:
                  idS = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
                case 1:
                  desc = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#selectf'+i).val();
            funciones  = {"id":idS.trim() ,"descripcion": desc.trim(), "calificacion": sele};
            funcionesBitacora.push(funciones);
          }
          //console.log(funcionesBitacora);
          $.ajax({
            // parametros para ejecutar las instrucciones
            url: url+"Bitacoras/registarBitacoraFunciones",// ruta
            type: "POST",   // en que forma manda los parametros
            dataType: "json", // formato de datos
            data: {'funciones': funcionesBitacora} // parametro de agregar Funcion
          }).done(function(data){
            // respuesta correcta
            if (data=="1") {
              console.log("FUN");
              swal({
                title: '¡Se ha registrado la Bitácora exitosamente!',
                text: '',
                type:'success',
                confirmButtonText: 'Aceptar',
                closeOnConfirm:false,
                closeOnCancel:false
              }, function (isConfirm){
                  if (isConfirm) {
                   //location.reload();
                   window.location.href = url+"Bitacoras/inicioBitacora";
                  }
              });
            }
            else {
              console.log("NO");
            }
            }).fail(function(error){
            // si pasa algo muestre el error
            console.log(error);
          });

    },
    registroCriterios: function(){
      var criteriosBitacora = [];
      var criterios = new Array();
      var numC = '<?php echo $numC; ?>';
          var id="";
          for (var i = 0; i < numC; i++) {
            var idS;
            var desc;
            var calif;
            for (var j = 0; j < 3; j++) {
              switch (j) {
                case 0:
                  idS = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
                case 1:
                  desc = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#selectc'+i).val();
            criterios  = {"id":idS.trim() ,"descripcion": desc.trim(), "calificacion": sele};
            criteriosBitacora.push(criterios);
          }
          console.log(criteriosBitacora);
    },
    registroBitacora: function(){
        var codigoGrupo =$('#txtFolioEs').val();
        var antBitacora = $('#txtNumBitacora').val();
        var actBitacora = "<?php echo $numBit; ?>";
        var convert = parseInt(actBitacora) + 1;
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var fecha = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;
        var observaciones = $('#txtObservaciones').val();
        var idPrograma =$('#txtIdPrograma').val();
        var idEstudiante =$('#txtIdEstudiante1').val();
        var idEmpresa =$('#txtIdEmpresa').val();
        //console.log(fecha+" "+codigoGrupo+" "+actBitacora+" "+observaciones+" "+idPrograma+" "+idEstudiante+" "+idEmpresa);
        $.ajax({
          // parametros para ejecutar las instrucciones
          url: url+"Bitacoras/registroBitacoraEstudiante",// ruta
          type: "POST",   // en que forma manda los parametros
          dataType: "json", // formato de datos
          data: {'fecha' : fecha, 'codigoGrupo':codigoGrupo, 'actBitacora': convert ,'observaciones': observaciones, 'idPrograma':idPrograma , 'idEstudiante': idEstudiante, 'idEmpresa': idEmpresa} // parametro de agregar Funcion
        }).done(function(data){
          // respuesta correcta
          if (data=="1") {
            console.log("Bien");
            // inhabilitar();
          }
          else {
            console.log("Mal");
          }
          }).fail(function(error){
          // si pasa algo muestre el error
          console.log(error);
        });
    }
  }

</script>

</body>
</html>
