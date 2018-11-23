

$( document ).ready(function() {
	$.getJSON('ciudades-argentinas.json',function(result){
		$.each(result,function(i,provincia){
			var opcion="<option value='"+provincia.nombre+"' data-id='"+provincia.id+"'>"+provincia.nombre+"</option>";
			$("#provincia").append(opcion);
		})
		
		var selecionado=$("#provincia").find('option:first').data('id');
		console.log(selecionado);

		$.getJSON('ciudades-argentinas.json',function(result){
			$.each(result,function(ciudad,nombreciudad){
				if(selecionado==nombreciudad.id){
					$.each(nombreciudad.ciudades,function(i,city){
						var opcion="<option value='"+city.nombre+"'>"+city.nombre+"</option>";
						$("#ciudad").append(opcion);
					})
				}
			})
		})
	})		
});

$("#provincia").change(function(){
	$('#ciudad').attr('disabled', false)
	var idprovincia=$(this).find(":selected").data('id');
	$("#ciudad option").each(function() {
		$(this).remove();
	});
	$.getJSON('ciudades-argentinas.json',function(result){
		$.each(result,function(ciudad,nombreciudad){
			if(idprovincia==nombreciudad.id){
				$.each(nombreciudad.ciudades,function(i,city){
					var opcion="<option value='"+city.nombre+"'>"+city.nombre+"</option>";
					$("#ciudad").append(opcion);
				})
			}
		})
	})
});

$("#busquedaconfiltros").submit(function(){
	event.preventDefault();
	var pronvincia=$("#provincia").val();
	var ciudad=$("#ciudad").val();
	var serviciosabuscar=JSON.stringify(options);
	console.log(serviciosabuscar);
	if(serviciosabuscar!=[]){
		$("#contenido").empty();
		  var strincargando="<div class='row'><h3>Cargando datos... Por favor espere.</h3><div class='progress progress-striped active page-progress-bar'><div class='progress-bar' style='width: 100%;'></div></div></div>";
		  $("#contenido").append(strincargando);
	}
	$.ajax({
		data:{servicios:serviciosabuscar,pronvincia:pronvincia,ciudad:ciudad},
		method:"POST",
		url:"includes/php/busquedaavanzada.php",
		success:function(data){
			console.log(data);
			
				  if(data!==false){
					  console.log(data);
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
								  
								  
								  
								  var htmlstring="<section class='hidden-xs col-sm-12 col-md-12 thumbnail'><article class='search-result row'><div class='col-xs-12 col-sm-3 col-md-3'><a href='profesionnal.php?idprofile="+datos[i][0]+"' title='Foto de perfil' class='thumbnail'><img src='"+datos[i][3]+"' alt='"+datos[i][1]+" "+datos[i][2]+"' /></a></div><div class='col-xs-12 col-sm-3 col-md-3 excerpet separado'><h3><a  href='profesionnal.php?idprofile="+datos[i][0]+"' title=''>"+datos[i][1]+" "+datos[i][2]+"</a></h3></div><div class='col-xs-12 col-sm-6 col-md-6'><ul class='meta-search'>"+mediaright+"</ul></div></article></section><div class='media col-xs-12 hidden-sm hidden-md hidden-lg'><div class='media-left'><a href='profesionnal.php?idprofile="+datos[i][0]+"' ><img src='"+datos[i][3]+"' style='width: 90px;height: 90px;'></a></div><div class='media-body'><a class='redireccionamiento' href='profesionnal.php?idprofile="+datos[i][0]+"'><p>"+datos[i][1]+" "+datos[i][2]+"</p></a><p>"+mediaright+"</p></div><small>"+distancia+"</small></div>";
								  
									
								
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