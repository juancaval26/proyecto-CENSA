function eliminarPrograma(id){
    swal({
    title: "¿Realmente desea cambiar Eliminar La Evaluacion?",
    type: "warning",
    confirmButton: "#3CB371",
    confirmButtonText: "btn-danger",
    cancelButtonText: "Cancelar",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Aceptar",
    closeOnConfirm: false,

},
function(isConfirm){
  if (isConfirm) {
    swal({
      title: "Programa Eliminado.!",
      type: "success",
      confirmButton: "#3CB371",
      confirmButtonText: "Aceptar",
      // confirmButtonText: "Cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm){
      $.ajax({
        type:"POST",
        url:url+"Programa/eliminarPrograma",
        data:{'id':id},
        dataType: "json"
      }).done(function(programa){
        if(programa == 1){
          window.location = url+"Programa/adminPrograma";
        }else{
        sweetAlert("Error al Eliminar El programa");
        console.log(evaluacion);
        }
      }).fail(function(){
        sweetAlert("Error al Eliminar El programa");
      })

    });
  }
  });
}