<?php

if(count($_POST)>0){

 $op = new Almacen();
 $op->articulo_id = $_POST["articulo_id"] ;
 $op->tipo_procedimiento_id=Procedimiento::getByName("compra")->id;
if(Procedimiento::getByName("compra")->nombre=="compra"){
	$op->venta_id="NULL";
}
 $op->cantidad= $_POST["cantidad"];

if($_POST["is_oficial"]=="1"){
	$op->is_oficial = 1;
}else{	
	$op->is_oficial = 0;
}

$add = $op->add();
if($op->is_oficial==1){
 print "<script>window.location='index.php?view=historial&articulo_id=$_POST[articulo_id]';</script>";
}else{


}

}

?>
