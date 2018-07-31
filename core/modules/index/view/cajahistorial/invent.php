<div class="row">
	<div class="col-md-12">

<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
		<h1><i class='fa fa-archive'></i> Historial de Caja</h1>
		<div class="clearfix"></div>


<?php
$boxes = Caja::getAll();
$products = Factura::getSellsUnBoxed();
if(count($boxes)>0){
$total_total = 0;
?>
<br>
<div id="HTMLtoPDF">
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<th>Total</th>
		<th>Fecha</th>
	</thead>
	<?php foreach($boxes as $box):
$sells = Factura::getByBoxId($box->id);

	?>

	<tr>
		<td style="width:30px;">
<a href="./index.php?view=c&id=<?php echo $box->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-arrow-right"></i></a>			
		</td>
		<td>

<?php
$total=0;
foreach($sells as $sell){
$operations = Almacen::getAllProductsBySellId($sell->id);
	foreach($operations as $operation){
		$product  = $operation->getProduct();
		$total += $operation->cantidad*$product->precio_sal;
	}
}
		$total_total += $total;
		echo "<b>$ ".number_format($total,2,".",",")."</b>";

?>			

		</td>
		<td><?php echo $box->fecha; ?></td>
	</tr>

<?php endforeach; ?>

</table>
<h1>Total: <?php echo "$ ".number_format($total_total,2,".",","); ?></h1>
	<?php
}else {

?>
	<div class="jumbotron">
		<h2>No hay ventas</h2>
		<p>No se ha realizado ninguna venta.</p>
	</div>

<?php } ?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
</div>
