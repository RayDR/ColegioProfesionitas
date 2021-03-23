<div id="landing_jumbo" class="row" style="min-height: 80vh;">
	<div class="col-12 my-auto mx-auto">
		<div class="row ">
			<div class="col-md-10 col-lg-8 mx-auto my-auto" >
				<div class="row rounded p-5" style="background-color: rgba(0,0,0,0.6);">
					<div class="col-12 mb-3">
						<h1 class="text-center text-white contenido-mostrar">Sistema Estatal de Registro de Colegios de Profesionistas</h1>
					</div>
					<div class="col-4 mx-auto counter-mostrar">
						<h3 class="text-center texto-dorado">Colegios registrados</h3>
						<div class="row">
							<div class="col d-flex justify-content-center">
								<h2 class="text-white">44</h2>
								<i class="fas fa-school h1 text-white ml-3"></i>
							</div>
						</div>
					</div>
					<div class="col-12 row">
						<div class="col-md-5 mt-3 mt-md-5 mx-auto text-center py-2 counter-mostrar">
							<button id="form-registro" class="btn btn-secondary btn-block boton-rojo">Registrarse</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view($template.'menu_landing');?>

<div class="container contenido-mostrar">
	<div id="descripcion" class="row my-4">
		<div class="col-12">
			<h3 class="display-4 font-weight-bolder text-center texto-dorado">¿Qué es el SERCP?</h3>
			<hr class="borde-grueso borde-dorado">
			<p class="lead text-center">Es un sistema que integra el registro de los Colegios de Profesionistas vigentes en el Estado de Tabasco, a quienes permite realizar trámites por medios electrónicos para el cumplimiento de los propósitos establecidos en la Ley Reglamentaria del Artículo 4° y 5° Constitucional, Relativa al Ejercicio de las Profesiones en el Estado de Tabasco.</p>
		</div>
	</div>

	<div id="objetivo" class="row">
		<div class="col-md-7 my-auto">
			<h3 class="display-4">
				<span class="font-weight-bolder text-muted">Objetivo</span>
			</h3>
			<p class="lead text-justify">Dar certidumbre a la sociedad tabasqueña, de las agrupaciones constituidas como Colegios de Profesionistas vigentes, cuyo propósito tienda al cumplimiento de sus estatutos y elevar los servicios profesionales en el Estado.</p>
		</div>
		<div class="col-md-5">
			<img class="img-fluid rounded" src="<?= base_url('sources/img/persona_leyendo.jpg') ?>">
		</div>
	</div>

	<!-- SEPARADOR --><hr class="borde-grueso borde-dorado my-5">

	<div id="marcolegal" class="row">
		<div class="col-md-5">
			<img class="img-fluid rounded" src="<?= base_url('sources/img/reunion.jpg') ?>">
		</div>

		<div class="col-md-7 my-auto">
			<h3 class="display-4">
				<span class="font-weight-bolder text-muted">Fundamento Legal</span>
			</h3>
			<ul>
				<li class="text-justify">
					<a href="https://tabasco.gob.mx/leyes/descargar/0/360" target="_blank">Ley Reglamentaria de los Artículo 4o y 5o de la Constitución Federal, relativa al Ejercicio de las Profesiones en el Estado de Tabasco.</a>
				</li>
				<li>
					<a href="https://congresotabasco.gob.mx/leyes/" target="_blank">Código Civil para el Estado de Tabasco</a>
				</li>
				<li>
					<a href="https://congresotabasco.gob.mx/leyes/" target="_blank">Ley de Ingreso del Estado de tabasco</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<script src="<?= base_url('sources/js/landing.js') ?>?<?= date('dmYHis') ?>"></script>