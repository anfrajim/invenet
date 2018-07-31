<?php 
$u=null;
$u1=null;
if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
  $u = Empleado::getById($_SESSION["user_id"]);
   $u1 = Empleado::getById($_SESSION["user_id"]);

?>

<?php if(($u->admin) OR ($u1->vendedor)): ?>


<div>
<img src="na-res/img/invenet/venta.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
	<h1>VENTA</h1>
	<p><b>Buscar producto por nombre o por codigo:</b></p>
		<form id="searchp">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="sell">
				<input type="text" id="product_code" name="product" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
		</form>
	</div>
<div id="show_search_results"></div>


<script>


$(document).ready(function(){
	$("#searchp").on("submit",function(e){
		e.preventDefault();
		
		$.get("./?action=searchproduct",$("#searchp").serialize(),function(data){
			$("#show_search_results").html(data);
		});
		$("#product_code").val("");

	});
	});

$(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});
</script>

<?php if(isset($_SESSION["errors"])):?>
<h2>Errores</h2>
<p></p>
<table class="table table-bordered table-hover">
<tr class="danger">
	<th>Codigo</th>
	<th>Producto</th>
	<th>Mensaje</th>
</tr>
<?php foreach ($_SESSION["errors"]  as $error):
$product = Articulo::getById($error["articulo_id"]);
?>
<tr class="danger">
	<td><?php echo $product->id; ?></td>
	<td><?php echo $product->nombre; ?></td>
	<td><b><?php echo $error["message"]; ?></b></td>
</tr>

<?php endforeach; ?>
</table>
<?php
unset($_SESSION["errors"]);
 endif; ?>


<!--- Carrito de compras :) -->
<?php if(isset($_SESSION["cart"])):
$total = 0;
?>
<h2>Lista de venta</h2>
<table class="table table-bordered table-hover">
<thead>
	<th style="width:30px;">Codigo</th>
	<th style="width:30px;">Cantidad</th>
	<th style="width:30px;">Unidad</th>
	<th style="width:30px;">Producto</th>
	<th style="width:30px;">Iva</th>
	<th style="width:30px;">Precio Unitario</th>
	<th style="width:30px;">Iva</th>
	<th style="width:30px;">SubTotal</th>
	<th style="width:30px;">Total</th>
    
	<th ></th>
</thead>

<?php foreach($_SESSION["cart"] as $p):
$product = Articulo::getById($p["articulo_id"]  );

?>
<tr >
    
	<td><?php echo $product->id; ?></td>
	<td ><?php echo $p["cantidad"]; ?></td>  
	<td><?php echo $product->ubicacion; ?></td>
	<td><?php echo $product->nombre; ?></td>
	<td><?php echo $product->iva; ?></td>

	<td><b>$ <?php echo number_format($product->precio_sal); ?></b></td>

	<td><b>$ <?php $iva = ($product->iva) * $product->precio_sal*$p["cantidad"] /100;  echo number_format($iva ); ?></b></td>

	<td><b>$ <?php $subtotal = $product->precio_sal*$p["cantidad"] - $product->precio_sal*$p["cantidad"]*($product->iva *0.01);  echo number_format($subtotal ); ?></b></td>

	<td><b>$ <?php $pt = $product->precio_sal*$p["cantidad"];; $total +=$pt; echo number_format($pt); ?>  </b></td>

	<td style="width:30px;"><a href="index.php?view=limpiarcarro&articulo_id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>

<?php endforeach; ?>





</table>
<form method="post" class="form-horizontal" id="processsell" action="index.php?view=procesarventa">
<h2>Resumen</h2>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-lg-10">
    <?php 


$client= new Entidad();
$clients= $client->getClients();

    ?>
    <select name="client_id" class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($clients as $client):?>
    	<option value="<?php echo $client->id;?>"><?php echo $client->nombre." ".$client->apellido;?></option>
    <?php endforeach;?>
    	</select>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descuento</label>
    <div class="col-lg-10">
      <input type="number" min="0" step="1" name="descuento" class="form-control" value="0" id="descuento" placeholder="Descuento">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Efectivo</label>
    <div class="col-lg-10">
      <input type="number" min="1" step="1" name="efectivo" required class="form-control" id="money" placeholder="Efectivo">
    </div>
  </div>
      <input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" placeholder="Total">

  <div class="row">
<div class="col-md-6 col-md-offset-6">
<table class="table table-bordered">
<tr>
	<td><p>Subtotal</p></td>
	<td><p><b>$ <?php echo number_format($total-$product->iva*$total*(1/100)); ?></b></p></td>
</tr>
<tr>
	<td><p>IVA</p></td>
	<td><p><b>$ <?php echo number_format($product->iva*$total*(1/100)); ?></b></p></td>
</tr>
<tr>
	<td><p>Total</p></td>
	<td><p><b>$ <?php echo number_format($total); ?></b></p></td>
</tr>

</table>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="is_oficial" type="hidden" value="1">
        </label>
      </div>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
		<a href="index.php?view=limpiarcarro" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
        <button class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-usd"></i><i class="glyphicon glyphicon-usd"></i> Finalizar Venta</button>
        </label>
      </div>
    </div>
  </div>
</form>
<script>
	$("#procesarventa").submit(function(e){
		discount = $("#discount").val();
		money = $("#money").val();
		if(money<(<?php echo $total;?>-discount)){
			alert("No se puede efectuar la operacion");
			e.preventDefault();
		}else{
			if(discount==""){ discount=0;}
			go = confirm("Cambio: $"+(money-(<?php echo $total;?>-discount ) ) );
			if(go){}
				else{e.preventDefault();}
		}
	});
</script>
</div>
</div>

<br><br><br><br><br>
<?php endif; ?>

</div>
<?php else:
Core::redir("./");?>

<?php endif;?>
      
     <?php endif;?>