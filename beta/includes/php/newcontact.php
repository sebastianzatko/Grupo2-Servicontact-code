<?php
    
    
    if(isset($_POST["idcliente"]) and isset($_POST["idprofesional"])){
        require_once ("../../blogic/Contact.php");
        $idCliente=$_POST["idcliente"];
        $idProfesional=$_POST["idprofesional"];
        $contacto=new b_contact;
        if($contacto->ingresarContacto($idCliente,$idProfesional)){
            echo "Ya son amigos :)";
        }else{
            echo "A ocurrido un error en la base de datos";
        }
    }else{
        echo "Los indentificadores no estan seteados";
    }


?>