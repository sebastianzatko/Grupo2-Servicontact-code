<?php

  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
  <link href="includes/css/diseno.css" rel="stylesheet">
   <link href="includes/css/buscar.css" rel="stylesheet">
  <link rel="stylesheet" href="includes/css/sidebarNavigation.css">
  <link rel="stylesheet" href="includes/css/switchery.css">
  <link rel="stylesheet" href="includes/css/estrellas.css" />
  <link rel="stylesheet" href="includes/css/resultadosbusqueda.css" />
 
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />

  <script src="includes/js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script type="text/javascript" src="includes/js/switchery.js"></script>
	<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
	<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
</head>

<body>
<?php
    require "templates/menu.php";
    
    echo $htmlmenu1;
    
  ?>
  <div class="container-fluid" id="contenedorcontenido ">
    <br>
    <div class="container1">
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
          <div class="button-group">
            <center><button type="button" id="buscar2" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Buscar servicios <span class="caret"></span></button>
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
                                    </ul>
                                  </center>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="contenido">
                  <h3 class="head text-center">Empieze a buscar con Changero<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                  <p class="narrow text-center">
                    Para comenzar la busqueda debe seleccionar los servicios que desea encontrar</p>
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
  
var index="";
var latlong="-34.8184,-58.4563";

function getIP(json) {

  console.log("My public IP address is: ", json.ip);
  latlong="-34.8184,-58.4563";
  console.log(latlong);
}
$( '.dropdown-menu .small' ).on( 'click', function( event ) {
    return false;
})

var options = [];
    $( '.dropdown-menu .small' ).on( 'click', function( event ) {
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
        var datos=JSON.parse(data);
          
          //nada , no llegue
           
            if(datos.length===undefined){
                var htmlstring="<div class='row'><div class='col-xs-12 text-center'><div id='noresults'><h4><strong>No hay resultados :(</strong></h4></div></div></div>";
                $("#contenido").addClass("mensaje");
                $("#contenido").append(htmlstring);
                   
        
            }else{
                for(var i=0;i<datos.length;i++){
                      var mediaright="";
                      for(var y=0;y<datos[i][6].length;y++){
                        var puntuacionfinal="";
                        if(datos[i][4][y]!=null && datos[i][5][y]!=null){
                          puntuacionfinal=((parseInt(datos[i][4][y])/parseInt(datos[i][5][y]))/5)*100;
                        
                          var puntuacionfinalRedondeado=`${Math.round(puntuacionfinal / 10) * 10}%`;
                        
                          puntuacionfinal="<div class='stars-outer'><div class='stars-inner' style=width:"+String(puntuacionfinalRedondeado)+"!important></div></div>";
                          
                            
                          
                        }else{
                          puntuacionfinal="<b>Este servicio todavia no ha sido calificado</b>";
                        }
                        mediaright=mediaright+"<li><i class='"+datos[i][7][y]+"'></i><span>"+datos[i][6][y]+":"+puntuacionfinal+"</span></li>";
                      }
                      var distancia="";
                      console.log(datos[i][8]);
                      if(datos[i][8]==null || datos[i][8]==" " || datos[i][8]==undefined){
                          distancia="No se ha registrado la distancia de este usuario"
                          
                      }else{
                          var distanciaprimitiva=(parseFloat(datos[i][8])*1.60934);
                          console.log(distancia);
                          distancia="Se encuentra a "+String(distanciaprimitiva) +" kilometros aproximadamente"
                      }
                      
                      
                      var htmlstring="<section class='hidden-xs col-sm-12 col-md-12 thumbnail'><article class='search-result row'><div class='col-xs-12 col-sm-3 col-md-3'><a href='profesionnal.php?idprofile="+datos[i][0]+"' title='Foto de perfil' class='thumbnail'><img src='"+datos[i][3]+"' alt='"+datos[i][1]+" "+datos[i][2]+"' /></a></div><div class='col-xs-12 col-sm-3 col-md-3 excerpet separado'><h3><a  href='profesionnal.php?idprofile="+datos[i][0]+"' title=''>"+datos[i][1]+" "+datos[i][2]+"</a></h3></div><div class='col-xs-12 col-sm-6 col-md-6'><ul class='meta-search'>"+mediaright+"</ul></div><small>"+distancia+"</small></article></section><div class='media col-xs-12 hidden-sm hidden-md hidden-lg'><div class='media-left'><a href='profesionnal.php?idprofile="+datos[i][0]+"' ><img src='"+datos[i][3]+"' style='width: 90px;height: 90px;'></a></div><div class='media-body'><a class='redireccionamiento' href='profesionnal.php?idprofile="+datos[i][0]+"'><p>"+datos[i][1]+" "+datos[i][2]+"</p></a><p>"+mediaright+"</p></div><small>"+distancia+"</small></div>";
                      
                        
                    
                      $("#contenido").append(htmlstring);
                      mediaright="";
            }  
          
        
          
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
<!--<script type="application/javascript" src="http://ipinfo.io/?format=jsonp&callback=getIP"></script>-->
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
