
<section>
         <!-- START Page content-->
         <section class="main-content">
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Artículos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Artículos Registrados
                        </div>
 <div class="panel-body">
                         <table id="datatable2" class="table table-striped table-hover">
 <thead>
              
                    <tr>
          
                        <th>
                           Categoria
                        </th>  
                          <th>
                            Código
                        </th>  
                       
                        <th>
                            Marca
                        </th>   
                        <th>
                            Stock
                        </th>  
                          <th>
                             
                        </th>
                      
                        <th>
                            Precio Venta 
                        </th> 
                         <th>
                            Precio Costo 
                        </th> 
                        <th>
                            Caracteristicas
                        </th>
                                      
                    
                    <th>
                            Imagen 
                        </th>  
                        <th>
                          Accion
                        </th>
                       
                        </tr>
                    </thead>
                    <tbody>



<?php

foreach ($productos -> result() as $row) {
   ?>
  <tr>
  
  <td><?php echo $row->codigo_producto;?></td>
    <td><?php echo $row->nombre_producto;?></td>
    <td><?php echo $row->stock;?></td>
    <td><?php echo $row->marca;?></td>
    <td><?php echo $row->medida;?></td>
  
    <td><?php echo $row->precio_venta;?></td>
    <td><?php echo $row->precio_costo;?></td>
    <td><?php echo $row->caracteristicas;?></td>
    <td> 
    <img width="60" height="60" src="<?php echo base_url();?><?php echo $row->imagen;?> " />
    </td>
    
<td>

<?php
echo form_open_multipart('productos/actualizarstock');
?>
<input type="hidden" name="cod" value="<?php echo $row->codigo_producto;?>" />
<button type="submit"class="btn btn-danger btn-sm">Stock</button>
<?php
echo form_close();
?>
<br>
<?php
echo form_open_multipart('productos/actualizarprecios');
?>
<input type="hidden" name="cod" value="<?php echo $row->codigo_producto;?>" />
<button type="submit" class="btn btn-primary btn-sm">Precios</button>
<?php
echo form_close();
?>
</td>
</tr>

<?php

}
?>



</tbody>
</table>

                 </div>
</div>
</div>
</div>
</div>

</div>