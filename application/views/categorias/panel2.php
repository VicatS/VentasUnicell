  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h1> Lista de informes </h1>
                      <p> <a class="btn btn-success" href="<?php echo base_url() ?>categorias/guardar"> <i class="fa fa-plus-square"></i> Crear nueva categoria </a> </p>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre Categoría</th>
                          <th>Descripción</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php foreach($categorias as $item): ?>
                        <tr>
                           <td style="width: 35%"> <?php echo $item->idCategoria ?> </td>
                            <td style="width: 35%"> <?php echo $item->nombreCategoria ?> </td>
                            <td style="width: 35%"> <?php echo $item->descripcion ?> </td>
                            <td> 
                            <a class="btn btn-info" href="<?php echo base_url() ?>categorias/guardar/<?php echo $item->idCategoria ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger" href="  <?php echo base_url() ?>categorias/eliminar/<?php echo $item->idCategoria ?>"> Eliminar </a> 
                            </td>
                        </tr>
                       <?php endforeach; ?>
                      </tbody>
                    </table>
                    <?php else: ?>
                    <p> No hay Categorías </p>
                    <?php endif; ?>
                    <script type="text/javascript">
                    $(".eliminar_Categoria").each(function() {
                      var href = $(this).attr('href');
                      $(this).attr('href', 'javascript:void(0)');
                      $(this).click(function() {
                      if (confirm("¿Seguro desea eliminar esta Categoría?")) {
                      location.href = href;
                          }
                          });
                          });
                          </script>
                  </div>
                </div>
  </div>