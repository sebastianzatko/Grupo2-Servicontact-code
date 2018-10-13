<?php
	session_start();
	if(isset($_GET["idprofile"])):
	$idactual=$_GET["idprofile"];
	require "blogic/User.php";
	$user=new b_user;
	$resultado=$user->obtenerDatosDeUsuario($idactual);
	
    	if(mysqli_num_rows($resultado)==1):
    	
    	    $row = mysqli_fetch_assoc($resultado);
    	    

?>

            <!DOCTYPE html>
            <html>
            <head>
            	<title></title>
              <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
            
            	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            	<script src="includes/js/jquery-3.3.1.min.js"></script>
              <script src="includes/js/jquery.js"></script> 
            	<script src="bootstrap/bootstrap.js"></script>
              <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
              <script src="includes/js/sidebarNavigation.js"></script>
            	<meta name="viewport" content="width=device-width, initial-scale=1">
               <link rel="stylesheet" type="text/css" href="includes/css/perfiles.css">
            	<link href="includes/css/diseno.css" rel="stylesheet">
            	<script type="application/javascript" src="includes/js/notify.js"></script>
             
             
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
            
            <?php
            		
            		
            		
            		
            		
            		
            		
            		
            		
            	?>
            
            <img src="images/casa.jpg" class="imo">
            <img src="<?php echo $row["FOTO_DE_PERFIL"]; ?>" class="imagen">
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
            				<form action="updateuser.php" method="POST" enctype="multipart/form-data">
                             <div class="modal-body">
                                 <p>Nombre</p>
                                 <input type="text" name="nombre"  required pattern=".{3,40}" title="El nombre debe tener entre 3 y 40 caracteres" minlenght="3" maxlength="40" value="<?php echo $row["NOMBRE"]; ?>" id="caja" class="">
                                  <p>Apellido</p>
                                 <input type="text" name="apellido" pattern=".{3,40}" title="El apellido debe tener entre 3 y 40 caracteres" minlenght="3" maxlength="40" required value="<?php echo $row["APELLIDO"]; ?>" id="caja"  class="">
                                  <p>Telefono</p>
                                 <input type="number" name="telefono" minlenght="8" maxlength="11" pattern=".{8,11}"  title="Un numero de telefono debe tener entre 8 y 11 caracteres"  required value="<?php echo $row["TELEFONO"]; ?>" id="caja"  class="">
                                  <p>Direccion</p>
                                 <input type="text" name="direccion"  pattern=".{7,80}" minlenght="7" maxlength="80" title="La direccion debe tener entre 7 y 80 caracteres" required value="<?php echo $row["DIRECCION"]; ?>" id="caja"  class="">
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
            					    <input type="file" class=""  name="imagen" id="fil">
                                  </div>
                             </div>
                             <div class="modal-footer">
                               <button type="button"  data-dismiss="modal" class="btn btn-default">Cerrar</button>
            
                               <button type="submit" class="btn btn-success" >Guardar cambios</button>
                             </div>
                          </div>
                          <form>
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
            	
            	$(document).ready(function(){
            		var $_GET=[];
            		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
            		var error=$_GET['op'];
            		if(error==2){
            			$.notify("Ha ocurrido un error debido a que se detectaron parametros invalidos", "error");
            		}
            		else if(error==1){
            			$.notify("Se han modificado sus datos correctamente", "success");
            		}
            		else if(error==3){
            			$.notify("Ningun campo puede estar vacio", "error");
            		}
            	});
	

	</script>

         <?php
			else:
				header("Location:index.php");
			endif;
		 ?>
  
</body>
</html>
<?php
	else:
		header("Location:index.php");
	endif;
?>