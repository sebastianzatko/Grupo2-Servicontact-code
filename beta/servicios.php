<?php 
    session_start();
    if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])):
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="includes/css/tabla.css" rel="stylesheet">
	<script src="includes/js/jquery-3.3.1.min.js"></script>
  <script src="includes/js/jquery.js"></script> 
	<script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="includes/css/switchery.css">
  <link rel="stylesheet" type="text/css" href="includes/css/checkbox.css">
  <script type="text/javascript" src="includes/js/switchery.js"></script>
	<link href="includes/css/buscar.css" rel="stylesheet">
 
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

      <button type="button" class="navbar-toggle left-navbar-toggle" data-toggle="collapse" style="display: none" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
         <center><a href="index.php"  id="buscar3"><i class="fas fa-arrow-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Selección de Servicios </a></center>
     
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

    <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <ul class="list-group"></ul>
		<?php
			require "blogic/Services.php";
			
			
			$servicios=new services;
			
			$listaservicios=$servicios->getservicios();
			
			if(isset($_SESSION['idpro'])){
			    require "blogic/Professional.php";
			    $profesional=new Professional;
			    $serviciosactivos=$profesional->get_servicios((int)$_SESSION['idpro']);
			    $dataSer=json_decode($serviciosactivos , true);
			}
			else{
			    
			}
			
			
			
			$dataAr = json_decode($listaservicios , true);
            

			foreach($dataAr as $data)
			{
			    if(isset($dataSer)){
    				if(in_array($data[0], $dataSer)){
    				    $check="checked";
    				}
    				else{
    				    $check="";
    				}
			    }else{
			        $check="";
			    }
				
				echo "<li class='list-group-item'><input type='checkbox' ".$check." name='services[]' class='js-switch' value='".$data[0]."'  /><span class='spa'> <i class='".$data[2]."'></i> " .$data[1]."</span></li>";
				

			}
			
		?>
      
      <script type="text/javascript">
        
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
              
              var switchery = new Switchery (html, {disabled: true ,


               color              :  '#5CA3F5',
               size: 'small'
                });
                 

                  });
      </script>
      </div>
    </div>
    </div>
    
      
       
        
	<script>
		$( document ).ready(function() {
			$( ":checkbox" ).each(function(){
				var id=$(this).val();
				$(this).change(function(){
				    var xmlhttp=new XMLHttpRequest();
					if($(this).is(':checked')){
						//llamar a habilitar
						
						xmlhttp.open("GET","serviceproces.php?id="+id+"&&in=1",true);
						xmlhttp.send();
						console.log("enviado");
					}
					else{
						xmlhttp.open("GET","serviceproces.php?id="+id+"&&in=0",true);
						xmlhttp.send();
						console.log("enviado negativo");
					}
				})
			});
		});
	</script>
  
</body>
</html>


<?php
    else:
        header("Location:principal.php");
        
    endif;
?>