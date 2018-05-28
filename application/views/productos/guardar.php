
<h1> Guardar Producto </h1>
<form method="post" action="<?php echo base_url() ?>usuario/guardar_post/<?php echo $id ?>">
    <div class="form-group">
        
        <div >
          <select class='form-control' name='idCategoria' required>
            <option value="" >Selecciona una categoría</option>
              <?php 
             foreach ($categorias -> result() as $row) {
                ?>
              <option value="<?php echo $row->idCategoria;?>"  ><?php echo $row->nombreCategoria;?></option>     
              

                 <?php
              }
              ?>
                
          </select>       
        </div>
   </div>
    <div class="row">
       <label> Código Imei </label>
       <input type="text" name="nombre"  value="<?php echo $CODIGO ?>" />
    </div>
    <div class="row">
       <label> Nombre </label>
       <input type="text" name="contrasena"  value="<?php echo $NOMBRE ?>" />
    </div><hr>
     <div class="row">
       <label> Nombre Usuario </label>
       <input type="text" name="nombre"  value="<?php echo $nombre ?>" />
    </div>
    <div class="row">
       <label> Contraseña </label>
       <input type="text" name="contrasena"  value="<?php echo $contrasena ?>" />
    </div><hr>
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