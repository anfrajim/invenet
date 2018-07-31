<?php
class Almacen {
	public static $tablename = "almacenes";

	public function Almacen(){
		$this->nombre = "";
		$this->articulo_id = "";
		$this->cantidad = "";
		$this->cut_id = "";
		$this->tipo_procedimiento_id = "";
		$this->fecha = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (articulo_id,cantidad,tipo_procedimiento_id,venta_id,fecha) ";
		$sql .= "value (\"$this->articulo_id\",\"$this->cantidad\",$this->tipo_procedimiento_id,$this->venta_id,$this->fecha)";
		return Executor::doit($sql);
	}

	public function addreturn(){
		$sql = "insert into ".self::$tablename." (articulo_id,cantidad,tipo_procedimiento_id,devolucion_id,fecha) ";
		$sql .= "value (\"$this->articulo_id\",\"$this->cantidad\",$this->tipo_procedimiento_id,$this->devolucion_id,$this->fecha)";
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
		$sql = "update ".self::$tablename." set articulo_id=\"$this->articulo_id\",cantidad=\"$this->cantidad\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Almacen());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());

	}



	public static function getAllByDateOfficial($inicio,$final){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$inicio\" and date(fecha) <= \"$final\" order by fecha desc";
		if($inicio == $final){
		 $sql = "select * from ".self::$tablename." where date(fecha) = \"$inicio\" order by fecha desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}

	public static function getAllByDateOfficialBP($articulo, $inicio,$final){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$inicio\" and date(fecha) <= \"$final\" and articulo_id=$articulo order by fecha desc";
		if($inicio == $final){
		 $sql = "select * from ".self::$tablename." where date(fecha) = \"$inicio\" order by fecha desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}

	public function getProduct(){ 
	return Articulo::getById($this->articulo_id);
}
	public function getOperationtype(){ 
		return Procedimiento::getById($this->tipo_procedimiento_id);
	}

	public function getProductName(){ 
	return Articulo::getAll($this->nombre);
}




	public static function getQYesF($articulo_id){
		$cantidad=0;
		$operations = self::getAllByProductId($articulo_id);
		$input_id = Procedimiento::getByName("compra")->id;
		$output_id = Procedimiento::getByName("venta")->id;
		foreach($operations as $operation){
				if($operation->tipo_procedimiento_id==$input_id)
					{
					 $cantidad+=$operation->cantidad; 
					}
				else if($operation->tipo_procedimiento_id==$output_id){
				  $cantidad+=(-$operation->cantidad);
				 }
		}

		return $cantidad;
	}



public static function getQYesFDevolucion($articulo_id){
		$cantidad=0;
		$operations = self::getAllByProductId($articulo_id);
		$input_id = Procedimiento::getByName("compra")->id;
		$output_id = Procedimiento::getByName("venta")->id;
		foreach($operations as $operation){
				if($operation->tipo_procedimiento_id==$input_id)
					{ $cantidad+=$operation->cantidad; }
				else if($operation->tipo_procedimiento_id==$output_id){  
					$cantidad+=(-$operation->cantidad);
					 }
		}

		return $cantidad;
	}


	

	public static function getAllByProductId($articulo_id){
		$sql = "select * from ".self::$tablename." where articulo_id=$articulo_id  order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}


	


	public static function getAllProductsBySellId($venta_id){
		$sql = "select * from ".self::$tablename." where venta_id=$venta_id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}

	
public static function getAllProductsByReturnId($devolucion_id){
		$sql = "select * from ".self::$tablename." where devolucion_id=$devolucion_id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}

	public static function getAllByProductIdCutIdYesF($articulo_id,$cut_id){
		$sql = "select * from ".self::$tablename." where articulo_id=$articulo_id and cut_id=$cut_id order by fecha desc";
		return Model::many($query[0],new Almacen());
		return $array;
	}

	public static function getOutputQ($articulo_id,$cut_id){
		$cantidad=0;
		$operations = self::getOutputByProductIdCutId($articulo_id,$cut_id);
		$input_id = Procedimiento::getByName("compra")->id;
		$output_id = Procedimiento::getByName("venta")->id;
		foreach($operations as $operation){
			if($operation->tipo_procedimiento_id==$input_id){ 
				$cantidad+=$operation->cantidad; 
			}
			else if($operation->tipo_procedimiento_id==$output_id){  
				$cantidad+=(-$operation->cantidad); 
			}
		}

		return $cantidad;
	}

	public static function getOutputQYesF($articulo_id){
		$cantidad=0;
		$operations = self::getOutputByProductId($articulo_id);
		$input_id = Procedimiento::getByName("compra")->id;
		$output_id = Procedimiento::getByName("venta")->id;
		foreach($operations as $operation){
			if($operation->tipo_procedimiento_id==$input_id){ 
				$cantidad+=$operation->cantidad; 
			}
			else if($operation->tipo_procedimiento_id==$output_id){ 
			 $cantidad+=(-$operation->cantidad);
			  }
		}

		return $cantidad;
	}

	public static function getInputQYesF($articulo_id){
		$cantidad=0;
		$operations = self::getInputByProductId($articulo_id);
		$input_id = Procedimiento::getByName("compra")->id;
		foreach($operations as $operation){
			if($operation->tipo_procedimiento_id==$input_id){ $cantidad+=$operation->cantidad; }
		}

		return $cantidad;
	}



	

	public static function getOutputByProductId($articulo_id){
		$sql = "select * from ".self::$tablename." where articulo_id=$articulo_id and tipo_procedimiento_id=2 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}

////////////////////////////////////////////////////////////////////
	



	public static function getInputByProductId($articulo_id){
		$sql = "select * from ".self::$tablename." where articulo_id=$articulo_id and tipo_procedimiento_id=1 order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Almacen());
	}


////////////////////////////////////////////////////////////////////////////


}

?>
