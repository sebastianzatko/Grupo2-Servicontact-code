<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="registro.css" rel="stylesheet">
	<script type="text/javascript" src="jquery.js"></script>
	<script src="validacion.js"></script>
	<script type="application/javascript" src="js/notify.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	 <script>
        function sololetras(e) {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key).toLowerCase();
            letra = " abcdefghijklmnñopqrstuvwxyz";
            especiale = "8-37-38-46-164";
            teclado_especial = false;
            for (var i in especiale) {
                if (key == especiale[i]) {
                   teclado_especial = true; break;
                }
            }
            if (letra.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }

    </script>

    <script>
    
    </script>
</head>
<body>
	<br>
	<div class="container">
	<center><img src="images/trabajos.png" class="logo"></center>
 	<form action="register.php" name="formadd" method="POST" enctype="multipart/form-data">

 		<center>
 		<div class="form-group ">
 				<div class=" contenedor">
		 			<input type="text" id="txtnombre" minlenght="3" maxlenght="40"  name="nombre"  onkeypress="return sololetras(event)" class=" cinc form-control"   placeholder="Nombre" pattern=".{3,40}" title="El nombre debe tener entre 3 y 40 caracteres" aria-describedby="emailHelp" placeholder="Enter email" required>
		 			
		 			<input type="text" id="txtapellido" minlenght="3" maxlenght="40" name="apellido"  onkeypress="return sololetras(event)" class=" cinc form-control"  pattern=".{3,40}" title="El apellido debe contener entre 3 y 40 caracteres"  placeholder="Apellido" aria-describedby="emailHelp" placeholder="Enter email" required>
		 			<br>
		 			
		 			<br>
		 		
		 			<input type="email" class=" cinc form-control" id="txtmail" name="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  title="Debe introducir una direccion de correo valida" minlenght="10" maxlenght="120" placeholder="mail" required >
		 		
		 			<input type="password" id="txtcontra" name="contrasena" minlenght="8" maxlenght="60" pattern=".{8,60}"  title="La contraseña debe contener entre 8 y 60 caracteres" maxlength="15" class="cinc form-control"   placeholder="password" required >
		 			<br>
		 			<input type="text" name="telefono"  pattern=".{8,11}" minlenght="8" title="Debe introduccir un telefono valido de entre 8 y 11 caracteres" minlenght="8" maxlength="11" class="cien form-control"   placeholder="telefono" required >
		 			<br>
		 			
		 			<br>
					
					<!-- Para las provincias y ciudades-->
				
    				 <select id="provincia" name="provincia" class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
    				<span class="caret"></span>
    				</select>
					
    				<select id="ciudad" name="ciudad"class="cinc btn btn-primary  dropdown-toggle" type="button"data-toggle="dropdown" required>Localidades<span class="caret"></span>
    				</select>
				
                    	<br>
                        <br>
					<input type="" class="cien form-control" id="txtdir" name="dir" minlenght="5" class="ciem" placeholder="Direccion" aria-describedby="emailHelp"  pattern=".{3,30}" title="direccion demasiado largo" placeholder="Enter email"required>
	 			</div>
				 <output id="list"></output>
	 			<div class="fotos btn btn-success">
	 				<p ><i class="icon fas fa-download"></i> Foto de Perfil</p>
	 			<input type="file"  name="imagen" required  id="fil">
	 			</div>
	 		  <br>
	 		  <br>
            
	 		   <button type="submit" name="submit" id="boton"  class="btn btn-primary" value="Upload"<p>Registrarse</p></button>
 	     </div>
		</center>
		<div id="alerta"></div>
 </form>
</div>

		<!-- Para las provincias y ciudades, es una mountrocidad lose, si alguien lo quiere cambiar es bienvenido-->
	<script>
	
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
                         document.getElementById("list").innerHTML = ['<img class="thumb img-circle thumbnailmascota" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('fil').addEventListener('change', archivo, false);
      </script>

			  <!-- Para el error-->
	<script>
	
	$(document).ready(function(){
		var $_GET=[];
		window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
		var error=$_GET['error'];
		if(error==2){
			$.notify("Ha ocurrido un error debido a que la direccion de email ya se encuentra registrada o los parametros son invalidos", "error");
		}
		else if(error==1){
			$.notify("Ha ocurrido un error debido a que los parametros son invalidos", "error");
		}
	});
	

</script>

</body>
</html>