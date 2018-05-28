<h1> Lista de Categorías </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>categorias/guardar"> <i class="fa fa-plus-square"></i> Crear nueva categoria </a> </p>
<p> <a class="btn btn-success" href="javascript:document.location.reload();"> <i class="fa fa-repeat"></i> Actualizar </a> </p>
<?php if (count($categorias)): ?>
 <table class="table tableborder">
    <thead>
       <tr>
          <th>#</th>
          <th> Nombre Categoría </th>
          <th> Descripción </th>
          <th> &nbsp; </th>
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
                <a class="btn btn-danger " href="<?php echo base_url() ?>categorias/eliminar/<?php echo $item->idCategoria ?>"><i class="fa fa-eraser"></i></a> 
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