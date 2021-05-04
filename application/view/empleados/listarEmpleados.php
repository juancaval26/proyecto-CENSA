<div class="x_panel">
  <div class="x_title">
    <h2>Lista de Empleados</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="table-responsive">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Tipo Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Cargo</th>
            <th>Teléfono Empresa</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($empleados as $data): ?>
            <tr>
              <td><?php echo $data['Documento'];?></td>
              <td><?php echo $data['DocumentoIdentidad'];?></td>
              <td><?php echo $data['Nombre'];?></td>
              <td><?php echo $data['Apellido'];?></td>
              <td><?php echo $data['Correo'];?></td>
              <td><?php echo $data['Celular'];?></td>
              <td><?php echo $data['Cargo'];?></td>
              <td><?php echo $data['Telefono'];?></td>
              <td>
                <?php if ($data['Estado'] == 1): ?>
                  <label class="label label-success">Activo</label>
                <?php else: ?>
                  <label class="label label-danger">Inactivo</label>
                <?php endif;?>
              </td>
              <td>
                <button type="button" onclick="editarEmpleado('<?php echo $data['IdEmpleado']; ?>');" class="btn btn-circle btn-xs btn-info" title="Editar" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-edit"></i> </button>
                <button type="button" onclick="cambiarEstado('<?php echo $data['IdEmpleado']; ?>');" class="btn btn-circle btn-xs btn-warning" title="Cambiar Estado"> <i class="fa fa-exchange"></i> </button>
                <button type="button" onclick="idEmpleado('<?php echo $data['IdUsuario']; ?>');"   data-toggle="modal" data-target=".bs-example1-modal-lg" class="btn btn-circle btn-xs btn-success" title="Cambiar Clave"> <i class="fa fa-key"></i> </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title myModalLabel">Editar empleado</h4>
      </div>

        <form class="demo-form" data-parsley-validate method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="text">Documento *:</label>
                  <input type="text" id="txtDocumentoEmpleado"  class="form-control" name="txtDocumentoEmpleado" data-parsley-trigger="change" required readonly/>
                </div>
                <div class="form-group">
                  <label for="text">Tipo de Documento *:</label>
                  <select class="form-control" name="tipDoc" id="tipDoc" required>
                    <option value="" selected="selected">Seleccionar</option>
                  <?php foreach ($documento as $value ): ?>
                    <option value="<?= $value['IdTipoDocumento']; ?>"><?= $value['DocumentoIdentidad']; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

              <div class="form-group">
                <label for="fullname">Nombre Completo * :</label>
                <input type="text" id="txtNombreEmpleado"  class="form-control" name="txtNombreEmpleado" required />
              </div>

              <div class="form-group">
                <label for="text">Apellido completo *:</label>
                <input type="text" id="txtApellidoEmpleado"  class="form-control" name="txtApellidoEmpleado" data-parsley-trigger="change" required />
              </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Correo *:</label>
                  <input type="text" id="txtCorreoEmpleado"  class="form-control" name="txtCorreoEmpleado" data-parsley-trigger="change" required />
                </div>

                <div class="form-group">
                  <label for="text">Cargo *:</label>
                  <select class="form-control" name="tipCargo" id="tipCargo" required>
                    <option value="" selected="selected">Seleccionar</option>
                  <?php foreach ($cargos as $value ): ?>
                    <option value="<?= $value['IdCargo']; ?>"><?= $value['Cargo']; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="text">Teléfono Empresa *:</label>
                  <input type="text" id="txtTelefono1"  class="form-control" name="txtTelefono1" data-parsley-trigger="change" required />
                </div>

                <div class="form-group">
                  <label for="text">Celular *:</label>
                  <input type="text" id="txtCelular1"  class="form-control" name="txtCelular1" data-parsley-trigger="change" required />
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Usuario <span style="color: red; font-size: 20px;">*</span> </label>
                  <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" value="" placeholder="Usuario" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                     <label for="">Rol <span style="color: red; font-size: 20px;">*</span> </label>
                       <select class="form-control" name="tipRol" id="tipRol" required>
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
      <input type="number" name="txtIdEmpleado" hidden id="txtIdEmpleado" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="btnActualizar" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
    </div>
  </div>
  </div>
  <div class="modal fade bs-example1-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title myModalLabel">Cambiar Clave</h4>
        </div>
          <form class="demo-form" data-parsley-validate method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="text">Nueva Contraseña *:</label>
                    <input type="password" id="Clave1"  class="form-control" name="txtClave" required/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fullname">Confirmar contraseña *:</label>
                    <input type="password" id="Clave2"  class="form-control" name="txtClave" required />
                  </div>
                </div>
              </div>
            </div>
              <input type="text" hidden name="txtIdUsuarioEm" id="txtIdUsuarioEm">
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="btnClave" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
      </div>
    </div>
    </div>
    <script type="text/javascript">
      function idEmpleado(id){
        $("#txtIdUsuarioEm").val(id);
      }
    </script>
  <script src="<?php echo URL; ?>js/editarEmpleado.js"></script>
  <script src="<?php echo URL; ?>js/cambiarEstadoEmpleado.js"></script>
  <script src="<?php echo URL; ?>js/validacionClaves.js"></script>
  <script src="<?php echo URL; ?>js/cambioClave.js"></script>
  <script src="<?php echo URL; ?>bootstrap34/js/jquery-3.4.1.min.js"></script>
