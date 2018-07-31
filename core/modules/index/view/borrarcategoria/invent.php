<?php

$category = Categoria::getById($_GET["id"]);
$products = Articulo::getAllByCategoryId($category->id);
foreach ($products as $product) {
	$product->del_category();
}

$category->del();
Core::redir("./index.php?view=categorias");


?>
