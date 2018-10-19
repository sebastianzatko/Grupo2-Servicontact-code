<?php

  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <script src="includes/js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="includes/css/muro.css" rel="stylesheet">
  <link href="includes/css/diseno.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
  <link href="includes/css/buscar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
    <script type="text/javascript" src="includes/js/switchery.js"></script>
     <link rel="stylesheet" type="text/css" href="includes/css/switchery.css">
  <link rel="stylesheet" href="includes/css/estrellas.css" />
    <link rel="stylesheet" href="includes/css/resultadosbusqueda.css" />
</head>
<body>
<nav id="nav" class="navbar navbar-dark bg-primary sidebarNavigation" data-sidebarClass="navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle left-navbar-toggle" data-toggle="collapse" style="display: none" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
         <center><a href="index.php"  id="buscar3"><i class="fas fa-arrow-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Volver al menu </a></center>
     
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
            <li><a href='#'><i class='icons4 iconos fas fa-wrench'></i> Galeria</a></li>";
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

		
      <div class="container-fluid" id="contenedorcontenido ">
    <br>
  
    <div class="container1">
              <div class="row">
                          <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                             <div class="button-group">
                               <center> <button type="button" id="buscar2" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Buscar servicios <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="width: 100%;">
                            
                        <?php
                            
                            
                            require "blogic/Services.php";
			
			
                			$servicios=new services;
                			
                			$listaservicios=$servicios->getservicios();
                			
                			$dataAr = json_decode($listaservicios , true);
                            foreach($dataAr as $data)
                  			{
                  			    
                  				
                                                    
                                
                                echo "<li><a class='small' data-value='option1' data-id='".$data[0]."' tabIndex='-1'><input type='checkbox' class='js-switch' value='".$data[0]."'/><span class='spa'> <i class='".$data[2]."'></i> " .$data[1]."</span></a></li>";
                  			}
                        
                        
                        ?>
                        <script type="text/javascript">
            
                              var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                                  elems.forEach(function(html) {
                                    
                                    var switchery = new Switchery (html, {disabled: true ,
                                     color              :  '#3BBD4B',
                                     secondaryColor:'#CBCDCE',
                                     size: 'small'
                                      });
                                       
                                        });
                            </script>
                        </ul></center>
                          </div>
                        </div>
                  </div>
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
   
  
      
    
  </div>
   <center><nav aria-label="...">
  <ul class="pagination" id="paginacion">
    
    
    
  </ul>
</nav></center>

    
    
</body>
 


<script type="text/javascript">
  function paginate (array, page_size, page_number) {
  --page_number; // because pages logically start with 1, but technically with 0
  return array.slice(page_number * page_size, (page_number + 1) * page_size);
}
var datos=[];
var index="";
var latlong="";

function getIP(json) {
    console.log("la concha de tu madre");
	console.log("My public IP address is: ", json.ip);
	latlong=json.loc;
	console.log(latlong);
}
$( '.dropdown-menu a' ).on( 'click', function( event ) {
    return false;
})

