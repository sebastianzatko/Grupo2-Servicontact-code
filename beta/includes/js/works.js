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
            console.log('tamaño array: '+res.length);
            var estado;
            var fila;
            var clase;
        if (res.length>0){
            $('#infofinalizados').text('');
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
        else{
            $('#infofinalizados').text('No hay nada que mostrar');
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
        	var res1 = jQuery.parseJSON(response1);
            var accion1, accion2;
            var fila;
            console.log('tamaño lenght pendientes: '+res1.length);
            if (res1.length>0){
                $('#infopendientes').text('');
            for (var i = 0; i < res1.length; i++){
            	accion2 = '<button class="btn btn-danger btn-sm" onclick="cancelar('+res1[i][4]+')"><span class="glyphicon glyphicon-ban-circle"></span></button>';
            	accion1 = '<button class="btn btn-success btn-sm" onclick="finalizartrabajo('+res1[i][4]+')"><span class="glyphicon glyphicon-ok-circle"></span></button>';
            	fila = '<tr><td>'+res1[i][0]+'</td><td class="hidden-sm hidden-xs">Fecha: '+res1[i][1]+'\nHora: '+res1[i][2]+'</td><td>'+res1[i][3]+'</td><td>'+accion1+accion2+'</td></tr>';
            	$('#bodypendientes').append(fila);
        	}
        	}
        	else{
        		$('#infopendientes').text('No hay nada que mostrar');
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

function cancelar(id){
	$.ajax({
        url: "https://beta.changero.online/includes/php/works.php",
        type: "post",
        data: {cancelar:id} ,
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
