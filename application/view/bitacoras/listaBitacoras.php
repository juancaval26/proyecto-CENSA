<!DOCTYPE html>
<html lang="es">
<head>
  <title>Estudiante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/css/color.css" rel="stylesheet">
  <link href="<?php echo URL; ?>Gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>Gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>bootstrap34/css/bootstrap.css" rel="stylesheet">
    <style media="screen">
    #detalleBitacora{
      overflow: auto;
      height: 400px;
    }
    </style>
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

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"> Bitácoras <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php for ($i=1; $i <= 6; $i++): ?>
            <?php if ($numBitacora+1 == $i): ?>
                <li><a  href="<?php echo URL; ?>bitacoras/datosEstudiante1">Bitácora <?php echo $i ?></a></li>
            <?php else: ?>
                <li><a class="enlace_desactivado" href="<?php echo URL; ?>bitacoras/datosEstudiante1">Bitácora <?php echo $i ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>
        </ul>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>Bitacoras/listaBitacorasEstudiante"> Lista Bitácoras</a>
        </li>
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
      <h2><i class=""></i> <center>Lista de Bitácoras </h2></center>
      <hr>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <?php if (count($bitacoras) == 0): ?>
                  <div class="row">
                    <div class="col-md-lg">
                      <div class="container">
                          <h3 style="text-align: center;"> No tiene Bitácoras registradas</h3>
                      </div>

                    </div>
                  </div>
              <?php else: ?>
           <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Número Bitácora</th>
                  <th>Fecha</th>
                  <th>Número Folio</th>
                  <th>Ver Datos</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($bitacoras as $data): ?>
                  <tr>
                    <td><?= $data['NumBitacora']; ?></td>
                    <td><?= $data['Fecha']; ?></td>
                    <td><?= $data['NumFolio']; ?></td>
                    <td>
                      <button type="button" onclick="verBitacora('<?= $data['IdBitacora']; ?>');"
                      class="btn btn-circle btn-xs btn-info" title="Ver Bitácora" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-eye"></i> </button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        <?php endif; ?>
        </div>
        </div>
      </div>
    </div>
</div>

</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title myModalLabel"> Detalles Bitácora N° <span id="txtNumBitacora"></span></h4>
      </div>
        <form class="demo-form" data-parsley-validate method="post">
      <div class="modal-body">
            <div class="container-fluid">
              <div class="panel-group" id="detalleBitacora">
                <div class="panel panel-default">
                  <div class="panel-heading">Estudiante</div>
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Documento:  </label><span id="txtDocumento"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Nombre :  </label><span id="txtNombres"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Teléfono:  </label><span id="txtTelefono"></span>

                            </div>
                          </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tipo Doc.:  </label><span id="txtTipoDoc"></span>
                          </div>
                          <div class="form-group">
                            <label for="">Apellidos:  </label><span id="txtApellidos"></span>
                          </div>
                          <div class="form-group">
                              <label for="">Celular:  </label><span id="txtCelular"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Folio:  </label><span id="txtFolio"></span>
                          </div>
                          <div class="form-group">
                            <label for="">Correo:  </label><span id="txtCorreo"></span>
                          </div>
                          <div class="form-group">
                              <label for="">Programa:  </label><span id="txtPrograma"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Empresa</div>
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nit:  </label><span id="txtNit"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Nombre Contacto :  </label><span id="txtNombreContacto"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Correo Contacto:  </label><span id="txtCorreoEmpresa"></span>

                            </div>
                            <div class="form-group">
                              <label for="">Modalidad Práctica:  </label><span id="txtModalidad"></span>

                            </div>
                          </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Razón Social:  </label><span id="txtEmpresa"></span>
                          </div>
                          <div class="form-group">
                            <label for="">Cargo Contacto:  </label><span id="txtCargoContacto"></span>
                          </div>
                          <div class="form-group">
                              <label for="">Fecha Inicio:  </label><span id="txtFechaInicio"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Dirección:  </label><span id="txtDireccionEmpresa"></span>
                          </div>
                          <div class="form-group">
                            <label for="">Teléfono Contacto:  </label><span id="txtTelefonoEmpresa"></span>
                          </div>
                          <div class="form-group">
                              <label for="">Fecha Finalización:  </label><span id="txtFechaFinalizacion"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Seguimiento</div>
                  <div class="panel-body">
                    <div class="table-responsive" >
                  <div id="tablaDetalleSeguimiento">
                    <table id="datatableS" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Area</th>
                          <th>Aspectos a Evaluar</th>
                          <th>Respuesta</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>

                  </div>
                </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Funciones</div>
                  <div class="panel-body">
                  <div class="table-responsive" >
                  <div id="tablaDetalleFunciones">
                    <table id="datatableF" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Función</th>
                          <th>Respuesta</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Observaciones</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="">Observaciones:  </label><span id="txtObservaciones"></span>
                    </div>

                  </div>
                </div>
              <?php if(1==1): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">Criterios a Evaluar</div>
                  <div class="panel-body">
                    <div class="table-responsive" >
                  <div id="tablaDetalleCriterios">
                    <table id="datatableC" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Criterio a Evaluar</th>
                          <th>Respuesta</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>

                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
        </form>
      </div>
    </div>
  </div>
