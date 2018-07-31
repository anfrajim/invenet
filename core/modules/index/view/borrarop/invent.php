<?php

print_r($_GET);

$operation = Almacen::getById($_GET["opid"]);
$operation->del();

print "<script>window.location='index.php?view=$_GET[ref]&articulo_id=$_GET[pid]';</script>";

?>