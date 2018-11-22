<?php

  session_start();
  if(isset($_SESSION["id"]) and isset($_SESSION["idpro"])){
	  require "blogic/Professional.php";
	  $profesional=new Professional();
	  $servicios=$profesional->obtenerPuntuacionYServicios((int)$_SESSION['idpro']);
	  $dataSer=json_decode($servicios , true);
	  require "blogic/Galery.php";
	  $galeria=new Galery();
	  $fotos=$galeria->obtenerfotos((int)$_SESSION['idpro']);
	  $pictures=$fotos;
  }else{
	  header("Location:principal.php");
  }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="includes/css/tabla.css" rel="stylesheet">
  <link href="includes/css/galeria.css" rel="stylesheet">
  <link href="includes/css/twiter.css" rel="stylesheet">
  <link href="includes/css/galer.css" rel="stylesheet">
  <link href="includes/css/diseno.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
  
  <script src="includes/js/jquery-3.3.1.min.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
 
  <script src="bootstrap/bootstrap.js"></script>

  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
  
  
	
</head>
<body>

  <script type="text/javascript">
    
    function enviar(){
     var buscar1= document.getElementById('buscar1').value;

    var datean ='buscar1=';
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
	<?php
		require "templates/menu.php";
		
		echo $htmlmenu;
		
	?>

 </div>
         
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
		margin-bottom: 2px;
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
@media(max-width: 460px){
    .port-image{
    	height: 200px;
    }
.form-group {
    display: block;
    margin-left: 0;
}
}
 @media (max-width:380px){
 	.form-group{
 		display: block;
 		margin-left:0;
        
    }
}
	</style>


<div class="container">
    <div class="view-account">
        <section >
           

                <div class="content-panel">
                    <div class="content-header-wrapper">
                        <h2 class="title">Mi Galeria</h2>
                        <div class="actions">
                        
                           <button class="btn btn-primary"  data-toggle="modal" href="#ventana"><i class="fas fa-plus"></i> Agregar Nuevas Fotos</button>
                          
                        </div>
                    </div>
                   
                    </div>
                   <div class="drive-wrapper drive-grid-view">
                       
                            <div data-spy="scroll" class="tabbable-panel">
                                    <div class="tabbable-line">
                                      <ul class="nav nav-tabs ">
                                        <li >
                                          <a href="#tab1" data-toggle="tab">
                                          Albunes</a>
                                        </li>
                                        <li class="active">
                                        <a href="#tab2" data-toggle="tab">Todas
                                         </a>
                                        </li>
                                       
                                      </ul>
                                      
                                    </div>
                           </div>
                        </div>
                        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in  " id="tab1">
          <h4>Albumes</h4>
          <br>
          <div class="galeria"> 
        <?php
				foreach($dataSer as $servicio){
					
					echo "<a href='#".$servicio[3]."' data-toggle='modal' style='color:black;'><p style='margin-left:3px;'>".$servicio[3]."</p> <img src='http://i.ytimg.com/i/vWtix2TtWGe9kffqnwdaMw/mq1.jpg' alt='' ></a>";
				}
			?>
         
        <?php
       
        if(isset($fotos)){
          if(count($fotos)==0){
            echo "<center><h2> No exiten fotos :`( </h2></center>";
          }else{

            foreach($fotos as $foto){
              
              echo "<div class='galeria'><div class='tz-gallery'><div class='modal fade' id='".$foto[2]."'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> <h2 class='modal-title'>".$foto[2]."</h2><div class='modal-body'> ";//modal inicio
              foreach($pictures as $picture){
                if($picture[2]==$foto[2]){
                  echo "<a class='lightbox' href='".$picture[1]."'><img class='grande' src='".$picture[1]."'></a>";
                }
              }
              echo "</div></div></div><div class='modal-footer'><button type='button'  data-dismiss='modal' class='btn btn-success'>Cerrar</button></div></div></div></div></div>";//modal cierre
              
            }
          }
        }else{
          echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2> Solo un profesional puede tener fotos</h2></center></div></div>";;
        }
      
        ?>
       
         </div>   
                

             
                               
                        
                   
          
       </div>
    <div class="tab-pane fade in active" id="tab2">
         
         
      

		<div class="galeria"> 
        
          <div class="tz-gallery">
			<?php
				foreach($fotos as $foto){
					echo " <a class='lightbox' href='".$foto[1]."'><img src='".$foto[1]."' id='".$foto[0]."' ></a>";
				}
			
			?>
            
        
		</div>
	</div>
    </div>
  </div>
       
      </div>
    </div>
        
    </div>
</section>
</div>
</div>

<div class="modal fade" id="ventana">
             <div class="modal-dialog">
              <div class="modal-content">
			  <form action="includes/php/newphoto.php" method="POST" enctype="multipart/form-data" id="nuevafoto">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Subir Foto</h2>

                </div>
                 <div class="modal-body">

                        <div class="form-group" style="margin-left:0px">
							<label class="col-sm-3 control-label">
								Multiples fotos:
							</label>
							<div class="">
								<span class="btn btn-default btn-file">
									<input id="input-2" name="upload[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
								</span>
							</div>
						</div>
						<div class="form-group" style="margin-left:0px">
							<label class="col-sm-2 control-label">
								Servicio:
							</label>
							<div class="col-sm-10">
								<select class="btn btn-info  dropdown-toggle" type="button" name="tipo" data-toggle="dropdown" required>
									
									<?php
										foreach($dataSer as $servicio){
											echo "<option value='".$servicio[3]."' >".$servicio[3]."</option>";
										}
									?>
									<option value="Indefinido" selected>Indefinido</option>
								</select>   
							</div>
						</div>

                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-danger">Cancelar</button>

                   <button type="submit"  class="btn btn-success" >Subir archivos</button>
                 </div>
				 </form>
              </div>
              
             </div>
           </div>

<script>
	$(document).ready(function(){
			$(".filter-button").click(function(){
				var value = $(this).attr('data-filter');
				$("#tituloseleccionado").empty();
				$("#tituloseleccionado").html(value);
				
				if(value == "Todos")
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
<script>
	$("#nuevafoto").submit(function(event){
		event.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			data:formData,
			url:this.action,
			type:this.method,
			processData: false,
			contentType: false,
			success:function(data){
				
				
				if(data=="Algunos archivos no son de tipo jpg,gif o png" || data=="Algunas variables no se han ingresado" || data=="Ha ocurrido un error en la sesion"){
					$.notify(data, "error");
				}else{
					var datos=$.parseJSON(data);
					console.log(datos);
					
					$("#galleria").empty();
					console.log(datos.length);
					for(var x=0;x<datos.length;x++){
						console.log("concha de tu vieja");
						console.log(datos[x][0]);
						console.log(datos[x][1]);
						console.log(datos[x][2]);
						$("#galleria").append("<div class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-12 filter "+datos[x][2]+"'> <img src='"+datos[x][1]+"' id='"+datos[x][0]+"' class='img-responsive port-image'></div>");
					}
				}
			}
		});
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script> 
<script type="text/javascript" src="/includes/js/citas.js"></script>      
</body>
</html>
