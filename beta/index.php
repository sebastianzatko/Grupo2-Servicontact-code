<?php

  session_start();
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
  <link rel="stylesheet" type="text/css" href="includes/css/insta.css">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="includes/js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
</head>
<body>
 
  <?php
    require "templates/menu.php";
    
    echo $htmlmenu;
    
  ?>

<div class="container-fluid">
      <div id="micarouselinicio" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#micarouselinicio" data-slide-to="0" class="active"></li>
          <li data-target="#micarouselinicio" data-slide-to="1"></li>
          <li data-target="#micarouselinicio" data-slide-to="2"></li>
        </ol>
      <div class="tomaño">
        <div class="carousel-inner">
          <div class="item active">
            <img class="imge d-block w-100" src="images/casa.jpg"  id="tan" alt="First slide">
          </div>
          <div class="item">
            <img class="imge d-block w-100" src="images/casael.jpg" id="tan"  alt="Second slide">
          </div>
          <div class="item">
            <img class="imge d-block w-100" src="images/electri.jpg" id="tan"  alt="Third slide">
          </div>
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

        
   
      
<center><h3>Categorias Populares</h3> </center>
<br>
<div class="galeria">
<div class="container">
  <div class="row">
        <div class="profile-header-container">   
        <div class="profile-header-img">
                <img class="img-circle" src="images/juan.jpg" />
                 <img class="img-circle" src="images/gasista.jpg" />
                  <img class="img-circle" src="images/electri.jpg" />
                   <img class="img-circle" src="images/plomeros.jpg" />
                <!-- badge -->
        </div>
        </div> 
  </div>
</div>
</div>   
        
<section class="team">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="col-lg-12">
          <h6 class="description">Profesionales Mas Destacados</h6>
          <div class="row pt-md">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/1.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Maria </h1>
              <h2>TECNICA</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/2.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Crisitna Di</h1>
              <h2>Decoradora</h2>
               <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/3.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Maria H</h1>
              <h2>Jardinera</h2>
             <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/4.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Jony diaz</h1>
              <h2>Electrisista</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/5.jpg" class="img-responsive">
                <ul class="text-center">
                    <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Pedro gonzalez</h1>
              <h2>plomero/gasista</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/6.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>Charly gutierrez</h1>
              <h2>pisinista</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/7.jpg" class="img-responsive">
                <ul class="text-center">
                  <a href="#"><li>Ver Perfil</li></a>
                 
                </ul>
              </div>
              <h1>Martin j</h1>
              <h2>Electrisita/mecanico</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="http://nabeel.co.in/files/bootsnipp/team/8.jpg" class="img-responsive">
                <ul class="text-center">
                    <a href="#"><li>Ver Perfil</li></a>
                </ul>
              </div>
              <h1>falvia</h1>
              <h2>decoradora/jardinera</h2>
              <p>Calificacion <i class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star" style="color: #FFC300"></i><i style="color: #FFC300" class="fas fa-star"></i><i style="color: #FFC300" class="fas fa-star"></i><i class="fas fa-star"></i></p>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
    <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center">
            
            <h5>Changero <i class="fa fa-heart red"></i> by Los mejores profesionales <a href="http://www.nabeel.co.in" target="_blank"></a></h5>
        </div>   
    </div>
</footer> 
<br>

<center><h1>Publicaciones</h1></center>
<br>
<br>
<br>
<br>

 <div class="team">
  <div class="container">
    <div class="row">
     <div class="col-lg-12">
       <main>
       
        <div class="container-comments">
           
            <div class="comments">
               
                <div class="photo-perfil">
                    <img src="image/jose.jpg" alt="">
                </div>
            <div class="col-xs-12">
                <div class="info-comments">
                   
                    <div class="header">
                       <img src="images/jose.jpg" class="futer">
                        <h4 class="h4">juan gonzalez</h4>
                      
                    </div>
                      <h5>2 noviembre 2018</h5>
                    <p><img src="images/decorado.jpg" class="foter"></p>
                    
                    <div class="footer">
                       
                       <h5 class="request">Comentar</h5>
                        <label class="icon-heart"></label>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container-comments-request">
           
            <div class="comments-request">
               
                <div class="photo-perfil-request">
                    <img src="images/juan.jpg" alt="">
                </div>
                
                <div class="info-comments-request">
                   
                    <div class="header">

                        <h4>Julia gonzalez</h4>
                        <h5 class="h4">2 noviembre 2018</h5>
                    </div>
                    
                    <p>Muy lindo decarado quisiera tener uno igual muy buen trabajo lo felicito una obra de arte</p>
                    
                    <div class="footer">
                       
                       <h5 class="request">Comentar</h5>
                        <label class="icon-heart"></label>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container-comments">
           
            <div class="comments">
               
                <div class="photo-perfil">
                    <img src="image/ramon.png" alt="">
                </div>
            <div class="col-xs-12">
                <div class="info-comments">
                   
                    <div class="header">
                       <img src="images/ramon.jpg" class="futer">
                        <h4 class="h4">jose gonzalez</h4>
                        
                    </div>
                    <h5>2 noviembre 2018</h5>
                    <p><img src="images/picinas.jpg" class="foter"></p>
                    
                    <div class="footer">
                       
                        <h5 class="request">Comentar</h5>
                        <label class="icon-heart"></label>
                        
                    </div>
                </div>
              </div>  
            </div>
        </div>
        
        <div class="container-comments">
           
            <div class="comments">
               
                <div class="photo-perfil">
                    <img src="image/perfil2.jpg" alt="">
                </div>
             <div class="col-xs-12">
                <div class="info-comments">
                   
                    <div class="header">
                      <img src="images/ramon.jpg" class="futer">
                         <h4 class="h4">julio gonzalez</h4>
                        
                    </div>
                     <h5>2 noviembre 2018</h5>
                    <p><img src="images/jardin.jpg" class="foter"></p>
                    
                    <div class="footer">
                       
                        <h5 class="request">Comentar</h5>
                        <label class="icon-heart"></label>
                        
                    </div>
                </div>
               </div> 
            </div>
        </div>

      </main>
    </div>
  </div>
  </div>
   </div>
    
    <div class="capa-data"></div>
    <div class="container-data">
        <div class="photo-input">
           
            <div class="perfil-photo">
                <img src="image/perfil2.jpg" id="photoSelect" alt="">
            </div>
            <input type="file" id="loadPhoto">
            <input type="text" placeholder="Su nombre">
            
        </div>
        
        <textarea class="mensaje" name="" id="" cols="30" rows="10" placeholder="Escriba su mensaje"></textarea>
        
        <button class="btn-comment">Comentar</button>
    </div>
 </div>
</body>
<script type="text/javascript" src="includes/js/script.js"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
