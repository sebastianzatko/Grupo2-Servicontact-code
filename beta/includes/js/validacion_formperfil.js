function validar(){
	
	jQuery.validator.setDefaults({
		debug:true,
		succes:"valid",
		errorElement:"span",
		validClass:"label label-success",
		errorClass:"label label-danger",
		highlight:function(element,errorClass,validClass){
			
			
		},
		unhighlight:function(element,errorClass,validClass){
			
			
		}
		
	});
	var validator = $("#formg").validate({
        rules: {
            nombre: {required: true, lettersonly: true, minlength: 3, maxlength: 45},
			apellido: {required: true, lettersonly: true, minlength: 3, maxlength: 45},
            email: {required: true, email: true, maxlength: 120, minlength: 7},
            contrasena: {minlength: 8, maxlength: 80, required: true},
            telefono: {required: true, number: true, minlength: 8, maxlength: 11},
            provincia: {required: true},
            ciudad: {required: true},
            direccion: {required: true, minlength: 5, maxlength: 80},
        },
        messages: {
            nombre: {required: "Completa el nombre.", maxlength: "Ingresa como máximo {0} caracteres",  lettersonly: "Solo se admiten letras."},
            apellido: {required: "Completa el apellido.", maxlength: "Ingresa como máximo {0} caracteres", lettersonly: "Solo se admiten letras."},
            email: {required: "Completa el mail.", maxlength: "Ingresa como máximo {0} caracteres", email: "Ingresa un email válido"},
            contrasena: {required: "Ingresa una contraseña", maxlength: "Ingresa como máximo {0} caracteres", minlenght: "Ingresa una contraseña mas larga."},
            telefono: {required: "Completa el teléfono.", maxlength: "Ingresa como máximo {0} caracteres", minlength: "Ingresa {0} caracteres como mínimo", number: "Solo se admiten numeros."},
            provincia: "Selecciona una provincia",
            cuidad: "Selecciona una localidad",
            direccion: {required: "Completa la dirección.", minlenght: "Completa la dirección.", maxlength: "Ingresa como máximo {0} caracteres"},
        }
    });	
    return validator.form();
}
