<h1> Lista de Artículos </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>articulos/guardar"> <i class="fa fa-plus-square"></i> Crear nuevo Artículo </a> <input  type="button" onclick="document.location.reload();"></p>
<?php if (count($articulos)): ?>
 <table class="table tableborder">
    <thead>
       <tr>
          <th>#</th>
          <th> Categoria </th>
          <th> Código IMEI </th>
          <th>Nombre</th>
          <th>Marca</th>
          <th>Stock</th>
          <th>Descripción</th>
          <th> &nbsp; </th>
       </tr>
    </thead>
    <tbody>
       <?php foreach($articulos as $item): ?>
          <tr>
             <td style="width: 35%"> <?php echo $item->idArticulo ?> </td>
             <td style="width: 35%"> <?php echo $item->idCategoria ?> </td>
             <td style="width: 35%"> <?php echo $item->codigoImei ?> </td>
             <td style="width: 35%"> <?php echo $item->nombre ?> </td>
             <td style="width: 35%"> <?php echo $item->marca ?> </td>
             <td style="width: 35%"> <?php echo $item->stock ?> </td>
             <td style="width: 35%"> <?php echo $item->descripcion ?> </td>
             <td> 
                <a class="btn btn-info" href="<?php echo base_url() ?>articulos/guardar/<?php echo $item->idArticulo ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger " href="<?php echo base_url() ?>articulos/eliminar/<?php echo $item->idArticulo ?>"><i class="fa fa-eraser"></i></a> 
             </td>
          </tr>
       <?php endforeach; ?>
    </tbody>
 </table>
<?php else: ?>
 <p> No hay Artículos </p>
<?php endif; ?>
<script type="text/javascript">
   $(".eliminar_Articulo").each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', 'javascript:void(0)');
      $(this).click(function() {
         if (confirm("¿Seguro desea eliminar esta Categoría?")) {
            location.href = href;
         }
      });
   });
</script>