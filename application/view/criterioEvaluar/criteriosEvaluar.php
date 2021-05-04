
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Evaluar criterios Por Programa<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- start form for validation -->
                  <form id="demo-form" data-parsley-validate method="post">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Criterios<span style="color: red; font-size: 15px;"> *</span></label>
                          <textarea name="txtCriterios" rows="4" cols="100" class="form-control" value="" placeholder="Criterios Para Evaluar" required></textarea>
                        </div>
                      </div>

                    </div>
                <div class="form-group">
                  <button type="submit" name="btnGuarde" class="btn btn-success btn-md pull-right">Guardar</button>
                  <a href="<?php echo URL; ?>CriteriosEvaluar/criterios"><button type="button" name="btnCancelar" class="btn btn-danger btn-md pull-right">Limpiar Datos</button></a>
                </div>
                  </form>
                  <!-- end form for validations -->
                </div>
              </div>

            </div>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h4>Lista de Criterios a Evaluar por Programa</h4>
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
                          <th>Funciones a Evaluar</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaCriterios as $data): ?>
                          <tr>
                            <td><?php echo $data['CriterioEvaluar'];?></td>
                            <td>
                              <button type="button" onclick="criterio(<?php echo $data['IdCriteriosEvaluar']; ?>);" class="btn btn-circle btn-xs btn-info" title="Editar" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-edit"></i> </button>
                              <button type="button" onclick="eliminarCriterio(<?php echo $data['IdCriteriosEvaluar']; ?>);"class="btn btn-circle btn-xs btn-danger" title="Eliminar" > <i class="fa fa-trash"></i> </button>
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

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title myModalLabel">Editar Criterios a Evaluar</h4>
                  </div>

                    <div class="x_panel">
                    <form id="demo-form" data-parsley-validat method="post">
                      <div class="form-group">
                        <label for="">Criterios a Evaluar<span style="color: red; font-size: 15px;"> *</span></label>
                        <textarea name="txtCriterioEvaluar" id="txtCriterioEvaluar" rows="4" cols="60" class="form-control" value="" placeholder="Criterio Modificar" required></textarea>
                      </div>
                  <input type="number" hidden name="txtIdCriteriosEvaluar" id="txtIdCriteriosEvaluar" value="">

                  <div class="modal-footer">
                    <button type="submit" name="btnActualize" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </form>
                </div>
              </div>
            </div>
          </div>

  <script src="<?php echo URL; ?>js/criteriosEvaluar.js"></script>
  <script src="<?php echo URL; ?>js/eliminarCriterio.js"></script>

