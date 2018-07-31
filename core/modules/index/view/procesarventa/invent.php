<?php

if(isset($_SESSION["cart"])){
	$cart = $_SESSION["cart"];
	if(count($cart)>0){

		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){

			$cantidad = Almacen::getQYesF($c["articulo_id"]);
			if($c["cantidad"]<=$cantidad){
				if(isset($_POST["is_oficial"])){
				$cantidadyf =Almacen::getQYesF($c["articulo_id"]);
				if($c["cantidad"]<=$cantidadyf){
					$num_succ++;
				}else{
				$error = array("articulo_id"=>$c["articulo_id"],"message"=>"No hay suficiente cantidad de producto para facturar en inventario.");					
				$errors[count($errors)] = $error;
				}
				}else{

					$num_succ++;
				}
			}else{
				$error = array("articulo_id"=>$c["articulo_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}

		}

if($num_succ==count($cart)){
	$process = true;
}

if($process==false){
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=venta";
</script>
<?php
}









		if($process==true){
			$sell = new Factura();
			$sell->user_id = $_SESSION["user_id"];

			$sell->total = $_POST["total"];
			 $sell->efectivo = $_POST["efectivo"];
			$sell->descuento = $_POST["descuento"];
          

			 if(isset($_POST["client_id"]) && $_POST["client_id"]!=""){
			 	$sell->entidad_id=$_POST["client_id"];
 				$s = $sell->add_with_client();
			 }else{
 				$s = $sell->add();
			 }


		foreach($cart as  $c){


			$op = new Almacen();
			 $op->articulo_id = $c["articulo_id"] ;
			 $op->tipo_procedimiento_id=Procedimiento::getByName("venta")->id;
			 $op->venta_id=$s[1];
			 $op->cantidad= $c["cantidad"];

			if(isset($_POST["is_oficial"])){
				$op->is_oficial = 1;
			}

			$add = $op->add();			 		

			unset($_SESSION["cart"]);
			setcookie("selled","selled");
		}

print "<script>window.location='index.php?view=unaventa&id=$s[1]';</script>";
		}
	}
}



?>
