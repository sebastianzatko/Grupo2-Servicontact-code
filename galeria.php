<?php

  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="tabla.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="jquery-3.3.1.min.js"></script>
  <script src="jquery.js"></script> 
	<script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="sidebarNavigation.css">
  <script src="sidebarNavigation.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="galeria.css" rel="stylesheet">
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
	<nav id="nav" class="navbar navbar-dark bg-primary sidebarNavigation" data-sidebarClass="navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle left-navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <center><input type="text"  class=" form-control" name="buscar1" id="buscar2" placeholder="&#128269;Buscar servicios"></center>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav">
        
        <?php
          if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"]) ){
            echo "
            <li><a href='#'><img src='".$_SESSION["foto"]."' class='perfil'></a></li>
            <li><a href='#' class='nomb'>".$_SESSION["nombre"]."</a></li>
          
            <li><a href='index.php'><i class='icons iconos fas fa-home'></i></a></li>
            <li><a href='#'><i class='icons3 far fa-image'></i> Herramientas</a></li>
            <li><a href='galeria.php'><i class='icons4 iconos fas fa-wrench'></i> Galeria</a></li>";
         }else{
           
         }
       ?>
      </ul>

      <ul class="navbar-form navbar-left" id="form1" onsubmit="return enviar();" method="POST">
       <div class="form-group">
       
          <input type="text" class="form-control" name="buscar1" id="buscar1" placeholder="Buscar servicios">
        
        	<button name="enviando" class="btn btn-primary" id="boton"><i class="icons iconos fas fa-search"></i> Buscar</button>
          
    	 </div>
      </ul>
      
          <?php
            if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])){
              echo "
              <ul class='nav navbar-nav navbar-right'>
                  <li><a href=''><i class='icons5 far fa-star'></i> Mi puntuacion</a></li>
                  <li><a href='#'><i class='icons far fa-comments'></i></a></li>
                  <li><a href='#'><i class='icons1 far fa-bell'></i></a></li>
                  <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='icons2 far fa-user'></i> Mi perfil<span class='caret'></span></a>
                  <img src='".$_SESSION["foto"]."' class='perfiles'>
                  <ul class='dropdown-menu'>
                    <li><a href='perfil.php?idprofile=".$_SESSION["id"]."'>Mi perfil</a></li>
                    <li><a href='servicios.php'>Mis servicios</a></li>
                    <li role='separator' class='divider'></li>
                    <li><a href='logout.php'>Salir</a></li>
                  </ul>
                  </li>
              </ul>";
            }else{
              echo "
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='guardardato.php'><span class='glyphicon glyphicon-user'></span> Registrate</a></li>
                <li><a href='principal.php'><span class='glyphicon glyphicon-log-in'></span> Ingresar</a></li>
              </ul>
              ";
            }
           ?>
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 </div>
         
  

<img src="<?php echo $_SESSION["foto"]; ?>" class="im2">

<div class="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a aria-controls="" data-toggle="tab"  role="tab" href="#">Mis trabajo</a></li>
      <li role="presentation"><a aria-controls="">Juan gonzales</a></li>
      <li role="presentation"><a aria-controls="" data-toggle="modal"  role="tab" href="#ventana"><i class="fas fa-camera-retro"></i> subir foto</a></li>
         <div class="modal fade" id="ventana">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Subir Foto</h2>

                </div>
                 <div class="modal-body">
                     
                     
                      <select id="provincia" name="provincia" class="btn btn-info  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
                        
                                 </select>       
                      </br>
                               </br>

                          <button type="button" id="fot1" class="btn btn-primary" ><i class="fas fa-camera-retro"></i>Elegir foto</button>

                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-default">Cerrar</button>

                   <button type="button"  class="btn btn-success" >Guardar cambios</button>
                 </div>
              </div>
              
             </div>
           </div>
    </ul>
</div>
<div class="galeria">    
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >

</div>
         
  
</body>
</html>