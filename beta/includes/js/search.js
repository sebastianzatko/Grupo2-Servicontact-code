
var latlong="";

function getIP(json) {
    console.log("la concha de tu madre");
	console.log("My public IP address is: ", json.ip);
	latlong=json.loc;
	console.log(latlong);
}


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
				var datos=JSON.parse(data);
			
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
					
					
					
					
					var htmlstring="<section class='hidden-xs col-sm-12 col-md-12 thumbnail'><article class='search-result row'><div class='col-xs-12 col-sm-3 col-md-3'><a href='#' title='Lorem ipsum' class='thumbnail'><img src='"+datos[i][3]+"' alt='"+datos[i][1]+" "+datos[i][2]+"' /></a></div><div class='col-xs-12 col-sm-3 col-md-3 excerpet separado'><h3><a href='#' title=''>"+datos[i][1]+" "+datos[i][2]+"</a></h3></div><div class='col-xs-12 col-sm-6 col-md-6'><ul class='meta-search'>"+mediaright+"</ul></div></article></section><div class='media col-xs-12 hidden-sm hidden-md hidden-lg'><div class='media-left'><a href='profesionnal.php'><img src='"+datos[i][3]+"' style='width: 90px;height: 90px;'></a></div><div class='media-body'><p>"+datos[i][1]+" "+datos[i][2]+"</p><p>"+mediaright+"</p></div></div>";
					
				    
				
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






$("input[type='checkbox']").change(function(){
	
	

});
