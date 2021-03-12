<div class="row align-items-cente border-0 rounded-bottom">
	<nav class="col navbar navbar-expand-lg navbar-dark bg-dark fondo-rojo border-0 rounded-bottom">
		<a class="navbar-brand ml-2" href="https://tabasco.gob.mx/educacion" target="_blank">
			<b class="h4"><strong>tabasco</strong><strong class="fa fa-circle" tabindex="-1" style="font-size: 8px;"></strong></b>gob.mx
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-superior" aria-controls="menu-superior" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="menu-superior" class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto" style="font-size: 1.1rem;">		
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('index.php/Administracion') ?>">Panel de Control</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('index.php/Administracion/logout') ?>">Salir</a>
				</li>
			</ul>
		</div>
	</nav>
</div>
