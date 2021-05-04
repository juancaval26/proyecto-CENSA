function editeDesempenio(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"FuncionesDesempenio/desempenioId",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdDesempenio").val(valor.IdDesempenio);
  $("#txtDesempenio1").val(valor.funciones);
    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}

// hay 2 maneras
// function editarValoracion(id, saber, saberHacer, hacer, ser)
// {
//
//   $("#txtIdEvaluacion").val(id);
//   $("#txtsaber1").val(saber);
//   $("#txtSaberHacer2").val(saberHacer);
//   $("#txtHacer2").val(hacer);
//   $("#txtSer2").val(ser);
//
// }
