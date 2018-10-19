<?php
session_start();

if(isset($_GET["idprofile"])){
	
		$idactual=$_GET["idprofile"];
		require "blogic/User.php";
		$user=new b_user;
		$resultado=$user->obtenerDatosDeUsuario($idactual);
		
			if(mysqli_num_rows($resultado)==1){
			
				$row = mysqli_fetch_assoc($resultado);
				
				require "blogic/Professional.php";
			    $profesional=new Professional;
				$idprofesional=$profesional->getid($idactual);
			    $serviciosactivos=$profesional->get_servicios((int)$idprofesional);
			    $dataSer=json_decode($serviciosactivos , true);
				
				
			}
			else{header('Location: index.php');}
		}
	
else{header('Location: index.php');}



    	    
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
  <script src="jquery.js"></script> 
  <script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"  href="includes/css/profesional.css">
   <link rel="stylesheet" type="text/css" href="includes/css/fotos.css">
 <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link href="includes/css/diseno.css" rel="stylesheet">
 
 
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
	<?php
		require "templates/menu.php";
		
		echo $htmlmenu;
		
	?>
<img src="images/casa.jpg" class="imo">
<img src="<?php echo $row["FOTO_DE_PERFIL"]; ?>" class="imagen">
 
 <div class=" container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
   
    <div class="margin1">


        <ul  class="ula nav navbar-nav">
           <li><a class="btn btn-default" id="nombr" href=""><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></a></li>
          <li><i class="iconsn far fa-user"></i><a class="btn btn-primary" id="letras" data-toggle="modal" href="#ventana">Informacion</a></li>
           <li><i class="iconsn2 far fa-address-book"></i><a href="#ventana2" class="btn btn-default" id="letras1" data-toggle="modal">Servicios</a></li>
           <li><i class="iconsn3 fas fa-chalkboard-teacher"></i><a href="#ventana1" class="btn btn-default" data-toggle="modal" id="letras2" data-toggle="modal">Contactar</a></li>
            <div class="modal fade" id="ventana2">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Servicios que realizo</h2>

                </div>
                 <div class="modal-body">
                     <h3>Albañil <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h3>
                     <h3>Plomero <i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300"class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h3>
                     <h3>Pintor <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h3>
                     
                      
                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-default">Salir</button>

                  
                 </div>
              </div>
              
             </div>
           </div>
            <div class="modal fade" id="ventana1">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Contactar profesional</h2>

                </div>
                 <div class="modal-body">
                     
                     <h4><?php echo $row["NOMBRE"]; ?></h4>

                     <br>
                     <p><?php echo $row["TELEFONO"]; ?></p>
                     <br>

                          <a href=""><button type="button" id="fot1" style="color: white;" class="btn btn-primary" ><i class="far fa-comment-alt" style="color: white;"></i> Mensaje privado</button></a>

                 </div>
                 <div class="modal-footer">
                   

                   <button type="button" data-dismiss="modal" class="btn btn-success" >Salir</button>
                 </div>
              </div>
              
             </div>
           </div>
           <div class="modal fade" id="ventana">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Datos</h2>

                </div>
                 <div class="modal-body">
                     <h3><?php echo $row["NOMBRE"]; ?></h3>
                     <h3><?php echo $row["APELLIDO"]; ?></h3>
                    
                    
                      <h4>DIR:<?php echo $row["DIRECCION"]; ?></h4>
                   
                     <br>
                      <h4>Localidad :<?php echo $row["LOCALIDAD"]; ?></h4>
                      
                      
                       <br>

                       <h4>Provincia :<?php echo $row["PROVINCIA"]; ?></h4>  
                              
                      

                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-default">Cerrar</button>

                   
                 </div>
              </div>
              
             </div>
           </div>
         </ul>
     </div>
     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <br>
  <br>
<div class="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation"><a aria-controls="" data-toggle="collapse" data-parent="#acordeon" role="tab" href="#collapse1"><i class="icons3 far fa-image"></i>&nbsp;&nbsp; Mis trabajos</a></li>
      <li role="presentation"><a aria-controls=""  data-toggle="collapse" data-parent="#acordeon" href="#collapse2"><i class="icons4 iconos fas fa-wrench"></i>&nbsp;&nbsp; Mis herramientas</a></li>
     
         
    </ul>
</div>
  
  <div class="panel-gruop" id="acordeon" role="tablist">
    <div class="panel panel-defaul">
      <div class="panel-heading" role="tab" id="heading1">
        
      </div>
    <div id="collapse1" class="panel-collapse collapse ">
      <div class="panel-body" >
             <center><div class="galeria"> 
              <div class="tz-gallery">
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
              </div>
            </div></center>
      </div>
    </div>
    </div>
  
   <div class="panel panel-defaul">
      <div class="panel-heading" role="tab" id="heading2">
        
      </div>
    <div id="collapse2" class="panel-collapse collapse ">
      <div class="panel-body" >
           <center><div class="galeria"> 
              <div class="tz-gallery">
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
                 <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/casa.jpg">
                <img src="images/casa.jpg"  class="img-thumbnail" > 
                </a>
                <a class="lightbox" href="images/casael.jpg">
                <img src="images/casael.jpg"  class="img-thumbnail" > 
                </a>
               <a class="lightbox" href="images/electri.jpg">
                <img src="images/electri.jpg"  class="img-thumbnail" > 
                </a>
              </div>
            </div></center>
      </div>
    </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>