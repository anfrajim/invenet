<?php

if(!isset($_SESSION["reabastecer"])){


	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$_SESSION["reabastecer"] = array($product);


	$cart = $_SESSION["reabastecer"];



$process=true;


}else {

$found = false;
$cart = $_SESSION["reabastecer"];
$index=0;

$cantidad = Almacen::getQYesF($_POST["articulo_id"]);





$can = true;

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
	$_SESSION["reabastecer"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$cart[$nc] = $product;

	$_SESSION["reabastecer"] = $cart;
}

}
}
print "<script>window.location='index.php?view=surtido';</script>";


?>
