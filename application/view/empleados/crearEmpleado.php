
  <div class="x_panel">
    <div class="x_title">
      <h2>Registro empleado<small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form id="demo-form" method="post">
        <div class="row">
          <div class="col-md-6">
                <!-- start form for validation -->
                <div class="form-group">
                  <label for="">Tipo de Documento <span style="color: red; font-size: 20px;">*</span> </label>
                    <select class="form-control" name="tipDoc" required>
                      <option value="" selected="selected">Seleccionar</option>
                        <?php foreach ($documento as $value ): ?>
                          <option value="<?= $value['IdTipoDocumento']; ?>"><?= $value['DocumentoIdentidad']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                  <div class="form-group">
                    <label for="">Número Documento <span style="color: red; font-size: 20px;">*</span></label>
                    <input type="text" name="txtnumeroDocumento" oninvalid="InvalidMsg(this);"
                      oninput="InvalidMsg(this);" id="txtnumeroDocumento" onkeyup="enviarDatoClave();" class="form-control" placeholder="Número Documento" required>
                  </div>

                  <div class="form-group">
                    <label for="">Nombre Completo <span style="color: red; font-size: 20px;">*</span> </label>
                    <input type="text" name="txtNombres" class="form-control" value="" placeholder="Nombre Completo" required>
                  </div>

                  <div class="form-group">
                    <label for="">Apellido Completo <span style="color: red; font-size: 20px;">*</span> </label>
                    <input type="text" name="txtApellido" class="form-control" value="" placeholder="Apellido Completo" required>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Teléfono <span style="color: red; font-size: 20px;">*</span> </label>
                    <input type="text" name="txtTelefono" class="form-control" value="" placeholder="Teléfono" required>
                  </div>

                <div class="form-group">
                  <label for="">Celular <span style="color: red; font-size: 20px;">*</span> </label>
                  <input type="number" name="txtCelular" class="form-control" value="" placeholder="Celular" required>
                </div>

                <div class="form-group">
                  <label for="">Correo Electrónico <span style="color: red; font-size: 20px;">*</label>
                  <input type="email" name="txtEmail" id="txtEmail" onkeyup="enviarDatoUsuario();" value="" placeholder="Correo Electrónico" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="">Cargo <span style="color: red; font-size: 20px;">*</span> </label>
                    <select class="form-control" name="tipCargo" required>
                      <option value="" selected="selected">Seleccionar</option>
                      <?php foreach ($cargos as $value ): ?>
                        <option value="<?= $value['IdCargo']; ?>"><?= $value['Cargo']; ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-3">
              <div class="clearfix"></div>
              <div class="form-group">
                <label for="">Usuario <span style="color: red; font-size: 20px;">*</span> </label>
                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" value="" placeholder="Usuario" required>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="">Contraseña <span style="color: red; font-size: 20px;">*</span> </label>
                <input type="password" name="txtClave"pattern="[0-9]{7,20}" id="Clave1" title="Minimo 7 a 20 caracteres" class="form-control" value="" placeholder="Contraseña" required>
              </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="">Confirmar Contraseña <span style="color: red; font-size: 20px;">*</span> </label>
                  <input type="password" name="txtClave" id="Clave2" class="form-control" value="" placeholder="Confirmar contraseña" required>
                </div>
              </div>
              <div class="col-md-3">
             <div class="form-group">
                <label for="">Rol <span style="color: red; font-size: 20px;">*</span> </label>
                  <select class="form-control" name="tipRol" required>
                      <option value="" selected="selected">Seleccionar</option>
                    <?php foreach ($rol as $value ): ?>
                      <?php if ($value['IdRol'] != 3): ?>
                          <option value="<?= $value['IdRol']; ?>"><?= $value['Rol']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
              </div>
                </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="btnGuardar" class="btn btn-success btn-md pull-right">Guardar</button>
          <a href="<?php echo URL; ?>Empleados/crearEmpleado"><button type="button" name="button" class="btn btn-danger btn-md pull-right">Limpiar Datos</button></a>
        </div>
      </form>
    </div>
  </div>

  <script src="<?php echo URL; ?>js/validacionClaves.js"></script>

  <script type="text/javascript">
  function InvalidMsg(textbox) {
    var doc = $('#txtnumeroDocumento').val();
    $.ajax({
      // parametros para ejecutar las instrucciones
      url: url+"Empleados/validarDocumento",// ruta
      type: "POST", //en que forma manda los parametros
      dataType: "json", //formato de datos
      data: {'doc' : doc} //parametro de agregar Funcion
    }).done(function(data){
        //console.log(data);
        if (data === "1") {
          textbox.setCustomValidity('¡El empleado ya se encuentra registrado!');
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

  <script type="text/javascript">
    function enviarDatoUsuario(){
      var corr = $("#txtEmail").val();
      $("#txtUsuario").val(corr);
    }
    function enviarDatoClave(){
      var doc = $("#txtnumeroDocumento").val();
      $("#Clave1").val(doc);
    }
  </script>
