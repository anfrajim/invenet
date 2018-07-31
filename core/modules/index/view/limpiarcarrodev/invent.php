<?php
if(isset($_GET["articulo_id"])){
	$cart=$_SESSION["cart"];
	if(count($cart)==1){
	 unset($_SESSION["cart"]);
	}else{
		$ncart = null;
		$nx=0;
		foreach($cart as $c){
			if($c["articulo_id"]!=$_GET["articulo_id"]){
				$ncart[$nx]= $c;
			}
			$nx++;
		}
		$_SESSION["cart"] = $ncart;
	}

}else{
 unset($_SESSION["cart"]);
}

print "<script>window.location='index.php?view=surtido';</script>";

?>
