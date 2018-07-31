<?php
class Factura {
	public static $tablename = "facturas";

	public function Factura(){
		$this->fecha = "NOW()";
	}

	public function getPerson(){
	 return Entidad::getById($this->entidad_id);
	}
	public function getUser(){ 
		return Empleado::getById($this->user_id);
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (total,efectivo,descuento,user_id,fecha) ";
		$sql .= "value ($this->total,$this->efectivo,$this->descuento,$this->user_id,$this->fecha)";
		return Executor::doit($sql);
	}

	public function add_re(){
		$sql = "insert into ".self::$tablename." (user_id,efectivo,tipo_procedimiento_id,total,fecha) ";
		$sql .= "value ($this->user_id,$this->efectivo,1,$this->total,$this->fecha)";
		return Executor::doit($sql);
	}


	public function add_with_client(){
		$sql = "insert into ".self::$tablename." (total,efectivo,tipo_procedimiento_id,descuento,entidad_id,user_id,fecha) ";
		$sql .= "value ($this->total,$this->efectivo,2,$this->descuento,$this->entidad_id,$this->user_id,$this->fecha)";
		return Executor::doit($sql);


	}


	

	public function add_re_with_client(){
		$sql = "insert into ".self::$tablename." (entidad_id,total,efectivo,tipo_procedimiento_id,user_id,fecha) ";
		$sql .= "value ($this->entidad_id,$this->total,$this->efectivo,1,$this->user_id,$this->fecha)";
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

	public function update_box(){
		$sql = "update ".self::$tablename." set caja_id=$this->caja_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getFacturas_Venta(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 order by id";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Factura();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->entidad_id = $r['entidad_id'];
			$array[$cnt]->apellido = $r['user_id'];
			$array[$cnt]->user_id = $r['tipo_procedimiento_id'];
			$array[$cnt]->caja_id = $r['caja_id'];
			$array[$cnt]->total = $r['total'];
			$array[$cnt]->efectivo = $r['efectivo'];
			$array[$cnt]->descuento = $r['descuento'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++;
		}
		return $array;
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Factura());
	}



	public static function getSells(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());
	}

	public static function getSellsUnBoxed(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 and caja_id is NULL order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());
	}

	public static function getByBoxId($id){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 and caja_id=$id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());
	}

	public static function getRes(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=1 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id<=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());

	}

	public static function getAllByDateOp($start,$end,$op){
  $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and tipo_procedimiento_id=$op order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());

	}
	public static function getAllByDateBCOp($clientid,$start,$end,$op){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and entidad_id=$clientid  and tipo_procedimiento_id=$op order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Factura());

	}

}

?>
