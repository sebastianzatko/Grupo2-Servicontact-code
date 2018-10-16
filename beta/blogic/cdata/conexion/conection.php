<?php
    define("HOST", "sql173.main-hosting.eu."); 			
    define("USER", "u740561717_chang"); 			 
    define("PASSWORD", "ch4ng3r0_5464t8"); 	
    define("DATABASE", "u740561717_chang");  
    
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($mysqli->connect_error) {
        
        exit();
    }

?>