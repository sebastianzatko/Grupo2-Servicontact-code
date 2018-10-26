var latlong="";

function getIP(json) {
	latlong="-34.8184,-58.4563";
	
}




function validar(){
	
	jQuery.validator.setDefaults({
		debug:true,
		succes:"valid",
		errorElement:"div",
		validClass:"valid-tooltip",
		errorClass:"invalid-tooltip",
		highlight:function(element,errorClass,validClass){
			
			
		},
		unhighlight:function(element,errorClass,validClass){
			
			
		}
		
	});
	var validator = $("#formingresar").validate({
        rules: {
            login: {required: true, email: true, maxlength: 120, minlength: 10},
            contra: {maxlength: 80, required: true,pattern:'.{8,80}'},
        },
        messages: {
            login: {required: "Completa el mail.", maxlength: "Ingresa como máximo {0} caracteres", email: "Ingresa un email válido"},
            contra: {required: "Ingresa la contraseña contraseña de la cuenta", maxlength: "Ingresa como máximo {0} caracteres"},
        }
    });	
    return validator.form();
}

$(document).ready(function(){
     $("#formingresar").submit(function(event){
		event.preventDefault();
		if(validar()){
			
			var formData = new FormData($(this)[0]);
			console.log($("#email").val());
			console.log($("#contraseña").val());
			console.log(latlong);
			
			$.ajax({
				data:{ login : $("#email").val(),contra : $("#contraseña").val(),localizacion : latlong},
				url:"includes/php/login.php",
				type:this.method,
				
				success: function (data) {
					if(data=="Ha ingresado correctamente"){
						window.location.href = 'index.php';
					}else{
					    $.notify(data, "error");
					    console.log(data);
					}
				}
			})
			
		}
	});
})


