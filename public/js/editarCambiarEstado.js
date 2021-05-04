function cambiarEstado(id){
    //ajax al lado del cliente
    $.ajax({
      url: url + "Empleados/cambiarEE",
      method: "post",
      dataType: "json",
      data: {'id': id}
      //parametros para peticion
    }).done(function(res){
      //respuesta todo bien
      if (res == "1") {
        alert("El estado con el "+id+ " ha sido cambiado");
        location.reload();
      }else{
        alert("Error");
      }
    }).fail(function(error){
      //errores
      console.log(error);
    });

}

function editarEmpleado(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Empleados/empleadoId",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdEmpleado").val(valor.IdEmpleado);
  $("#txtNombreEmpleado").val(valor.Nombre);
  $("#txtApellidoEmpleado").val(valor.Apellido);
  $("#txtCorreoEmpleado").val(valor.Correo);
  $("#txtCargoEmpleado").val(valor.Cargo);
  $("#txtTelefono1").val(valor.TelefonoEmpresa);
  $("#txtCelular1").val(valor.Celular);
  $("#txtTipoDocumentoEmpleado").val(valor.DocumentoIdentidad);
  $("#txtDocumentoEmpleado").val(valor.Documento);
    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
