<html>
    <head>
        <title>Confirma tu correo electronico</title>
        <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
			if(isset($_GET['mail']) and isset($_GET['codigo'])){
				$mail=$_GET['mail'];
				$codigo=$_GET['codigo'];
				require "blogic/User.php";

				$user=new b_user;
				
				if($user->confirmaremail($mail,$codigo)){
					echo "<div class='panel panel-success'>
					  <div class='panel-heading'><h1>Tu cuenta se ha creado con exito :D</h1></div>
					  <div class='panel-body'>
							<p>Ya se ha registrado tu casilla de correo en nuestro servidor</p>
							<p>Ahora puedes disfrutar de todos los beneficios de esta maravillosa aplicacion</p>
							<p>Para continuar ingresa</p>
							<a href='principal.php'><button class='btn btn-primary'>Empezar a Changuear!</button></a>
					  </div>
					</div>";
				}else{
					echo "<div class='panel panel-danger'>
					  <div class='panel-heading'><h1>No se puede verificar esta cuenta</h1></div>
					  <div class='panel-body'>
						<p>Por algun motivo tu cuenta no puede ser activada en este momento</p>
						<p>Es posible que todavia no haya llegado tu peticion de registro a nuestros servidores</p>
						<p>Por favor intenta mas tarde</p>
					  </div>
					</div>";
				}
			}else{
				header("Location:index.php;");
			}
        ?>
    <body>  
</html>