function eliminarCriterio(id){
    swal({
    title: "¿Realmente desea cambiar Eliminar el Criterio a Evaluar?",
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
      title: "Criterio a Evaluar Eliminado.!",
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
        url:url+"CriteriosEvaluar/eliminarCriterio",
        data:{'id':id},
        dataType: "json"
      }).done(function(criterio){
        if(criterio == 1){
          window.location = url+"CriteriosEvaluar/criterios";
        }else{
        sweetAlert("Error al Eliminar El Criterio a Evaluar");
        console.log(evaluacion);
        }
      }).fail(function(){
        sweetAlert("Error al Eliminar El Criterio a Evaluar");
      })

    });
  }
  });
}