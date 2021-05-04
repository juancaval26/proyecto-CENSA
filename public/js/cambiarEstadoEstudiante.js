function cambiarEstado(id){
    
    swal({
      title: "¿Realmente desea cambiar el estado del estudiante?",
      type: "warning",
      confirmButton: "#3CB371",
      confirmButtonText: "btn-success",
      cancelButtonText: "Cancelar",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Aceptar",
      closeOnConfirm: false

    },
    function(isConfirm){
        if (isConfirm) {
          swal({
            title: "Estado cambiado.!",
            type: "success",
            confirmButton: "#3CB371",
            confirmButtonText: "btn-success",
            confirmButtonText: "Aceptar",
            // confirmButtonText: "Cancelar",
            closeOnConfirm: true,
            closeOnCancel: false
          },
          function(isConfirm){
            $.ajax({
              type:"POST",
              url:url+"Estudiantes/cambiarEE",
              data:{'id':id},
              dataType: "json"
            }).done(function(respuesta){
              if(respuesta == "1"){
                 console.log("Ok");//window.location = url + "usuarioController/listarUsuarios";
                 location.reload();
              }else{
                swal({
                  title: "Error!!",
                  text: "Error al cambiar el estado del empleado por favor comuniquese con soporte al correo ",
                  type:"error",
                  confirmButtonText: "Aceptar",
                  closeOnConfirm:false,
                  closeOnCancel:false
                });
              }
            }).fail(function(error){
                console.log(error);
            })

          });
        }
    });

}
