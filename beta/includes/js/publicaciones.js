var MD5 = function(d){result = M(V(Y(X(d),8*d.length)));return result.toLowerCase()};function M(d){for(var _,m="0123456789ABCDEF",f="",r=0;r<d.length;r++)_=d.charCodeAt(r),f+=m.charAt(_>>>4&15)+m.charAt(15&_);return f}function X(d){for(var _=Array(d.length>>2),m=0;m<_.length;m++)_[m]=0;for(m=0;m<8*d.length;m+=8)_[m>>5]|=(255&d.charCodeAt(m/8))<<m%32;return _}function V(d){for(var _="",m=0;m<32*d.length;m+=8)_+=String.fromCharCode(d[m>>5]>>>m%32&255);return _}function Y(d,_){d[_>>5]|=128<<_%32,d[14+(_+64>>>9<<4)]=_;for(var m=1732584193,f=-271733879,r=-1732584194,i=271733878,n=0;n<d.length;n+=16){var h=m,t=f,g=r,e=i;f=md5_ii(f=md5_ii(f=md5_ii(f=md5_ii(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_ff(f=md5_ff(f=md5_ff(f=md5_ff(f,r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+0],7,-680876936),f,r,d[n+1],12,-389564586),m,f,d[n+2],17,606105819),i,m,d[n+3],22,-1044525330),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+4],7,-176418897),f,r,d[n+5],12,1200080426),m,f,d[n+6],17,-1473231341),i,m,d[n+7],22,-45705983),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+8],7,1770035416),f,r,d[n+9],12,-1958414417),m,f,d[n+10],17,-42063),i,m,d[n+11],22,-1990404162),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+12],7,1804603682),f,r,d[n+13],12,-40341101),m,f,d[n+14],17,-1502002290),i,m,d[n+15],22,1236535329),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+1],5,-165796510),f,r,d[n+6],9,-1069501632),m,f,d[n+11],14,643717713),i,m,d[n+0],20,-373897302),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+5],5,-701558691),f,r,d[n+10],9,38016083),m,f,d[n+15],14,-660478335),i,m,d[n+4],20,-405537848),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+9],5,568446438),f,r,d[n+14],9,-1019803690),m,f,d[n+3],14,-187363961),i,m,d[n+8],20,1163531501),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+13],5,-1444681467),f,r,d[n+2],9,-51403784),m,f,d[n+7],14,1735328473),i,m,d[n+12],20,-1926607734),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+5],4,-378558),f,r,d[n+8],11,-2022574463),m,f,d[n+11],16,1839030562),i,m,d[n+14],23,-35309556),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+1],4,-1530992060),f,r,d[n+4],11,1272893353),m,f,d[n+7],16,-155497632),i,m,d[n+10],23,-1094730640),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+13],4,681279174),f,r,d[n+0],11,-358537222),m,f,d[n+3],16,-722521979),i,m,d[n+6],23,76029189),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+9],4,-640364487),f,r,d[n+12],11,-421815835),m,f,d[n+15],16,530742520),i,m,d[n+2],23,-995338651),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+0],6,-198630844),f,r,d[n+7],10,1126891415),m,f,d[n+14],15,-1416354905),i,m,d[n+5],21,-57434055),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+12],6,1700485571),f,r,d[n+3],10,-1894986606),m,f,d[n+10],15,-1051523),i,m,d[n+1],21,-2054922799),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+8],6,1873313359),f,r,d[n+15],10,-30611744),m,f,d[n+6],15,-1560198380),i,m,d[n+13],21,1309151649),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+4],6,-145523070),f,r,d[n+11],10,-1120210379),m,f,d[n+2],15,718787259),i,m,d[n+9],21,-343485551),m=safe_add(m,h),f=safe_add(f,t),r=safe_add(r,g),i=safe_add(i,e)}return Array(m,f,r,i)}function md5_cmn(d,_,m,f,r,i){return safe_add(bit_rol(safe_add(safe_add(_,d),safe_add(f,i)),r),m)}function md5_ff(d,_,m,f,r,i,n){return md5_cmn(_&m|~_&f,d,_,r,i,n)}function md5_gg(d,_,m,f,r,i,n){return md5_cmn(_&f|m&~f,d,_,r,i,n)}function md5_hh(d,_,m,f,r,i,n){return md5_cmn(_^m^f,d,_,r,i,n)}function md5_ii(d,_,m,f,r,i,n){return md5_cmn(m^(_|~f),d,_,r,i,n)}function safe_add(d,_){var m=(65535&d)+(65535&_);return(d>>16)+(_>>16)+(m>>16)<<16|65535&m}function bit_rol(d,_){return d<<_|d>>>32-_}
var paginacion=0;
var limit=10;
var maxid;
$(document).ready(function(){
	setInterval(function(){ 
		console.log("Se ejecuta el intervalo");
		$.ajax({
			data:{paginacion:paginacion,limite:10},
			url:"includes/php/obtenerpublicaciones.php",
			type:"POST",
			success: function (data) {
				var datos=jQuery.parseJSON(data);
				if(paginacion==0){
					if(data!=""){
						var nuevamaxid=datos[0][0];
						if(maxid!=nuevamaxid){
							$("#publicaciones").empty();
							for(var x=0;x<datos.length;x++){
								$("#publicaciones").append("<div class='col-lg-6  col-md-6'><aside><div class='content-footer'><img class='user-small-img' src="+datos[x][3]+"><span style='font-size: 16px;color: #fff;'>"+datos[x][4]+" "+datos[x][5]+"</span><span class='pull-right'><a href='#"+datos[x][0]+"' data-toggle='modal'><i class='fa fa-comments'></i></a></span></div><div class='tz-gallery'><a class='lightbox' href='"+datos[x][2]+"'><img src='"+datos[x][2]+"' class='img-responsive'></a></div><div class='footer'></div></aside></div><div class='modal fade' id='"+datos[x][0]+"'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h2 class='modal-title'>Comentarios</h2></div><div class='modal-body' id='comentarios"+datos[x][0]+"'>"+datos[x][6]+"<br><div class='comment-box'><div class='comment-content'><form method='POST' id='comentariosxd"+datos[x][0]+"'  class='comentar'><textarea name='comentario' data-idpublicacion='"+datos[x][0]+"' class='form-control message' style='height: 62px;color:black; overflow: hidden;background:#ffffff' placeholder='Escribe aqui tu comentario' cols='64' rows='10'></textarea><br><button type='submit' class='btn btn-primary'>Comentar</button></form></div></div> </div><div class='modal-footer'><button type='button'  data-dismiss='modal' class='btn btn-success'>Cerrar</button></div></div></div><br></div>");
								console.log("Se agrega el intervalo a 0");
								$("#comentariosxd"+datos[x][0]).submit(function(event){
									event.preventDefault();
									var comentario=$(this).find("textarea").val();
									var idpulicacion=$(this).find("textarea").attr("data-idpublicacion");
									
									$.ajax({
										data:{comentario:comentario,id_publicacion:idpulicacion},
										method:"POST",
										url:"includes/php/comentar.php",
										success:function(data){
											 if(data=="Se ha comentado con exito"){
												 $.notify("Se ha comentado con exito", "success");
												 $(this)[0].reset();
											 }else{
												 $.notify("No se ha podido comentar :(, intente mas tarde", "error");
											 }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
										}
									});
								});
							}
							maxid=nuevamaxid;
						}
					}
				}else{
					var stringtotal="";
					var idtotal=[];
					console.log(limit);
					$.ajax({
						data:{paginacion:0,limite:limit},
						url:"includes/php/obtenerpublicaciones.php",
						type:"POST",
						success: function (data) {
							if(data==""){
								
							}else{
								console.log(data);
								var datos=jQuery.parseJSON(data);
								for(var x=0;x<datos.length;x++){
									stringtotal=stringtotal+"<div class='col-lg-6  col-md-6'><aside><div class='content-footer'><img class='user-small-img' src="+datos[x][3]+"><span style='font-size: 16px;color: #fff;'>"+datos[x][4]+" "+datos[x][5]+"</span><span class='pull-right'><a href='#"+datos[x][0]+"' data-toggle='modal'><i class='fa fa-comments'></i></a></span></div><div class='tz-gallery'><a class='lightbox' href='"+datos[x][2]+"'><img src='"+datos[x][2]+"' class='img-responsive'></a></div><div class='footer'></div></aside></div><div class='modal fade' id='"+datos[x][0]+"'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h2 class='modal-title'>Comentarios</h2></div><div class='modal-body' id='comentarios"+datos[x][0]+"'>"+datos[x][6]+"<br><div class='comment-box'><div class='comment-content'><form method='POST' id='comentariosxd"+datos[x][0]+"'  class='comentar'><textarea name='comentario' data-idpublicacion='"+datos[x][0]+"' class='form-control message' style='height: 62px;color:black; overflow: hidden;background:#ffffff' placeholder='Escribe aqui tu comentario' cols='64' rows='10'></textarea><br><button type='submit' class='btn btn-primary'>Comentar</button></form></div></div> </div><div class='modal-footer'><button type='button'  data-dismiss='modal' class='btn btn-success'>Cerrar</button></div></div></div><br></div>";
									idtotal.push(datos[x][0]);
									console.log(datos[x][0]);
									
								}
								$("#publicaciones").empty();
								$("#publicaciones").append(stringtotal);
								console.log("Se agrega el intervalo a no 0 paginacion");
								for(var a=0;a<idtotal.length;a++){
									$("#comentariosxd"+idtotal[a][0]).submit(function(event){
										event.preventDefault();
										var comentario=$(this).find("textarea").val();
										var idpulicacion=$(this).find("textarea").attr("data-idpublicacion");
										
										$.ajax({
											data:{comentario:comentario,id_publicacion:idpulicacion},
											method:"POST",
											url:"includes/php/comentar.php",
											success:function(data){
												 if(data=="Se ha comentado con exito"){
													 $.notify("Se ha comentado con exito", "success");
													 $(this)[0].reset();
												 }else{
													 $.notify("No se ha podido comentar :(, intente mas tarde", "error");
												 }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
											}
										});
									});
								}
								stringtotal="";
								idtotal=[];
							}
							
							
						}
					})
						
					
					
				}
				
			}
		})
		
			
		
	
	}, 40000);
	
	
	var action='inactive';
	function load_country_data(limit,paginacion){
		console.log("llamo a ajax country");
		$("#publicaciones").append("<div class='fliud' id='loadin'><center><i class='fas fa-circle-notch fa-spin fa-5x' style='color:#70A0AF;'></i><center></div>");
		$.ajax({
			
			url:'includes/php/obtenerpublicaciones.php',
			type:'POST',
			data:{
				paginacion:paginacion,limite:10
			},
			cache:false,
			success:function(data){
				
				if(data==''){
					$('#publicaciones').append("<div class='alert alert-danger' role='alert'>No se han encontrado mas datos</div>")
					action='active';
				}
				else{
					
					action='inactive';
				}
				var datos=jQuery.parseJSON(data);
				$("#loadin").remove()
				for(var x=0;x<datos.length;x++){
					if(maxid=""){
						maxid=datos[0][0];
					}
					$("#publicaciones").append("<div class='col-lg-6  col-md-6'><aside><div class='content-footer'><img class='user-small-img' src="+datos[x][3]+"><span style='font-size: 16px;color: #fff;'>"+datos[x][4]+" "+datos[x][5]+"</span><span class='pull-right'><a href='#"+datos[x][0]+"' data-toggle='modal'><i class='fa fa-comments'></i></a></span></div><div class='tz-gallery'><a class='lightbox' href='"+datos[x][2]+"'><img src='"+datos[x][2]+"' class='img-responsive'></a></div><div class='footer'></div></aside></div><div class='modal fade' id='"+datos[x][0]+"'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h2 class='modal-title'>Comentarios</h2></div><div class='modal-body' id='comentarios"+datos[x][0]+"'>"+datos[x][6]+"<br><div class='comment-box'><div class='comment-content'><form method='POST' id='comentariosxd"+datos[x][0]+"'  class='comentar'><textarea name='comentario' data-idpublicacion='"+datos[x][0]+"' class='form-control message' style='height: 62px;color:black; overflow: hidden;background:#ffffff' placeholder='Escribe aqui tu comentario' cols='64' rows='10'></textarea><br><button type='submit' class='btn btn-primary'>Comentar</button></form></div></div> </div><div class='modal-footer'><button type='button'  data-dismiss='modal' class='btn btn-success'>Cerrar</button></div></div></div><br></div>");
					console.log("arma ajax country");
					$("#comentariosxd"+datos[x][0]).submit(function(event){
						event.preventDefault();
						var comentario=$(this).find("textarea").val();
						var idpulicacion=$(this).find("textarea").attr("data-idpublicacion");
					
						$.ajax({
							data:{comentario:comentario,id_publicacion:idpulicacion},
							method:"POST",
							url:"includes/php/comentar.php",
							success:function(data){
								 if(data=="Se ha comentado con exito"){
									 $.notify("Se ha comentado con exito", "success");
									 $(this)[0].reset();
								 }else{
									 $.notify("No se ha podido comentar :(, intente mas tarde", "error");
								 }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
							}
						});
					});
						}
			}
		});
	}
	if(action=='inactive'){
		action='active';
		load_country_data(limit,paginacion);
	}
	$(window).scroll(function(){
		
		if($(window).scrollTop()+$(window).height()<$('#publicaciones').height() && action=='inactive'){
			
			action='active';
			
			setTimeout(function(){
				load_country_data(limit,paginacion)
			},3000)
			paginacion=paginacion+10;
			limit=limit+10;
		}
	});
	
	
});

