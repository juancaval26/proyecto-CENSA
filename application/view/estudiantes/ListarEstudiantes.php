<div class="x_panel">
  <div class="x_title">
    <h2>Lista de Estudiantes</h2>
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
            <th>Número Documento</th>
            <th>Tipo Documento.</th>
            <th>Nombre Completo</th>
            <th>Apellido Completo</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($estudiantes as $data): ?>
            <tr>
              <td><?php echo $data['Documento'];?></td>
              <td><?php echo $data['DocumentoIdentidad'];?></td>
              <td><?php echo $data['Nombre'];?></td>
              <td><?php echo $data['Apellido'];?></td>
              <td><?php echo $data['Telefono'];?></td>
              <td><?php echo $data['Celular'];?></td>
              <td><?php echo $data['CorreoEstudiante'];?></td>
              <!-- <td><?php echo $data['Usuario'];?></td> -->
              <td>
                <?php if ($data['Estado'] == 1): ?>
                  <label class="label label-success">Activo</label>
                <?php else: ?>
                  <label class="label label-danger">Inactivo</label>
                <?php endif;?>
              </td>
              <td>
                <button type="button" onclick="editarEstudiante(<?php echo $data['IdEstudiante']; ?>);"data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-circle btn-xs btn-info" title="Editar"> <i class="fa fa-edit"></i> </button>
                <button type="button" onclick="cambiarEstado(<?php echo $data['IdEstudiante']; ?>);" class="btn btn-xs btn-warning" title="cambiar estado"> <i class="fa fa-exchange"></i> </button>
                <button type="button" onclick="idUsuarioEstudiante('<?php echo $data['IdUsuarioEstudiante']; ?>');"   data-toggle="modal" data-target=".bs-example1-modal-lg" class="btn btn-circle btn-xs btn-success" title="Cambiar Clave"> <i class="fa fa-key"></i> </button>

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
        <h4 class="modal-title myModalLabel">Editar Estudiante</h4>
      </div>

        <form class="demo-form" data-parsley-validate method="post">
          <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="text">Número de Documento *:</label>
                <input type="text" id="txtDocumento2" readonly  class="form-control" name="txtDocumento2" data-parsley-trigger="change" required />
              </div>

              <div class="form-group">
                <label for="text">Tipo de Documento *:</label>
                <select class="form-control" name="tipDoc" id="tipDoc" required>
                <?php foreach ($documento as $value ): ?>
                  <option value="<?= $value['IdTipoDocumento']; ?>"><?= $value['DocumentoIdentidad']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="fullname">Nombre Completo * :</label>
                <input type="text" id="txtNombre2"  class="form-control" name="txtNombre2" required />
              </div>
              <div class="form-group">
                <label for="email">Numero Folio *:</label>
                <input type="text" id="txtFolio"  class="form-control" name="txtFolio" data-parsley-trigger="change" required />
              </div>
              <div class="form-group">
                <label for="email">Correo *:</label>
                <input type="text" id="txtCorreo2"  class="form-control" name="txtCorreo2" data-parsley-trigger="change" required />
              </div>
           </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="text">Apellido Completo *:</label>
                <input type="text" id="txtApellido2"  class="form-control" name="txtApellido2" data-parsley-trigger="change" required />
              </div>
              <div class="form-group">
                    <label for="text">Teléfono *:</label>
                    <input type="text" id="txtTelefono2"  class="form-control" name="txtTelefono2" data-parsley-trigger="change" required />
                  </div>
                  <div class="form-group">
                    <label for="text">Celular *:</label>
                    <input type="number" id="txtCelular2"  class="form-control" name="txtCelular2" data-parsley-trigger="change" required />
                </div>
                <div class="form-group">
                  <label for="text">Programa *:</label>
                  <select name="txtPrograma" id="txtPrograma" class="form-control" required>
                  <?php foreach ($programas as $value): ?>
                    <option value="<?= $value['IdPrograma'];  ?>"><?= $value['NombrePrograma'];  ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                   <label for="">Cuenta de Usuario *:</span> </label>
                   <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" value="" placeholder="Usuario" required>
                </div>
            </div>
          </div>
          <div style="width: 100%; height: 10px;border: 1px solid white;">
            <hr>
          </div><br>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
               <label for="">Empresa <span style="color: red; font-size: 20px;">*</span> </label>
                <input type="text" name="txtEmpresa" id="txtEmpresa"  value="" class="form-control" value="" placeholder="Empresa" required>
              </div>
              <div class="form-group">
                <label for="">Nombre Contacto <span style="color: red; font-size: 20px;">*</span> </label>
                 <input type="text" name="txtNombreContacto" id="txtNombreContacto" class="form-control" value="" placeholder="Nombre Contacto" required>
              </div>
              <div class="form-group">
                 <label for="">Correo Contacto <span style="color: red; font-size: 20px;">*</span> </label>
                 <input type="text" name="txtCorreoContacto" id="txtCorreoContacto" class="form-control" value="" placeholder="Correo" required>
              </div>
              <div class="form-group">
                 <label for="">Fecha Inicio <span style="color: red; font-size: 20px;">*</label>
                <input type="date" name="txtFechaI" id="txtFechaI" value="" placeholder="Fecha Inicio" class="form-control" required>
              </div>

            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Nit Empresa <span style="color: red; font-size: 20px;">*</span></label>
                 <input type="text" name="txtNit" id="txtNit" class="form-control" value="" placeholder="Nit Empresa" required>
              </div>
              <div class="form-group">
               <label for="">Cargo Contacto<span style="color: red; font-size: 20px;">*</span> </label>
                <input type="text" name="txtCargoContacto" id="txtCargoContacto" value="" class="form-control" value="" placeholder="Cargo Contacto" required>
              </div>
              <div class="form-group">
                 <label for="">Cargo Practicante <span style="color: red; font-size: 20px;">*</label>
                <input type="text" name="txtCargoPracticante" id="txtCargoPracticante" value="" placeholder="Cargo Practicante" class="form-control" required>
              </div>
              <div class="form-group">
                 <label for="">Fecha Finalización <span style="color: red; font-size: 20px;">*</label>
                <input type="date" name="txtFechaF" id="txtFechaF" value="" placeholder="Fecha Finalización" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                 <label for="">Dirección Empresa <span style="color: red; font-size: 20px;">*</label>
                <input type="text" name="txtDireccionEmpresa" id="txtDireccionEmpresa" value="" placeholder="Dirección Empresa" class="form-control" required>
              </div>
              <div class="form-group">
               <label for="">Teléfono Contacto<span style="color: red; font-size: 20px;">*</span> </label>
                 <input type="number" name="txtTelefonoEmpresa" id="txtTelefonoEmpresa" class="form-control" value="" placeholder="Teléfono" required>
             </div>
             <div class="form-group">
              <label for="">Modalidad <span style="color: red; font-size: 20px;"></label>
                <select name="txtModalidad" id="txtModalidad" class="form-control" required>
                   <?php foreach ($modalidades as $key => $value): ?>
                     <option value="<?= $value;  ?>"><?= $value;  ?></option>
                    <?php endforeach; ?>
                </select>
             </div>
            </div>
          </div>
      </div>
      <input type="number" hidden name="txtIdEstudiante" id="txtIdEstudiante" value="">
      <div class="modal-footer">
        <button type="submit" name="actualizarEstudiante" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
            <input type="text" hidden name="txtIdUsuarioEs" id="txtIdUsuarioEs">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="btnClave" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
    </div>
  </div>
  </div>

  <script >

    function idUsuarioEstudiante(id){
      $('#txtIdUsuarioEs').val(id);
    }
  </script>



  <script src="<?php echo URL; ?>js/editarEstudiante.js"></script>
  <script src="<?php echo URL; ?>js/cambiarEstadoEstudiante.js"></script>
