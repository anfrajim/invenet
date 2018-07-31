<div>
<img src="na-res/img/invenet/proveedores.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=nuevoproveedor" class="btn btn-default"><i class='fa fa-truck'></i> Nuevo Proveedor</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" onclick="HTMLtoPDF()">Reporte PDF</a></li>
  </ul>
</div>
</div>
		<h1>DIRECTORIO DE PROVEEDORES</h1>
<br>
		<?php

		$users = Entidad::getProviders();
		if(count($users)>0){

			?>
    <div id="HTMLtoPDF">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Empresa</th>
			<th>Direccion1</th>
			<th>Direccion2</th>
			<th>Email</th>
			<th>Telefono1</th>
			<th>Telefono2</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nombre." ".$user->apellido; ?></td>
				<td><?php echo $user->compania; ?></td>
				<td><?php echo $user->direccion1; ?></td>
				<td><?php echo $user->direccion2; ?></td>
				<td><?php echo $user->email1; ?></td>
				<td><?php echo $user->telefono1; ?></td>
				<td><?php echo $user->telefono2; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editarproveedor&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delproveedor&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay proveedores</p>";
		}


		?>


	</div>
</div>
</div>
