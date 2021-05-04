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
  $("#tipCargo").val(valor.IdCargo);
  $("#txtTelefono1").val(valor.Telefono);
  $("#txtCelular1").val(valor.Celular);
  $("#tipDoc").val(valor.IdTipoDocumento);
  $("#txtDocumentoEmpleado").val(valor.Documento);
  $("#tipCargo").val(valor.IdCargo);
  $("#txtUsuario").val(valor.Usuario);
  $("#tipRol").val(valor.IdRol);
});
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
});
}
