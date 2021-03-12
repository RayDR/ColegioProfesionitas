<div id="landing_jumbo" class="row" style="min-height: 80vh;">
	<div class="col-12 my-auto mx-auto">
		<div class="row ">
			<div class="col-md-10 col-lg-8 mx-auto my-auto" >
				<div class="row rounded p-5" style="background-color: rgba(0,0,0,0.6);">
					<div class="col-12 mb-3">
						<h1 class="text-center text-white contenido-mostrar">Sistema Estatal de Registro de Colegios de Profesionistas</h1>
					</div>
					<div class="col-4 counter-mostrar">
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
					<div class="col-4 border-right border-left border-light counter-mostrar">
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
					<div class="col-4 counter-mostrar">
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
					<div class="col-md-5 mt-3 mt-md-5 mx-auto text-center py-2 counter-mostrar">
						<button id="form-registro" class="btn btn-secondary btn-block boton-rojo">Registrarse</button>
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


<script src="<?= base_url('sources/js/landing.js') ?>?<?= date('dmYHis') ?>"></script>