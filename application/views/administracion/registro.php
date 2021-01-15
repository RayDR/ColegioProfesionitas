<div class="container">
	<form id="modal-form-registro">
		<div class="form-row pb-3 mb-3">
			<legend class="col-12">Indique el tipo de registro</legend>
			<div class="form-check form-check-inline my-auto">
				<input class="form-check-input" type="radio" name="tipo_registro" id="asociacion" value="option1">
				<label class="form-check-label lead" for="asociacion">Asociación</label>
			</div>
			<div class="form-check form-check-inline my-auto">
				<input class="form-check-input" type="radio" name="tipo_registro" id="colegio" value="option1">
				<label class="form-check-label lead" for="colegio">Colegio</label>
			</div>
		</div>
		<div class="form-row">
			<legend class="col-12">Datos del representante</legend>
			<div class="form-group col-lg-4">
				<label for="form-registro-nombre">Nombre(s)</label>
				<input type="text" class="form-control" id="form-registro-nombre" name="nombre">
			</div>
			<div class="form-group col-lg-4">
				<label for="form-registro-papellido">Primer apellido</label>
				<input type="text" class="form-control" id="form-registro-papellido" name="primer_apellido">
			</div>
			<div class="form-group col-lg-4">
				<label for="form-registro-sapellido">Segundo apellido <span class="text-muted">(Opcional)</span></label>
				<input type="text" class="form-control" id="form-registro-sapellido" name="segundo_apellido">
			</div>
		</div>
		<div class="form-row">
			<legend class="col-12">Datos del colegio ó asociación</legend>
			<div class="form-group col-lg-4">
				<label for="form-registro-rfc">RFC</label>
				<input type="text" class="form-control" id="form-registro-rfc" name="rfc">
			</div>
			<div class="form-group col-lg-8">
				<label for="form-registro-colegio">Nombre del colegio ó asociación</label>
				<input type="text" class="form-control" id="form-registro-colegio" name="colegio">
			</div>
			<div class="form-group col-lg-4">
				<label for="form-registro-municipio">Municipio</label>
				<select id="form-registro-municipio" name="municipio" class="custom-select">
					<option selected disabled>Seleccione una opción</option>
					<?php foreach ($municipios as $key => $municipio): ?>
						<option value="<?= $municipio->municipio_id ?>" data-estado="<?= $municipio->estado_id ?>"><?= $municipio->nombre_municipio ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-lg-8">
				<label for="form-registro-colonia">Colonia</label>
				<select id="form-registro-colonia" name="colonia" class="custom-select">
					<option selected disabled>Seleccione primero un municipio</option>
				</select>
			</div>
			<div class="form-group col-lg-10">
				<label for="form-registro-calle">Calle</label>
				<input type="text" class="form-control" id="form-registro-calle" name="calle">
			</div>
			<div class="form-group col-lg-2">
				<label for="form-registro-numero">Número</label>
				<input type="text" class="form-control" id="form-registro-numero" name="numero">
			</div>
		</div>
		<div class="form-row">
			<legend class="col-12">Datos de contacto</legend>
			<div class="form-group col-lg-6">
				<label for="form-registro-email">Correo electrónico</label>
				<input type="text" class="form-control" id="form-registro-email" name="correo_electronico">
			</div>
			<div class="form-group col-lg-6">
				<label for="form-registro-telefono">Número telefónico <span class="text-muted">(Opcional)</span></label>
				<input type="text" class="form-control futil_solo_numeros" id="form-registro-telefono" name="telefono">
			</div>
		</div>

		<?php $this->load->view('template/utiles/alertas'); ?>
	</form>
</div>