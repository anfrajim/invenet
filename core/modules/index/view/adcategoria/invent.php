<?php

if(count($_POST)>0){
	$user = new Categoria();
	$user->nombre = $_POST["nombre"];
	$user->add();

print "<script>window.location='index.php?view=categorias';</script>";


}


?>
