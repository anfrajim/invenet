<?php

class Executor {

	public static function getCon(){
		if(Connection::$con==null && Connection::$db==null){
			Connection::$db = new Connection();
			Connection::$con = Connection::$db->Database();
		}
	

		 $con = new Connection();
         $conection = $con->Database();
         return $conection;
	}




	public static function doit($sql){
	
          
          $conection = new Executor();
          $con = $conection->getCon();

		if(Core::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		return array($con->query($sql),$con->insert_id);
	}
}
?>