<?php

if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=""){
		print "<script>window.location='index.php?view=principal';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>.: LOGIN | INVENET :.</title>

    <!-- Bootstrap CSS -->    
  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container" >

      <form class="login-form" method="post" action="index.php?view=procesaracceso">        
        <div class="login-wrap">
            <p class="login-img"><i class=""></i><img src="na-res/img/inventory.png" height="150 px"></img></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>

        </div>
      </form>

    </div>


  </body>
</html>
