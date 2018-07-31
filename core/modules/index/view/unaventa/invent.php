
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
<h1>Resumen de Venta</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$factura = Factura::getById($_GET["id"]);
$sell = Factura::getById($_GET["id"]);
$iva = Articulo::getById($_GET["id"]);
$product = Articulo::getById($_GET["id"]);
$almacens = Almacen::getAllProductsBySellId($_GET["id"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($almacens as $almacen) {

		$qx = Almacen::getQYesF($almacen->articulo_id);

			$p = $almacen->getProduct();
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
	<td style="width:150px;">Cliente</td>
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
	    
		<th>Codigo Id producto</th>
		<th>iva</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>
		<th>Precio Unitario</th>
		<th>Sub Total Iva</th>
		<th>Sub Total </th>
		<th>Total</th>
		<th>devuelta</th>

	</thead>
<?php
	foreach($almacens as $almacen){
		$product  = $almacen->getProduct();
?>
<tr>


    
	<td><?php echo $product->id ;?></td>
		<td><?php echo $product->iva ;?></td>
	<td><?php echo $almacen->cantidad ;?></td>
	<td><?php echo $product->nombre ;?></td>

	<td>$ <?php echo number_format($product->precio_sal,2,".",",") ;?></td>


  <td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal*($product->iva*1/100));$ivax=$total+$almacen->cantidad*$product->precio_sal;?></b></td>


<td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal - $almacen->cantidad*$product->precio_sal*($product->iva )*1/100) ?>  </b></td>



   
	<td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal,2,".",",");$total+=$almacen->cantidad*$product->precio_sal;?></b></td>   


<td><b>$ <?php echo number_format($sell->efectivo-$sell->total ); ?></b></td> 

</tr>




<?php

	}
	?>
</table>

<br><br>
<div class="row">
<div class="col-md-4">
<table class="table table-bordered">
<tr>
<td><h4>Id Factura</h4></td>
<td><h4><?php echo $factura->id ;?></h4></td>
</tr>

	<tr>
		<td><h4>Descuento:</h4></td>
		<td><h4>$ <?php echo number_format($sell->descuento,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Subtotal:</h4></td>
		<td><h4>$ <?php echo number_format($total-$total * ($product->iva*1/100) ,2,'.',','); ?></h4></td>
	</tr>

	<tr>
		<td><h4>Total IVA:</h4></td>
		<td><h4>$ <?php echo number_format($total * ($product->iva*1/100) ,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>$ <?php echo number_format($total -	$sell->descuento,2,'.',','); ?></h4></td>

		<tr>
		<td><h4>devuelta:</h4></td>
		<td><h4>$ <?php echo number_format($sell->efectivo-$sell->total ); ?></h4></td>
	</tr>
	</tr>
</table>
</div>
</div>

<?php else:?>
	501 Internal Error
<?php endif; ?>



</div>

