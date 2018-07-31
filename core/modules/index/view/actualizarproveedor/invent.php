<?php

if(count($_POST)>0){
	$user = Entidad::getById($_POST["user_id"]);
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->compania = $_POST["compania"];
	$user->direccion1 = $_POST["direccion1"];
	$user->direccion2 = $_POST["direccion2"];
	$user->email1 = $_POST["email1"];
	$user->telefono1 = $_POST["telefono1"];
	$user->telefono2 = $_POST["telefono2"];
	$user->update_provider();


print "<script>window.location='index.php?view=proveedores';</script>";


}


?>
