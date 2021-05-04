
function eliminarCargo(id){
    swal({
    title: "¿Realmente Desea Eliminar El Cargo?",
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
      title: "Cargo Eliminado.!",
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
        url:url+"Cargos/eliminarCargo",
        data:{'id':id},
        dataType: "json"
      }).done(function(cargo){
        if(cargo == 1){
          window.location = url + "Cargos/crearCargo";
        }else{
        sweetAlert("Error al Eliminar el Cargo");
        }
      }).fail(function(){

      })

    });
  }
  });
}