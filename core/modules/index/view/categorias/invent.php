<div>
<img src="na-res/img/invenet/articulos.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=nuevacategoria" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Categoria</a>
</div>
		<h1>CATEGORÍAS</h1>
<br>
		<?php

		$users = Categoria::getAll();
		if(count($users)>0){

			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nombre; ?></td>
				<td style="width:130px;"><a href="index.php?view=editarcategoria&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?view=borrarcategoria&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>


	</div>
</div>
