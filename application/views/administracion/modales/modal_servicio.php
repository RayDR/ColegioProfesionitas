<div class="col-12">
	<form id="modal-form-servicio" class="form-row">
        <div class="col-12 my-1" id="servicio-errores">
            <?PHP $this->load->view('template/utiles/alertas'); ?>
        </div>
    <input type="hidden" id="colegio_id" name="colegio_id"  data-nombre='colegio_id'value="<?= $datos['colegio_id']?>">
    <input type="hidden" id="evento_id" name="evento_id" data-nombre='evento_id' value="<?= $datos['evento_id']?>">
    <input type="hidden" id="horas" name="horas" data-nombre='horas' value="<?= $fecha ?>">    
            <div class="form-group col-6">
                <label><strong>Fecha de inicio:</strong> </label>
                <p class="text-justify"><?= $datos['fecha_desde'] ?></p>
            </div>
            <div class="form-group col-6">
                <label><strong>Fecha conclusión:</strong> </label>
                <p class="text-justify"><?= $datos['fecha_hasta'] ?></p>
            </div>
            <div class="form-group col-12">
                <label><strong>Duración del evento:</strong></label>
                <p class="text-justify"><?= $fecha . ' hora(s)' ?></p>
            </div>
            <div class="form-group col-4">
                <label><strong>Horas de servicio:</strong></label>
                <input required class="form-control" type="number" id="horas_servicio" name="horas_servicio" data-nombre="horas_servicio">
            </div>
            <div class="form-group col-12">
                <label><strong>Asignar asociados:</strong> </label><br>
                <select class="select-asociado" id="list-asoc" name="asociados[]" data-nombre="asociados[]" multiple="multiple" required>
                    <option selected disabled value="">Elige asociado</option>
                </select> 
            </div>
            <!-- Formulario de busqueda -->    
	</form>  
    <input type="button" id="enviar-asociado" value="Guardar" class="mt-3 px-5 btn btn-secondary boton-rojo boton-asociado" data-asociado="">
</div>
<script>
$(document).ready(function() {
    fn_select_asoc();
 }); 
</script>