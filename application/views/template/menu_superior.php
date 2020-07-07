<div class="row align-items-center fondo-rojo border-0 rounded-bottom">
	<nav class="col navbar navbar-expand-lg navbar-dark bg-dark border-0 rounded-bottom">
		<a class="navbar-brand" href="#">
			<img src="<?= base_url('sources/img/SETAB_BLANCO.png') ?>" alt="<?= LOGO ?>" style="max-width: 150px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-superior" aria-controls="menu-superior" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu-superior">
			<ul class="navbar-nav ml-auto">
			<?php if ( $this->session->userdata('ulogin') ): ?>
				<li class="nav-item active">
					<a class="nav-link" href="#">Inicio <span class="sr-only">(actual)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="menu-superior-opciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Opciones
					</a>
					<div class="dropdown-menu" aria-labelledby="menu-superior-opciones">
						<a class="dropdown-item" href="#">Opción 1</a>
						<a class="dropdown-item" href="#">Opción 2</a>
						<a class="dropdown-item" href="#">Opción 3</a>
						<a class="dropdown-item" href="#">Opción 4</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contacto</a>
				</li>
			<?php else: ?>
				<li class="nav-item active">
					<a class="nav-link" href="#">
						<span class="fa fa-user-circle" style="font-size: 2rem;" data-toggle="tooltip" data-title="Trabajadores" data-placement="bottom"></span>
						<span class="sr-only">(actual)</span>
					</a>
				</li>
			<?php endif; ?>
			</ul>
		</div>
	</nav>
</div>