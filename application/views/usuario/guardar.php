
<h1> Guardar Usuario </h1>
<form method="post" action="<?php echo base_url() ?>usuario/guardar_post/<?php echo $id ?>">
    <div class="row">
       <label> Nombre Usuario </label>
       <input type="text" name="nombre"  value="<?php echo $nombre ?>" />
    </div>
    <div class="row">
       <label> Contraseña </label>
       <input type="text" name="contrasena"  value="<?php echo $contrasena ?>" />
    </div><hr>
    <div class="row">
       <input type="submit" class="btn btn-success" value="Guardar" />
       <a class="btn btn-primary" href="<?php echo base_url() ?>usuario"> Cancelar </a>
    </div>
</form>