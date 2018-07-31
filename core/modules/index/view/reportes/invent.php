<?php
$products = Articulo::getAll();
?>
<div>
<img src="na-res/img/invenet/inventario.png" height="200px">
</div>
<section class="content">
<div class="row">
	<div class="col-md-12">
	<h1>REPORTES DE INVENTARIO</h1>

						<form>
						<input type="hidden" name="view" value="reportes">
<div class="row">
<div class="col-md-3">

<select name="articulo_id" class="form-control">
	<option value="">--  TODOS --</option>
	<?php foreach($products as $p):?>
	<option value="<?php echo $p->id;?>"><?php echo $p->nombre;?></option>
	<?php endforeach; ?>
</select>

</div>
<div class="col-md-3">
<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
</div>
<div class="col-md-3">
<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
</div>

<div class="col-md-3">
<input type="submit" class="btn btn-success btn-block" value="Procesar">
</div>

</div>

</form>

	</div>
	</div>
<br>
<div class="row">
	
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
<?php if($_GET["sd"]!="" && $_GET["ed"]!=""):?>
			<?php 
			$operations = array();

			if($_GET["articulo_id"]==""){
			$operations = Almacen::getAllByDateOfficial($_GET["sd"],$_GET["ed"]);
			}
			else{
			$operations = Almacen::getAllByDateOfficialBP($_GET["articulo_id"],$_GET["sd"],$_GET["ed"]);
			} 


			 ?>

			 <?php if(count($operations)>0):?>
<table class="table table-bordered">
	<thead>
		<th>Id</th>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Operacion</th>
		<th>Fecha</th>
	</thead>
<?php foreach($operations as $operation):?>
	<tr>
		<td><?php echo $operation->id; ?></td>
		<td><?php echo $operation->getProduct()->nombre; ?></td>
		<td><?php echo $operation->cantidad; ?></td>
		<td><?php echo $operation->getOperationType()->nombre; ?></td>
		<td><?php echo $operation->fecha; ?></td>
	</tr>
<?php endforeach; ?>

</table>

			 <?php else:

			 ?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>No hay operaciones</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
</div>

			 <?php endif; ?>
<?php else:?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>Fecha Incorrectas</h2>
	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>

		<?php endif; ?>
	</div>
</div>

<br><br><br><br>
</section>
