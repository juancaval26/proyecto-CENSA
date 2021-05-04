<div class="row">
  <div class="col-md-4 col-sm-5 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Registro de Funciones<small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <!-- start form for validation -->
        <form id="demo-form" data-parsley-validate method="post">
          <div class="form-group">
            <label for="email">Nombre Función *:</label>
            <textarea name="txtFuncion" rows="4" cols="80" id="txtFuncion" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="email">Nombre Programa *:</label>
            <select class="form-control" name="selPrograma" id="selPrograma">
              <option value="" selected="selected">Seleccione</option>
              <?php foreach ($programas as $value): ?>
                  <option value="<?= $value['IdPrograma']; ?>"><?= $value['NombrePrograma']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
              <button type="button" name="btnAgregar" onclick="agregar();" class="btn btn-primary pull-right">Agregar</button>
        </form>
        <!-- end form for validations -->
    </div>
  </div>
  </div>
  <div class="col-md-8 col-sm-7 col-xs-12">

    <div class="x_panel">
      <div class="x_title">
        <h2>Detalle de Funciones por Programa</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive" >
          <div id="tablaDetalleFunciones">
        <table id="datatable2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Código </th>
              <th>Función</th>
              <th>Programa </th>
              <th>Quitar</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>

      </div>
        <button type="button" name="btnCrearF" onclick="guardar();" class="btn btn-primary pull-right">Guardar</button>

      </div>
    </div>

  </div>

</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Lista de Programas con Funciones </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Código</th>
              <th>Programa</th>
              <th>Funciones</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($funciones as $value): ?>
              <tr>
                <td><?= $value['Codigo']; ?></td>
                <td><?= $value['NombrePrograma']; ?></td>
                <td><?= $value['cantidad']; ?></td>
                <td>
                  <button type="button" onclick="listarFunciones('<?php echo $value['IdPrograma']; ?>');"class="btn btn-circle btn-xs btn-info" title="Ver Funciones" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-eye"></i> </button>
                  <!-- <button type="button" onclick="eliminarF(<?php echo $value['IdPrograma']; ?>);" class="btn btn-circle btn-xs btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button> -->
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Funciones</h4>
      </div>

        <form id="demo-form" data-parsley-validate method="post">
          <div class="modal-body">
          <div class="form-group">
            <label>Nombre Programa : <span id="nombrePrograma"></span> </label>
            <hr>
          </div>
          <input hidden type="number" name="txtIdPrograma" id="txtIdPrograma" value="">
          <div class="form-group">
            <label for="">Funciones</label>
            <hr>
            <div id="funciones">
                <table class="table table-bordered" id="datatableFuncion">
                  <thead>
                    <th>Código</th>
                    <th>Función</th>
                    <th>Eliminar</th>
                  </thead>
                  <tbody>

                  </tbody>
                </table><!--foreach con ajax-->
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="editarFunciones();" name="btnActualizarF" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="<?php echo URL; ?>js/editarFuncion.js"></script>
<script src="<?php echo URL; ?>js/agregarFuncion.js"></script>
<script type="text/javascript">
function guardar(){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Funciones/registroFuncion",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'funciones' : funciones} // parametro de agregar Funcion
}).done(function(data){
  // respuesta correcta
  if (data=="1") {
    swal({
      title: '¡Registro Exitoso!',
      text: '',
      type:'success',
      confirmButtonText: 'Aceptar',
      closeOnConfirm:false,
      closeOnCancel:false
    }, function (isConfirm){
        if (isConfirm) {
         location.reload();
        }
    });
  }
  else {
    swal({
      title: '¡Error al Registrar!',
      text: 'Hubo un Error al Regristrar las Funciones, Comunicarse con Soporte Técnico al Correo ',
      type:'error',
      confirmButtonText: 'Aceptar',
      closeOnConfirm:false,
      closeOnCancel:false
    });
  }
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
});
}
</script>
<script type="text/javascript">
    var datos = [];
    function listarFunciones(id){
      //alert(id);
      datos=[];
      datos.length=0;
      $.ajax({
        url: url+"Funciones/FuncionesPrograma",
        type: "post",
        dataType: "json",
        data: {"id":id}
      }).done(function(funciones){
         //console.log(funciones);
         var array = new Array();
         $('#datatableFuncion tbody').empty();
        $.each(funciones, function(index, valor){
          $('#nombrePrograma').text(valor.NombrePrograma);
          $('#txtIdPrograma').val(valor.IdPrograma);
          var funcion = "<tr>";
          funcion += '<td>'+valor.IdFuncion+'</td>';
          funcion += '<td><textarea id="txt'+valor.IdFuncion+'" class="form-control" rows="2" onkeyup="cambios('+valor.IdFuncion+');">'+valor.Descripcion+'</textarea></td>';
          funcion += '<td><button type="button" class="btn btn-round btn-danger"name="button" onclick="eliminarFuncion('+valor.IdFuncion+','+valor.IdPrograma+')" data-toggle="tooltip" data-placement="right" title="Eliminar"> <i class="fa fa-trash"></i> </button></td>';
          funcion += "</tr>";
          //$("#detalles tbody").empty();
          $("#datatableFuncion tbody").append(funcion);
          array  = {"id":valor.IdFuncion, "funcion": valor.Descripcion, "idprograma": valor.IdPrograma};
          datos.push(array);
          array = new Array();
          console.log(datos);
        });
      }).fail(function(error){
         console.log(error);
      });
    }
</script>

<script type="text/javascript">

function editarFunciones(){
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Funciones/editarFuncion",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'datos' : datos} // parametro de agregar Funcion
}).done(function(data){
  // respuesta correcta
  if (data=="1") {
    swal({
      title: '¡Cambios realizados exitosamente!',
      text: '',
      type:'success',
      confirmButtonText: 'Aceptar',
      closeOnConfirm:false,
      closeOnCancel:false
    }, function (isConfirm){
        if (isConfirm) {
         location.reload();
        }
    });
  }
  else {
    swal({
      title: '¡Error al Registrar!',
      text: 'Hubo un error al realizar los cambios, Comunicarse con soporte técnico al correo ',
      type:'error',
      confirmButtonText: 'Aceptar',
      closeOnConfirm:false,
      closeOnCancel:false
    });
  }
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
});
}
</script>

<script type="text/javascript">
  function cambios(id){
    var valorNew = $("#txt"+id).val();
    $.each(datos, function(index, valor){
      if (valor.id == id) {
        valor.funcion = valorNew;
      }
    });
    $.each(datos, function(index, valor){
      console.log(valor.id+" "+valor.funcion+" "+valor.idprograma);
    });
  }
</script>

<script type="text/javascript">
  function eliminarFuncion(id, idP){
    //alert(id+" "+idP);

    swal({
      title: "¿Estas seguro de eliminar la función?",
      type: "warning",
      cancelButtonText: "Cancelar",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Aceptar",
      closeOnConfirm: false
    },
    function(isConfirm){
      if (isConfirm) {
        swal({
          title: "¡Función eliminada!",
          type: "success",
          confirmButtonText: "Aceptar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){

              $.ajax({
                // parametros para ejecutar las instrucciones
                url: url+"Funciones/eliminarFuncion",// ruta
                type: "POST",   // en que forma manda los parametros
                dataType: "json", // formato de datos
                data: {'id' : id, 'idP': idP} // parametro de agregar Funcion
              }).done(function(data){
                  //console.log(data);
                  listarFunciones(idP);
                  swal.close()
              }).fail(function(error){
                // si pasa algo muestre el error
                console.log(error);
              });
        }
      );
      }
    }

    );
  }
</script>
