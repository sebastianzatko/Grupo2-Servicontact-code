<?php

  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="includes/css/tabla.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="includes/js/jquery-3.3.1.min.js"></script>
  <script src="includes/js/jquery.js"></script> 
	<script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <script src="includes/js/sidebarNavigation.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="includes/css/galeria.css" rel="stylesheet">
	<link href="includes/css/diseno.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css&amp" charset="utf-8" />
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

 </div>
         
  

<img src="<?php echo $_SESSION["foto"]; ?>" class="im2">

<div class="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a aria-controls="" data-toggle="tab"  role="tab" href="#">Mis trabajo</a></li>
      <li role="presentation"><a aria-controls="">Juan gonzales</a></li>
      <li role="presentation"><a aria-controls="" data-toggle="modal"  role="tab" href="#ventana"><i class="fas fa-camera-retro"></i> subir foto</a></li>
         <div class="modal fade" id="ventana">
             <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h2 class="modal-title">Subir Foto</h2>

                </div>
                 <div class="modal-body">
                     
                     
                      <select id="provincia" name="provincia" class="btn btn-info  dropdown-toggle" type="button"data-toggle="dropdown" required>Provincias
                        
                                 </select>       
                      </br>
                               </br>

                          <button type="button" id="fot1" class="btn btn-primary" ><i class="fas fa-camera-retro"></i>Elegir foto</button>

                 </div>
                 <div class="modal-footer">
                   <button type="button"  data-dismiss="modal" class="btn btn-default">Cerrar</button>

                   <button type="button"  class="btn btn-success" >Guardar cambios</button>
                 </div>
              </div>
              
             </div>
           </div>
    </ul>
</div>
<div class="galeria">    
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casa.jpg" >
    <img src="images/casael.jpg" >
    <img src="images/electri.jpg" >

</div>
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="https://www.arrowchat.com/arrowchat/external.php?type=js&v=2r13" charset="utf-8"></script>       
</body>
</html>
