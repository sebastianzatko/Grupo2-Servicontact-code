
var latlong="-34.8184,-58.4563";
function getIP(json) {
	latlong=json.loc;
	
}


$(document).ready(function(){
	$("#profesionalesmasdestacadosdetuzona").append("<div class='fliud' id='loading'><center><i class='fas fa-circle-notch fa-spin fa-5x' style='color:#70A0AF;'></i><center></div>");
	$.ajax({
		url:'includes/php/obtenerprofesionalesmasrateados.php',
		type:'POST',
		data:{
			localizacion:latlong
		},
		cache:false,
		success:function(data){
			console.log(data);
			var datos=jQuery.parseJSON(data);
			$("#loading").remove()
			for(x=0;x<datos.length;x++){
				puntuacionfinal=((parseInt(datos[x][5])/parseInt(datos[x][6]))/5)*100;
                        
				var puntuacionfinalRedondeado=`${Math.round(puntuacionfinal / 10) * 10}%`;
				
				puntuacionfinal="<div class='stars-outer'><div class='stars-inner' style=width:"+String(puntuacionfinalRedondeado)+"!important></div></div>";
				  
					
				 
				$("#profesionalesmasdestacadosdetuzona").append("<div class='col-lg-3 col-md-3 col-sm-4 col-xs-12 profile'><div class='img-box'><img src='"+datos[x][4]+"' class='max'><ul class='text-center'><a href='profesionnal.php?idprofile="+datos[x][0]+"'><li>Ver Perfil</li></a></ul></div><h1>"+datos[x][1]+" "+datos[x][2]+"</h1><h2>"+datos[x][7]+"</h2><p>Calificacion "+puntuacionfinal+"</p></div>");
			}
			
		}
	});
});