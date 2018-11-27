$(document).ready(function(){
    var d = new Date();
    var day = d.getDate();
    if (d.getHours() == 24){
        var next = new Date(new Date(datestring).valueOf() + 1*24*60*60*1000);
        day = next;
    }
    var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + day;
    $("#fecha").attr({"min" : strDate});
    $(document).on('change', "#fecha", function() {
        if ($( "#fecha" ).val() == strDate){
            var n = d.getHours();
            n = n + 2;
            $("#hora").attr({"max" : "24:00", "min":n+":00"});
        }
    });
    
    //programar la cita
    $(document).on('click', "#submitform", function() {
        var selectedValues = $('#servicios').val();
        var fecha = $('#fecha').val();
        var hora = $('#hora').val();
        var profesional = $("#prof").val();
        $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:3,profesional:profesional,fecha:fecha,hora:hora,servicios:selectedValues} ,
        success: function (response) {
            console.log(response);
        }
    });
    });
});

//solicitar cita en chat web
function sol_cita(cliente){
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:1,cliente:cliente} ,
        success: function (response) {
            console.log(response);
        }
    });
}

//cargar formulario de citas web
function cargarform(profesional){
    $("#citah3").text("");
    $('select').children('option').remove();
    $("#prof").val(profesional);
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:8,profesional:profesional} ,
        success: function (response) {
            var servicios = jQuery.parseJSON(response);
            console.log(servicios);
            if (servicios!==false){
                $('#formulariocita').children().show();
                $('#submitform').show();
            for (var i = 0; i < servicios.length; i++){
                $('#servicios').append($('<option>', {value:servicios[i][3], text:servicios[i][3]}));
                }
            }
            else{
                $('#formulariocita').children().hide();
                $('#submitform').hide();
                $("#citah3").text("Este usuario no brinda servicios :(").show();
            }
        }
    });
}


function aceptarcita(cita,notificacion){
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:4,cita:cita,idnot:notificacion} ,
        success: function (response) {
            console.log(response);
        }
    });
}
//rechazar solicitud de cita del profesional
function rechazarcita(cita,notificacion){
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:5,cita:cita,idnot:notificacion} ,
        success: function (response) {
            console.log(response);
        }
    });
}

//rechazar cita del cliente
function cancelar(profesional,notificacion){
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:2,idprof:profesional,idnot:notificacion} ,
        success: function (response) {
            console.log(response);
        }
    });

}

//cargar formulario de citas en móvil
function m_cargarform(){
    var profesional = getid();
    $("#citah3").text("");
    $('select').children('option').remove();
    $("#prof").val(profesional);
    $.ajax({
        url: "https://beta.changero.online/includes/php/sistemacitas.php",
        type: "post",
        data: {tipo:8,profesional:profesional} ,
        success: function (response) {
            var servicios = jQuery.parseJSON(response);
            if (servicios!==false){
                $('#formulariocita').children().show();
                $('#submitform').show();
            for (var i = 0; i < servicios.length; i++){
                $('#servicios').append($('<option>', {value:servicios[i][1], text:servicios[i][3]}));
                }
            }
            else{
                $('#formulariocita').children().hide();
                $('#submitform').hide();
                $("#citah3").text("Este usuario no brinda servicios \n:(").show();
            }
        }
    });
}

//enviar solicitud de cita en movil
function m_sol_cita(){
    var cliente = getid();
    $.ajax({
    url: "https://beta.changero.online/includes/php/sistemacitas.php",
    type: "post",
    data: {tipo:1,cliente:cliente} ,
    success: function (response) {
            console.log(response);
        }
    });
    
}

function getid(){
    var getdata = document.getElementsByClassName('chat_user_content');
    getdata = getdata[0].getAttribute('id');
    var id = getdata.split('_');
    id = id[2];
    return id;
}

function finalizado(id){
	
	}

function nofinalizado(id){
    $.ajax({
    url: "https://beta.changero.online/includes/php/sistemacitas.php",
    type: "post",
    data: {tipo:'nofinalizado',cita:id} ,
    success: function (response) {
            console.log(response);
        }
    });
}
