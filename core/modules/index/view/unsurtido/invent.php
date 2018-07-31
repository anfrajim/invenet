
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
<h1>Resumen de Reabastecimiento</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$sell = Factura::getById($_GET["id"]);
$operations = Almacen::getAllProductsBySellId($_GET["id"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($operations as $operation) {

		$qx = Almacen::getQYesF($operation->articulo_id);

			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->nombre</b> no tiene existencias en inventario.</p>";			
		}else if($qx<=$p->cantidad_min/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->nombre</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->cantidad_min){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->nombre</b> tiene pocas existencias en inventario.</p>";
		}
	}
	setcookie("selled","",time()-18600);
}

?>
<div id="HTMLtoPDF">
<table class="table table-bordered">
<?php if($sell->entidad_id!=""):
$client = $sell->getPerson();
?>
<tr>
	<td style="width:150px;">Proveedor</td>
	<td><?php echo $client->nombre." ".$client->apellido;?></td>
</tr>

<?php endif; ?>
<?php if($sell->user_id!=""):
$user = $sell->getUser();
?>
<tr>
	<td>Atendido por</td>
	<td><?php echo $user->nombre." ".$user->apellido;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>
		<th>Precio Unitario</th>
		<th>Total</th>

	</thead>
<?php
	foreach($operations as $operation){
		$product  = $operation->getProduct();
?>
<tr>
	<td><?php echo $product->id ;?></td>
	<td><?php echo $operation->cantidad ;?></td>
	<td><?php echo $product->nombre ;?></td>
	<td>$ <?php echo number_format($product->precio_en,2,".",",") ;?></td>
	<td><b>$ <?php echo number_format($operation->cantidad*$product->precio_en,2,".",",");$total+=$operation->cantidad*$product->precio_en;?></b></td>
</tr>
<?php
	}
	?>
</table>
<br><br><h1>Total: $ <?php echo number_format($total,2,'.',','); ?></h1>
	<?php

?>	
<?php else:?>
	501 Internal Error
<?php endif; ?>
</div>
