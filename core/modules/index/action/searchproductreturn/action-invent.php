
<?php if(isset($_GET["product"]) AND $_GET["product"]!=""):?>
	<?php
$products = Articulo::getLike($_GET["product"]);
if(count($products)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>
		<th>Unidad</th>
		<th>Precio unitario</th>
		<th>En inventario</th>
		<th>Cantidad</th>
	</thead>
	
	<?php
$products_in_cero=0;
	 foreach($products as $product):
$cantidad = Almacen::getQYesF($product->id);
	?>
	<?php 
	if($cantidad>0):?>
		
	<tr class="<?php if($cantidad<=$product->cantidad_min){ echo "danger"; }?>">
		<td style="width:80px;"><?php echo $product->id; ?></td>
		<td><?php echo $product->nombre; ?></td>
		<td><?php echo $product->ubicacion; ?></td>
		<td><b>$<?php echo $product->precio_sal; ?></b></td>
		<td>
			<?php echo $cantidad; ?>
		</td>
		<td style="width:250px;"><form method="post" action="index.php?view=adacarrodev">
		<input type="hidden" name="articulo_id" value="<?php echo $product->id; ?>">

<div class="input-group">
		<input type="number" class="form-control" required name="cantidad"  min="1" step="1" placeholder="Cantidad ...">
      <span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
      </span>
    </div>


		</form></td>
	</tr>
	
<?php else:$products_in_cero++;
?>
<?php  endif; ?>
	<?php endforeach;?>
</table>
<?php if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?module=inventario'>Ir al Inventario</a></p>"; }?>

	<?php
}else{
	echo "<br><p class='alert alert-danger'>No se encontro el producto</p>";
}
?>
<hr><br>
<?php else:
?>
<?php endif; ?>
