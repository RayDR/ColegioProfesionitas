<div id="landing_jumbo" class="row" style="min-height: 80vh;">
	<div class="col-12 my-auto mx-auto">
		<div class="row">
			<div class="col-md-10 col-lg-8 mx-auto my-auto" >
				<div class="row rounded p-5" style="background-color: rgba(0,0,0,0.6);">
					<div class="col-12 mb-3">
						<h1 class="text-center text-white">Sistema Estatal de Registro de Colegios de Profesionistas</h1>
					</div>
					<div class="col-4">
						<h3 class="text-center texto-dorado">Colegios</h3>
						<div class="row">
							<div class="col">
								<p class="text-center text-white lead">
									Muchos colegios
								</p>
							</div>
							<div class="col">
								<p class="text-center text-white h1"><i class="fas fa-school"></i></p>
							</div>
						</div>
					</div>
					<div class="col-4 border-right border-left border-light">
						<h3 class="text-center texto-dorado">Eventos</h3>
						<div class="row">
							<div class="col">
								<p class="text-center text-white lead">
									Muchos eventos
								</p>
							</div>
							<div class="col">
								<p class="text-center text-white h1"><i class="far fa-calendar-alt"></i></p>
							</div>
						</div>
					</div>
					<div class="col-4">
						<h3 class="text-center texto-dorado">Registros</h3>
						<div class="row">
							<div class="col">
								<p class="text-center text-white lead">
									Muchos registros
								</p>
							</div>
							<div class="col">
								<p class="text-center text-white h1"><i class="fas fa-file-signature"></i></p>
							</div>
						</div>
					</div>
					<div class="col-md-5 mt-3 mt-md-5 mx-auto text-center py-2">
						<button id="form-registro" class="btn btn-secondary btn-block boton-rojo">Registrarse</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view($template.'menu_landing');?>

<div class="container">
	<div id="descripcion" class="row my-4">
		<div class="col-12">
			<h3 class="display-4 font-weight-bolder text-center texto-dorado">¿Qué es el SERCP?</h3>
			<hr class="borde-grueso borde-dorado">
			<p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>

	<div id="objetivo" class="row">
		<div class="col-md-7 my-auto">
			<h3 class="display-4">
				<span class="font-weight-bolder text-muted">Objetivo</span>
			</h3>
			<p class="lead">Lorem ipsum, dolor, sit amet consectetur adipisicing elit. Enim veritatis aliquid mollitia, autem non? Assumenda dolores minima, neque ea similique sed cupiditate quia dolorem veniam maiores. Dicta voluptate et, necessitatibus.</p>
		</div>
		<div class="col-md-5">
			<img class="img-fluid img-thumbnail" src="<?= base_url('sources/img/persona_leyendo.jpg') ?>">
		</div>
	</div>

	<!-- SEPARADOR --><hr class="borde-grueso borde-dorado my-5">

	<div id="marcolegal" class="row">
		<div class="col-md-5">
			<img class="img-fluid img-thumbnail" src="<?= base_url('sources/img/reunion.jpg') ?>">
		</div>

		<div class="col-md-7 my-auto">
			<h3 class="display-4">
				<span class="font-weight-bolder text-muted">Marco Legal</span>
			</h3>
			<p class="lead">Lorem ipsum, dolor, sit amet consectetur adipisicing elit. Enim veritatis aliquid mollitia, autem non? Assumenda dolores minima, neque ea similique sed cupiditate quia dolorem veniam maiores. Dicta voluptate et, necessitatibus.</p>
		</div>
	</div>
</div>

<div id="colegios" class="row py-4">
	<h2 class="col-12 text-center mt-2 mb-4 py-2 texto-dorado">Colegios Registrados</h2>
	<div class="col-2 col-lg-1 my-auto text-center">
		<a class="stretched-link" href="#"><i class="h1 fas fa-chevron-left"></i></a>
	</div>
	<div class="col-8 col-lg-10">
		<div class="row">
			<div class="col-lg-4 mb-1 text-center shadow-sm no-gutters">
				<img class="img-thumbnail img-fluid" style="min-height: 80px; max-height: 100px;" src="<?= base_url('sources/img/logos/uag.png'); ?>">
				<h3 class="mt-1 texto-rojo">Colegio de Programadores</h3>
				<p>
					<a class="btn btn-secondary boton-rojo" href="#" role="button">Ver más »</a>
				</p>
			</div>
			<div class="col-lg-4 mb-1 text-center shadow-sm no-gutters">
				<img class="img-thumbnail img-fluid" style="min-height: 80px; max-height: 100px;" src="<?= base_url('sources/img/logos/mmaya.png'); ?>">
				<h3 class="mt-1 texto-rojo">Colegio de Sistemas</h3>
				<p>
					<a class="btn btn-secondary boton-rojo" href="#" role="button">Ver más »</a>
				</p>
			</div>
			<div class="col-lg-4 mb-1 text-center shadow-sm no-gutters">
				<img class="img-thumbnail img-fluid" style="min-height: 80px; max-height: 100px;" src="<?= base_url('sources/img/logos/olmeca.png'); ?>">
				<h3 class="mt-1 texto-rojo">Colegio de Prueba</h3>
				<p>
					<a class="btn btn-secondary boton-rojo" href="#" role="button">Ver más »</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-2 col-lg-1 my-auto text-center">
		<a class="stretched-link" href="#"><i class="h1 fas fa-chevron-right"></i></a>
	</div>
</div>

<script src="<?= base_url('sources/js/landing.js') ?>?<?= date('dmYHis') ?>"></script>