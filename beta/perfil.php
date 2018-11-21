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
 <div class="container">
    <div class="row">
    <div class="col-lg-12 col-xs-12">

            <div class="card hovercard">
                <div class="cardheader" style="background:url(http://f.fwallpapers.com/images/beautiful-nature-554.jpg) no-repeat">

                </div>
                <div class="avatar">
                    <a href="http://www.doweb.in/"><img alt="" src="<?php echo $row["FOTO_DE_PERFIL"]; ?>"></a>
                </div>
                <div class="info">
                    <div class="title">
                        <h2> <?php echo $row["NOMBRE"]; ?> <?php echo $row["APELLIDO"]; ?></h2>
                    </div>
                  
                </div>
      <div data-spy="scroll" class="tabbable-panel">
        <div class="tabbable-line">
       
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab1" data-toggle="tab">
              Datos</a>
            </li>
            <li>
              <a href="#tab2" data-toggle="tab">Calificacion
             </a>
            </li>
            <li>
              <a href="#tab3" data-toggle="tab">Fotos
             </a>
            </li>
             <li>
              <a  href="#ventana" data-toggle="modal">Editar
             </a>
            </li>
          </ul>
       
        </div>
        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade active in" id="tab1">
          <h3>Tus datos Personales</h3>
          <br>
           <p>Nombre: </p><label>Alexis Lacour</label>
             
                     
                                 <br>
          <p>Telefono: </p><label for="telefono">43960460</label>
         
                                 <br>
          <p>Direccion: </p><label for="dir">uruguay 878</label>
         
          <br>
        </div>
    
    <div class="tab-pane fade" id="tab3">
          <h3>Tu Galeria</h3>
          <br>
      <div class="row">
      <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
      </div>

      <div align="center">
        <button class="btn btn-default filter-button" data-filter="all">Todos</button><button class="btn btn-default filter-button" data-filter="Electricista">Electricista</button><button class="btn btn-default filter-button" data-filter="Cerrajero">Cerrajero</button><button class="btn btn-default filter-button" data-filter="Albañil">Albañil</button><button class="btn btn-default filter-button" data-filter="Gasista">Gasista</button><button class="btn btn-default filter-button" data-filter="Plomero">Plomero</button><button class="btn btn-default filter-button" data-filter="Fletero">Fletero</button><button class="btn btn-default filter-button" data-filter="Indefinido">Indefinidos</button>     </div>
      <br>

      

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-12 filter Albañil"> <img src="/files/user/alexislacour08@gmail.com/IMG-20181117-WA0002.jpg" id="57" class="img-responsive port-image"></div>        
         </div>
          <br>
        </div>
        <div class="tab-pane fade" id="tab2">
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
                  <br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-charging-station"></i> Electricista</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div><br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-key"></i> Cerrajero</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div><br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-people-carry"></i> Albañil</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div><br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-gas-pump"></i> Gasista</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div><br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-toolbox"></i> Plomero</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div><br><div class="row"><div class="col-xs-3 col-md-3 text-right"><i class="fas fa-truck-moving"></i> Fletero</div><div class="col-xs-8 col-md-9">Este servicio todavia no ha sido calificado</div></div>                 
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
  </div>
</div>
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

</body>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
<?php ?>
