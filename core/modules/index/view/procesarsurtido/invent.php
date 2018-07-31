<?php
if(isset($_SESSION["reabastecer"])){
	$cart = $_SESSION["reabastecer"];
	if(count($cart)>0){

$process = true;










		if($process==true){
			$sell = new Factura();
			$sell->user_id = $_SESSION["user_id"];
			 if(isset($_POST["client_id"]) && $_POST["client_id"]!=""){
			 	$sell->entidad_id=$_POST["client_id"];
			 	$sell->total = $_POST["total"];
			 	$sell->efectivo = $_POST["efectivo"];
 				$s = $sell->add_re_with_client();

			 }else{
 				$s = $sell->add_re();
			 }


		foreach($cart as  $c){


			$op = new Almacen();
			 $op->articulo_id = $c["articulo_id"] ;
			 $op->tipo_procedimiento_id=1; // 1 - entrada
			 $op->venta_id=$s[1];

			 $op->cantidad= $c["cantidad"];

			if(isset($_POST["is_oficial"])){
				$op->is_oficial = 1;
			}

			$add = $op->add();			 		

		}
			unset($_SESSION["reabastecer"]);
			setcookie("selled","selled");

print "<script>window.location='index.php?view=unsurtido&id=$s[1]';</script>";
		}
	}
}



?>
