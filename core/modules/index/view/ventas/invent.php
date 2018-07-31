<div>
<img src="na-res/img/invenet/venta.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
		<h1><i class=''></i> LISTADO DE VENTAS</h1>
		<div class="clearfix"></div>


<?php

$products = Factura::getSells();

if(count($products)>0){

	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th>Detalle Facturas</th>
		<th>Tipo de Articulos</th>
		<th>Total</th>
		<th>Fecha</th>
		<th>Eliminar Detalle Factura</th>
	</thead>
	
	<?php foreach($products as $sell):?>

	<tr>
		<td style="width:30px;">
		<a href="index.php?view=unaventa&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

		<td> 

<?php
$operations = Almacen::getAllProductsBySellId($sell->id);
echo count($operations);
?>


		<td>

<?php echo $sell->total; ?>		

		</td>



		<td><?php echo $sell->fecha; ?></td>
		<td style="width:30px;"><a href="index.php?view=borrarventa&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
	</tr>

<?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php
}


else{
	?>
	<div class="jumbotron">
		<h2>No hay ventas</h2>
		<p>No se ha realizado ninguna venta.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
