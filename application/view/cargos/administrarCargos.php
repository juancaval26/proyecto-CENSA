
<div class="row">
  <div class="col-md-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Registro cargos<small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- start form for validation -->
        <form id="demo-form" data-parsley-validate method="post">
          <label for="email">Nombre Cargo :</label>
          <input type="text"  class="form-control" name="txtCargo" data-parsley-trigger="change" required />
          <br>
          <button type="submit" name="btnCrear" class="btn btn-primary">Guardar</button>
        </form>
        <!-- end form for validations -->
      </div>
    </div>

  </div>
  <div class="col-md-8">
    <div class="x_panel">
      <div class="x_title">
        <h2>Lista Cargos </h2>
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
              <th>Cargo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cargo as $data): ?>
              <tr>
                <td><?php echo $data['Cargo'];?></td>
                <td>
                  <button type="button" onclick="editarCargo(<?php echo $data['IdCargo']; ?>);" class="btn btn-circle btn-xs btn-info" title="Editar" data-toggle="modal" data-target=".bs-example-modal-sm">
                  <i class="fa fa-edit"></i> </button>
                  <button type="button" onclick="eliminarCargo(<?php echo $data['IdCargo']; ?>);"class="btn btn-circle btn-xs btn-danger" title="Eliminar" > <i class="fa fa-trash"></i> </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
       </div>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Editar Cargo</h4>
        </div>

        <div class="modal-body">
          <form data-parsley-validat method="post">
            <div class="form-group">
              <label for="email">Nombre Cargo *:</label>
              <input type="text"  class="form-control" name="txtCargo1" id="txtCargo1" data-parsley-trigger="change" required />
            </div>

            <input type="number" hidden name="txtIdCargo1" id="txtIdCargo1" value="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="actualizarCargo" class="btn btn-primary btn-md">Actualizar</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <script src="<?php echo URL; ?>js/editarCargo.js"></script>
  <script src="<?php echo URL; ?>js/eliminarCargo.js"></script>

