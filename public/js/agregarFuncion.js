var id = 0;
var funciones = [];
var datos = new Array();
  function agregar()
  {

  var funcion =  $('#txtFuncion').val();
  var programa =  $('#selPrograma').val();
  var textoPrograma = $('#selPrograma option:selected').text();
    id++;
  var fila = "<tr>";
  fila += '<td>'+id+'</td>';
  fila += '<td>'+funcion+'</td>';
  fila += '<td>'+textoPrograma+'</td>';
  fila += '<td><button type="button" class="btn btn-round btn-danger"name="button" data-toggle="tooltip" data-placement="right" title="Quitar"> <i class="fa fa-trash"></i> </button></td>';
  fila += "</tr>";
  $("#datatable2 tbody").append(fila);
  datos  = {"id":id, "funcion": funcion, "idprograma": programa};
  funciones.push(datos);
  console.log(funciones);
  }
