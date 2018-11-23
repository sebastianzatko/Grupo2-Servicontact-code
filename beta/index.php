<?php
  session_start();
  require("blogic/Wall.php");
	
	$wall=new Wall();
	$categorias=$wall->conseguirlascategoriasmasbuscadas();
	$imagenesdelmejorrateado=$wall->conseguirfotosdelosprofesionalesmasrateados();
	if(isset($_SESSION["id"]) and ( $_SESSION["id"]!="")){
		
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="includes/css/muro.css" rel="stylesheet">
  <link href="includes/css/diseno.css" rel="stylesheet">
   <link rel="stylesheet" href="includes/css/estilos.css">
    <link rel="stylesheet" href="includes/css/blog.css">
  <link rel="stylesheet" type="text/css" href="includes/css/insta.css">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />

<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <script src="includes/js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  <script type="application/javascript" src="includes/js/notify.js"></script>
  <link rel="stylesheet" href="includes/css/estrellas.css" />
</head>
<body>
 
  <?php
    require "templates/menu.php";
    
    echo $htmlmenu;
    
  ?>


<div class="container-fluid">


		
      <div id="micarouselinicio" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
			<?php
				for($x=0;$x<count($imagenesdelmejorrateado);$x++){
					echo "<li data-target='#micarouselinicio' data-slide-to='".(string)$x."' ></li>";
				}
			
			?>
          
         
        </ol>
      <div class="tomaño">
        <div class="carousel-inner">
			<?php
				foreach($imagenesdelmejorrateado as $imagen){
					echo "<div class='item nolosoñe'><img class='imge d-block w-100' src='".$imagen[2]."'  id='tan' alt='First slide'/></div>";
				}
			
			
			?>
			<script>
				$(document).ready(function(){
					$(".nolosoñe").first().addClass("active");
				});
				
			
			</script>
        </div>
      </div>
        <a class="left carousel-control" href="#micarouselinicio" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#micarouselinicio" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
<br>

        

      

<br>
<div class="galeria">
    <div class="container">
   <div class="row">
        <div class="profile-header-container"> 
        <h3 class="center" >Categorias Populares</h3>
        <div class="profile-header-img">
				<?php
	
					foreach($categorias as $categoria){
						
						echo "<div class='categ'><a class='negro' href='buscar.php?service=".$categoria[0]."'> <img class='img-circle' src='images/".$categoria[4]."'/><ul class='text1-center1'>
                  <span>".$categoria[1]."</span></ul></a></div>";
					}	
					
				?>
                
                <!-- badge -->
        </div>
        </div> 
  </div>
</div>
</div>  
 

        <br><br>
<section class="team">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="col-lg-12">
			<style>
				.titucloespecial{
					top:0px;
				}
				.max{
					height:300px;
				}
			</style>
          <h3 class="titucloespecial">Profesionales Mas Destacados</h3>
          <div class="row pt-md" id="profesionalesmasdestacadosdetuzona">
            
           
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <br><br>
</footer> 
</section>
	<?php if(isset($_SESSION["id"]) and $_SESSION["id"]!=""):?>
			<center><h3>Publicaciones</h3></center>
			<br>


			 
			 <div class="container">
			  
				<div class="row">
				 <div class="col-lg-10 col-md-offset-1">
				  <div class="row">
					 <?php
						
							echo "<div id='publicaciones'>";
							//echo "<aside><div class='content-footer'><img class='user-small-img' src='images/ramon.jpg'><span style='font-size: 16px;color: #fff;'>Juan Gonzalez</span><span class='pull-right'><a href='#ventana2' data-toggle='modal'><i class='fa fa-comments'></i> 30</a></span></div><div class='tz-gallery'><a class='lightbox' href='images/decorado.jpg'><img src='images/decorado.jpg' class='img-responsive'></a></div><div class='footer'><h5 class='request'>Comentar</h5><label class='icon-heart'></label></div></aside></div>";
							echo "</div>";
							echo "<div id='almacenamientodemodales'>";
							echo "</div>";
							echo "<script src='includes/js/publicaciones.js'></script>";
						
					
					
					?>
				 
				
						  
					</div>

				  </div>
				</div>
			  </div>

		</div>
 <?php endif; ?>
    
 <div class="capa-data">
 </div>
    <div class="container-data">
        <div class="photo-input">
           
            <div class="perfil-photo">
                <img src="images/jose.jpg" id="photoSelect" alt="">
            </div>
            
           <p class="nombres">Juan GONZALEZ</p>
            
        </div>
        
        <input class="mensaje" name="" id="" cols="30" rows="10" placeholder="Escriba su mensaje"></textarea>
        <br>
        <button id="btn-comment" class="btn btn-success">Comentar</button>
    </div>
 </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<br/>
<br/>
<br/>
</body>
<script type="text/javascript" src="includes/js/script.js"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
<script type="text/javascript" src="/includes/js/citas.js"></script>
<script type="text/javascript" src="includes/js/comentar.js"></script>
<script type="application/javascript" src="http://ipinfo.io/?format=jsonp&callback=getIP"></script>
<script type="text/javascript" src="includes/js/obtenermejoresprofesionales.js"></script>
</html>
