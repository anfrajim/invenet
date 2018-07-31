<?php


if(!empty($_POST)){
			if($_POST["username"]!=""&&$_POST["password"]!=""){
				$user = Empleado::getLogin($_POST["username"],sha1(md5($_POST["password"])));
				if($user!=null){
					if($user->estado){
						$_SESSION["user_id"]=$user->id;
						Core::redir("./?view=principal");
					}else{						
						Core::alert("Usuario inactivo");
						Core::redir("./?view=activate");
					}
				}else{
					Core::alert("Datos incorrectos");
					Core::redir("./?view=acceso");
				}
			}else{
				Core::alert("Datos vacios");
				Core::redir("./?view=acceso");
			}
		}
?>



