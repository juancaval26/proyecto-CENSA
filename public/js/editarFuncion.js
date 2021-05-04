function editarFuncion(id){
//ajax cuerpo
$.ajax({
  // parametros para ejecutar las instrucciones
  url: url+"Funciones/FuncionesId",// ruta
  type: "POST",   // en que forma manda los parametros
  dataType: "json", // formato de datos
  data: {'id' : id} // parametro id de la funcion datosUsuarios
}).done(function(data){
  // respuesta correcta
  $.each(data, function(index, valor){ // foreach
  //  alert(valor.Usuario+" \n"+valor.correo); //alerta
  $("#txtIdFuncion").val(valor.IdFuncion);
  $("#txtDescricion").val(valor.Descripcion);
  $("#selPrograma").val(valor.IdPrograma);
    })
  }).fail(function(error){
  // si pasa algo muestre el error
  console.log(error);
})
}
