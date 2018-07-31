<?php

$venta = Factura::getById($_GET["id"]);
$operaciones = Almacen::getAllProductsBySellId($_GET["id"]);

foreach ($operaciones as $operacion) {
	$operacion->del();
}

$venta->del();
Core::redir("./index.php?view=ventas");

?>
