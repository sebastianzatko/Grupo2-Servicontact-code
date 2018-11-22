
var paginacion;
var 
$(document).ready(function(){
	setInterval(function(){ 
		$.ajax({
			data:{},
			url:"includes/php/obtenerpublicaciones.php",
			type:"POST",
			success: function (data) {
				
			}
		})
	
	}, 5000);
	
});