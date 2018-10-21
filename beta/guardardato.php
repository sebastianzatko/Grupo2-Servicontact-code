<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="includes/css/registro.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="application/javascript" src="includes/js/notify.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
	<script src="https://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	<script src="includes/js/validacion.js"></script>
    <script src="includes/js/scriptguardardato.js"></script>

</head>
<body>
	<br>


	
	
	<div class="modal fade" id="ventana">
		<div class="modal-dialog">
			<div class="modal-content">
            <div class="modal-header">  
                 <h2 class="modal-title">Su cuenta ha sido registrada con exito</h2>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
			<div class="modal-body">
                  <h5>En breve le llegara un mensaje a su casilla de correo</h5>
                  <h5> para activar su cuenta</h5>
                  <p>Mientras tanto puedes explorar el sitio</p>
             </div>
             <div class="modal-footer">
                  <button type="button" onclick="location.href='index.php';" data-dismiss="modal" class="btn btn-success">Okay</button> 
             </div>
            </div>
         </div>
    </div>
	
	
	
 	<form action="includes/php/register.php" name="formadd" method="POST" id="formguardard" enctype="multipart/form-data">
 		<center>
 
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12 col-sd-6 col-md-2 col-lg-2"></div>
 					<div class="col-xs-12 col-sd-6 col-md-8 col-lg-8">
 						<div class="form-group containercss">
 							<div>
 								<center><img src="images/trabajos.png" class="logo"></center>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-6 inputs">
 									<input type="text" class="form-control"  id="txtnombre" name="nombre" placeholder="Nombre">
 								</div>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-6">
 									<input type="text" class="form-control" id="txtapellido" name="apellido" placeholder="Apellido">
 								</div>
 								<br>		 			
 								<br>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-6">
 									<input type="text" class="form-control" id="txtmail" name="email"  placeholder="E-Mail">
 								</div>
 								<div class="col-xs-12 col-sd-6 col-md-8 col-lg-6">
 									<input type="password" class="form-control" id="txtcontra" name="contrasena" placeholder="Contraseña">
 								</div>
 								<br>
 								<br>
 								<br>
 								<!-- Para las provincias y ciudades-->
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-6">
 									<select id="provincia" name="provincia" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
 										<span class="caret"></span>
 									</select>
 								</div>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-6">
 									<select id="ciudad" name="ciudad" class="cinc btn btn-primary  dropdown-toggle" type="button" data-toggle="dropdown" required>Localidades<span class="caret"></span>
 									</select>
 								</div>
 								<br>
 								<br>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-4">
 									<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
 								</div>
 								<div class="col-xs-12 col-sd-6 col-md-8	col-lg-8">
 									<input type="text" class="form-control"  id="txtdir" name="dir" placeholder="Dirección">
 								</div>
 								<br>
 								<br>

 								<div class="col-xs-12 col-sd-6 col-md-8 col-lg-12">
 									<output id="list"></output>
 									<div class="fotos btn btn-success">
 										<p><i class="icon fas fa-download"></i>Foto de Perfil</p>
 										<input type="file"  name="imagen" accept="image/*" id="fil">
 									</div>
 								</div>
 								<br>
 								<br> 
 								<div class="col-xs-12 col-sd-6 col-md-8 col-lg-12">
 									<button type="submit" name="submit" id="boton" class="btn btn-primary fotos"  value="Upload">Registrar</button>
 								</div>
 								<br>
 								<br>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="col-xs-12 col-sd-6 col-md-2 col-lg-2"></div>
 			</div>
 		</center>
				<!-- CONTENEDOR NUEVO 
				<div class=" contenedor">
					
					<div class="col-md-4 mb-3">
						<input type="text" id="txtnombre" minlength="3" maxlength="40"  pattern="[A-Za-z].{3,45}" name="nombre" class=" cinc form-control"  placeholder="Nombre" title="El nombre debe tener entre 3 y 40 caracteres" placeholder="Enter email" required>		
					</div>
					<div class="col-md-4 mb-3">
						<input type="text" id="txtapellido" minlength="3" maxlength="40" pattern="[A-Za-z].{3,45}" name="apellido" class=" cinc form-control" title="El apellido debe contener entre 3 y 40 caracteres"  placeholder="Apellido" placeholder="Enter email" required>
					</div>
		 			<br>		 			
		 			<br>
					<div class="col-md-4 mb-3">					
						<input type="email" class=" cinc form-control" id="txtmail" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="Debe introducir una direccion de correo valida" minlength="10" maxlength="120" placeholder="mail" required >
					</div>
					 <div class="col-md-4 mb-3">		
						<input type="password" id="txtcontra" name="contrasena" minlength="8" maxlength="80" pattern=".{8,80}" title="La contraseña debe contener entre 8 y 80 caracteres" maxlength="15" class="cinc form-control"   placeholder="password" required >
					</div>
		 			<br>
					<div class="col-md-4 mb-3">	
						<input type="number" id="telefono" name="telefono" pattern="[0-9]{8,11}" title="Debe introduccir un telefono valido de entre 8 y 11 caracteres" minlength="8" maxlength="11" class="col-12 form-control"   placeholder="Teléfono" required  >
					</div>
		 			<br>
		 			<br>
					
					<div class="col-12">
    				 <select id="provincia" name="provincia" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
    				<span class="caret"></span>
    				</select>
    				<select id="ciudad" name="ciudad" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Localidades<span class="caret"></span>
    				</select>
    				</div>
    				
                    	<br>
                        <br>
					<div class="col-md-4 mb-3">	   
						<input type="text" class="form-control cien" id="txtdir" name="dir" minlength="5" maxlength="80" placeholder="Dirección" required >
					</div>
	 			</div>
				-->
				
				<!-- CONTENEDOR VIEJO
 				<div class=" contenedor">
		 			<input type="text" id="txtnombre" minlenght="3" maxlenght="40"  pattern="[A-Za-z]" name="nombre" class=" cinc form-control"  placeholder="Nombre" title="El nombre debe tener entre 3 y 40 caracteres" placeholder="Enter email" required>		 			
		 			<input type="text" id="txtapellido" minlenght="3" maxlenght="40" pattern="[A-Za-z]" name="apellido" class=" cinc form-control" title="El apellido debe contener entre 3 y 40 caracteres"  placeholder="Apellido" placeholder="Enter email" required>
		 			<br>		 			
		 			<br>		 		
		 			<input type="email" class=" cinc form-control" id="txtmail" name="email" title="Debe introducir una direccion de correo valida" minlenght="10" maxlenght="120" placeholder="mail" required >
		 			<input type="password" id="txtcontra" name="contrasena" minlenght="8" maxlenght="60" title="La contraseña debe contener entre 8 y 60 caracteres" maxlength="15" class="cinc form-control"   placeholder="password" required >
		 			<br>
		 			<input type="number" id="telefono" name="telefono" title="Debe introduccir un telefono valido de entre 8 y 11 caracteres" minlenght="8" maxlength="11" class="col-12 form-control"   placeholder="Teléfono" required >
		 			<br>
		 			<br>
					
					<div class="col-12">
    				 <select id="provincia" name="provincia" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
    				<span class="caret"></span>
    				</select>
    				<select id="ciudad" name="ciudad" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Localidades<span class="caret"></span>
    				</select>
    				</div>
    				
                    	<br>
                        <br>
                        
					<input type="text" class="form-control cien" id="txtdir" name="dir" minlenght="5" placeholder="Dirección" required>
	 			</div>
				
				-->

 	    
 	 
 	 


	
		<div id="alerta"></div>
 </form>
</div>


			  <!-- Para el error-->
			  <!-- Posiblemente inservible
	<script>
	
	$(document).ready(function(){
		var $_GET=[];
		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
		var trigger=$_GET['trigger'];
		if(trigger==2){
			$.notify("Ha ocurrido un error debido a que la direccion de email ya se encuentra registrada o los parametros son invalidos", "error");
		}
		else if(trigger==1){
			$.notify("Ha ocurrido un error debido a que los parametros son invalidos", "error");
		}
		else if(trigger==3){
		    $('#ventana').modal('show'); 
		}
	});
	

	</script>
-->
	<!-- Para la validacion -->


</body>

	<script src="includes/js/scriptguardardato.js"></script>

</html>
