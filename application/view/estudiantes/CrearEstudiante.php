<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-graduation-cap"></i> Gestión Estudiantes</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <!-- start accordion -->
      <div class="accordion"  role="tablist" aria-multiselectable="true">
        <div class="panel">
          <div class="panel-collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Registro estudiante<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="demo-form" method="post">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                          <!-- start form for validation -->
                          <div class="form-group">
                            <label for="">Tipo de Documento <span style="color: red; font-size: 17px;">*</span> </label>
                            <select class="form-control" name="tipDoc" required>
                              <option value="" selected="selected">Seleccionar</option>
                            <?php foreach ($documento as $value ): ?>
                              <option value="<?= $value['IdTipoDocumento']; ?>"><?= $value['DocumentoIdentidad']; ?></option>
                            <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">Número Documento <span style="color: red; font-size: 17px;">*</span></label>
                            <input type="text" name="txtDocumento" id="txtDocumento" oninvalid="InvalidMsg(this);"
                              oninput="InvalidMsg(this);" class="form-control" placeholder="Número Documento" required>
                          </div>
                            <div class="form-group">
                              <label for="">Nombre Completo <span style="color: red; font-size: 17px;">*</span> </label>
                              <input type="text" name="txtNombres" class="form-control" placeholder="Nombre Completo" required>
                            </div>
                            <div class="form-group">
                              <label for="">Apellido Completo <span style="color: red; font-size: 17px;">*</span> </label>
                              <input type="text" name="txtApellido" class="form-control" placeholder="Apellido Completo" required>
                            </div>
                            <div class="form-group">
                              <label for="">Número de Folio<span style="color: red; font-size: 17px;">*</span> </label>
                              <input type="number" name="txtFolio" class="form-control" value="" placeholder="Número de Folio" required>
                            </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Teléfono <span style="color: red; font-size: 17px;">*</span> </label>
                                <input type="number" name="txtTelefono" class="form-control" value="" placeholder="Teléfono" required>
                              </div>

                              <div class="form-group">
                                <label for="">Celular <span style="color: red; font-size: 17px;">*</span> </label>
                                <input type="number" name="txtCelular" class="form-control" value="" placeholder="Celular"  required>
                              </div>

                              <div class="form-group">
                                <label for="">Correo Electrónico <span style="color: red; font-size: 17px;">*</span></label>
                                <input type="email" name="txtEmail" value="" class="form-control" placeholder="Correo Electrónico" required>
                              </div>

                              <div class="form-group">
                               <label for="">Programa <span style="color: red; font-size: 17px;"></label>
                                 <select name="txtPrograma" id="txtPrograma" class="form-control" required>
                                   <option value="" selected="selected">Seleccionar</option>
                                     <?php foreach ($programas as $value): ?>
                                   <option value="<?= $value['IdPrograma'];  ?>"><?= $value['NombrePrograma'];  ?></option>
                                     <?php endforeach; ?>
                                 </select>
                              </div>
                              <br>
                              <div class="form-group">
                                    <button type="reset" name="button" class="btn btn-secundary btn-md pull-right">Limpiar</button>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
        <div class="panel">
          <div class="panel-collapse in" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Datos Empresa<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                          <!-- start form for validation -->

                          <div class="form-group">
                           <label for="">Empresa <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="text" name="txtEmpresa"  value="" class="form-control" value="" placeholder="Empresa" required>
                          </div>

                         <div class="form-group">
                           <label for="">Nit Empresa <span style="color: red; font-size: 20px;">*</span></label>
                            <input type="text" name="txtNit" class="form-control" value="" placeholder="Nit Empresa" required>
                         </div>

                         <div class="form-group">
                           <label for="">Nombre Contacto <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="text" name="txtNombre" class="form-control" value="" placeholder="Nombre Contacto" required>
                         </div>

                         <div class="form-group">
                          <label for="">Cargo Contacto<span style="color: red; font-size: 20px;">*</span> </label>
                           <input type="text" name="txtCargoContacto" value="" class="form-control" value="" placeholder="Cargo Contacto" required>
                         </div>

                         <div class="form-group">
                          <label for="">Teléfono <span style="color: red; font-size: 20px;">*</span> </label>
                            <input type="number" name="txtTelefono" class="form-control" value="" placeholder="Teléfono" required>
                        </div>

                        <div class="form-group">
                           <label for="">Correo <span style="color: red; font-size: 20px;">*</span> </label>
                           <input type="email" name="txtCorreo" class="form-control" value="" placeholder="Correo" required>
                        </div>

                       </div>

                         <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">



                         <div class="form-group">
                            <label for="">Dirección Empresa <span style="color: red; font-size: 20px;">*</label>
                           <input type="text" name="txtDirección" value="" placeholder="Dirección Empresa" class="form-control" required>
                         </div>

                         <div class="form-group">
                            <label for="">Cargo Practicante <span style="color: red; font-size: 20px;">*</label>
                           <input type="text" name="txtCargo" value="" placeholder="Cargo Practicante" class="form-control" required>
                         </div>

                         <div class="form-group">
                            <label for="">Fecha Inicio <span style="color: red; font-size: 20px;">*</label>
                           <input type="date" name="txtFechaI" id="txtFechaF1" placeholder="Fecha Inicio" class="form-control" required>
                         </div>

                         <div class="form-group">
                            <label for="">Fecha Finalización <span style="color: red; font-size: 20px;">*</label>
                           <input type="date" name="txtFechaF" id="txtFecha2"placeholder="Fecha Finalización" class="form-control" required>
                         </div>



                        <div class="form-group">
                         <label for="">Modalidad <span style="color: red; font-size: 20px;"></label>
                           <select name="txtModalidad" class="form-control" required>
                             <option value="" selected="selected">Seleccionar</option>
                               <?php foreach ($modalidades as $key => $value): ?>
                             <option value="<?= $value;  ?>"><?= $value;  ?></option>
                               <?php endforeach; ?>
                           </select>
                        </div>
                        <br>
                        <div class="form-group">
                           <button type="reset" name="button" class="btn btn-secundary btn-md pull-right">Limpiar</button>
                        </div>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>

                <button type="submit" name="btnCambiosEstudiante" class="btn btn-primary btn-md pull-right">Guardar</button>
              </form>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
            </div>
      </div>
      </div>
      <!-- end of accordion -->

    </div>
  </div>
</div>
</div>

<script type="text/javascript">
function InvalidMsg(textbox) {
  var doc = $('#txtDocumento').val();
  var idprog = $('#txtPrograma').val();
  $.ajax({
    // parametros para ejecutar las instrucciones
    url: url+"Estudiantes/validarDocumentoProgramaE",// ruta
    type: "POST", //en que forma manda los parametros
    dataType: "json", //formato de datos
    data: {'doc' : doc, 'idprog' : idprog} //parametro de agregar Funcion
  }).done(function(data){
      //console.log(data);
      if (data === "1") {
        //textbox.setCustomValidity('¡El estudiante ya se encuentra registrado con el mismo programa!');
        swal({
          title: "Error",
          text: "¡El estudiante ya se encuentra registrado con el mismo programa!",
          type:"error",
          confirmButtonText: "Error",
          closeOnConfirm:false,
          closeOnCancel:false
        });
        return true;
      }else{
        textbox.setCustomValidity('');
        return false;
      }
  }).fail(function(error){
      console.log(error);
  });

}

</script>
