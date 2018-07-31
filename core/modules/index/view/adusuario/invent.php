<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["admin"]))
	{
		$is_admin=1;
	}
	$is_seller=0;
	if(isset($_POST["vendedor"])){
		$is_seller=1;
	}
	$is_counter=0;
	if(isset($_POST["contador"])){
		$is_counter=1;
	}
	$user = new Empleado();
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->admin=$is_admin;
	$user->vendedor=$is_seller;
	$user->contador=$is_counter;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=usuarios';</script>";


}


?>
