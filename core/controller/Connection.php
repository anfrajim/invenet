<?php
class Connection {
	public static $db;
	public static $con;

function Database()
{
	$con = new mysqli("localhost","root","","invenet1");
	if ($con->connect_errno)
	{
		echo "Error de Conexion a la Base de Datos  ".$con->connect_errno;
		exit();
	}
	else
	{
		return $con;
	}
}
}

?>


