
          <div class="row">
            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Valoración<small></small></h2>
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
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Area<span style="color: red; font-size: 15px;"> *</span></label>
                          <textarea name="txtArea" rows="2" cols="80" class="form-control" value="" placeholder="" required></textarea>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Aspectos a Evaluar<span style="color: red; font-size: 15px;"> *</span> </label>
                          <textarea name="txtAspectos" rows="3" cols="80" class="form-control" value="" placeholder="" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Descripción<span style="color: red; font-size: 15px;"> *</span> </label>
                          <textarea name="txtDescripcion" rows="3" cols="80" class="form-control" value="" placeholder="" required></textarea>
                        </div>
                      </div>
                    </div>
                <div class="form-group">
                  <button type="submit" name="btnGuardar1" class="btn btn-success btn-md pull-right">Guardar</button>
                  <button type="reset" name="btnCancelar" class="btn btn-danger btn-md pull-right">Limpiar Datos</button>
                </div>
                  </form>
                  <!-- end form for validations -->
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Lista de Valoraciones</h2>
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
                          <th>Area</th>
                          <th>Aspectos a Evaluar</th>
                          <th>Descripcion</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($valoracion as $data): ?>
                          <tr>
                            <td><?php echo $data['IdEvaluacion'];?></td>
                            <td><?php echo $data['Area'];?></td>
                            <td><?php echo $data['AspectosEvaluar'];?></td>
                            <td><?php echo $data['Descripcion'];?></td>
                            <td>
                              <button type="button" onclick="editarEvaluacion(<?php echo $data['IdEvaluacion']; ?>);" class="btn btn-circle btn-xs btn-info" title="Editar" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-edit"></i> </button>
                              <button type="button" onclick="eliminarEvaluacion(<?php echo $data['IdEvaluacion']; ?>);"class="btn btn-circle btn-xs btn-danger" title="Eliminar" > <i class="fa fa-trash"></i> </button>
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
                    <h4 class="modal-title myModalLabel">Editar valoraciones</h4>
                  </div>

                    <div class="x_panel">
                    <form id="demo-form" data-parsley-validat method="post">
                      <div class="form-group">
                        <label for="">Area<span style="color: red; font-size: 15px;"> *</span></label>
                        <textarea name="txtAreaE" id="txtAreaE" rows="2" cols="60" class="form-control" value="" placeholder="" required></textarea>

                      </div>

                        <div class="form-group">
                          <label for="">Aspectos a Evaluar<span style="color: red; font-size: 15px;"> *</span> </label>
                          <textarea name="txtAspectosE" id="txtAspectosE" rows="3" cols="60" class="form-control" value="" placeholder="" required></textarea>
                        </div>

                        <div class="form-group">
                          <label for="">Descripción<span style="color: red; font-size: 15px;"> *</span> </label>
                          <textarea name="txtDescripcionE" id="txtDescripcionE" rows="3" cols="60" class="form-control" value="" placeholder="" required></textarea>
                        </div>

                  <input type="number" hidden name="txtIdEvaluacion" id="txtIdEvaluacion" value="">

                  <div class="modal-footer">
                    <button type="submit" name="btnActualizarValor" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </form>
                </div>
              </div>
            </div>
          </div>

  <script src="<?php echo URL; ?>js/editarEvaluaciones.js"></script>
  <script src="<?php echo URL; ?>js/eliminarEvaluaciones.js"></script>