var options = [];
    $( '.dropdown-menu a' ).on( 'click', function( event ) {
       var $target = $( event.currentTarget ),
           val = $target.attr( 'data-id' ),
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
         
        	var serviciosABuscar=options;
	
	console.log(serviciosABuscar);
	

	
	$("#contenido").empty();
	var strincargando="<div class='row'><h3>Cargando datos... Por favor espere.</h3><div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%;'></div></div></div>";
	$("#contenido").append(strincargando);
	$.ajax({
		data:{ 
			servicios:JSON.stringify(serviciosABuscar),
			localizacion:latlong
		},
		url:"includes/php/search.php",
		type:"POST",
		success:function(data){
			if(data!==false){
				$("#contenido").empty();
			    console.log(data);
				datos=JSON.parse(data);
			    var datosseparados=paginate(datos, 2, 1)
			    console.log(Math.ceil(datos.length/2));
			    var limite=Math.ceil(datos.length/2);
			    for(var x=0;x<limite;x++){
			        $("#paginacion").append("<li class='page-item'><a class='page-link' value="+(x+1)+" href='#'>"+(x+1)+"</a></li>");
			        
			    }
			    //nada , no llegue
			    $(".page-link").click(function(){
			        index=$(this).val();
			        var separadosporpagina=paginate(datos, 2, index);
			        for(var i=0;i<datosseparados.length;i++){
					    $("#contenido").empty();
    					var mediaright="";
    					for(var y=0;y<datosseparados[i][6].length;y++){
    						var puntuacionfinal="";
    						if(datosseparados[i][4][y]!=null && datosseparados[i][5][y]!=null){
    							puntuacionfinal=((parseInt(datosseparados[i][4][y])/parseInt(datosseparados[i][5][y]))/5)*100;
    						
    							var puntuacionfinalRedondeado=`${Math.round(puntuacionfinal / 10) * 10}%`;
    						
    							puntuacionfinal="<div class='stars-outer'><div class='stars-inner' style=width:"+String(puntuacionfinalRedondeado)+"!important></div></div>";
    							
    								
    							
    						}else{
    							puntuacionfinal="<b>Este servicio todavia no ha sido calificado</b>";
    						}
    						mediaright=mediaright+"<li><i class='"+datosseparados[i][7][y]+"'></i><span>"+datosseparados[i][6][y]+":"+puntuacionfinal+"</span></li>";
    					}
    					
    					
    					
    					
    					var htmlstring="<section class='hidden-xs col-sm-12 col-md-12 thumbnail'><article class='search-result row'><div class='col-xs-12 col-sm-3 col-md-3'><a href='#' title='Lorem ipsum' class='thumbnail'><img src='"+datosseparados[i][3]+"' alt='"+datosseparados[i][1]+" "+datosseparados[i][2]+"' /></a></div><div class='col-xs-12 col-sm-3 col-md-3 excerpet separado'><h3><a href='#' title=''>"+datosseparados[i][1]+" "+datosseparados[i][2]+"</a></h3></div><div class='col-xs-12 col-sm-6 col-md-6'><ul class='meta-search'>"+mediaright+"</ul></div></article></section><div class='media col-xs-12 hidden-sm hidden-md hidden-lg'><div class='media-left'><a href='profesionnal.php'><img src='"+datosseparados[i][3]+"' style='width: 90px;height: 90px;'></a></div><div class='media-body'><p>"+datosseparados[i][1]+" "+datosseparados[i][2]+"</p><p>"+mediaright+"</p></div></div>";
    					
    				    
    				
    					$("#contenido").append(htmlstring);
    					mediaright="";
			        }
			    });
			    
				for(var i=0;i<datosseparados.length;i++){
					
					
					var mediaright="";
					for(var y=0;y<datosseparados[i][6].length;y++){
						var puntuacionfinal="";
						if(datosseparados[i][4][y]!=null && datosseparados[i][5][y]!=null){
							puntuacionfinal=((parseInt(datosseparados[i][4][y])/parseInt(datosseparados[i][5][y]))/5)*100;
						
							var puntuacionfinalRedondeado=`${Math.round(puntuacionfinal / 10) * 10}%`;
						
							puntuacionfinal="<div class='stars-outer'><div class='stars-inner' style=width:"+String(puntuacionfinalRedondeado)+"!important></div></div>";
							
								
							
						}else{
							puntuacionfinal="<b>Este servicio todavia no ha sido calificado</b>";
						}
						mediaright=mediaright+"<li><i class='"+datosseparados[i][7][y]+"'></i><span>"+datosseparados[i][6][y]+":"+puntuacionfinal+"</span></li>";
					}
					
					
					
					
					var htmlstring="<section class='hidden-xs col-sm-12 col-md-12 thumbnail'><article class='search-result row'><div class='col-xs-12 col-sm-3 col-md-3'><a href='#' title='Lorem ipsum' class='thumbnail'><img src='"+datosseparados[i][3]+"' alt='"+datosseparados[i][1]+" "+datosseparados[i][2]+"' /></a></div><div class='col-xs-12 col-sm-3 col-md-3 excerpet separado'><h3><a href='#' title=''>"+datosseparados[i][1]+" "+datosseparados[i][2]+"</a></h3></div><div class='col-xs-12 col-sm-6 col-md-6'><ul class='meta-search'>"+mediaright+"</ul></div></article></section><div class='media col-xs-12 hidden-sm hidden-md hidden-lg'><div class='media-left'><a href='profesionnal.php'><img src='"+datosseparados[i][3]+"' style='width: 90px;height: 90px;'></a></div><div class='media-body'><p>"+datosseparados[i][1]+" "+datosseparados[i][2]+"</p><p>"+mediaright+"</p></div></div>";
					
				    
				
					$("#contenido").append(htmlstring);
					mediaright="";
					
				}
			}else{
				console.log(data);
				var contenidoerrorstring="<div class='row'><div class='col-md-12'><div class='error-template'><h1>Oops!</h1><h2>404 No Encontrado</h2><div class='error-details'>Lo sentimos pero ha ocurrido un error en la busqueda</div><div class='error-actions'><a href='index.php' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-home'></span>Volver al home </a></div></div></div></div>";
				$("#contenido").addClass("mensaje");
				$("#contenido").empty();
				$("#contenido").append(contenidoerrorstring);
				
			}
			
		}
	});
	
       
    });
</script>
<script type="application/javascript" src="http://ipinfo.io/?format=jsonp&callback=getIP"></script>
</html>