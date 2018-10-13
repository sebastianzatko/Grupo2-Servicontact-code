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
        
        <li><a href="#"><img src="images/jug.png" class="perfil"></a></li>
        <li><a href="#" class="nomb">Juan</a></li>
       
        <li><a href="index.php"><i class="icons iconos fas fa-home"></i></a></li>
        <li><a href="#"><i class="icons3 far fa-image"></i> Herramientas</a></li>
        <li><a href="#"><i class="icons4 iconos fas fa-wrench"></i> Galeria</a></li>
       
      </ul>

      <ul class="navbar-form navbar-left" id="form1" onsubmit="return enviar();" method="POST">
       <div class="form-group">
       
          <input type="text" class="form-control" name="buscar1" id="buscar1" placeholder="Buscar servicios">
        
        	<button name="enviando" class="btn btn-primary" id="boton"><i class="icons iconos fas fa-search"></i> Buscar</button>
          
    	 </div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><i class="icons5 far fa-star"></i> Mi puntuacion</a></li>
      	<li><a href="#"><i class="icons far fa-comments"></i></a></li>
        <li><a href="#"><i class="icons1 far fa-bell"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icons2 far fa-user"></i> Mi perfil<span class="caret"></span></a>
          <img src="images/jug.png" class="perfiles">
          <ul class="dropdown-menu">
            <li><a href="sesion.php">ver perfil</a></li>
            <li><a href="servicios.php">Mis servicios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<img src="images/casa.jpg" class="imo">
<img src="images/jug.png" class="imagen">
 
 <div class=" container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
   
    <div class="margin1">


        <ul  class="ula nav navbar-nav">
           <li><a class="btn btn-default" id="nombr" href="">juan gonzalez</a></li>
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
                     
                     <h4>Juan</h4>

                     <br>
                     <p>TELEFONO</p>
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
                     <h3>JUAN</h3>
                     <h3>Gonzalez</h3>
                    
                    
                      <h4>DIR:Monte grande 123</h4>
                   
                     <br>
                      <h4>Localidad :Monte grande</h4>
                      
                      
                       <br>

                       <h4>Provincia :Buenos Aires</h4>  
                              
                      

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