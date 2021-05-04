function editarCargo(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Cargos/editarCargo",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdCargo1").val(valor.IdCargo);
  $("#txtCargo1").val(valor.Cargo);

    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
