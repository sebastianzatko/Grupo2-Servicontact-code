
<?php 
    session_start();
    if(!(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"]))):
?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Log In-Changero</title>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    	<link href="includes/css/stylo.css" rel="stylesheet">
    	<script src="includes/js/jquery-3.3.1.min.js"></script>
    	<script type="application/javascript" src="includes/js/notify.js"></script>
    </head>
    <body>
    	<br>
    	<div class="container">
    		
    	<center><img src="images/trabajos.png" class="logo"></center>
     	<form method="POST" action="login.php">
     		<center>
     		<div class="form-group">
     		
     			<input type="email" name="login" class="form-control" required  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required title="Debe introducir una direccion de correo valido" minlenght="10" maxlenght="120" placeholder="Correo Electronico" >
     			
     		
     		<br>
     		
     			<input type="password" name="contra" class="form-control" minlenght="8" maxlenght="60" required  placeholder="password">
     			
     		<br>
    
     		<button type="submit" name="submit" class="btn btn-primary"><p class="ini">Iniciar</p></button>
     		<br>
     		<br>
     		<a href="guardardato.php"><p> Aun no tienes cuenta? registrate aqui</p></a>
    
     		</div>
    		</center>
     </form>
    </div>
    
     <!-- Para el error-->
    <script>
    	
    	$(document).ready(function(){
    		var $_GET=[];
    		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
    		var error=$_GET['error'];
    		if(error==1){
    			$.notify("Ha ocurrido un error debido a que la direccion de email no esta habilitada o su contraseña es incorrecta", "error");
    		}
    		else if(error==2){
    			$.notify("Ha ocurrido un error debido a que los parametros son invalidos", "error");
    		}
    	});
    	
    
    </script>
    </body>
    
    </html>

<?php
    else:
        header("Location:index.php");
        
    endif;
?>

