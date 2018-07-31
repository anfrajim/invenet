<div>
<img src="na-res/img/invenet/surtido.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
		<h1><i class=''></i>LISTADO DE SURTIDOS</h1>
		<div class="clearfix"></div>


<?php
$entradas = Factura::getRes();

if(count($entradas)>0){
	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<th>Tipos de Articulos</th>
		<th>Total</th>
		<th>Fecha</th>
		<th></th>
	</thead>

	<?php foreach($entradas as $sell):?>

	<tr>
		<td style="width:30px;"><a href="index.php?view=unsurtido&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

		<td>

<?php
$operations = Almacen::getAllProductsBySellId($sell->id);
echo count($operations);
?>
		</td>





	


		<td>

<?php
$total=0;
	foreach($operations as $operation){
		$product  = $operation->getProduct();
		$total += $operation->cantidad*$product->precio_en;
	}
		echo "<b>$ ".number_format($total)."</b>";

?>			

		</td>

		<td><?php echo $sell->fecha; ?></td>
		<td style="width:30px;"><a href="index.php?view=borrarsurtido&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>

	</tr>

<?php endforeach; ?>

</table>


	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay datos</h2>
		<p>No se ha realizado ninguna operacion.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>




	
