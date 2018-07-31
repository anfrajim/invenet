<?php
if(isset($_GET["articulo_id"])){
	$cart=$_SESSION["reabastecer"];
	if(count($cart)==1){
	 unset($_SESSION["reabastecer"]);
	}else{
		$ncart = null;
		$nx=0;
		foreach($cart as $c){
			if($c["articulo_id"]!=$_GET["articulo_id"]){
				$ncart[$nx]= $c;
			}
			$nx++;
		}
		$_SESSION["reabastecer"] = $ncart;
	}

}else{
 unset($_SESSION["reabastecer"]);
}

print "<script>window.location='index.php?view=surtido';</script>";

?>
