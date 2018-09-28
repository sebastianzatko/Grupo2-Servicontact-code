<?php
    session_start();
    session_unset($_SESSION["id"]);
    session_unset($_SESSION["nombre"]);
    session_unset($_SESSION["foto"]);
    session_destroy();
    
    header("location:index.php");
    exit();


?>