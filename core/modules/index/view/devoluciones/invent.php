<div>
<img src="na-res/img/invenet/devolucion.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
		<h1><i class=''></i> LISTADO DE DEVOLUCIONES</h1>
		<div class="clearfix"></div>


<?php

$products = Devolucion::getdevoluciones();

if(count($products)>0){

	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th>Detalle Factura Devolución</th>
		<th>Tipo de Articulos</th>
		<th>Total</th>
		<th>Fecha</th>
		<th>Eliminar Detalle Devolución </th>
	</thead>



	<?php foreach($products as $devolucion):?>

	<tr>
		<td style="width:30px;">
		<a href="index.php?view=unadevolucion&id=<?php echo $devolucion->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>






		<td>



<?php
$operations = Almacen::getAllProductsByReturnId($devolucion->id);
echo count($operations);
?>



	<td><?php echo $devolucion->total; ?></td>

		<td><?php echo $devolucion->fecha; ?></td>

		<td style="width:30px;"><a href="index.php?view=deldevolucion&id=<?php echo $devolucion->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>

	</tr>

<?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php
}else{
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
