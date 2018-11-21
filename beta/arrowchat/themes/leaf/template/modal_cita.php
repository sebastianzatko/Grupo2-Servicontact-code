<!-- MODAL CITAS -->
<div class="modal" id="formcita" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear cita</h4>
        </div>
        <div class="modal-body">
          <form action="#" type="post">
          	<div class="form-group">
            	<label for="servicios">Servicios a contratar:</label>
            	<select multiple class="form-control" id="servicios">
  					<option>Albañil</option>
 					<option>Cerrajero</option>
 					<option>Plomero</option>
  					<option>Electricista</option>
  					<option>Carpintero</option>
				</select>
            </div>
          	<div class="form-group">
                <label for="servicios">Ingrese fecha:</label>
            	<input type="date" class="form-control" id="fecha">
            </div>
          	<div class="form-group">
            	<label for="servicios">Ingrese hora:</label>
            	<input type="time" class="form-control" id="hora">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
<!-- FIN DE MODAL-->