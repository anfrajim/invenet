<?php $user = Entidad::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Proveedor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=actualizarproveedor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" value="<?php echo $user->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" value="<?php echo $user->apellido;?>" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Compañia*</label>
    <div class="col-md-6">
      <input type="text" name="compania" value="<?php echo $user->compania;?>" required class="form-control" id="apellido" placeholder="Empresa">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion 1*</label>
    <div class="col-md-6">
      <input type="text" name="direccion1" value="<?php echo $user->direccion1;?>" class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion 2*</label>
    <div class="col-md-6">
      <input type="text" name="direccion2" value="<?php echo $user->direccion2;?>" class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email1" value="<?php echo $user->email1;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 1</label>
    <div class="col-md-6">
      <input type="text" name="telefono1"  value="<?php echo $user->telefono1;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 2</label>
    <div class="col-md-6">
      <input type="text" name="telefono2"  value="<?php echo $user->telefono2;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
    </div>
  </div>
</form>
	</div>
</div>
