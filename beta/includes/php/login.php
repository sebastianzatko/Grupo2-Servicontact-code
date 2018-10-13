<?php

    require "blogic/User.php";
    $user=new b_user;

    $email=$_POST["login"];
    $contrasena=$_POST["contra"];

    if(isset($email) and isset($contrasena)){
        if($user->ingresar($email,$contrasena)){
            //caso bueno
            
            header("Location:index.php");
        }else{
            //caso mal de que no esta habilitado, no concuerda mail y contra o no existe
           
            header("Location:principal.php?error=2");
        }
    }else{
        //caso mal de las variables no estan seteadas
        
        header("Location:principal.php?error=1");
    }


?>