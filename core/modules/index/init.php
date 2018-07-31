<?php


if(!isset($_GET["action"])){

	Module::loadLayout("index");
	
}else{
	Action::load($_GET["action"]);
}

?>


<!--
 Based on INVENTIO created by EVILNAPSIS, this new project has changes in database and you can have different users levels , return or repayment and bootstrap theme used on views is NICE ADMIN .

-->