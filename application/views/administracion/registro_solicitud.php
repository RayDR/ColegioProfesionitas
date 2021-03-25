<div class="container">
	<!--- formulario de asociacion ----->
	<?php $datos = ( $datos )? $datos[0] : []; ?>
	<div class="shadow-xl p-3">
		<form id="modal-form-registro-asc" class="collapse show shadow bg-light rounded-top col-12">
			<div class="form-row p-4">
				<div class="col-12 my-3" id="ascociacion-errores">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>
				<div class="form-group col-lg-8">
					<label for="colegio">Nombre de la Asociación</label>
					<input required type="text" class="form-control" id="colegio" name="colegio" data-nombre="Colegio">
				</div>
				<div class="form-group col-lg-4">
					<label for="rfc">RFC de la Asociación</label>
					<input required type="text" class="form-control validar-rfc" id="rfc" name="rfc" data-nombre="RFC" required value="<?= $datos->rfc ?>">
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
				<div class="form-group col-lg-6">
					<label for="calle">Calle</label>
					<input required type="text" class="form-control" id="calle" name="calle" data-nombre="Calle" value="<?= $datos->calle ?>">
				</div>
				<div class="form-group col-lg-2">
					<label for="numero">Número</label>
					<input required type="text" class="form-control" id="numero" name="numero" data-nombre="Número" value="<?= $datos->numero ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="fecha_constitucion">Fecha de constitución </label>
					<input required type="date" class="form-control" id="fecha_constitucion" name="fecha_constitucion" data-nombre="Fecha de constitución">
				</div>
			</div>
		</form>
	</div>
	<!--- formulario de colegio ----->
	<div class="row mt-2 px-0">
		<button class="btn btn-lg btn-block btn-dark boton-rojo" type="button" data-toggle="collapse"
				data-target="#modal-form-registro-cole" aria-expanded="false" aria-controls="collapseExample">
			Información del Colegio de Profesionistas
		</button>
		<form id="modal-form-registro-cole" class="collapse show shadow bg-light rounded col-12">
			<div class="form-row p-4">
				<div class="col-12 my-3" id="cole-errores">
					<?PHP $this->load->view('template/utiles/alertas'); ?>
				</div>

				<legend class="col-12">Datos del representante</legend>
				<div class="form-group col-lg-4">
					<label for="nombre">Nombre(s)</label>
					<input required type="text" class="form-control" id="nombre" name="nombre" data-nombre="Nombre" value="<?= $datos->solicitante_nombre ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="primer_apellido">Primer apellido</label>
					<input required type="text" class="form-control" id="primer_apellido" name="primer_apellido" data-nombre="Primer apellido" value="<?= $datos->solicitante_primer_apellido ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="segundo_apellido">Segundo apellido </label>
					<input required type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" data-nombre="Segundo apellido" value="<?= $datos->solicitante_segundo_apellido ?>">
				</div>
				<div class="form-group col-lg-6">
					<label for="rfc">RFC</label>
					<input required type="text" class="form-control validar-rfc" id="rfc_col" name="rfc_col" data-nombre="RFC"  value="<?= $datos->rfc ?>">
				</div>
				<div class="form-group col-lg-6">
					<label for="curp">CURP</label>
					<input required type="text" class="form-control valdar-curp" id="curp" name="curp" data-nombre="CURP">
				</div>
				<legend class="col-12">Datos generales</legend>
				<div class="form-group col-lg-8">
					<label for="colegio">Nombre del colegio </label>
					<input required type="text" class="form-control" id="colegio" name="colegio"
						   data-nombre="Nombre del colegio"  value="<?= $datos->nombre_asociacion ?>">
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
					<input required type="text" class="form-control" id="calle_col" name="calle_col" data-nombre="Calle" value="<?= $datos->calle ?>">
				</div>
				<div class="form-group col-lg-2">
					<label for="numero">Número</label>
					<input required type="text" class="form-control util_snumeros" id="numero_col" name="numero_col" data-nombre="Número" value="<?= $datos->numero ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="mapa">Mapa</label>
					<input required type="text" class="form-control" id="mapa" name="mapa" data-nombre="Mapa">
				</div>
				<div class="form-group col-lg-4">
					<label for="fecha_constitucion">Fecha de constitución del Colegio </label>
					<input required type="date" class="form-control" id="fecha_constitucion_col" name="fecha_constitucion_col" data-nombre="Fecha constitución">
				</div>
				<div class="form-group col-lg-4">
					<label for="periodo-mesa-directiva">Periodo mesa directiva</label>
					<input required type="date" class="form-control" id="periodo-mesa-directiva"
						   name="periodo-mesa-directiva" data-nombre="Periodo mesa directiva">
				</div>
			</div>
			<div class="form-row px-4 py-2">
				<legend class="col-12">Datos de contacto</legend>
				<div class="form-group col-lg-4">
					<label for="email">Correo electrónico</label>
					<input required type="text" class="form-control" id="email" name="email" data-nombre="Correo electrónico" value="<?= $datos->solicitante_email ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="telefono">Número telefónico</label>
					<input required type="tel" class="form-control futil_solo_numeros" id="telefono" data-nombre="Número telefónico"
						   name="telefono" value="<?= $datos->solicitante_telefono ?>">
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
	
	<input type="button" id="enviar-registro" value="Registrar" class="mt-3 px-5 btn btn-lg btn-secondary boton-rojo boton-registro" data-solicitud="<?= $datos->solicitud_registro_id ?>">
</div>
<script type="application/javascript" src="<?= base_url('sources/js/administracion/registro.js') ?>?<?= date('dmYHis') ?>"></script>
