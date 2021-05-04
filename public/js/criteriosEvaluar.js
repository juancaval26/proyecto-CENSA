function criterio(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"CriteriosEvaluar/criterioId",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  $("#txtIdCriteriosEvaluar").val(valor.IdCriteriosEvaluar);
  $("#txtCriterioEvaluar").val(valor.CriterioEvaluar);
    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
