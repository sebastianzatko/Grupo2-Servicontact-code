<?php
	if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"]) ){
            $profile= "
			<li><a href='index.php'><i class='icons iconos fas fa-home'></i></a></li>
            <img src='".$_SESSION["foto"]."' class='' style='width: 40px;height: 40px;border-radius: 50%;'>
            <li><a href='perfil.php?idprofile=".$_SESSION["id"]."' class='nomb'>".$_SESSION["nombre"]."</a></li>
          
            
           
            ";
         }else{
           $profile="";
         }
		 
		 if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])){
              $responsiveprofile= "
              <ul class='nav navbar-nav navbar-right'>
                  <li class='hidden-xs hidden-sm'><a href=''><i class='icons far fa-comments'></i></a></li>
                  <li class='hidden-md hidden-lg'><a href='arrowchat/public/mobile/'><i class='icons far fa-comments'></i> Chat Móvil</a></li>
                  <li><a href='#'><i class='icons1 far fa-bell'></i></a></li>
                  <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='fas fa-cogs'></i> Opciones<span class='caret'></span></a>
                  
                  <ul class='dropdown-menu'>
                    <li><a href='perfil.php?idprofile=".$_SESSION["id"]."'><i class='icons2 far fa-user'></i> Mi perfil</a></li>
                    <li><a href='servicios.php'><i class='icons5 fas fa-toolbox'></i> Mis servicios</a></li>
					<li><a href='puntuacion.php'><i class='icons5 far fa-star'></i> Mi puntuacion</a></li>
					<li><a href='galeria.php'><i class='icons3 far fa-image'></i> Galeria</a></li>
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
        <span class='sr-only' style='overflow:hidden;'>Toggle navigation</span>
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
      <ul class='navbar-form navbar-left'>
        
       <div class='form-group'>
       
      
            
      <div class='container'>
        <div class='row'>
            <div class='col-xs-10 col-md-9 col-sm-8 col-lg-10'>
          <a href='buscar.php'><button name='enviando' class='btn btn-primary'  style='border-color: white;'><i class='icons iconos fas fa-search'></i> Buscar</button></a>
            </div>
            <div class='col-xs-1 col-md-3 col-sm-4 col-lg-1'>
               <center><a href='index.php' class='btn'><spam id='buscar3'> Changero</spam></a></center>
            </div>
        </div>
        </div>
          
       </div>
      </ul>
      
      
          ".$responsiveprofile."
          
          
        
    </div>
  </div>
</nav>";


$htmlmenu2="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' style='display: none' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only' style='overflow:hidden;'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <div class='container'>
        <div class='row'>
            <div class='col-xs-1 col-md-8 col-sm-6 col-lg-4'>
                <a href='index.php' id='buscar3'><i class='fas fa-arrow-left'></i></a>
            </div>
            <div class='col-xs-10 col-md-8 col-sm-6 col-lg-4'>
               <center><spam id='buscar3'>Seleccion de Servicio Changero</spam></center>
            </div>
        </div>
        </div>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		
      <ul class='nav navbar-nav'>
        ".$profile."
        
      </ul>
		<ul class='navbar-form navbar-left'>
        
       
       
      
            
        	<a href='buscar.php'><button name='enviando' class='btn btn-primary' style='border-color: white;'><i class='icons iconos fas fa-search'></i> Buscar</button></a>
          
    	
      </ul>
      
		".$responsiveprofile."
          
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";





$htmlmenu1="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' style='display: none' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only' style='overflow:hidden;'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <div class='container'>
        <div class='row'>
            <div class='col-xs-1 col-md-8 col-sm-6 col-lg-4'>
                <a href='index.php' id='buscar3'><i class='fas fa-arrow-left'></i></a>
            </div>
            <div class='col-xs-10 col-md-8 col-sm-6 col-lg-4'>
               <center><spam id='buscar3'> Servicios Changero</spam></center>
            </div>
        </div>
        </div>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
     
      <ul class='nav navbar-nav'>
        ".$profile."
        
      </ul>
    
      <ul class='navbar-form navbar-left'>
        
       <div class='form-group medio'>
       
      
            
      <div class='container'>
        <div class='row'>
            <div class='col-xs-10 col-md-12 col-sm-10 col-lg-12'>
               <center><spam id='buscar4'> Servicios Changero</spam></center>
            </div>
        </div>
        </div>
          
    	 </div>
      </ul>
		".$responsiveprofile."
          
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";

$htmlmenu4="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' style='display: none' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <div class='container'>
        <div class='row'>
            <div class='col-xs-1 col-md-8 col-sm-6 col-lg-4'>
                <a href='index.php' id='buscar3'><i class='fas fa-arrow-left'></i></a>
            </div>
            <div class='col-xs-10 col-md-8 col-sm-6 col-lg-4'>
               <center><spam id='buscar3'> Mi puntuacion</spam></center>
            </div>
        </div>
        </div>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
     
      <ul class='nav navbar-nav'>
        ".$profile."
        
      </ul>
		<ul class='navbar-form navbar-left'>
        
     
       
      
            
          <a href='buscar.php'><button name='enviando' class='btn btn-primary' style='border-color: white;'><i class='icons iconos fas fa-search'></i> Buscar</button></a>
          
     
      </ul>
      
    ".$responsiveprofile."
          
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";

$htmlmenu3="<nav id='nav' class='navbar navbar-dark bg-primary sidebarNavigation' data-sidebarClass='navbar-inverse'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>

      <button type='button' class='navbar-toggle left-navbar-toggle' data-toggle='collapse' style='display: none' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <div class='container hidden-md hidden-lg'>
        <div class='row'>
            <div class='col-xs-1 col-md-8 col-sm-6 col-lg-4'>
                <a href='index.php' id='buscar3'><i class='fas fa-arrow-left'></i></a>
            </div>
            <div class='col-xs-10 col-md-8 col-sm-6 col-lg-4'>
               <center><spam id='buscar3'> Ver Perfil</spam></center>
            </div>
        </div>
        </div>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		<ul class='navbar-form navbar-left'>
        
       
       
      
            
          <a href='buscar.php'><button name='enviando' class='btn btn-primary' style='border-color: white;'><i class='icons iconos fas fa-search'></i> Buscar</button></a>
          
      
      </ul>
      <ul class='nav navbar-nav'>
        ".$profile."
        
      </ul>
    
      
    ".$responsiveprofile."
          
          
          
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";

$myid=-1;
if (isset($_SESSION['id'])){
    $myid=$_SESSION['id'];
}

$modalcita = '<style>
#not'.$myid.'{
    display: none;
}
</style>
<!-- MODAL CITAS -->
<div class="modal" id="formcita" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Crear cita</h2>
        </div>
        <div class="modal-body" id="formulariocita">
        <h3 id="citah3"></h3>
        <div>
          <form action="#" type="post" role="form">
          	<div>
            	<label for="servicios">Servicios a contratar:</label>
            </div>
            <div>
            	<select multiple class="form-control" id="servicios">
				</select>
            </div>
          	<div>
                <label for="servicios">Ingrese fecha:</label>
            </div>
            <div>
            	<input type="date" class="form-control" id="fecha">
            </div>
          	<div>
            	<label for="servicios">Ingrese hora:</label>
            </div>
            <div>
            	<input type="time" class="form-control" id="hora">
            </div>
                <input type="hidden" class="form-control" id="prof">
                <input type="hidden" class="form-control" id='.$myid.'>
          </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
          <button type="button" id="submitform" class="btn btn-success" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
</div>
<!-- FIN DE MODAL-->';

echo $modalcita;

?>
