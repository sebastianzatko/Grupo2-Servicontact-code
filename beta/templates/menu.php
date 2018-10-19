<?php
	if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"]) ){
            $profile= "
            <li><a href='#'><img src='".$_SESSION["foto"]."' class='perfil'></a></li>
            <li><a href='#' class='nomb'>".$_SESSION["nombre"]."</a></li>
          
            <li><a href='index.php'><i class='icons iconos fas fa-home'></i></a></li>
            <li><a href='#'><i class='icons3 far fa-image'></i> Herramientas</a></li>
            <li><a href='galeria.php'><i class='icons4 iconos fas fa-wrench'></i> Galeria</a></li>";
         }else{
           $profile="";
         }
		 
		 if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])){
              $responsiveprofile= "
              <ul class='nav navbar-nav navbar-right'>
                  <li><a href=''><i class='icons5 far fa-star'></i> Mi puntuacion</a></li>
                  <li class='hidden-xs hidden-sm'><a href=''><i class='icons far fa-comments'></i></a></li>
                  <li class='hidden-md hidden-lg'><a href='arrowchat/public/mobile/'><i class='icons far fa-comments'></i> Chat Móvil</a></li>
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
              $responsiveprofile= "
              <ul class='nav navbar-nav navbar-right'>
                <li><a href='guardardato.php'><span class='glyphicon glyphicon-user'></span> Registrate</a></li>
                <li><a href='principal.php'><span class='glyphicon glyphicon-log-in'></span> Ingresar</a></li>
              </ul>
              ";
            }

	$htmlmenu="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
        <center><a href='buscar.php'><button type='button'  class='btn btn-primary ' name='buscar1' id='buscar2' >Buscar Servicios</button></a></center>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
     
      <ul class='nav navbar-nav'>
        
        ".$profile."
      </ul>

      <ul class='navbar-form navbar-left' id='form1' onsubmit='return enviar();' method='POST'>
       <div class='form-group'>
       
          <input type='text' class='form-control' name='buscar1' id='buscar1' placeholder='Buscar servicios'>
        
        	<button name='enviando' class='btn btn-primary' id='boton'><i class='icons iconos fas fa-search'></i> Buscar</button>
          
    	 </div>
      </ul>
      
          ".$responsiveprofile."
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>'";


$htmlmenu2="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' style='display: none' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
         <center><a href='index.php'  id='buscar3'><i class='fas fa-arrow-left'></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Selección de Servicios </a></center>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
     
      <ul class='nav navbar-nav'>
        ".$profile."
        
      </ul>

      <ul class='navbar-form navbar-left' id='form1' onsubmit='return enviar();' method='POST'>
       <div class='form-group'>
       
          <input type='text' class='form-control' name='buscar1' id='buscar1' placeholder='Buscar servicios'>
        
        	<button name='enviando' class='btn btn-primary' id='boton'><i class='icons iconos fas fa-search'></i> Buscar</button>
          
    	 </div>
      </ul>
		".$responsiveprofile."
          
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";













?>
