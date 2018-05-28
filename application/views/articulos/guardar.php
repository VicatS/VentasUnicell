
<h1> Guardar Artículos </h1>
<form method="post" action="<?php echo base_url() ?>articulos/guardar_post/<?php echo $idArticulo ?>">
<div class="row">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoría</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" name="idCategoria">
            <option value="<?php echo $idCategoria ?>" >Equipos</option>
            <option value="<?php echo $idCategoria ?>">Accesorios</option>
            <option value="<?php echo $idCategoria ?>" >Repuestos</option>
          </select>
      </div>
</div>
    <div class="row">
       <label> Código IMEI </label>
       <input type="number" name="codigoImei"  value="<?php echo $codigoImei ?>" />
    </div>
    <div class="row">
       <label>Nombre </label>
       <input type="text" name="nombre"  value="<?php echo $nombre ?>" />
    </div>
    <div class="row">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" name="marca">
            <option value="<?php echo $marca ?>" >Samsung</option>
            <option value="<?php echo $marca ?>">Apple</option>
            <option value="<?php echo $marca ?>" >Nokia</option>
          </select>
      </div>
</div>
    <div class="row">
       <label>Stock </label>
       <input type="number" name="stock"  value="<?php echo $stock ?>" />
    </div>
    <div class="row">
       <label>Descripción </label>
       <input type="text" name="descripcion"  value="<?php echo $descripcion ?>" />
    </div><hr>
    <div class="row">
       <input type="submit" class="btn btn-success" value="Guardar" />
       <a class="btn btn-primary" href="<?php echo base_url() ?>articulos"> Cancelar </a>
    </div>
</form>
