<main class="page-content">
	<div class="container-fluid">
		<?php $this->load->view($template . 'menu_superior_admin'); ?>
	</div>
	<div>
		<div class="container-fluid">
			<div class="row my-3">
				<div class="col-12">
					<nav id="menu-navegacion" class="navbar navbar-expand navbar-dark bg-dark rounded p-0">
						<a class="navbar-brand ml-2 d-none d-lg-block" href="<?= base_url('index.php/Administracion') ?>">Menú de opciones</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navOpciones" aria-controls="navOpciones" aria-expanded="false" aria-label="Ocultar">
						    <span class="navbar-toggler-icon"></span>
						</button>
						<div class="navbar-nav-scroll mx-auto" id="navOpciones">
    						<ul class="navbar-nav">
    							<li class="nav-item">
									<a class="nav-link py-3" href="#dashboard">Tablero</a>
								</li>
								<li class="nav-item">
									<a class="nav-link py-3" href="#dashboard">Asociados</a>
								</li>
								<li class="nav-item">
									<a class="nav-link py-3" href="#dashboard">Eventos</a>
								</li>
								<?php if ( $this->session->userdata('tuser') < 4 ): ?>
								<li class="nav-item">
									<a class="nav-link py-3" tabindex="-1" href="#registrar">Registrar colegio</a>
								</li>
								<li class="nav-item">
									<a class="nav-link py-3" tabindex="-1" href="#registrar">Validación de información</a>
								</li>
								<li class="nav-item">
									<a class="nav-link py-3" tabindex="-1" href="#solicitudes">Solicitudes de registro</a>
								</li>
								<?php elseif ( $this->session->userdata('tuser') > 3 ): ?>
								<li class="nav-item">
									<a class="nav-link py-3" href="#perfil" tabindex="-1" aria-disabled="true">Perfil del colegio</a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div id="ajax-admin-html">
				<?php $this->load->view('administracion/tablero', ['comunicados' => $comunicados], FALSE); ?>
			</div>
		</div>
	</div>
</main>
<script src="<?= base_url('sources/js/administracion/panel_control.js') ?>"></script>