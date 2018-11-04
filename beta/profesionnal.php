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
          $profesional=new Professional();
            $idprofesional=$profesional->getid((int)$idactual);
          $serviciosactivos=$profesional->obtenerPuntuacionYServicios((int)$idprofesional);
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
   <script src="includes/js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"  href="includes/css/twiter.css">
   <link rel="stylesheet" type="text/css" href="includes/css/fotos.css">
    <link rel="stylesheet" type="text/css" href="includes/css/buscar.css">
 <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link href="includes/css/diseno.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
  
  <!-- Cuidado con este estilo de estrellas, pues se utiliza en buscar.php , si queres modificar las estrellas de este index es recomendable que hagas otro css y copies el contenido de este, obviamente reemplazar con el nuevo estilo de css, pues este nunca debera ser tocado, y si es tocado alguien morira a manos del Capitan Jack, Calico Jack -->
  <link rel="stylesheet" href="includes/css/estrellas.css" />
 
 
</head>
<body>
 
  <?php
    require "templates/menu.php";
    
    echo $htmlmenu3;
    
  ?>
  <div class="container">
      <div class="row">

      <!-- code start -->
      <div class="twPc-div">
          <a class="twPc-bg twPc-block"></a>

        <div>
          <div class="twPc-button">
                  <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                 
                  <!-- Twitter Button -->   
          </div>

          <a title="" href="" class="twPc-avatarLink">
            <img  src="<?php echo $row["FOTO_DE_PERFIL"]; ?>"  class="img-thumbnail ">
          </a>

          <div class="twPc-divUser">
            <div class="twPc-divName">
              <a href=""><?php echo $row["NOMBRE"]." ".$row["APELLIDO"]; ?></a>
            </div>
            <span>
            
            </span>
          </div>

          <div class="twPc-divStats">
            <ul class="twPc-Arrange">
              <li class="twPc-ArrangeSizeFit">
                <a data-toggle="modal" href="#ventana" >
                  <span class="twPc-StatValue"><i class="iconsn2 far fa-user"></i></span>
                  <span class="twPc-StatLabel twPc-block">Informacion</span>
                  
                </a>
              </li>
              <li class="twPc-ArrangeSizeFit">
                <a href="#ventana2" data-toggle="modal" >
                  <span class="twPc-StatValue"><i class="iconsn2 far fa-address-book"></i></span>
                  <span class="twPc-StatLabel twPc-block">Servicios</span>
                </a>
              </li>
              <li class="twPc-ArrangeSizeFit">
                <a href="#ventana1" data-toggle="modal" >
                  <span class="twPc-StatValue"><i class="iconsn fas fa-user-cog"></i></span>
                  <span class="twPc-StatLabel twPc-block">Contactar</span>
                </a>
              </li>
           <div class="modal fade" id="ventana2">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Servicios</h2>

                </div>
                 <div class="modal-body">
                     <?php
                        
                        foreach($dataSer as $data)
                  {
                      if($data[0]!=null and $data[1]!=null){
                          $puntuacionporcentaje=(((int)$data[0]/(int)$data[1])/5)*100;
                          $puntuacionredondeado=(floor(($puntuacionporcentaje/10)*10));
                          
                          $puntuacionfinal="<div class='stars-outer'><div class='stars-inner' style=width:".(string)$puntuacionredondeado."%!important></div></div>";
                          
                      }else{
                          $puntuacionfinal="Este servicio todavia no ha sido calificado";
                      }
                      
                      
                    
                    echo "<i class=".$data[2]."></i><h3>".$data[3]."</h3>".$puntuacionfinal;
                    
            
                  }
                     
                     
                     ?>
                      
                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-success">Cerrar</button>

                  
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
           <div class="modal fade" id="ventana">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Datos</h2>

                </div>
                 <div class="modal-body">
                     <h3><i class="far fa-user"></i> <?php echo $row["NOMBRE"]; ?> <?php echo $row["APELLIDO"]; ?></h3>
                    
                    
                    
                      <h4>Direccion:<?php echo $row["DIRECCION"]; ?></h4>
                   
                     <br>
                      <h4>Localidad :<?php echo $row["LOCALIDAD"]; ?></h4>
                      
                      
                       <br>

                       <h4>Provincia :<?php echo $row["PROVINCIA"]; ?></h4>  
                              
                      

                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-success">Cerrar</button>

                   
                 </div>
              </div>
              
             </div>
           </div>
            </ul>
          </div>
        </div>
      </div>

      <!-- code end -->
      </div>
  

</div>

 <!-- /.container-fluid -->
  <br>
  <br>
   <br>
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
                    <div class="col-xs-12 col-md-6">
                        <div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 5 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 4 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 3 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 2 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</body>
</html>