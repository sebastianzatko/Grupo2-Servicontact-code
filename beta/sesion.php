<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="tabla.css" rel="stylesheet">
	<script src="jquery-3.3.1.min.js"></script>
  <script src="jquery.js"></script> 
	<script src="bootstrap/bootstrap.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="diseno.css" rel="stylesheet">
</head>
<body>
  <script type="text/javascript">
    
    function enviar(){
     var buscar1= document.getElementById('buscar1').value;

    var datean ='buscar1=' =buscar1;
    $.ajax({
      type:'POST',
      url:'ima.php',
      data:datean,
      success:function(resp){
          $("#respa").html(resp);
      }
    });
    return false
    }
  </script>
	<nav id="nav" class="navbar navbar-dark bg-primary">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="chan" href="#">Changero</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"><i class="icons iconos fas fa-home"></i></a></li>
      
      </ul>
      <form class="navbar-form navbar-left" onsubmit="return enviar();" method="POST">
       <div class="form-group">
       
          <input type="text" class="form-control" name="buscar1" id="buscar1" placeholder="Buscar servicios">
        
        	<button name="enviando" class="btn btn-primary" id="boton"><i class="icons iconos fas fa-search"></i> Buscar</button>
          
    	</div>
      </form>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="#"><i class="icons iconos fas fa-comments"></i></a></li>
        <li><a href="#"><i class="icons far fa-bell"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icons iconos fas fa-user"> </i> Mi perfil<span class="caret"></span></a>
          <img src="images/jug.png" class="perfil">
          <ul class="dropdown-menu">
            <li><a href="#">ver perfil</a></li>
            <li><a href="#">cambiar foto de perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<br>
<br>
<br>
<br>

<img src="images/jug.png" class="imagen">

	
  <div class=" container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Collect the nav links, forms, and other content for toggling -->
   
    <div class="margin1">
      <ul  class="ula nav navbar-nav">
        <li><a id="letras href="#">Informacion</a></li>
        <li><a id="letras href="#">Trabajos</a></li>
        <li><a id="letras href="#">Herramientas</a></li>
         <li class="dropdown">
         	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mas<span class="caret"></span></a>
         	 <ul class="dropdown-menu">
         		<li><a id="letras href="#">editar servicios</a></li>
        		<li><a id="letras href="#">Puntación</a></li>
        	</ul>
        </li>
       </ul>
     </div>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->


</body>
</html>