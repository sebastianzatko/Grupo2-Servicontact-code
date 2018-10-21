<?php 
    session_start();
    if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])):
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8"/>
	
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="includes/css/tabla.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="includes/css/sidebarNavigation.css">
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="includes/css/switchery.css">
  <link rel="stylesheet" type="text/css" href="includes/css/checkbox.css">
	<link href="includes/css/buscar.css" rel="stylesheet">

  <script src="includes/js/jquery.js"></script>
  <script src="includes/js/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/bootstrap.js"></script>
  <script src="includes/js/sidebarNavigation.js"></script>
  <script type="text/javascript" src="includes/js/switchery.js"></script>
  
 
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
		
		echo $htmlmenu2;
		
	?>

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