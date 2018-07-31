    <?php 
$categories = Categoria::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Producto</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=adarticulo" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">imagen</label>
    <div class="col-md-6">
      <input type="file" name="imagen" id="imagen" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo de Barras*</label>
    <div class="col-md-6">
      <input type="text" name="codigo_de_barras" id="product_code" class="form-control" id="codigo_de_barras" placeholder="Codigo de Barras del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-md-6">
    <select name="categoria_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $categoria):?>
      <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-md-6">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Entrada*</label>
    <div class="col-md-6">
      <input type="text" name="precio_en" required class="form-control" id="precio_en" placeholder="Precio de entrada">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Salida*</label>
    <div class="col-md-6">
      <input type="text" name="precio_sal" required class="form-control" id="precio_sal" placeholder="Precio de salida">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">IVA*</label>
    <div class="col-md-6">
      <input type="text" name="iva" required class="form-control" id="iva" placeholder="IVA">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Unidad*</label>
    <div class="col-md-6">
      <input type="text" name="ubicacion" required class="form-control" id="ubicacion" placeholder="Unidad del Producto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
    <div class="col-md-6">
      <input type="text" name="presentacion" class="form-control" id="inputEmail1" placeholder="Presentacion del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Minima en inventario:</label>
    <div class="col-md-6">
      <input type="text" name="cantidad_min" class="form-control" id="inputEmail1" placeholder="Minima en Inventario (Default 10)">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inventario inicial:</label>
    <div class="col-md-6">
      <input type="text" name="cantidad" class="form-control" id="inputEmail1" placeholder="Inventario inicial">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </div>
  </div>
</form>

	</div>
</div>

<script>
  $(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});

</script>
