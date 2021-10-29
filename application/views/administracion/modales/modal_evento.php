<div class="col-12">
    <form id="modal-form-evento" class="form-row">
        <div class="col-4 my-1" id="evento-errores">
            <?PHP $this->load->view('template/utiles/alertas'); ?>
        </div>
        <?php if( $this->session->userdata('tuser') < 4): ?>
        <div class="form-group col-12">
            <label for="colegio">Colegio</label>
            <select requiered id="colegio_id" name="colegio_id" data-nombre="Colegios" class="custom-select"
                    data-objetivo="#fregistro-asociado #colegio">
                <option selected disabled>Seleccione una opción</option>
                <?php foreach ($colegios as $key => $colegio): ?>
                    <option value="<?= $colegio->colegio_id ?>"><?= $colegio->nombre_colegio ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif ?>
        <!-- <input required type="hidden" class="form-control" id="id_evento" name="id_evento" data-nombre="Id de evento"> -->
        <div class="form-group col-12">
            <label for="evento">Nombre del evento</label>
            <input required type="text" class="form-control" id="nombre_evento" name="nombre_evento" data-nombre="Nombre de evento">
        </div>
        <div class="form-group col-lg-6">
            <label for="fecha_inicio">Fecha inicio</label>
            <input required type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" data-nombre="Fecha inicio">
        </div>
        <div class="form-group col-lg-6">
            <label for="fecha_termino">Fecha conclusión</label>
            <input required type="datetime-local" class="form-control" id="fecha_termino" name="fecha_termino" data-nombre="Fecha conclusion">
        </div>
    </form>
    <input type="button" id="enviar-evento" value="Registrar" class="mt-3 px-5 btn btn-secondary boton-rojo boton-evento" data-evento="">
</div>