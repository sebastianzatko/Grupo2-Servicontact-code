<?php

  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  
  
  <link href="includes/css/muro.css" rel="stylesheet">
  <link href="includes/css/diseno.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />

  <script src="includes/js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
  <script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>
  
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

         <div class="container1">
   
      
    <center><h3>Categorias Populares</h3>    
         <img src="images/juan.jpg" alt="Park" class="img-responsive img-thumbnail">
         <img src="images/gasista.jpg" alt="Park" class="img-responsive img-thumbnail">
         <img src="images/electri.jpg" alt="Park" class="img-responsive img-thumbnail">
         <img src="images/plomeros.jpg" alt="Park" class="img-responsive img-thumbnail">
     </center>
  </div>
</body>

<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>
</html>
