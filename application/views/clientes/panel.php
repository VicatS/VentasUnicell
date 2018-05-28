<h1> Lista de Clientes </h1>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>clientes/guardar"> <i class="fa fa-plus-square"></i> Crear nuevo cliente </a> </p>
<?php if (count($clientes)): ?>
 <table class="table tableborder">
    <thead>
       <tr>
          <th>#</th>
          <th> Carnet </th>
          <th> Nombres </th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th> &nbsp; </th>
       </tr>
    </thead>
    <tbody>
       <?php foreach($clientes as $item): ?>
          <tr>
             <td style="width: 35%"> <?php echo $item->idCliente ?> </td>
             <td style="width: 35%"> <?php echo $item->carnet ?> </td>
             <td style="width: 35%"> <?php echo $item->nombres ?> </td>
             <td style="width: 35%"> <?php echo $item->apellidoPaterno ?> </td>
             <td style="width: 35%"> <?php echo $item->apellidoMaterno ?> </td>
             <td> 
                <a class="btn btn-info" href="<?php echo base_url() ?>clientes/guardar/<?php echo $item->idCliente ?>"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger " href="<?php echo base_url() ?>clientes/eliminar/<?php echo $item->idCliente ?>"><i class="fa fa-eraser"></i></a> 
             </td>
          </tr>
       <?php endforeach; ?>
    </tbody>
 </table>
<?php else: ?>
 <p> No hay Clientes </p>
<?php endif; ?>
<script type="text/javascript">
   $(".eliminar_Cliente").each(function() {
      var href = $(this).attr('href');
      $(this).attr('href', 'javascript:void(0)');
      $(this).click(function() {
         if (confirm("¿Seguro desea eliminar este Cliente?")) {
            location.href = href;
         }
      });
   });
</script>