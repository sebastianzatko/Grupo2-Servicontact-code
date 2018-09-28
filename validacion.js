function validar(){
	var formulario
	formulario = document.formadd;
	

	if (formulario.txtnombre.value =="" || formulario.txtapellido.value =="" || formulario.txtdir.value =="" || formulario.txtmail.value =="" || formulario.txtcontra.value =="" || formulario.fil.value =="")
	{
		//alert(" cajas de texto vacias");
		document.getElementById("alerta").innerHTML='<div  class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times</a>Por Favor Completar todos los Campos</div>';
		return false;
		
	}
	
	else if( formulario.txtnombre.length == 20 || /^\s+$/.test(formulario.txtnombre.value) )
	{
  		document.getElementById("txtnombre").attr=(' class="form-group has-error"');
  		return false;
  	}
  	formulario.submit();
}
	



