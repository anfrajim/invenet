<?php 
$u=null;

if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
  $u = Empleado::getById($_SESSION["user_id"]);
   $u1 = Empleado::getById($_SESSION["user_id"]);
?>

<?php if(($u->admin) OR ($u1->vendedor)): ?>
<?php else:
Core::redir("./");?>

<div>
<img src="na-res/img/invenet/usuarios.png" height="200px">
</div>
<div class="row">
	<div class="col-md-12">
	<a href="index.php?view=nuevousuario" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
		<h1>LISTADO DE USUARIOS</h1>
<br>
		<?php

		$users = Empleado::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nombre de usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th>vendedor</th>
			<th>Contador</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nombre." ".$user->apellido; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->email; ?></td>
				<td>
					<?php if($user->estado):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->admin):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->vendedor):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->contador):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=editarusuario&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php

			}
 echo "</table>";


		}else{

		}


		?>


	</div>
</div>

     <?php endif;?>
     <?php endif;?> 
     