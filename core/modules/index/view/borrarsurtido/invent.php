<?php

$sell = Factura::getById($_GET["id"]);
$operations = Almacen::getAllProductsBySellId($_GET["id"]);

foreach ($operations as $op) {
	$op->del();
}

$sell->del();
Core::redir("./index.php?view=surtidos");

?>
