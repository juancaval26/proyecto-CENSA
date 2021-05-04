function editarEstudiante(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Estudiantes/editarEstudiante",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  $("#txtIdEstudiante").val(valor.IdEstudiante);
  $("#txtDocumento2").val(valor.Documento);
  $("#tipDoc").val(valor.IdTipoDocumento);
  $("#txtNombre2").val(valor.Nombre);
  $("#txtApellido2").val(valor.Apellido);
  $("#txtTelefono2").val(valor.Telefono);
  $("#txtCelular2").val(valor.Celular);
  $("#txtCorreo2").val(valor.CorreoEstudiante);
  $("#txtUsuario").val(valor.Usuario);
  $("#txtEmpresa").val(valor.Empresa);
  $("#txtNit").val(valor.Nit);
  $("#txtNombreContacto").val(valor.NombreContacto);
  $("#txtCargoContacto").val(valor.CargoContacto);
  $("#txtTelefonoEmpresa").val(valor.TelefonoEmpresa);
  $("#txtCorreoContacto").val(valor.CorreoEmpresa);
  $("#txtDireccionEmpresa").val(valor.DireccionEmpresa);
  $("#txtCargoPracticante").val(valor.CargoPracticante);
  $("#txtFechaI").val(valor.FechaInicio);
  $("#txtFechaF").val(valor.FechaFinalizacion);
  $("#txtModalidad").val(valor.Modalidad);
  $("#txtFolio").val(valor.NumeroFolio);
  $("#txtPrograma").val(valor.IdPrograma);

});
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
});
}
