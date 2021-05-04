<div class="row">
  <div class="col-md-4 col-sm-5 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Registro Programas<small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <!-- start form for validation -->
        <form id="demo-form" data-parsley-validate method="post">
          <div class="form-group">
            <label for="fullname">Código programa *:</label>
            <input type="text"  class="form-control" name="txtCodigo" required />
          </div>
          <div class="form-group">
            <label for="email">Nombre Programa *:</label>
            <input type="text"  class="form-control" name="txtPrograma" data-parsley-trigger="change" required />
          </div>
          <br>
          <button type="submit" name="btnCrear" class="btn btn-primary">Guardar</button>
        </form>
        <!-- end form for validations -->

    </div>
  </div>
  </div>

  <div class="col-md-8 col-sm-7 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Lista Programas </h2>
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
              <th>Código</th>
              <th>Programa</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tablaProgramas as $value): ?>
              <tr>
                <td><?= $value['Codigo']; ?></td>
                <td><?= $value['NombrePrograma']; ?></td>
                <td>
                  <?php if ($value['Estado'] == 1): ?>
                    <label class="label label-success">Activo</label>
                  <?php else: ?>
                    <label class="label label-danger">Inactivo</label>
                  <?php endif;?>
                </td>
                <td>
                  <button type="button" onclick="editarPrograma('<?= $value['IdPrograma']; ?>','<?= $value['Codigo']; ?>','<?= $value['NombrePrograma']; ?>');"
                  class="btn btn-circle btn-xs btn-info" title="Editar" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-edit"></i> </button>
                  <button type="button" onclick="cambiarEstado('<?php echo $value['IdPrograma']; ?>');" class="btn btn-circle btn-xs btn-warning" title="cambiar estado"> <i class="fa fa-exchange"></i> </button>
                  <button type="button" onclick="eliminarPrograma('<?php echo $value['IdPrograma']; ?>');"class="btn btn-circle btn-xs btn-danger" title="Eliminar" > <i class="fa fa-trash"></i> </button>
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
        <h4 class="modal-title myModalLabel">Editar Programa</h4>
      </div>
        <form class="demo-form" data-parsley-validate method="post">
      <div class="modal-body">


          <div class="form-group">
            <label for="fullname">Código programa * :</label>
            <input type="text" id="txtCodigo1"  class="form-control" name="txtCodigo1" required />
          </div>
          <div class="form-group">
            <label for="email">Nombre Programa *:</label>
            <input type="text" id="txtPrograma1"  class="form-control" name="txtPrograma1" data-parsley-trigger="change" required />
          </div>

          <input type="text" hidden name="txtIdPrograma" id="txtIdPrograma" value="">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="btnActualizar" class="btn btn-primary">Actualizar</button>
      </div>
        </form>

      </div>
    </div>
  </div>
  <script src="<?php echo URL; ?>js/eliminarPrograma.js"></script>
  <script src="<?php echo URL; ?>js/editarPrograma.js"></script>
  <script src="<?php echo URL; ?>js/cambiarEstadoProgramas.js"></script>
