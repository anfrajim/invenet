<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Proveedor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adproveedor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Empresa*</label>
    <div class="col-md-6">
      <input type="text" name="compania" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion 1</label>
    <div class="col-md-6">
      <input type="text" name="direccion1" class="form-control" required id="direccion1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion 2</label>
    <div class="col-md-6">
      <input type="text" name="direccion2" class="form-control" required id="direccion1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email1" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 1*</label>
    <div class="col-md-6">
      <input type="text" name="telefono1" class="form-control" id="telefono1" placeholder="Telefono">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono 2*</label>
    <div class="col-md-6">
      <input type="text" name="telefono2" class="form-control" id="telefono2" placeholder="Telefono">
    </div>
  </div>



  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
    </div>
  </div>
</form>
	</div>
</div>
