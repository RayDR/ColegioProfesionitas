<main class="page-content">
	<div class="container-fluid">
		<?php $this->load->view($template . 'menu_superior_admin'); ?>
	</div>
	<div>
		<div class="container-fluid">
			<div class="row my-3">
				<legend class="col-12 lead text-center texto-dorado">Menú de opciones</legend>
				<div class="col-12">
					<nav id="menu-navegacion" class="nav nav-pills shadow rounded bg-light flex-column flex-sm-row" style="font-size: 1rem;">
						<a class="flex-sm-fill text-sm-center nav-link border active" href="#dashboard">Tablero</a>

						<?php if ( $this->session->userdata('tuser') < 3 ): ?>
						<a class="flex-sm-fill text-sm-center nav-link border" tabindex="-1" href="#registrar">Registrar Asociación</a>
						<a class="flex-sm-fill text-sm-center nav-link border" tabindex="-1" href="#solicitudes">Solicitudes de Registro</a>
						<a class="flex-sm-fill text-sm-center nav-link border" href="#perfil" tabindex="-1" aria-disabled="true">Perfil</a>
						<?php elseif ( $this->session->userdata('tuser') > 3 ): ?>
						<a class="flex-sm-fill text-sm-center nav-link border" href="#perfil" tabindex="-1" aria-disabled="true">Perfil del Colegio</a>
						<?php endif; ?>
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