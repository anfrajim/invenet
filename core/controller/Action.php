<?php
class Action {
	public static function load($action){
		if(!isset($_GET['action'])){
			include "core/modules/".Module::$module."/action/".$action."/action-invent.php";
		}else{


			if(Action::isValid()){
				include "core/modules/".Module::$module."/action/".$_GET['action']."/action-invent.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['action']."</b> folder  !! - <a href='' target='_blank'>Help</a>");
			}



		}
	}
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/modules/".Module::$module."/action/".$_GET['action']."/action-invent.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "core/modules/".Module::$module."/action/".$action."/action-invent.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

}



?>