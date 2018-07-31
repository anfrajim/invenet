<div>
<img src="na-res/img/invenet/articulos.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=nuevoarticulo" class="btn btn-default">Agregar Producto</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
</div>
		<h1>LISTADO DE PRODUCTOS</h1>
		<div class="clearfix"></div>


<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$articulos = Articulo::getAll();
if(count($articulos)>0){

if($page==1){
$curr_articulos = Articulo::getAllByPage($articulos[0]->id,$limit);
}else{
$curr_articulos = Articulo::getAllByPage($articulos[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($articulos)/$limit);
 $spaginas = count($articulos)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=articulos&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=articulos&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div id="HTMLtoPDF">
<div class="clearfix"></div>




<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>imagen</th>
		<th>Nombre</th>
		<th>Precio Entrada</th>
		<th>Precio Salida</th>
		<th>Ubicación</th>
		<th>Presentación</th>
		<th>Categoria</th>
		<th>Minima</th>
		<th>Activo</th>
		<th></th>
	</thead>
	<?php foreach($curr_articulos as $product):?>
	<tr>
		<td><?php echo $product->codigo_de_barras; ?></td>
		<td>
			<?php if($product->imagen!=""):?>
				<img src="storage/articulos/<?php echo $product->imagen;?>" style="width:64px;">
			<?php endif;?>
		</td>
		<td><?php echo $product->nombre; ?></td>
		<td>$ <?php echo number_format($product->precio_en,2,'.',','); ?></td>
		<td>$ <?php echo number_format($product->precio_sal,2,'.',','); ?></td>
		<td><?php echo ($product->ubicacion); ?></td>
		<td><?php echo ($product->presentacion); ?></td>
		<td><?php if($product->categoria_id!=null){echo $product->getCategory()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php echo $product->cantidad_min; ?></td>
		<td><?php if($product->estado): ?><i class="fa fa-check"></i><?php endif;?></td>
		

		<td style="width:70px;">
		<a href="index.php?view=editararticulo&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=delarticulo&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=articulos&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="articulos">
	<input type="number" min="1" step="1" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>



<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
	</div>
