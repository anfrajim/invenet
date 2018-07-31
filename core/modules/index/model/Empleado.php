<?php
class Empleado {
	public static $tablename = "empleados";



	public function Empleado(){
		$this->nombre = "";
		$this->apellido = "";
		$this->email = "";
		$this->imagen = "";
		$this->password = "";
		$this->fecha = "NOW()";
	}

public static function getLogin($username,$password){
		$sql = "select * from ".self::$tablename." where username=\"$username\" and password=\"$password\"";

        $executor = new Executor ();  
         $query = $executor->doit($sql); 
		return Model::one($query[0],new Empleado());
	}


	public function add(){
		$sql = "insert into empleados (nombre,apellido,username,email,admin,vendedor,contador,password,fecha) 
		values ('$this->nombre','$this->apellido','$this->username','$this->email','$this->admin','$this->vendedor','$this->contador','$this->password',$this->fecha)";
		$executor = new Executor ();  
        $query = $executor->doit($sql); 
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",email=\"$this->email\",username=\"$this->username\",apellido=\"$this->apellido\",estado=\"$this->estado\",admin=\"$this->admin\" ,vendedor=\"$this->vendedor\",contador=\"$this->contador\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public function add_with_imagen(){
		$sql = "insert into ".self::$tablename." (imagen,nombre,description,precio_en,precio_sal,user_id,presentacion,ubicacion,categoria_id,cantidad_min) ";
		$sql .= "value (\"$this->imagen\",\"$this->nombre\",\"$this->descripcion\",\"$this->precio_en\",\"$this->precio_sal\",$this->user_id,\"$this->presentacion\",\"$this->ubicacion\",$this->categoria_id,$this->cantidad_min)";
		return Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Empleado();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->username = $r['username'];
			$data->admin = $r['admin'];
			$data->vendedor = $r['vendedor'];
			$data->contador = $r['contador'];
			$data->estado = $r['estado'];
			$data->email = $r['email'];
			$data->password = $r['password'];
			$data->fecha = $r['fecha'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Empleado();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Empleado();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->username = $r['username'];
			$array[$cnt]->estado = $r['estado'];
			$array[$cnt]->admin = $r['admin'];
			$array[$cnt]->vendedor = $r['vendedor'];
			$array[$cnt]->contador = $r['contador'];
			$array[$cnt]->password = $r['password'];
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
			$array[$cnt] = new Empleado();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}


}

?>
