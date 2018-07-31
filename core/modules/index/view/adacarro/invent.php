<?php

if(!isset($_SESSION["cart"])){


	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$_SESSION["cart"] = array($product);


	$cart = $_SESSION["cart"];


		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){


			$cantidad = Almacen::getQYesF($c["articulo_id"]);

			if($c["cantidad"]<=$cantidad){
				$num_succ++;


			}else{
				$error = array("articulo_id"=>$c["articulo_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}

		}


if($num_succ==count($cart)){
	$process = !false;
}
if($process==false){
	unset($_SESSION["cart"]);
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=venta";
</script>
<?php
}




}else {

$found = false;
$cart = $_SESSION["cart"];
$index=0;

$cantidad = Almacen::getQYesF($_POST["articulo_id"]);





$can = true;
if($_POST["cantidad"]<=$cantidad){
}else{
	$error = array("articulo_id"=>$_POST["articulo_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
	$errors[count($errors)] = $error;
	$can=false;
}

if($can==false){
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=venta";
</script>
<?php
}
?>

<?php
if($can==true){
foreach($cart as $c){
	if($c["articulo_id"]==$_POST["articulo_id"]){
		echo "found";
		$found=true;
		break;
	}
	$index++;

}

if($found==true){
	$cantidad1 = $cart[$index]["cantidad"];
	$cantidad2 = $_POST["cantidad"];
	$cart[$index]["cantidad"]=$cantidad1+$cantidad2;
	$_SESSION["cart"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$cart[$nc] = $product;

	$_SESSION["cart"] = $cart;
}

}
}
 print "<script>window.location='index.php?view=venta';</script>";


?>
