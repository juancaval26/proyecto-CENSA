function eliminarEvaluacion(id){
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
      title: "Evaluacion Eliminada.!",
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
        url:url+"Evaluaciones/eliminarEvaluacion",
        data:{'id':id},
        dataType: "json"
      }).done(function(evaluacion){
        if(evaluacion == 1){
          window.location = url+"Evaluaciones/aspectoEvaluar";
        }else{
        sweetAlert("Error al Eliminar la Evaluacion");
        console.log(evaluacion);
        }
      }).fail(function(){
        sweetAlert("Error al Eliminar la Evaluacion");
      })

    });
  }
  });
}
