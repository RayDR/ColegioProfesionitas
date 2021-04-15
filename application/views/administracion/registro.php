<div class="container">
	<!--- formulario de asociacion ----->
	<div class="row shadow-lg">
		<form id="modal-form-registro-asc" class="col-12">
			<div class="form-row p-4">
				<legend class="texto-rojo">Información de la Asociación</legend>
				<div class="col-12 my-1" id="ascociacion-errores">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>
				<div class="form-group col-lg-8">
					<label for="colegio">Nombre de la Asociación</label>
					<input required type="text" class="form-control" id="colegio" name="colegio" data-nombre="Colegio">
				</div>
				<div class="form-group col-lg-4">
					<label for="rfc">RFC de la Asociación</label>
					<input type="text" class="form-control validar-rfc" id="rfc" name="rfc" data-nombre="RFC">
				</div>
				<div class="form-group col-lg-6">
					<label for="municipio">Municipio</label>
					<select requiered id="municipio" name="municipio" data-nombre="Municipio" class="custom-select cargar_cps"
							data-objetivo="#modal-form-registro-asc #codigo_postal">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($municipios as $key => $municipio): ?>
							<option value="<?= $municipio->municipio_id ?>"
									data-estado="<?= $municipio->estado_id ?>"><?= $municipio->nombre_municipio ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="codigo_postal">Colonia</label>
					<select requiered id="codigo_postal" name="codigo_postal" data-nombre="Código Postal"
							class="custom-select">
						<option selected disabled>Seleccione primero un municipio</option>
					</select>
				</div>
				<div class="form-group col-lg-8">
					<label for="calle">Calle</label>
					<input required type="text" class="form-control" id="calle" name="calle" data-nombre="Calle">
				</div>
				<div class="form-group col-lg-4">
					<label for="numero">Número</label>
					<input required type="text" class="form-control" id="numero" name="numero" data-nombre="Número">
				</div>
				<div class="form-group col-lg-6">
					<label for="fecha_constitucion">Fecha de constitución </label>
					<input type="date" class="form-control" id="fecha_constitucion" name="fecha_constitucion"
						   data-nombre="Fecha de constitución">
				</div>
				<div class="form-group col-lg-6">
					<label for="acta_notarida_ac">Acta Notariada (opcional)</label>
					<input type="text" class="form-control" id="acta_notarida_ac" name="acta_notarida_ac"
						   data-nombre="Acta Notariada">
				</div>
			</div>
		</form>
	</div>
	<!--- formulario de colegio ----->
	<div class="row shadow-lg">
		<form id="modal-form-registro-cole" class="col-12">
			<div class="form-row p-4">
				<legend class="texto-rojo">Información del Colegio</legend>
				<div class="col-12 my-1" id="cole-errores">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>

				<legend class="col-12">Datos del representante</legend>
				<div class="form-group col-lg-4">
					<label for="nombre">Nombre(s)</label>
					<input required type="text" class="form-control" id="nombre" name="nombre" data-nombre="Nombre">
				</div>
				<div class="form-group col-lg-4">
					<label for="primer_apellido">Primer apellido</label>
					<input required type="text" class="form-control" id="primer_apellido" name="primer_apellido"
						   data-nombre="Primer apellido">
				</div>
				<div class="form-group col-lg-4">
					<label for="segundo_apellido">Segundo apellido </label>
					<input required type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
						   data-nombre="Segundo apellido">
				</div>
				<div class="form-group col-lg-6">
					<label for="rfc">RFC</label>
					<input type="text" class="form-control validar-rfc" id="rfc_col" name="rfc_col" data-nombre="RFC">
				</div>
				<div class="form-group col-lg-6">
					<label for="curp">CURP</label>
					<input required type="text" class="form-control valdar-curp" id="curp" name="curp" data-nombre="CURP">
				</div>
				<legend class="col-12">Datos generales</legend>
				<div class="form-group col-lg-8">
					<label for="colegio">Nombre del colegio </label>
					<input required type="text" class="form-control" id="colegio" name="colegio"
						   data-nombre="Nombre del colegio">
				</div>
				<div class="form-group col-lg-6">
					<label for="municipio">Municipio</label>
					<select requiered id="municipio" name="municipio_col" class="custom-select cargar_cps"
							data-objetivo="#modal-form-registro-cole #codigo-postal" data-nombre="Municipio">
						<option selected disabled>Seleccione una opción</option>
						<?php foreach ($municipios as $key => $municipio): ?>
							<option value="<?= $municipio->municipio_id ?>"
									data-estado="<?= $municipio->estado_id ?>"><?= $municipio->nombre_municipio ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-lg-6">
					<label for="codigo-postal">Colonia</label>
					<select requiered id="codigo-postal" name="codigo_postal_col" class="custom-select"
							data-nombre="Código postal">
						<option selected disabled>Seleccione primero un municipio</option>
					</select>
				</div>
				<div class="form-group col-lg-10">
					<label for="calle">Calle</label>
					<input required type="text" class="form-control" id="calle_col" name="calle_col" data-nombre="Calle">
				</div>
				<div class="form-group col-lg-2">
					<label for="numero">Número</label>
					<input required type="text" class="form-control util_snumeros" id="numero_col" name="numero_col" data-nombre="Número">
				</div>
				<div class="form-group col-lg-4">
					<label for="mapa">Mapa</label>
					<input type="text" class="form-control" id="mapa" name="mapa" data-nombre="Mapa">
				</div>
				<div class="form-group col-lg-4">
					<label for="fecha_constitucion">Fecha de constitución del Colegio </label>
					<input required type="date" class="form-control" id="fecha_constitucion_col" name="fecha_constitucion_col" data-nombre="Fecha constitución">
				</div>
				<div class="form-group col-lg-4">
					<label for="periodo-mesa-directiva">Periodo mesa directiva</label>
					<input required type="number" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : '0'" class="form-control" id="periodo-mesa-directiva"  name="periodo-mesa-directiva" data-nombre="Periodo mesa directiva">
				</div>
				<div class="form-group col-lg-6">
					<label for="acta_notarida_cole">Acta Notariada (opcional)</label>
					<input type="text" class="form-control" id="acta_notarida_cole" name="acta_notarida_cole" data-nombre="Acta Notariada">
				</div>
				<div class="form-group col-lg-6">
					<label for="acta_secretaria_economia">Acta de Secretaría de Economía (opcional)</label>
					<input type="text" class="form-control" id="acta_secretaria_economia" name="acta_secretaria_economia"
						   data-nombre="Acta de Secretaría de Economía">
				</div>
			</div>
			<div class="form-row px-4 py-2">
				<legend class="col-12">Datos de contacto</legend>
				<div class="form-group col-lg-4">
					<label for="email">Correo electrónico</label>
					<input type="text" class="form-control" id="email" name="email" data-nombre="Correo electrónico">
				</div>
				<div class="form-group col-lg-4">
					<label for="telefono">Número telefónico</label>
					<input required type="tel" class="form-control futil_solo_numeros" id="telefono" data-nombre="Número telefónico"
						   name="telefono">
				</div>
				<div class="form-group col-lg-4">
					<label for="pagina-web">Pagina web<span
								class="text-muted">(Opcional)</span></label>
					<input type="text" class="form-control futil_solo_numeros" id="pagina-web"
						   name="pagina-web" data-nombre="Pagina web">
				</div>
			</div>

			<div class="form-row px-4 py-2">
				<legend class="col-lg-12">Redes sociales</legend>

				<div class="form-group col-md-9 col-lg-4">
					<label for="cuenta">Cuenta</label>
					<input required type="text" class="form-control" id="cuenta" name="cuenta" data-nombre="Cuenta">
				</div>
				<div class="form-group col-10 col-md-9 col-lg-4">
					<label for="red-social">Red social</label>
					<select requiered id="red-social" name="red-social" class="custom-select" data-nombre="Red social">
							<?php $this->load->view('ajax/redes_sociales', ['redes_sociales'=>$redes_sociales], FALSE);
							?>
					</select>
				</div>
				<div class="form-group col-2 col-md-3 col-lg-4 my-auto">
					<button class="btn btn-secondary boton-rojo d-none d-md-block add-red-social" type="button">
						<i class="fas fa-plus">&nbsp;</i>Agregar
					</button>
					<button class="btn btn-secondary boton-rojo d-block d-md-none add-red-social" type="button">
						<i class="fas fa-plus"></i>
					</button>
				</div>
				<div class="col-lg-9 table-responsive-sm mt-4 mt-md-0">
					<table id="t_redes_sociales" class="table table-hover text-center">
					</table>
				</div>
			</div>
			<?php $this->load->view('template/utiles/alertas'); ?>
		</form>
	</div>
	
	<input type="button" id="enviar-registro" value="Registrar" class="mt-3 px-5 btn btn-lg btn-secondary boton-rojo">
</div>
<script type="application/javascript" src="<?= base_url('sources/js/administracion/registro.js') ?>?<?= date('dmYHis') ?>"></script>
