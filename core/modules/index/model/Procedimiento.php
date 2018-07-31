<?php
class Procedimiento {
	public static $tablename = "procedimientos";

	public function Procedimiento(){
		$this->nombre = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre) ";
		$sql .= "value (\"$this->nombre\")";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Procedimiento();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByName($nombre){
		 $sql = "select * from ".self::$tablename." where nombre=\"$nombre\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Procedimiento();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Procedimiento();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$cnt++;
		}
		return $array;
	}


}

?>
