
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
<h1>Resumen de Devolucion</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$return = Devolucion::getById($_GET["id"]);
$product = Articulo::getById($_GET["id"]);
$factura = Devolucion::getById($_GET["id"]);
$almacens = Almacen::getAllProductsByReturnId($_GET["id"]);
$total = 0;
?>

<div id="HTMLtoPDF">
<table class="table table-bordered">
<?php if($return->entidad_id!=""):
$client = $return->getPerson();
?>
<tr>
	<td style="width:150px;">Cliente</td>
	<td><?php echo $client->nombre." ".$client->apellido;?></td>
</tr>

<?php endif; ?>
<?php if($return->user_id!=""):
$user = $return->getUser();
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

	</thead>
<?php
	foreach($almacens as $almacen){
		$product  = $almacen->getProduct();
		
?>

	<td><?php echo $product->id ;?></td>
		<td><?php echo $product->iva ;?></td>
	<td><?php echo $almacen->cantidad ;?></td>
	<td><?php echo $product->nombre ;?></td>

	<td>$ <?php echo number_format($product->precio_sal,2,".",",") ;?></td>


  <td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal*$product->iva);$ivax=$total+$almacen->cantidad*$product->precio_sal;?></b></td>


<td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal - $almacen->cantidad*$product->precio_sal*$product->iva ) ?>  </b></td>



   
	<td><b>$ <?php echo number_format($almacen->cantidad*$product->precio_sal,2,".",",");$total+=$almacen->cantidad*$product->precio_sal;?></b></td>   


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
<td><h4><?php echo $factura->factura_id ;?></h4></td>
</tr>

	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>$ <?php echo number_format($return->total,2,'.',','); ?></h4></td>
	</tr>
</table>
</div>
</div>
<?php else:?>
	501 Internal Error
<?php endif; ?>


</div>

