<div>
<img src="na-res/img/invenet/clientes.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=nuevocliente" class="btn btn-default"><i class='fa fa-smile-o'></i> Nuevo Cliente</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
     <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
</div>
<div id="HTMLtoPDF">
		<h1>DIRECTORIO DE CLIENTES</h1>
<br>
		<?php

		$users = Entidad::getClients();
		if(count($users)>0){

			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nombre." ".$user->apellido; ?></td>
				<td><?php echo $user->direccion1; ?></td>
				<td><?php echo $user->email1; ?></td>
				<td><?php echo $user->telefono1; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editarcliente&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=borrarcliente&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}


		?>


	</div>
</div>
</div>
<script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>
