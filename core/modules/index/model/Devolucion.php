<?php
class Devolucion {
	public static $tablename = "devoluciones";

	public function Devolucion(){
		$this->fecha = "NOW()";
	}

	public function getPerson(){
	 return Entidad::getById($this->entidad_id);
	}
	public function getUser(){ 
		return Empleado::getById($this->user_id);
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (total,efectivo,user_id,factura_id,fecha) ";
		$sql .= "value ($this->total,$this->efectivo,$this->user_id,$this->factura_id,$this->fecha)";
		return Executor::doit($sql);
	}

	



	public function adddevol_with_client(){
		$sql = "insert into ".self::$tablename." (total,efectivo,tipo_procedimiento_id,entidad_id,user_id,factura_id,fecha) ";
		$sql .= "value ($this->total,$this->efectivo,3,$this->entidad_id,$this->user_id,$this->factura_id,$this->fecha)";
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

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Devolucion());
	}

public static function getRefFactura(){
		$sql = "select * from ".self::$tablename." where factura_id=$factura_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());
	}

public static function getdevoluciones(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=3 order by fecha desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());
	}
	public static function getSellsUnBoxed(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 and caja_id is NULL order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());
	}

	public static function getByBoxId($id){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=2 and caja_id=$id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());
	}

	public static function getRes(){
		$sql = "select * from ".self::$tablename." where tipo_procedimiento_id=1 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id<=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());

	}

	public static function getAllByDateOp($inicio,$final){
  $sql = "select * from ".self::$tablename." where date(fecha) >= \"$inicio\" and date(fecha) <= \"$final\" and tipo_procedimiento_id=3 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());

	}
	public static function getAllByDateBCOp($clientid,$inicio,$final){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$inicio\" and date(fecha) <= \"$final\" and entidad_id=$clientid  and tipo_procedimiento_id=3 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Devolucion());

	}

}

?>
