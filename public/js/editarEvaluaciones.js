function editarEvaluacion(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Evaluaciones/valoracionesId",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdEvaluacion").val(valor.IdEvaluacion);
  $("#txtAreaE").val(valor.Area);
  $("#txtAspectosE").val(valor.AspectosEvaluar);
  $("#txtDescripcionE").val(valor.Descripcion);
  })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
