$(document).ready(function(){
	getfinalizados();
	getpendientes();

});

function getfinalizados(){
	$.ajax({
        url: "https://beta.changero.online/includes/php/works.php",
        type: "post",
        data: {finalizados:"true"} ,
        success: function (response) {
        	var res = jQuery.parseJSON(response);
            console.log(res);
            var estado;
            var fila;
            var clase;
            for (var i = 0; i < res.length; i++){
            	if (res[i][4]==3){
            		estado = 'Pendiente *';
            		clase = ' class="warning"';
            	}
            	else{
            		estado = 'Terminado';
            		clase = '';
            	}
            	fila = '<tr'+clase+'><td>'+res[i][0]+'</td><td class="hidden-sm hidden-xs">Fecha: '+res[i][1]+'\nHora: '+res[i][2]+'</td><td>'+res[i][3]+'</td><td>'+estado+'</td></tr>';
            	$('#bodyfinalizados').append(fila);
            }
        }
    });
}
function getpendientes(){
	$.ajax({
        url: "https://beta.changero.online/includes/php/works.php",
        type: "post",
        data: {pendientes:"true"} ,
        success: function (response1) {
        	var res = jQuery.parseJSON(response1);
            var accion1, accion2;
            var fila;
            accion2 = '<button class="btn btn-danger btn-sm" onclick="cancelar()"><span class="glyphicon glyphicon-ban-circle"></span></button>';
            if (res.lenght!==0){
            for (var i = 0; i < res.length; i++){
            	accion1 = '<button class="btn btn-success btn-sm" onclick="finalizartrabajo('+res[i][4]+')"><span class="glyphicon glyphicon-ok-circle"></span></button>';
            	fila = '<tr><td>'+res[i][0]+'</td><td class="hidden-sm hidden-xs">Fecha: '+res[i][1]+'\nHora: '+res[i][2]+'</td><td>'+res[i][3]+'</td><td>'+accion1+accion2+'</td></tr>';
            	$('#bodypendientes').append(fila);
        	}
        	}
        	else{
        		$('#bodypendientes').append('No hay nada que mostrar');
        	}
        }
    });
}
function finalizartrabajo(id){
	$.ajax({
        url: "https://beta.changero.online/includes/php/works.php",
        type: "post",
        data: {trabajof:id} ,
        success: function (response2) {
        	var res2 = jQuery.parseJSON(response2);
            if (res2==true){
                $('#bodypendientes').empty();
                $('#bodyfinalizados').empty();
                getpendientes();
                getfinalizados();
            }
        }
    });
}

function cancelar(){
console.log('en desarrollo ;)');
}
