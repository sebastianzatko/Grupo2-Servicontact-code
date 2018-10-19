<?php
session_start();
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
              <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
            
            	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
               
               <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
            	<script src="includes/js/jquery-3.3.1.min.js"></script>
              <script src="includes/js/jquery.js"></script> 
            	<script src="bootstrap/bootstrap.js"></script>
              <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
              <script src="includes/js/sidebarNavigation.js"></script>
            	<meta name="viewport" content="width=device-width, initial-scale=1">
            	<meta http-equiv="Cache-control" content="no-cache">
               <link rel="stylesheet" type="text/css" href="includes/css/perfiles.css">
            	<link href="includes/css/diseno.css" rel="stylesheet">
            	<script type="application/javascript" src="includes/js/notify.js"></script>
            	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
				<script src="https://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
            	<script src="includes/js/validacion_formperfil.js"></script>
				<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
				<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
				<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
				<script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
             
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
            	<nav id="nav" class="navbar navbar-dark bg-primary sidebarNavigation" data-sidebarClass="navbar-inverse">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
            
                  <button type="button" class="navbar-toggle left-navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                    <center><a href="buscar.php"><button type="button"  class="btn btn-primary " name="buscar1" id="buscar2" >Buscar Servicios</button></a></center>
                 
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 
                  <ul class="nav navbar-nav">
                    
                    <?php
                      if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"]) ){
                        echo "
                        <li><a href='#'><img src='".$_SESSION['foto']."' class='perfil'></a></li>
                        <li><a href='#' class='nomb'>".$_SESSION['nombre']."</a></li>
                      
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
                              <img src='".$_SESSION['foto']."' class='perfiles'>
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
            
            <?php
            		
            		
            		
            		
            		
            		
            		
            		
            		
            	?>
            
            <img src="images/casa.jpg" class="imo">
            <img src="<?php echo $_SESSION['foto']; ?>" class="imagen">
             <div class=" container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
            
            	
            	
                <!-- Collect the nav links, forms, and other content for toggling -->
               
                <div class="margin1">
                    <ul  class="ula nav navbar-nav">
                      <li><i class="icon fas fa-user-edit"></i><a class="btn btn-primary" id="letras" data-toggle="modal" href="#ventana">Editar informacion</a></li>
                      <li><a class="btn btn-default" id="nombr" href=""><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></a></li>
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
                                  <select id="provincia" name="provincia" class="btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
                                 </select>       
            					</br>
            					            					</br>
            					            					            					
                				<select id="ciudad" name="ciudad" class="btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Localidades<span class="caret"></span>
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
                     </ul>
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
</body>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
<?php ?>
