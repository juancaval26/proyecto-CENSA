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
