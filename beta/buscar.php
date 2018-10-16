<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="includes/css/switchery.css">
 <script src="includes/js/jquery.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="includes/js/switchery.js"></script>
   <script type="text/javascript" src="includes/js/search.js"></script>
  <link href="includes/css/buscar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link rel="stylesheet" href="includes/css/estrellas.css" />
  <link rel="stylesheet" href="includes/css/resultadosbusqueda.css" />
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
</head>
<body>
<nav id="nav" class="navbar navbar-dark bg-primary sidebarNavigation" data-sidebarClass="navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle left-navbar-toggle" style="display: none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <center><a href="index.php"  id="buscar3"><i class="fas fa-arrow-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Volver al menu</a></center>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav">
        
        <li><a href="#"><img src="images/jug.png" class="perfil"></a></li>
        <li><a href="#" class="nomb">Juan</a></li>
       
        <li><a href="index.php"><i class="icons iconos fas fa-home"></i></a></li>
        <li><a href="#"><i class="icons3 far fa-image"></i> Herramientas</a></li>
        <li><a href="#"><i class="icons4 iconos fas fa-wrench"></i> Galeria</a></li>
       
      </ul>
		
		
		
      <ul class="navbar-form navbar-left" id="form1" onsubmit="return enviar();" method="POST">
       <div class="form-group">
       
          <input type="text" class="form-control" name="buscar1" id="buscar1" placeholder="Buscar servicios">
        
          <button name="enviando" class="btn btn-primary" id="boton"><i class="icons iconos fas fa-search"></i> Buscar</button>
          
       </div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><i class="icons5 far fa-star"></i> Mi puntuacion</a></li>
        <li><a href="#"><i class="icons far fa-comments"></i></a></li>
        <li><a href="#"><i class="icons1 far fa-bell"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icons2 far fa-user"></i> Mi perfil<span class="caret"></span></a>
          <img src="images/jug.png" class="perfiles">
          <ul class="dropdown-menu">
            <li><a href="sesion.php">ver perfil</a></li>
            <li><a href="servicios.php">Mis servicios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		
      <div class="container-fluid">
    <br>
	<div class="row">
	<?php
			require "blogic/Services.php";
			
			
			$servicios=new services;
			
			$listaservicios=$servicios->getservicios();
			
			$dataAr = json_decode($listaservicios , true);
            

			foreach($dataAr as $data)
			{
			    
				
				echo "<button  name='services[]' class='btn btn-primary' value='".$data[0]."'  /><span class='spa'> <i class='".$data[2]."'></i> " .$data[1]."</span></button>";
				

			}
			
		?>
		</div>
		<div id="contenido">
			<h3 class="head text-center">Empieze a buscar con Changero<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
			  <p class="narrow text-center">
				  Para comenzar la busqueda debe seleccionar los servicios que desea encontrar
			  </p>
                          
			<p class="text-center">
		</div>

    <br>
	 
  </div>
   
</body>
 

<script type="text/javascript">
  var options = [];

$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   console.log( options );
   return false;
});
</script>

<script type="application/javascript" src="http://ipinfo.io/?format=jsonp&callback=getIP"></script>
</html>