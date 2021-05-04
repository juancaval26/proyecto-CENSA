function editarDatos(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Bitacoras/traerDato",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdEstudiante").val(valor.idEstudiantesProgramas);
  $("#txtPrograma").val(valor.NombrePrograma);
  $("#txtTipoDocumento").val(valor.Documento);
  $("#txtDocumento").val(valor.DocumentoIdentidad);
  // $("#txtTelefono2").val(valor.direccion);
    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
