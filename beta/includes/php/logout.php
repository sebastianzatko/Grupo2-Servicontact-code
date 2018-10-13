<?php
    session_start();
    require "../../blogic/User.php";
    $user=new b_user;
	$user->logout();
    header("location:index.php");
    exit();


?>
