<?php
class Entidad {
	public static $tablename = "entidad";


	public function Entidad(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->imagen = "";
		$this->password = "";
		$this->fecha = "NOW()";
	}

	public function add_client(){
		$sql = "insert into entidad (nombre,apellido,direccion1,email1,telefono1,tipo,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->direccion1\",\"$this->email1\",\"$this->telefono1\",1,$this->fecha)";
		Executor::doit($sql);
	}

	public function add_provider(){
		$sql = "insert into entidad (nombre,apellido,compania,direccion1,direccion2,email1,telefono1,telefono2,tipo,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->compania\",\"$this->direccion1\",\"$this->direccion2\",\"$this->email1\",\"$this->telefono1\",\"$this->telefono2\",2,$this->fecha)";
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

// partiendo de que ya tenemos creado un objecto Entidad previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email1=\"$this->email1\",direccion1=\"$this->direccion1\",apellido=\"$this->apellido\",telefono1=\"$this->telefono1\"
		 where id=$this->id";
		Executor::doit($sql);
	}

	public function update_client(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email1=\"$this->email1\",direccion1=\"$this->direccion1\",apellido=\"$this->apellido\",telefono1=\"$this->telefono1\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_provider(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email1=\"$this->email1\",direccion1=\"$this->direccion1\",direccion2=\"$this->direccion2\",apellido=\"$this->apellido\",compania=\"$this->compania\",telefono1=\"$this->telefono1\",telefono2=\"$this->telefono2\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Entidad();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->compania = $r['compania'];
			$data->direccion1 = $r['direccion1'];
			$data->direccion2 = $r['direccion2'];
			$data->telefono1 = $r['telefono1'];
			$data->telefono2 = $r['telefono2'];
			$data->email1 = $r['email1'];
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
			$array[$cnt] = new Entidad();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->compania = $r['compania'];
			$array[$cnt]->email = $r['email1'];
			$array[$cnt]->username = $r['username'];
			$array[$cnt]->telefono1 = $r['telefono1'];
			$array[$cnt]->telefono2 = $r['telefono2'];
			$array[$cnt]->direccion1 = $r['direccion1'];
			$array[$cnt]->direccion2 = $r['direccion2'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}

	public static function getClients(){
		$sql = "select * from ".self::$tablename." where tipo=1 order by nombre,apellido";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Entidad();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->telefono1 = $r['telefono1'];
			$array[$cnt]->direccion1 = $r['direccion1'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


	public static function getProviders(){
		$sql = "select * from ".self::$tablename." where tipo=2 order by nombre,apellido";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Entidad();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->compania = $r['compania'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->telefono1 = $r['telefono1'];
			$array[$cnt]->telefono2 = $r['telefono2'];
			$array[$cnt]->direccion1 = $r['direccion1'];
			$array[$cnt]->direccion2 = $r['direccion2'];
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
			$array[$cnt] = new Entidad();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


}

?>
