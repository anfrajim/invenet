<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["admin"])){$is_admin=1;}
	$estado=0;
	if(isset($_POST["estado"])){$estado=1;}
	$is_seller=0;
	if(isset($_POST["vendedor"])){$is_seller=1;}
	$is_counter=0;
	if(isset($_POST["contador"])){$is_counter=1;}
	$user = Empleado::getById($_POST["user_id"]);
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->admin=$is_admin;
	$user->estado=$estado;
	$user->vendedor=$is_seller;
	$user->contador=$is_counter;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=usuarios';</script>";


}


?>
