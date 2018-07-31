<?php

if(!isset($_SESSION["cartn"])){


	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$_SESSION["cartn"] = array($product);


	$cart = $_SESSION["cartn"];


		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){

			///
			$cantidad = Almacen::getQNoF($c["articulo_id"],$cut->id);
			print_r($c);
			echo ">>".$cantidad;
			if($c["cantidad"]<=$cantidad){
				$num_succ++;


			}else{
				$error = array("articulo_id"=>$c["articulo_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}

		}


echo $num_succ;
if($num_succ==count($cart)){
	$process = true;
}
if($process==false){
	unset($_SESSION["cartn"]);
$_SESSION["errorsn"] = $errors;
	?>	
<script>
	window.location="index.php?view=ventan";
</script>
<?php
}




}else {

$found = false;
$cart = $_SESSION["cartn"];
$index=0;

$cantidad = Almacen::getcantidadYesF($_POST["articulo_id"],$cut->id);





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
	window.location="index.php?view=ventan";
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
	print_r($c);
	print "<br>";
}

if($found==true){
	$cantidad1 = $cart[$index]["cantidad"];
	$cantidad2 = $_POST["cantidad"];
	$cart[$index]["cantidad"]=$cantidad1+$cantidad2;
	$_SESSION["cartn"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("articulo_id"=>$_POST["articulo_id"],"cantidad"=>$_POST["cantidad"]);
	$cart[$nc] = $product;
	print_r($cart);
	$_SESSION["cartn"] = $cart;
}

}
}
 print "<script>window.location='index.php?view=ventan';</script>";

?>
