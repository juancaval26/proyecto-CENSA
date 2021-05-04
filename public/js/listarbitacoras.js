$("#programas").change(function() {
    var doc = $('#txtSearch').val();
    var prog = $('#programas').val();
    alert(doc+' '+prog);
    $.ajax({
        // parametros para ejecutar las instrucciones
        url: url+"Verbitacoras/ListarBitacorasEstudianteP",// ruta
        type: "POST",   // en que forma manda los parametros
        dataType: "json", // formato de datos
        data: {'doc' : doc, 'prog' : prog} // parametro de agregar Funcion
        // respuesta correcta
    }).done(function(respuesta){
        //respuesta todo bien
        if(respuesta){
            var fila="";
            $.each(respuesta, function(index, valor){ // foreach

                var tipoDocumento = '<td>'+valor.DocumentoIdentidad+'</td>';
                var documento = '<td>'+valor.Documento+'</td>';
                var NombreC = '<td>'+valor.NombreCompleto+'</td>';
                var NumF = '<td>'+valor.NumFolio+'</td>';
                var NumB = '<td>'+valor.NumBitacora+'</td>';
                // var IdB = '<td>'+valor.NombreCompleto+'</td>';
                var ver = '<td><button type="button" onclick="VerBitacora('+valor.IdBitacora+')" class="btn btn-round btn-info"name="button" data-toggle="tooltip" data-placement="right" title="Ver Bitacora"> <i class="fa fa-eye"></i> </button></td>';
                fila += "<tr> "+tipoDocumento+documento+NombreC+NumF+NumB+ver+" </tr>";
                  });
                $('#datatable1 tbody').append(fila);

          }else {
            alert('¡No existen bitácoras registradas para el estudiante con documento'+documento);
            console.log(respuesta);
            $("#datatable1").empty();
          }
          //console.log(respuesta);


      }).fail(function(error){
        //errores
        console.log(error);
      });
    });



    function verBitacora(id){
        $.ajax({
            url: url+"Bitacoras/getEstudianteBitacora",
            type: "POST",
            dataType: "json",
            data: {'id':id}
        }).done(function(bitacora){
          $.each(bitacora, function(index, valor){ // foreach
          //  alert(valor.Usuario+" \n"+valor.correo); //alerta
            $("#txtDocumento").text(" "+valor.Documento);
            $("#txtTipoDoc").text(" "+valor.DocumentoIdentidad);
            $("#txtNombres").text(" "+valor.Nombre);
            $("#txtApellidos").text(" "+valor.Apellido);
            $("#txtTelefono").text(" "+valor.Telefono);
            $("#txtCelular").text(" "+valor.Celular);
            $("#txtFolio").text(" "+valor.NumeroFolio);
            $("#txtCorreo").text(" "+valor.CorreoEstudiante);
            $("#txtPrograma").text(" "+valor.NombrePrograma);
            $("#txtNumBitacora").text(" "+valor.NumBitacora);
            var obs = valor.Observaciones;
            if (obs == null) {
              $("#txtObservaciones").text(" No hay observaciones");
            }else{
              $("#txtObservaciones").text(" "+obs);
            }
            //empresa
            $("#txtEmpresa").text(" "+valor.Empresa);
            $("#txtNit").text(" "+valor.Nit);
            $("#txtNombreContacto").text(" "+valor.NombreContacto);
            $("#txtCargoContacto").text(" "+valor.CargoContacto);
            $("#txtTelefonoEmpresa").text(" "+valor.TelefonoEmpresa);
            $("#txtCorreoEmpresa").text(" "+valor.CorreoEmpresa);
            $("#txtDireccionEmpresa").text(" "+valor.DireccionEmpresa);
            $("#txtFechaInicio").text(" "+valor.FechaInicio);
            $("#txtFechaFinalizacion").text(" "+valor.FechaFinalizacion);
            $("#txtModalidad").text(" "+valor.Modalidad);

          });
        }).fail(function(error){
              console.log(error);
        });
        $.ajax({
            url: url+"Bitacoras/getSeguimientoBitacora",
            type: "POST",
            dataType: "json",
            data: {'id':id}
        }).done(function(seguimiento){
            $('#datatableS tbody').empty();
          $.each(seguimiento, function(index, valor){ // foreach
            var fila = "<tr>";
            fila += '<td>'+valor.Area+'</td>';
            fila += '<td>'+valor.AspectosEvaluar+'</td>';
            fila += '<td>'+valor.Respuesta+'</td>';
            fila += "</tr>";
            $("#datatableS tbody").append(fila);
          });
        }).fail(function(error){
              console.log(error);
        });

        $.ajax({
            url: url+"Bitacoras/getFuncionesBitacora",
            type: "POST",
            dataType: "json",
            data: {'id':id}
        }).done(function(funciones){
            $('#datatableF tbody').empty();
          $.each(funciones, function(index, valor){ // foreach
            var fila = "<tr>";
            fila += '<td>'+valor.IdFuncion+'</td>';
            fila += '<td>'+valor.Descripcion+'</td>';
            fila += '<td>'+valor.Respuesta+'</td>';
            fila += "</tr>";
            $("#datatableF tbody").append(fila);
          });
        }).fail(function(error){
              console.log(error);
        });

        $.ajax({
            url: url+"Bitacoras/getCriteriosBitacora",
            type: "POST",
            dataType: "json",
            data: {'id':id}
        }).done(function(criterios){
            $('#datatableC tbody').empty();
          $.each(criterios, function(index, valor){ // foreach
            var fila = "<tr>";
            fila += '<td>'+valor.IdCriteriosEvaluar+'</td>';
            fila += '<td>'+valor.CriterioEvaluar+'</td>';
            fila += '<td>'+valor.Respuesta+'</td>';
            fila += "</tr>";
            $("#datatableC tbody").append(fila);
          });
        }).fail(function(error){
              console.log(error);
        });


    }
