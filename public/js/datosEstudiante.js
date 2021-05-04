//funciones por eventos
function inhabilitar(){

$("#guardarBitacora").prop('disabled', true);

}
function guardarBitacora(event){
  bitacora.registroBitacora();
  bitacora.actualizarEstudiante();
  bitacora.actualizarEmpresa();
  bitacora.registroSeguimiento();
  bitacora.registroFunciones();

  event.preventDefault();
}


//objetos en javascript
  var bitacora={
    actualizarEstudiante:function(){
        var idProgSesion = $('#txtIdProgramaSesion').val();
        var idEst = $('#txtIdEstudiante1').val();
        var idProg = $('#txtIdPrograma').val();
        var doc = $('#txtDocumentoEs').val();
        var celular = $('#txtCelularEs').val();
        var correo = $('#txtEmailEs').val();
        var res="";
        $.ajax({
          url: url+"Bitacoras/actualizarBitacoraEstudiante",// ruta
          type: "POST",   // en que forma manda los parametros
          dataType: "json", // formato de datos
          data: {'idEst': idEst, 'celular': celular,'correo':correo } // parametro de agregar Funcion
        }).done(function(data){
          if (data=="1") {
            console.log("1");
          }
          else {
            console.log("0");
          }
          }).fail(function(error){
            console.log(error);
        });

    },
    actualizarEmpresa: function(){
      var idEmpresa = $('#txtIdEmpresa').val();
      var direccion = $('#DireccionE').val();
      var nomContacto = $('#ContactoE').val();
      var telefonoE = $('#TelefonoE').val();
      var correoE = $('#CorreoE').val();
      var cargoPracticante = $('#PracticanteE').val();
      $.ajax({
        url: url+"Bitacoras/actualizarDatosBitacora",// ruta
        type: "POST",   // en que forma manda los parametros
        dataType: "json", // formato de datos
        data: {'idEmpresa': idEmpresa, 'direccion': direccion,'correo':correoE, 'telefonoE': telefonoE, 'nomContacto':nomContacto, 'cargoPracticante': cargoPracticante} // parametro de agregar Funcion
      }).done(function(data){
        if (data=="1") {
          alert("Bien");
        }
        else {
          alert("Mal");
        }
        }).fail(function(error){
          console.log(error);
      });
    },
    registroSeguimiento: function(){
      var seguimientoBitacora = [];
      var seguimiento = new Array();
      var num = '<?php echo $num; ?>';
          var id="";
          for (var i = 0; i < num; i++) {
            var idS;
            var area;
            var desc;
            var calif;
            for (var j = 0; j < 4; j++) {
              switch (j) {
                case 0:
                  idS = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 1:
                  area = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 2:
                  desc = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.n'+j).parents("tr").find(".n"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#select'+i).val();
            seguimiento  = {"id":idS.trim() ,"area": area.trim(),"descripcion": desc.trim(), "calificacion": sele};
            seguimientoBitacora.push(seguimiento);
          }
          $.ajax({
            // parametros para ejecutar las instrucciones
            url: url+"Bitacoras/registarBitacoraEvaluaciones",// ruta
            type: "POST",   // en que forma manda los parametros
            dataType: "json", // formato de datos
            data: {'seguimiento' : seguimientoBitacora} // parametro de agregar Funcion
          }).done(function(data){
            // respuesta correcta
            if (data=="1") {
              console.log("B");
            }
            else {
              console.log("M");
            }
            }).fail(function(error){
            // si pasa algo muestre el error
            console.log(error);
          });


    },
    registroFunciones: function(){
      var funcionesBitacora = [];
      var funciones = new Array();
      var numF = '<?php echo $numF; ?>';
          var id="";
          for (var i = 0; i < numF; i++) {
            var idS;
            var desc;
            var calif;
            for (var j = 0; j < 3; j++) {
              switch (j) {
                case 0:
                  idS = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
                case 1:
                  desc = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.nf'+j).parents("tr").find(".nf"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#selectf'+i).val();
            funciones  = {"id":idS.trim() ,"descripcion": desc.trim(), "calificacion": sele};
            funcionesBitacora.push(funciones);
          }
          $.ajax({
            // parametros para ejecutar las instrucciones
            url: url+"Bitacoras/registarBitacoraFunciones",// ruta
            type: "POST",   // en que forma manda los parametros
            dataType: "json", // formato de datos
            data: {'funciones': funcionesBitacora} // parametro de agregar Funcion
          }).done(function(data){
            // respuesta correcta
            if (data=="1") {
              console.log("FUN");
              swal({
                title: '¡Se ha registrado la Bitácora exitosamente!',
                text: '',
                type:'success',
                confirmButtonText: 'Aceptar',
                closeOnConfirm:false,
                closeOnCancel:false
              }, function (isConfirm){
                  if (isConfirm) {
                   //location.reload();
                   window.location.href = url+"Bitacoras/inicioBitacora";
                  }
              });
            }
            else {
              console.log("NO");
            }
            }).fail(function(error){
            // si pasa algo muestre el error
            console.log(error);
          });

    },
    registroCriterios: function(){
      var criteriosBitacora = [];
      var criterios = new Array();
      var numC = '<?php echo $numC; ?>';
          var id="";
          for (var i = 0; i < numC; i++) {
            var idS;
            var desc;
            var calif;
            for (var j = 0; j < 3; j++) {
              switch (j) {
                case 0:
                  idS = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
                case 1:
                  desc = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
                case 2:
                  calif = $('.nC'+j).parents("tr").find(".nC"+j).eq(i).text();
                  break;
              }
            }
            var sele = $('#selectc'+i).val();
            criterios  = {"id":idS.trim() ,"descripcion": desc.trim(), "calificacion": sele};
            criteriosBitacora.push(criterios);
          }
          console.log(criteriosBitacora);
    },
    registroBitacora: function(){
        var codigoGrupo =$('#txtFolioEs').val();
        var antBitacora = $('#txtNumBitacora').val();
        var actBitacora = "<?php echo $numBit; ?>";
        var convert = parseInt(actBitacora) + 1;
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var fecha = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;
        var observaciones = $('#txtObservaciones').val();
        var idPrograma =$('#txtIdPrograma').val();
        var idEstudiante =$('#txtIdEstudiante1').val();
        var idEmpresa =$('#txtIdEmpresa').val();
        $.ajax({
          // parametros para ejecutar las instrucciones
          url: url+"Bitacoras/registroBitacoraEstudiante",// ruta
          type: "POST",   // en que forma manda los parametros
          dataType: "json", // formato de datos
          data: {'fecha' : fecha, 'codigoGrupo':codigoGrupo, 'actBitacora': convert ,'observaciones': observaciones, 'idPrograma':idPrograma , 'idEstudiante': idEstudiante, 'idEmpresa': idEmpresa} // parametro de agregar Funcion
        }).done(function(data){
          // respuesta correcta
          }).fail(function(error){
          // si pasa algo muestre el error
          console.log(error);
        });
    }
  }
  // otra funcion
  window.addEventListener("load", function(event) {
    // var valores = "";
      /* Por cada columna */
        $('#tablaSeguimiento tr').each(function(){

            /* Obtener todas las celdas */
            var celdas = $(this).find('td');

            /* Mostrar el valor de cada celda */
            celdas.each(function(){ console.log($(celdas[1]).text()); });
            console.log( $(celdas[0]).text());
        });

        var celdas = $('#tablaSeguimiento tr').find('td');
        $(".numero").each(function(){
          var id = $(celdas[2]).text();
           seguimiento = {"id": id};
         });
        console.log(seguimiento);
  });
