<?php

    require "blogic/User.php";

    $usuario=new b_user;

    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["email"];
    $password=$_POST["contrasena"];
    $telefono=$_POST["telefono"];
    $direccion=$_POST["dir"];
    $provincia=$_POST["provincia"];
    $ciudad=$_POST["ciudad"];
    $imagen=$_FILES["imagen"];

    if(isset($_POST["nombre"]) and isset($_POST["apellido"]) and isset($_POST["email"]) and isset($_POST["contrasena"]) and isset($_POST["telefono"]) and isset($_POST["dir"]) and isset($_POST["provincia"]) and isset($_POST["ciudad"]) ){
        
        if($usuario->registrar($nombre,$apellido,$telefono,$email,$password,$imagen,$direccion,$provincia,$ciudad)){
            //caso de exito
            header('Location: espere.php ');
        }else{
            //aca iria otro error de que no se pudo registrar porque ya existe la cuenta o los parametros no concuerdan
            header('Location:guardardato.php?error=2');
        }
    }else{
        //aca iria un error de que las variables no estan seteadas
        header('Location:guardardato.php?error=1');
    }




?>