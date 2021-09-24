<div class="container">
	<!--- formulario de registrar asociado ----->
	<div class="row shadow-lg bg-white mb-3">
		<form id="fregistro-asociado" class="col-12">
			<div class="form-row p-4">
			<legend class="texto-rojo">Registrar Asociado</legend>
				<div class="col-12 my-1" id="errores-form">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>
				<div class="form-group col-lg-12">
					<label for="colegio">Colegio</label>
					<select requiered id="colegio_id" name="colegio_id" data-nombre="Colegios" class="custom-select"
							data-objetivo="#fregistro-asociado #colegio">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($colegios as $key => $colegio): ?>
							<option value="<?= $colegio->colegio_id ?>"><?= $colegio->nombre_colegio ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-4">
					<label for="nombre">Nombre(s)</label>
					<input required type="text" class="form-control" id="nombre" name="nombre" data-nombre="Nombre">
				</div>
				<div class="form-group col-lg-4">
					<label for="primer_apellido">Primer apellido</label>
					<input required type="text" class="form-control" id="primer_apellido" name="primer_apellido" data-nombre="Primer apellido">
				</div>
				<div class="form-group col-lg-4">
					<label for="segundo_apellido">Segundo apellido </label>
					<input required type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" data-nombre="Segundo apellido">
				</div>
				<div class="form-group col-lg-4">
					<label for="numero_asociado">Numero de asociado</label>
					<input required type="text" class="form-control" id="num_asociado" name="num_asociado" data-nombre="Numero de asociado" >
				</div>
				<div class="form-group col-lg-4">
					<label for="curp">Curp</label>
					<input required type="text" class="form-control valdar-curp" id="curp" name="curp" data-nombre="CURP">
				</div>
				<div class="form-group col-lg-4">
					<label for="fecha_sercp">Fecha de alta</label>
					<input type="date" class="form-control" id="fecha_sercp" name="fecha_sercp" data-nombre="Fecha de Alta">
				</div>
			<legend class="texto-rojo">Antecedentes academicos</legend>
				<div class="form-group col-lg-6">
					<label for="nivel_educativo">Nivel educativo</label>
					<select requiered id="nivel_educativo" name="nivel_educativo" data-nombre="Nivel educativo" class="custom-select"
							data-objetivo="#fregistro-asociado #nivel_educativo">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($niveles_educativos as $key => $nivel_educativo): ?>
							<option value="<?= $nivel_educativo->nivel_educativo_id ?>"><?= $nivel_educativo->descripcion ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="institucion">Institucion</label>
					<select requiered id="institucion" name="institucion" data-nombre="Institucion" class="custom-select"
							data-objetivo="#fregistro-asociado #institucion">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($instituciones as $key => $institucion): ?>
                            <option value="<?= $institucion->institucion_id ?>"> <?= $institucion->nombre ?></option>
                        <?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="carrera">Carrera</label>
					<select requiered id="carrera" name="carrera" data-nombre="Carrera" class="custom-select"
							data-objetivo="#fregistro-asociado #carrera">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($carreras as $key => $carrera): ?>
                            <option value="<?= $carrera->carrera_id ?>"> <?= $carrera->nombre ?></option>
                        <?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="numero_cedula">Numero de cedula</label>
					<input type="text" class="form-control" id="numero_cedula" data-nombre="Numero de cedula" name="numero_cedula">
				</div>
			<legend class="texto-rojo">Informacion de contacto</legend>
				<div class="form-group col-lg-6">
					<label for="telefono">Número telefónico</label>
					<input required type="tel" class="form-control futil_solo_numeros" id="telefono" data-nombre="Número telefónico"
						   name="telefono">
				</div>
				<div class="form-group col-lg-6">
					<label for="email">Correo electrónico</label>
					<input required type="text" class="form-control" id="email" name="email" data-nombre="Correo electrónico">
				</div>
			</div>
		</form>
	</div>
	<div class="row mx-auto">
		<div class="col-md-10 col-lg-6 mx-auto">
	<input type="button" id="registrar-asociado" value="Registrar" class="mt-3 px-5 btn btn-lg btn-block btn-secondary boton-rojo">
        </div>
	</div>
</div>

<script type="application/javascript" src="<?= base_url('sources/js/administracion/perfil.js') ?>?<?= date('dmYHis') ?>"></script>
