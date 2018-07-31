<?php
class Caja {
	public static $tablename = "caja";



	public function Caja(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->imagen = "";
		$this->password = "";
		$this->fecha = "NOW()";
	}

	public function add(){
		$sql = "insert into caja (fecha) ";
		$sql .= "value ($this->fecha)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Caja();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->fecha = $r['fecha'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Caja();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Caja();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


}

?>
