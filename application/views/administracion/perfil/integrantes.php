<div class="container">
	<div class="shadow-lg bg-white p-5">
		<div class="table-responsive-md">
			<table id="t_asociados" class="table table-hover text-center">
				<thead>
					<tr>
						<th>Nombres Completo</th>
						<th>CURP</th>
						<th>Fecha Afiliación</th>
						<th>Nivel Educativo</th>
						<th>Institución</th>
						<th>Carrera</th>
						<th>Número de Cédula</th>
						<th>Telefono</th>
						<th>Correo Electrónico</th>
						<th>Horas de Servicio</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($asociados_list as $key => $asociado) : ?>
						<tr>
							<td><?= $asociado->nombres ?> <?= $asociado->primer_apellido ?> <?= $asociado->segundo_apellido ?></td>
							<td><?= $asociado->curp ?></td>
							<td><?= $asociado->fecha_sercp ?></td>
							<td><?= $asociado->nivel_educativo ?></td>
							<td><?= $asociado->institucion ?></td>
							<td><?= $asociado->carrera ?></td>
							<td><?= $asociado->numero_cedula ?></td>
							<td><?= $asociado->telefono ?></td>
							<td><?= $asociado->email ?></td>
							<td><?= $asociado->horas_servicio_social ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="shadow-lg bg-white p-5">
		<form id="modal-form-registro-asc" class="collapse show shadow bg-light rounded col-12">
			<legend>Registrar nuevo asociado</legend>
			<div class="form-row p-4">
				<div class="col-12 my-3" id="errores-form">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>
				<div class="form-group col-lg-4">
					<label for="nombre">Nombre(s)</label>
					<input type="text" class="form-control" id="nombre" name="nombre" data-nombre="Nombre">
				</div>
				<div class="form-group col-lg-4">
					<label for="primer_apellido">Primer apellido</label>
					<input type="text" class="form-control" id="primer_apellido" name="primer_apellido" data-nombre="Primer apellido">
				</div>
				<div class="form-group col-lg-4">
					<label for="segundo_apellido">Segundo apellido </label>
					<input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" data-nombre="Segundo apellido">
				</div>
				<div class="form-group col-lg-4">
					<label for="segundo_apellido">CURP </label>
					<input type="text" class="form-control" id="curp" name="curp" data-nombre="CURP">
				</div>
				<div class="form-group col-lg-3">
					<label for="fecha_constitucion">Fecha Afiliación</label>
					<input type="date" class="form-control" id="fecha_sercp" name="fecha_sercp" data-nombre="Fecha constitucion">
				</div>
				<div class="form-group col-lg-3">
					<label for="nivel_educativo">Nivel educactivo</label>
					<select id="nivel_educativo" name="nivel_educativo" class="custom-select" data-nombre="Nivel educactivo">
						<option selected disabled>Seleccione el nivel educactivo</option>
						<?php foreach ($niveles as $key => $nivel) : ?>
							<option value="<?= $nivel->nivel_educativo_id ?>"><?= $nivel->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="institucion">Institución</label>
					<select id="institucion" name="institucion" class="custom-select" data-nombre="Institución">
						<option selected disabled>Seleccione la instutición</option>
						<?php foreach ($instituciones as $key => $institucion) : ?>
							<option value="<?= $institucion->institucion_id ?>"><?= $institucion->nombre ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="carrera">Carrera</label>
					<select id="carrera" name="carrera" class="custom-select" data-nombre="Carrera">
						<option selected disabled>Seleccione la instutición</option>
						<?php foreach ($carreras as $key => $carrera) : ?>
							<option value="<?= $carrera->carrera_id ?>"><?= $carrera->nombre ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-lg-3">
					<label for="numero_cedula">Número de Cédula</label>
					<input type="text" class="form-control" id="numero_cedula" name="numero_cedula" data-nombre="Numero cedula">
				</div>
				<div class="form-group col-lg-3">
					<label for="telefono">Teléfono</label>
					<input type="text" class="form-control util_snumeros" id="telefono" name="telefono" data-nombre="Telefono">
				</div>
				<div class="form-group col-lg-4">
					<label for="email">Correo Electrónico</label>
					<input type="text" class="form-control" id="email" name="email" data-nombre="Correo electronico">
				</div>
				<div class="form-group col-lg-2">
					<label for="horas_servicio_social">Horas de Servicio</label>
					<input type="number" min="0" value="0" readonly class="form-control util_snumeros" id="horas_servicio_social" name="horas_servicio_social" data-nombre="Horas Servicio">
				</div>

				<div class="form-group col-lg-12">
					<input type="submit" id="regsitrar-asociado" value="Registrar" class="mt-3 btn btn-secondary boton-rojo">
				</div>
			</div>
		</form>
	</div>
</div>