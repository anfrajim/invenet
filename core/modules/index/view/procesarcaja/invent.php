<?php
$sells = Factura::getSellsUnBoxed();

if(count($sells)){
	$box = new Caja();
	$b = $box->add();
	foreach($sells as $sell){
		$sell->caja_id = $b[1];
		$sell->update_box();
	}
	Core::redir("./index.php?view=c&id=".$b[1]);
}

?>
