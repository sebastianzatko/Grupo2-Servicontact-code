<?php
session_start();
error_reporting(0);
if (isset($_SESSION["id"])){
		if(isset($_GET["idprofile"])){
			if((int)$_SESSION["id"]==(int)$_GET["idprofile"]){
				$idactual=$_GET["idprofile"];
				$fotop=$_SESSION['foto'];
				$nombrep=$_SESSION['nombre'];
				require "blogic/User.php";
				$user=new b_user;
				$resultado=$user->obtenerDatosDeUsuario($idactual);
				
					if(mysqli_num_rows($resultado)==1){
						if(isset($_SESSION["idpro"])){
							require "blogic/Galery.php";
						  $galeria=new Galery();
						  $fotos=$galeria->obtenerfotos((int)$_SESSION["idpro"]);
						  require "blogic/Professional.php";
						  $profesional=new Professional();
						  $serviciosactivos=$profesional->obtenerPuntuacionYServicios((int)$_SESSION["idpro"]);
							$dataSer=json_decode($serviciosactivos , true);
						}
						$row = mysqli_fetch_assoc($resultado);
							
					}else{header('Location: index.php');}
			}else{header('Location: index.php');}	
		}else{header('Location: index.php');}
}else{header('Location: index.php');}
    	    
?>

            <!DOCTYPE html>
            <html>
            <head>
            	<title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-control" content="no-cache">
  
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <link rel="stylesheet" type="text/css" href="includes/css/perfiles.css">
  <link href="includes/css/diseno.css" rel="stylesheet">

<!-- CHAT -->  
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />

  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

  <script src="includes/js/jquery.js"></script>
  <script src="includes/js/jquery-3.3.1.min.js"></script>
  <script type="application/javascript" src="includes/js/notify.js"></script> 
  <script src="bootstrap/bootstrap.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script src="includes/js/validacion_formperfil.js"></script>
<!--  <script src="includes/js/scriptfuncionesrepetidas.js"></script>
  <script src="includes/js/scriptperfil.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
  <script src="https://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