<script src="<?php echo URL; ?>Gentelella/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  function verBitacora(id){
      $.ajax({
          url: url+"Bitacoras/getEstudianteBitacora",
          type: "POST",
          dataType: "json",
          data: {'id':id}
      }).done(function(bitacora){
        $.each(bitacora, function(index, valor){ // foreach
        //  alert(valor.Usuario+" \n"+valor.correo); //alerta
          $("#txtDocumento").text(" "+valor.Documento);
          $("#txtTipoDoc").text(" "+valor.DocumentoIdentidad);
          $("#txtNombres").text(" "+valor.Nombre);
          $("#txtApellidos").text(" "+valor.Apellido);
          $("#txtTelefono").text(" "+valor.Telefono);
          $("#txtCelular").text(" "+valor.Celular);
          $("#txtFolio").text(" "+valor.NumeroFolio);
          $("#txtCorreo").text(" "+valor.CorreoEstudiante);
          $("#txtPrograma").text(" "+valor.NombrePrograma);
          $("#txtNumBitacora").text(" "+valor.NumBitacora);
          var obs = valor.Observaciones;
          if (obs == null) {
            $("#txtObservaciones").text(" No hay observaciones");
          }else{
            $("#txtObservaciones").text(" "+obs);
          }
          //empresa
          $("#txtEmpresa").text(" "+valor.Empresa);
          $("#txtNit").text(" "+valor.Nit);
          $("#txtNombreContacto").text(" "+valor.NombreContacto);
          $("#txtCargoContacto").text(" "+valor.CargoContacto);
          $("#txtTelefonoEmpresa").text(" "+valor.TelefonoEmpresa);
          $("#txtCorreoEmpresa").text(" "+valor.CorreoEmpresa);
          $("#txtDireccionEmpresa").text(" "+valor.DireccionEmpresa);
          $("#txtFechaInicio").text(" "+valor.FechaInicio);
          $("#txtFechaFinalizacion").text(" "+valor.FechaFinalizacion);
          $("#txtModalidad").text(" "+valor.Modalidad);

        });
      }).fail(function(error){
            console.log(error);
      });
      $.ajax({
          url: url+"Bitacoras/getSeguimientoBitacora",
          type: "POST",
          dataType: "json",
          data: {'id':id}
      }).done(function(seguimiento){
          $('#datatableS tbody').empty();
        $.each(seguimiento, function(index, valor){ // foreach
          var fila = "<tr>";
          fila += '<td>'+valor.Area+'</td>';
          fila += '<td>'+valor.AspectosEvaluar+'</td>';
          fila += '<td>'+valor.Respuesta+'</td>';
          fila += "</tr>";
          $("#datatableS tbody").append(fila);
        });
      }).fail(function(error){
            console.log(error);
      });

      $.ajax({
          url: url+"Bitacoras/getFuncionesBitacora",
          type: "POST",
          dataType: "json",
          data: {'id':id}
      }).done(function(funciones){
          $('#datatableF tbody').empty();
        $.each(funciones, function(index, valor){ // foreach
          var fila = "<tr>";
          fila += '<td>'+valor.IdFuncion+'</td>';
          fila += '<td>'+valor.Descripcion+'</td>';
          fila += '<td>'+valor.Respuesta+'</td>';
          fila += "</tr>";
          $("#datatableF tbody").append(fila);
        });
      }).fail(function(error){
            console.log(error);
      });

      $.ajax({
          url: url+"Bitacoras/getCriteriosBitacora",
          type: "POST",
          dataType: "json",
          data: {'id':id}
      }).done(function(criterios){
          $('#datatableC tbody').empty();
        $.each(criterios, function(index, valor){ // foreach
          var fila = "<tr>";
          fila += '<td>'+valor.IdCriteriosEvaluar+'</td>';
          fila += '<td>'+valor.CriterioEvaluar+'</td>';
          fila += '<td>'+valor.Respuesta+'</td>';
          fila += "</tr>";
          $("#datatableC tbody").append(fila);
        });
      }).fail(function(error){
            console.log(error);
      });
  }
</script>
</body>
</html>
