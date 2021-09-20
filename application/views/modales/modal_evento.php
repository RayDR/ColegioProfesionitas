<div class="col-12">
    <form id="modal-form-evento">
        <div class="col-4 my-1" id="evento-errores">
            <?PHP $this->load->view('template/utiles/alertas'); ?>
        </div>
        <div class="form-group col-lg-4">
            <label for="evento">Nombre del evento</label>
            <input required type="text" class="form-control" id="nombre_evento" name="nombre_evento" data-nombre="Nombre de evento">
        </div>
        <div class="form-group col-lg-4">
            <label for="fecha_inicio">Fecha inicio</label>
            <input required type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" data-nombre="Fecha inicio">
        </div>
        <div class="form-group col-lg-4">
            <label for="fecha_termino">Fecha conclusión</label>
            <input required type="date" class="form-control" id="fecha_termino" name="fecha_termino" data-nombre="Fecha conclusion">
        </div>
    </form>
    <input type="button" id="enviar-evento" value="Registrar" class="mt-3 px-5 btn btn-secondary boton-rojo boton-evento" data-evento="">
</div>