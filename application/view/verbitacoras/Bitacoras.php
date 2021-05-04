<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Buscar</h2>
        <!-- <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul> -->
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
    <form action="/hms/accommodations" method="GET">
        <div class="col-md-4">
           <label for="">Documento</label>
          <div class="input-group">
             <input type="text" class="form-control" placeholder="Documento" id="txtSearch"/>
            <div class="input-group-btn">
              <button class="btn btn-success" id="buscar" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label for="">Programas</label>
            <select class="form-control" id="programas" name="txtPrograma" disabled required>
              <option value="" selected="selected">Seleccionar</option>
            </select>
          </div>
        </div>
    </form>
    </div>
    </div>
  </div>
  <div class="col-md-4">

  </div>
</div>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Visualizar Bitácoras Estudiantes </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive">
        <table id="datatable1" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Tipo Documento</th>
              <th>Documento</th>
              <th>Nombre Completo</th>
              <th>Numero de Folio</th>
              <th>Fecha Bitácora</th>
              <th>Numero de Bitácora</th>
              <th>Acción</th>

            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
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



<script>
  $("#buscar").click(function() {
    var doc = $("#txtSearch").val();
    $.ajax({
            type:"POST",
            url:url+"Verbitacoras/listaProgramasEstudiantes",
            data:{'doc':doc},
            dataType: "json"
          }).done(function(respuesta){
            if(respuesta){
              $("#programas").empty();
              $("#programas").append('<option value="" selected="selected">Seleccionar</option>');
              $.each(respuesta,function(index, valor){ // indice, valor
                        $("#programas").append('<option value="' + valor.IdPrograma + '">' + valor.NombrePrograma + '</option>');
                    });
              $("#programas").prop('disabled', false);
            }else {
              swal({
                title: "¡Documento no existente!",
              type: "warning",
              confirmButton: "#3CB371",
              confirmButtonText: "Aceptar",
              // confirmButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: false
              });
              console.log(respuesta);
              $("#programas").prop('disabled', true);
              $("#programas").empty();
            }
            //console.log(respuesta);

          }).fail(function(error){
              console.log(error);
          })

  });

  // $("#programas").change(function() {
  //    alert(":)");
  // });

$("#programas").change(function() {
    var doc = $('#txtSearch').val();
    var prog = $('#programas').val();
    // alert(doc+' '+prog);
    $.ajax({
        // parametros para ejecutar las instrucciones
        url: url+"Verbitacoras/ListarBitacorasEstudianteP",// ruta
        type: "POST",   // en que forma manda los parametros
        dataType: "json", // formato de datos
        data: {'doc' : doc, 'prog' : prog} // parametro de agregar Funcion
        // respuesta correcta
    }).done(function(bitacoras){
        //respuesta todo bien
        if(bitacoras){
            var fila="";
            $.each(bitacoras, function(index, valor){ // foreach

                var tipoDocumento = '<td>'+valor.DocumentoIdentidad+'</td>';
                var documento = '<td>'+valor.Documento+'</td>';
                var NombreC = '<td>'+valor.NombreCompleto+'</td>';
                var NumF = '<td>'+valor.NumFolio+'</td>';
                var Fecha = '<td>'+valor.Fecha+'</td>';
                var NumB = '<td>'+valor.NumBitacora+'</td>';
                // var IdB = '<td>'+valor.NombreCompleto+'</td>';

                var ver = '<td><button type="button" onclick="verBitacora('+valor.IdBitacora+');" class="btn btn-circle btn-xs btn-info" title="Ver Bitácora" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-eye"></i> </button></td>';
                fila += "<tr> "+tipoDocumento+documento+NombreC+NumF+Fecha+NumB+ver+" </tr>";

                  });
                $('#datatable1 tbody').empty();
                $('#datatable1 tbody').append(fila);
                  console.log(bitacoras);
          }else {
            swal({
                title: "¡No hay bitácoras registradas!",
              type: "warning",
              confirmButton: "#3CB371",
              confirmButtonText: "Aceptar",
              // confirmButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: false
              });
            console.log(bitacoras);
            $("#datatable1").empty();
          }
          //console.log(respuesta);


      }).fail(function(error){
        //errores
        console.log(error);
      });
    });

</script>


<script type="text/javascript">
  function verBitacora(id){
      $.ajax({
          url: url+"Verbitacoras/getEstudianteBitacora",
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
          url: url+"Verbitacoras/getSeguimientoBitacora",
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
          url: url+"Verbitacoras/getFuncionesBitacora",
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
          url: url+"Verbitacoras/getCriteriosBitacora",
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