<!-- CHAT -->
  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
  <link rel="stylesheet"  href="includes/css/twiter.css">
  
  <style>
		
	.gallery-title
	{
		font-size: 36px;
		color: #2175C4;
		text-align: center;
		font-weight: 500;
		margin-bottom: 70px;
	}
	.gallery-title:after {
		content: "";
		position: absolute;
		width: 7.5%;
		left: 46.5%;
		height: 45px;
		border-bottom: 1px solid #5e5e5e;
	}
	.filter-button
	{
		font-size: 18px;
		border: 1px solid #2175C4;
		border-radius: 5px;
		text-align: center;
		color: #2175C4;
		margin-bottom: 30px;

	}
	#agregado{
		font-size: 18px;
		border: 1px solid ;
		border-radius: 5px;
		text-align: center;
		margin-bottom: 30px;
	}
	.filter-button:hover
	{
		font-size: 18px;
		border: 1px solid #2175C4;
		border-radius: 5px;
		text-align: center;
		color: #ffffff;
		background-color: #2175C4;

	}
	.btn-default:active .filter-button:active
	{
		background-color: #42B32F;
		color: white;
	}

	.port-image
	{
		width: 100%;
		height:350px;
	}

	.gallery_product
	{
		margin-bottom: 30px;
	}
	</style>
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
            	</script>
				<?php
					require "templates/menu.php";
					
					echo $htmlmenu;
					
				?>

			 </div>
            
        
                <!-- Brand and toggle get grouped for better mobile display -->
            
            	
       <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="col-lg-10 col-sm-10 col-xs-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?php echo $_SESSION['foto']; ?>">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $_SESSION['foto']; ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="">Informacion</div>
            </button>
        </div>
		<div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="">Calificacion</div>
            </button>
        </div>
		<div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                <div class="">Galeria</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#ventana" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <div class="">Editar perfil</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>Tus datos Personales</h3>
          <br>
           <p>Nombre: </p><label><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></label>
             
                     
                                 <br>
          <p>Telefono: </p><label for="telefono"><?php echo $row["TELEFONO"]; ?></label>
         
                                 <br>
          <p>Direccion: </p><label for="dir"><?php echo $row["DIRECCION"]; ?></label>
         
          <br>
        </div>
		
		<div class="tab-pane fade in active" id="tab3">
          <h3>Tu Galeria</h3>
          <br>
			<div class="row">
			<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
			</div>

			<div align="center">
				<?php
				if(isset($fotos)){
					if(count($fotos)!=0){
						echo "<button class='btn btn-default filter-button' data-filter='all'>Todos</button>";
						foreach($dataSer as $servicio){
							echo "<button class='btn btn-default filter-button' data-filter='".$servicio[3]."'>".$servicio[3]."</button>";
						}
						echo "<button class='btn btn-default filter-button' data-filter='Indefinido'>Indefinidos</button>";
					}
				}
			?>
			</div>
			<br/>

			

            <?php
				
				if(isset($fotos)){
					if(count($fotos)==0){
						echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2> No tienes fotos :`( </h2></center></div>";
					}else{
						foreach($fotos as $foto){
							echo "<div class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-12 filter ".$foto[2]."'> <img src='".$foto[1]."' id='".$foto[0]."' class='img-responsive port-image'></div>";
						}
					}
				}else{
					echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2> Debes ser profesional para subir fotos </h2></center></div>";;
				}
			
			?>
        
         </div>
          <br>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>Tu calificacion</h3>
          <br>
			
			<div class="row">
				
				<div class="col-xs-12 col-md-12">
					
						<div class="row">
							<div class="col-xs-12 col-md-12 text-center">
								<h1 class="rating-num">
									4.0</h1>
								<div class="rating">
									<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
									</span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
									</span><span class="glyphicon glyphicon-star-empty"></span>
								</div>
								<div>
									<span class="glyphicon glyphicon-user"></span>1,050,008 total
								</div>
							</div>
							
							<div class="col-xs-12 col-md-11">
								<div class="row rating-desc">
									<?php
                        
											foreach($dataSer as $data)
											{
											  if($data[0]!=null and $data[1]!=null){
												  $puntuacionporcentaje=(((int)$data[0]/(int)$data[1])/5)*100;
												  $puntuacionredondeado=(floor(($puntuacionporcentaje/10)*10));
												  if($puntuacionredondeado>75){
													  $clase="progress-bar-success";
												  }elseif($puntuacionredondeado<75 and $puntuacionredondeado>45){
													  $clase="progress-bar-info";
												  }elseif($puntuacionredondeado<45 and $puntuacionredondeado>15){
													  $clase="progress-bar-warning";
												  }else{
													  $clase="progress-bar-danger";
												  }
												  $puntuacionfinal="<div class='col-xs-8 col-md-9'><div class='progress'><div class='progress-bar ".$clase."' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: ".(string)$puntuacionredondeado."%'><span class='sr-only'>".(string)$puntuacionredondeado."%</span></div></div></div>";
												  
											  }else{
												  $puntuacionfinal="<div class='col-xs-8 col-md-9'>Este servicio todavia no ha sido calificado</div>";
											  }
										  
											echo "<br><div class='row'><div class='col-xs-3 col-md-3 text-right'><i class='".$data[2]."'></i> ".$data[3]."</div>".$puntuacionfinal."</div>";			
									  }
										 
										 
									?>
									
									<!-- end 1 -->
								</div>
								<!-- end row -->
							</div>
						</div>
					
				</div>
			</div>
		
        </div>
       
      </div>
    </div>
    
    </div>

            
                   
             <div class="modal fade" id="ventana">
                         <div class="modal-dialog">
                          <div class="modal-content">
                       <div class="modal-header">
            				<?php if($idactual==$_SESSION["id"]): ?>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h2 class="modal-title">Editar Perfil</h2>
            				<?php 
            					else:
            					endif;
            				?>
                            </div>
            				
              <div class="modal-body">
								 <form action="./includes/php/updateuser.php" method="POST" id="formg" enctype="multipart/form-data">
                                 <label for="nombre">Nombre</label>
                                 <input type="text" name="nombre" value="<?php echo $row["NOMBRE"]; ?>" id="nombre" class="caja">
                                 <br>
                                 <label for="apellido">Apellido</label>
                                 <input type="text" name="apellido" value="<?php echo $row["APELLIDO"]; ?>" id="apellido"  class="caja">
                                 <br>
                                 <label for="telefono">Telefono</label>
                                 <input type="number" name="telefono" value="<?php echo $row["TELEFONO"]; ?>" id="telefono"  class="caja">
                                 <br>
                                 <label for="dir">Direccion</label>
                                 <input type="text" name="direccion" value="<?php echo $row["DIRECCION"]; ?>" id="direccion"  class="caja">
                                 <br>
                                  <select id="provincia" name="provincia" class="btn btn-primary  dropdown-toggle" type="button" data-toggle="dropdown" required>Provincias
                                 </select>       
            					</br>
            					            					</br>
            					            					            					
                				<select id="ciudad" name="ciudad" class="btn btn-primary  dropdown-toggle" type="button" data-toggle="dropdown" required>Localidades<span class="caret"></span>
                				</select>
            					<br>
            					<output id="list"></output>
            					<br>
            					<div class="fotos btn btn-primary">
            					    <p ><i class="fas fa-camera-retro"></i> Editar Foto </p>
            					    <input type="file" class="form-control"  name="fil" id="fil">
                                  </div>
                             </div>
                             <div class="modal-footer">
                               <button type="button"  data-dismiss="modal" class="btn btn-default">Cerrar</button>
            
                               <button type="submit" class="btn btn-success" >Guardar cambios</button>
                             </div>
							<form>
                          </div>
                          
                         </div>
                       </div>
                    
                 </div>
                 
            </div><!-- /.navbar-collapse -->
         </div><!-- /.container-fluid -->
            <script>
            	
            	$( document ).ready(function() {
            		
            		$.getJSON('ciudades-argentinas.json',function(result){
            				$.each(result,function(i,provincia){
            					var selecionado="";
            					if(provincia.nombre=="<?php echo $row["PROVINCIA"]; ?>"){
            						selecionado="selected";
            					}
            					
            					var opcion="<option value='"+provincia.nombre+"' "+selecionado+" data-id='"+provincia.id+"'>"+provincia.nombre+"</option>";
            					$("#provincia").append(opcion);
            				})
            				var selecionado=$("#provincia").find('option:selected').data('id');
            			
            				$.getJSON('ciudades-argentinas.json',function(result){
            				$.each(result,function(ciudad,nombreciudad){
            				if(selecionado==nombreciudad.id){
            					$.each(nombreciudad.ciudades,function(i,city){
            					    
            						var selecionado="";
            						if(city.nombre=="<?php echo $row["LOCALIDAD"]; ?>"){
            							selecionado="selected";
            						}
            						var opcion="<option "+selecionado+" value='"+city.nombre+"'>"+city.nombre+"</option>";
            						
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
            	}
            
            	);
            
            		
            	</script>
            
            
            		<!-- Para el placeholder de la imagen-->
            	<script>
                          function archivo(evt) {
                              var files = evt.target.files; // FileList object
                         
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                    continue;
                                }
                         
                                var reader = new FileReader();
                         
                                reader.onload = (function(theFile) {
                                    return function(e) {
                                      // Insertamos la imagen
                                     document.getElementById("list").innerHTML = ['<img class="imagen1 thumb img-circle thumbnailmascota" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                    };
                                })(f);
                         
                                reader.readAsDataURL(f);
                              }
                          }
                         
                          document.getElementById('fil').addEventListener('change', archivo, false);
                  </script>
            	  <script>
            		$( document ).ready(function() {
            			document.getElementById("list").innerHTML = ['<img class="imagen1 thumb img-circle thumbnailmascota" src="<?php echo $row["FOTO_DE_PERFIL"]; ?>"/>'];
            		});
            	  </script>
            	  
<script>
	$("#formg").submit(function(){
		event.preventDefault();
		//console.log(validar());
		if(validar()){
			
			var formData = new FormData($(this)[0]);
			
			$.ajax({
				data:formData,
				url:this.action,
				type:this.method,
				processData: false,
				contentType: false,
				success: function (data) {
					console.log(data);
					if(data=='2'){
            			$.notify("Ha ocurrido un error debido a que se detectaron parametros invalidos", "error");
            		}
            		else if(data=='1'){
            			$.notify("Se han modificado sus datos correctamente", "success");
            			$('#ventana').modal('toggle').delay(5000);
            			location. reload(true);

            		}
            		else if(data=='3'){
            			$.notify("Ningun campo puede estar vacio", "error");
            		}
				}
			})
		}
	});            	
   
	

</script>
<script>
	$(document).ready(function(){

			$(".filter-button").click(function(){
				var value = $(this).attr('data-filter');
				
				if(value == "all")
				{
					//$('.filter').removeClass('hidden');
					$('.filter').show('1000');
				}
				else
				{
		//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
		//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
					$(".filter").not('.'+value).hide('3000');
					$('.filter').filter('.'+value).show('3000');
					
				}
			});
			
			if ($(".filter-button").removeClass("active")) {
		$(this).removeClass("active");
		}
		$(this).addClass("active");

	});
</script>
</body>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
<?php ?>
