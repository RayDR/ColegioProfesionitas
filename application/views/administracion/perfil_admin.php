<main class="page-content">
	<div id="ajax-perfil" class="mx-auto">
		<form id="formulario-perfil" class="form-row">
			<div class="col-12 col-md-3">
				<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
					<a class="nav-link shadow active" id="informacion-tab" data-toggle="pill" href="#informacion" role="tab" aria-controls="informacion" aria-selected="true">Información</a>
					<a class="nav-link shadow" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">Cambiar Contraseña</a>
					<a class="nav-link shadow" id="cerrar-tab" data-toggle="pill" href="<?= base_url('index.php/Administracion/logout') ?>" role="tab" aria-controls="cerrar" aria-selected="false">Cerrar Sesión</a>
				</div>
			</div>
			<div class="col-12 col-md-9">
				<div class="tab-content">
					<div class="tab-pane fade show active" id="informacion" role="tabpanel" aria-labelledby="informacion-tab">
						<?php $this->load->view('administracion/perfil/informacion'); ?>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="menu-password-tab">
						<?php $this->load->view('administracion/perfil/password'); ?>
					</div>
					<div class="tab-pane fade" id="cerrar" role="tabpanel" aria-labelledby="cerrar-tab">
					</div>
				</div>
			</div>
		</form>
</main>


<script type="text/javascript" src="<?= base_url("sources/js/administracion/perfil.js") ?>"></script>