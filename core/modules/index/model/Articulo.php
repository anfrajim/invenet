<?php
class Articulo {
	public static $tablename = "articulos";

	public function Articulo(){
		$this->nombre = "";
		$this->precio_en = "";
		$this->precio_sal = "";
		$this->iva = "";
		$this->ubicacion = "";
		$this->user_id = "";
		$this->presentacion = "0";
		$this->fecha = "NOW()";
	}

	public function getCategory(){
	 return Categoria::getById($this->categoria_id);
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (codigo_de_barras,nombre,descripcion,precio_en,precio_sal,iva,user_id,presentacion,ubicacion,categoria_id,cantidad_min,fecha) ";
		$sql .= "value (\"$this->codigo_de_barras\",\"$this->nombre\",\"$this->descripcion\",\"$this->precio_en\",\"$this->precio_sal\",\"$this->iva\",$this->user_id,\"$this->presentacion\",\"$this->ubicacion\",$this->categoria_id,$this->cantidad_min,NOW())";
		return Executor::doit($sql);
	}

	
	public function add_with_imagen(){
		$sql = "insert into ".self::$tablename." (codigo_de_barras,imagen,nombre,descripcion,precio_en,precio_sal,iva,user_id,presentacion,ubicacion,categoria_id,cantidad_min) ";
		$sql .= "value (\"$this->codigo_de_barras\",\"$this->imagen\",\"$this->nombre\",\"$this->descripcion\",\"$this->precio_en\",\"$this->precio_sal\",\"$this->iva\",$this->user_id,\"$this->presentacion\",\"$this->ubicacion\",$this->categoria_id,$this->cantidad_min)";
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

// partiendo de que ya tenemos creado un objecto Articulo previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set codigo_de_barras=\"$this->codigo_de_barras\",nombre=\"$this->nombre\",precio_en=\"$this->precio_en\",precio_sal=\"$this->precio_sal\",iva=\"$this->iva\",ubicacion=\"$this->ubicacion\",presentacion=\"$this->presentacion\",categoria_id=$this->categoria_id,cantidad_min=\"$this->cantidad_min\",descripcion=\"$this->descripcion\",estado=\"$this->estado\" where id=$this->id";
		Executor::doit($sql);
	}

	public function del_category(){
		$sql = "update ".self::$tablename." set category_id=NULL where id=$this->id";
		Executor::doit($sql);
	}


	public function update_imagen(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Articulo());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}

public static function getiva($id){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where codigo_de_barras like '%$p%' or nombre like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}



	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where category_id=$category_id order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Articulo());
	}







}

?>
