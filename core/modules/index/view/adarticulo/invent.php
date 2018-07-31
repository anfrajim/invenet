<?php


if(count($_POST)>0){
  $product = new Articulo();
  $product->codigo_de_barras = $_POST["codigo_de_barras"];
  $product->nombre = $_POST["nombre"];
  $product->precio_en = $_POST["precio_en"];
  $product->precio_sal = $_POST["precio_sal"];
  $product->iva = $_POST["iva"];
  $product->ubicacion = $_POST["ubicacion"];
  $product->descripcion = $_POST["description"];
  $product->presentacion = $_POST["presentacion"];
  

  $category_id="NULL";
  if($_POST["categoria_id"]!="")
    { $category_id=$_POST["categoria_id"];

}
  $inventary_min="\"\"";
  if($_POST["cantidad_min"]!=""){ $inventary_min=$_POST["cantidad_min"];}

  $product->categoria_id=$category_id;
  $product->cantidad_min=$inventary_min;
  $product->user_id = $_SESSION["user_id"];


  if(isset($_FILES["imagen"])){
    $imagen = new Upload($_FILES["imagen"]);
    if($imagen->uploaded){
      $imagen->Process("storage/products/");
      if($imagen->processed){
        $product->imagen = $imagen->file_dst_name;
        $prod = $product->add_with_imagen();
      }
    }else{

  $prod= $product->add();
    }
  }
  else{
  $prod= $product->add();

  }




if($_POST["cantidad"]!="" || $_POST["cantidad"]!="0"){
 $op = new Almacen();
 $op->articulo_id = $prod[1] ;
 $op->tipo_procedimiento_id=Procedimiento::getByName("compra")->id;
 $op->cantidad= $_POST["cantidad"];
 $op->venta_id="NULL";
$op->is_oficial=1;
$op->add();
}

print "<script>window.location='index.php?view=articulos';</script>";


}


?>
