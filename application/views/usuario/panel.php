<h1> Lista de Usuarios </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>usuario/guardar"> <i class="fa fa-plus-square"></i> Crear un nuevo Usuario </a> </p>
<?php if (count($usuarios)): ?>
 <table class="table tableborder">
    <thead>
       <tr>
          <th> Nombre Usuario </th>
          <th> Contraseña </th>
          <th> &nbsp; </th>
       </tr>
    </thead>
    <tbody>
       <?php foreach($usuarios as $item): ?>
          <tr>
             <td style="width: 35%"> <?php echo $item->nombre ?> </td>
             <td style="width: 35%"> <?php echo $item->contrasena ?> </td>
             <td> 
                <a class="btn btn-info" href="<?php echo base_url() ?>usuario/guardar/<?php echo $item->id ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger " href="<?php echo base_url() ?>usuario/eliminar/<?php echo $item->id ?>"><i class="fa fa-eraser"></i></a>
                <a class="btn btn-success" href="#"><i class="fa fa-check-square"></i></a> 
             </td>
          </tr>
       <?php endforeach; ?>
    </tbody>
 </table>
<?php else: ?>
 <p> No hay Usuarios </p>
<?php endif; ?>
<script type="text/javascript">
   $(".eliminar_Usuario").each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', 'javascript:void(0)');
      $(this).click(function() {
         if (confirm("¿Seguro desea eliminar esta Categoría?")) {
            location.href = href;
         }
      });
   });
</script>