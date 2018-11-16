<?php
session_start();
error_reporting(0);
if(isset($_GET["idprofile"])){
  
    $idactual=$_GET["idprofile"];
    require "blogic/User.php";
    $user=new b_user;
    $resultado=$user->obtenerDatosDeUsuario($idactual);
    
      if(mysqli_num_rows($resultado)==1){
      
        $row = mysqli_fetch_assoc($resultado);
        
        require "blogic/Professional.php";
          $profesional=new Professional();
            $idprofesional=$profesional->getid((int)$idactual);
          $serviciosactivos=$profesional->obtenerPuntuacionYServicios((int)$idprofesional);
          $dataSer=json_decode($serviciosactivos , true);
		  require "blogic/Galery.php";
		  $galeria=new Galery();
		  $fotos=$galeria->obtenerfotos((int)$idprofesional);
        
        
      }
      else{header('Location: index.php');}
    }
  
else{header('Location: index.php');}



          
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
	}

	.gallery_product
	{
		margin-bottom: 30px;
	}
	</style>
</head>
<body>
 
  <?php
    require "templates/menu.php";
    
    echo $htmlmenu3;
    
  ?>
  

 <!-- /.container-fluid -->
  <div class="modal fade" id="ventana1">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Contactar profesional</h2>

                </div>
                 <div class="modal-body">
                     
                     <h2><?php echo $row["NOMBRE"]; ?> <?php echo $row["APELLIDO"]; ?></h2>
                     <hr>
                    <?php
                        if(isset($_SESSION["id"])){
                            //aca faltaria el boton para que abra el mensaje instantaneo y eso
                            echo "<label>Telefono:</label><p><b>".$row["TELEFONO"]."</b></p><br><button type='button' style='color: white;' class='btn btn-primary' id='contactar' data-idpro='".$idactual."' data-idclient='".$_SESSION["id"]."' ><i class='far fa-comment-alt' style='color: white;' ></i> Mensaje privado</button>";
                        }else{
                            //aca va para ingresar sesion
                            echo "<small>Para contactarse con este profesional debe iniciar sesion</small><br><a href='principal.php'><button type='button' class='btn btn-primary' style='color: white;'><span class='glyphicon glyphicon-log-in'></span>  Iniciar Sesion</button></a>";
                        }
                    
                    
                    ?>
                     

                 </div>
                 <div class="modal-footer">
                   

                   <button type="button" data-dismiss="modal" class="btn btn-success" >Cerrar</button>
                 </div>
              </div>
              
             </div>
           </div>

	<div class="col-lg-10 col-sm-10 col-xs-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?php echo $row["FOTO_DE_PERFIL"]; ?>">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $row["FOTO_DE_PERFIL"]; ?>">
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
            <button type="button" id="favorites" class="btn btn-default" href="#ventana1" data-toggle="modal"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                <div class="">Contactar</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>Datos personales</h3>
          <br>
           <p>Nombre: </p><label><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></label>
             
                     
                                 <br>
          
          <p>Direccion: </p><label for="dir"><?php echo $row["DIRECCION"]; ?></label>
         
          <br>
        </div>
		
		<div class="tab-pane fade in active" id="tab3">
          <h3>Galeria</h3>
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
						echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2> No exiten fotos :`( </h2></center></div>";
					}else{
						foreach($fotos as $foto){
							echo "<div class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-12 filter ".$foto[2]."'> <img src='".$foto[1]."' id='".$foto[0]."' class='img-responsive port-image'></div>";
						}
					}
				}else{
					echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><center><h2> Solo un profesional puede tener fotos</h2></center></div>";;
				}
			
			?>
        
         </div>
          <br>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>Calificacion</h3>
          <br>
			<div class="twPc-d">
			<div class="row">
				
				<div class="col-xs-12 col-md-12">
					<div class="well well-sm">
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
										  
											echo "<div class='row'><div class='col-xs-3 col-md-3 text-right'><i class='".$data[2]."'></i> ".$data[3]."</div>".$puntuacionfinal."</div>";			
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
    </div>
    
    </div>
  
<script>
    $("#contactar").click(function(){
        var idcliente=$(this).data("idclient");
        var idprofesional=$(this).data("idpro");
        jqac.arrowchat.chatWith(idprofesional);
        $.ajax({
			data:{idcliente:idcliente,idprofesional:idprofesional},
			url:"includes/php/newcontact.php",
			type:"POST",
			success: function (data) {
				    console.log(data);
				}
			}
		)
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
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</body>
</html>