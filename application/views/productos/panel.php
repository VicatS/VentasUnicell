<h1> Lista de Artículos </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>productos/registrar"> <i class="fa fa-plus-square"></i> Crear nuevo Artículo </a> </p>
<p> <a class="btn btn-success" href="javascript:document.location.reload();"> <i class="fa fa-repeat"></i> Actualizar </a> </p>
<?php if (count($productos)): ?>
 <table class="table tableborder">
    <thead>
       <tr>
          <th> Nombre Categoría </th>
          <th> Código Imei </th>
          <th>Nombre</th>
          <th>Marca</th>
          <th>Stock</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th> &nbsp; </th>
       </tr>
    </thead>
    <tbody>
       <?php foreach($productos as $item): ?>
          <tr>
             <td style="width: 35%"> <?php echo $item->CATEGORIA; ?> </td>
             <td style="width: 35%"> <?php echo $item->CODIGO; ?> </td>
             <td style="width: 35%"> <?php echo $item->NOMBRE; ?> </td>
               <td style="width: 35%"> <?php echo $item->MARCA; ?> </td>
                 <td style="width: 35%"> <?php echo $item->STOCK; ?> </td>
             <td style="width: 35%"> <?php echo $item->DESCRIPCION; ?> </td>
               <td> 
                <img width="60" height="60" src="<?php echo base_url();?><?php echo $item->IMAGEN;?> " />
                </td>
             <td> 
                <a class="btn btn-info" href="<?php echo base_url() ?>categorias/guardar/<?php echo $item->ID ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger " href="<?php echo base_url() ?>categorias/eliminar/<?php echo $item->ID ?>"><i class="fa fa-eraser"></i></a> 
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