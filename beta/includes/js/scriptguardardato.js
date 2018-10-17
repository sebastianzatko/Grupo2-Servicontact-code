
//		<!-- Para las provincias y ciudades, es una mountrocidad lose, si alguien lo quiere cambiar es bienvenido-->

$( document ).ready(function() {
	$.getJSON('ciudades-argentinas.json',function(result){
		$.each(result,function(i,provincia){
			var opcion="<option value='"+provincia.nombre+"' data-id='"+provincia.id+"'>"+provincia.nombre+"</option>";
			$("#provincia").append(opcion);
		})
		
		var selecionado=$("#provincia").find('option:first').data('id');
		console.log(selecionado);

		$.getJSON('ciudades-argentinas.json',function(result){
			$.each(result,function(ciudad,nombreciudad){
				if(selecionado==nombreciudad.id){
					$.each(nombreciudad.ciudades,function(i,city){
						var opcion="<option value='"+city.nombre+"'>"+city.nombre+"</option>";
						$("#ciudad").append(opcion);
					})
				}
			})
		})
	})		
});

$("#provincia").change(function(){
	$('#ciudad').attr('disabled', false)
	var idprovincia=$(this).find(":selected").data('id');
	$("#ciudad option").each(function() {
		$(this).remove();
	});
	$.getJSON('ciudades-argentinas.json',function(result){
		$.each(result,function(ciudad,nombreciudad){
			if(idprovincia==nombreciudad.id){
				$.each(nombreciudad.ciudades,function(i,city){
					var opcion="<option value='"+city.nombre+"'>"+city.nombre+"</option>";
					$("#ciudad").append(opcion);
				})
			}
		})
	})
});

		//<!-- Para el placeholder de la imagen-->
$(document).ready(function(){
	function archivo(evt) {
	var files = evt.target.files; // FileList object
	// Obtenemos la imagen del campo "file".
	for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}
		var reader = new FileReader();
		reader.onload = (function(theFile) {
			return function(e) {
	// Insertamos la imagen
	document.getElementById("list").innerHTML = ['<img class="thumb img-circle thumbnailmascota" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
	console.log('dentro0');
};
})(f);
reader.readAsDataURL(f);
}
}

document.getElementById('fil').addEventListener('change', archivo, false)

});


$("#formguardard").submit(function(){
	event.preventDefault();
	console.log(validar());
	if(validar()){
		var formData = new FormData($(this)[0]);

		$.ajax({
			data:formData,
			url:this.action,
			type:this.method,
			processData: false,
			contentType: false,
			success: function (data) {
				if(data=="Se ha registrado exitosamente"){
					$('#ventana').modal('show'); 
					$.notify(data, "success");
				}else{
					$.notify(data, "error",{
						autoHide: false,
						clickToHide: true});
					console.log(data);
				}
			}
		})
	}
});
