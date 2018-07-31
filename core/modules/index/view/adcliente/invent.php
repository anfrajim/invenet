<?php

if(count($_POST)>0){
	$user = new Entidad();
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->direccion1 = $_POST["direccion1"];
	$user->email1 = $_POST["email1"];
	$user->telefono1 = $_POST["telefono1"];
	$user->add_client();

print "<script>window.location='index.php?view=clientes';</script>";


}


?>
