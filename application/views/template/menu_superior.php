<div class="row align-items-center fondo-rojo border-0 rounded-bottom">
	<nav class="col navbar navbar-expand-lg navbar-dark bg-dark border-0 rounded-bottom">
		<a class="navbar-brand" href="https://tabasco.gob.mx/educacion">
			<b class="h4"><strong>tabasco</strong><strong class="fa fa-circle" tabindex="-1" style="font-size: 8px;"></strong></b>gob.mx
		</a>

		<div class="text-muted ml-auto px-2" id="progress">
			<span data-toggle="tooltip" data-title="Conectando" data-placement="bottom">
				<i class="fas fa-circle text-danger"></i>
			</span>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-superior" aria-controls="menu-superior" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu-superior">
			<ul class="navbar-nav ml-auto">		
				<li class="nav-item active">
					<a class="nav-link d-flex justify-content-start" href="<?= base_url() ?>">
						<span class="fa fa-home" style="font-size: 2rem;" data-toggle="tooltip" data-title="Volver a Inicio" data-placement="bottom"></span> Inicio
						<span class="d-block d-md-none ml-2"></span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link d-flex justify-content-start <?PHP if( $this->session->userdata('ulogin') ) echo 'active'; ?>" href="<?= base_url('index.php/Administracion/acceso') ?>">
						<?PHP if( ! $this->session->userdata('ulogin') ): ?>
						<span class="fas fa-user-circle" style="font-size: 2rem;" data-toggle="tooltip" data-title="Trabajadores" data-placement="bottom"></span>
						<span class="d-block d-md-none ml-2"></span>
						<?PHP else: ?>
						<span class="fas fa-user-tie" style="font-size: 2rem;" data-toggle="tooltip" data-title="Volver al sistema" data-placement="bottom"></span>
						<span class="d-block d-md-none ml-2"></span>
						<?PHP endif; ?>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</div>