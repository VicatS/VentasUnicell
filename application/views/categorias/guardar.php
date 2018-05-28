
<h1> Guardar Categoría </h1>
<?php if (validation_errors()): ?>
   <div class="alert alert-error">
      <?php echo validation_errors(); ?>
   </div>
<?php endif; ?>
<form method="post" action="<?php echo base_url() ?>categorias/guardar_post/<?php echo $idCategoria ?>">
    <div class="row">
       <label> Nombre Categoría </label>
       <input type="text" name="nombreCategoria"  value="<?php echo $nombreCategoria ?>" />
    </div>
    <div class="row">
       <label> Descripción </label>
       <textarea name="descripcion" cols="100" rows="10"  style="width: 100%;"><?php echo $descripcion; ?></textarea>
    </div><hr>
    <div class="row">
       <input type="submit" class="btn btn-success" value="Guardar" />
       <a class="btn btn-primary" href="<?php echo base_url() ?>categorias"> Cancelar </a>
    </div>
</form>