<?php
echo form_open_multipart('productos/registrarProducto');

  ?>
  <br> 
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
  <label for="categoria" class="col-sm-3 control-label">Código IMEI</label>
  <td>
    <input class="form-control" name="codigoImei" required type="number" placeholder="Ingrese el Código de Imei">
  </td>
  <br>   
  <label for="categoria" class="col-sm-3 control-label">Nombre</label>
  <td>
    <input class="form-control" name="nombre" required type="text" placeholder="Nombre Artículo">
  </td>
  <br>
  <label for="categoria" class="col-sm-3 control-label">Marca</label> 
   <td>
    <input class="form-control" name="marca" required type="text" placeholder="Escriba la marca del proucto">
  </td>
  <br>
  <label for="categoria" class="col-sm-3 control-label">Stock</label>
  <td>
    <input class="form-control" name="stock" required type="number" placeholder="">
  </td>
  <br> 
  <label for="categoria" class="col-sm-3 control-label">Descripción</label> 
  <td>
    <input class="form-control" name="descripcion" required type="text" placeholder="">
  </td>
  <label for="categoria" class="col-sm-3 control-label">Imagen</label>
 <td>
    <input type="file" class="form-control" name="foto"  >
  </td> 
  
<br> 
  <td>
    <button type="submit"  class="btn btn-success ">Agregar</button>
     <a class="btn btn-primary" href="<?php echo base_url() ?>productos"> Cancelar </a>
  </td> 
  </tr>
  <?php
echo form_close();
  ?>