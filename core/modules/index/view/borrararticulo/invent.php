<?php

$operations = Almacen::getAllByProductId($_GET["id"]);

foreach ($operations as $op) {
	$op->del();
}

$product = Articulo::getById($_GET["id"]);
$product->del();

Core::redir("./index.php?view=articulos");
?>
