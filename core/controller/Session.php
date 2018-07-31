<?php

class Session {
	function __get($value){
		if(!$this->exist($value)){
			print "<b>SESSION ERROR</b> El parametro <b>$value</b> que intentas llamar no existe!";
			die();
		}
		return $_SESSION[$value];
	}

	function  exist($value){
		$found = false;
		if(isset($_SESSION[$value])){
			$found=true;
		}
		return $found;
	}
}



?>