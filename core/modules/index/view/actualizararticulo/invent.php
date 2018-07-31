<?php

if(count($_POST)>0){
	$product = Articulo::getById($_POST["articulo_id"]);

	$product->codigo_de_barras = $_POST["codigo_de_barras"];
	$product->nombre = $_POST["nombre"];
	$product->precio_en = $_POST["precio_en"];
	$product->precio_sal = $_POST["precio_sal"];
	$product->iva = $_POST["iva"];
	$product->ubicacion = $_POST["ubicacion"];

  $product->descripcion = $_POST["descripcion"];
  $product->presentacion = $_POST["presentacion"];
  $product->cantidad_min = $_POST["cantidad_min"];
  $category_id="NULL";
  if($_POST["categoria_id"]!=""){ $category_id=$_POST["categoria_id"];}

  $estado=0;
  if(isset($_POST["estado"])){ $estado=1;}

  $product->estado=$estado;
  $product->categoria_id=$category_id;

	$product->user_id = $_SESSION["user_id"];
	$product->update();

	if(isset($_FILES["imagen"])){
		$imagen = new Upload($_FILES["imagen"]);
		if($imagen->uploaded){
			$imagen->Process("storage/products/");
			if($imagen->processed){
				$product->imagen = $imagen->file_dst_name;
				$product->update_imagen();
			}
		}
	}

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editararticulo&id=$_POST[articulo_id]';</script>";


}


?>
