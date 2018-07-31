
<?php


if(isset($_SESSION["user_id"])){
  $user = Empleado::getById($_SESSION["user_id"]);
  $password = sha1(md5($_POST["password"]));
  if($password==$user->password){
    $user->password = sha1(md5($_POST["newpassword"]));
    $user->update_passwd();
 ?>
 <br><br><br><br>
<div class="alert alert-success">
 <?php

  echo "La contraseña se ha cambiado exitosamente";  
  
?>
</div>

<br><br><br><br>

 <?php

 echo "Pruebe a iniciar con la nueva contraseña";  
    
  }else{
    print "<script>window.location='index.php?view=security&msg=invalidpasswd';</script>";    
  }

}else {
    Core::redir("./");
}


?>

