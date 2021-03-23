<div class="bg-dark shadow">
	<nav id="menul_flotante" class="navbar navbar-expand-sm p-2 navegacion-mostrar">
		<a class="navbar-brand ml-2 text-white" href="https://tabasco.gob.mx/educacion" tabindex="-1">
			<b class="h4"><strong>tabasco</strong><strong class="fa fa-circle" style="font-size: 8px;"></strong></b>gob.mx
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-superior-flotante" aria-controls="menu-superior-flotante" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu-superior-flotante">
			<ul class="navbar-nav ml-auto">
				<?php if( $this->session->userdata('ulogin') == true && $this->session->userdata('uid') ): ?>
				<li class="nav-item">
					<a class="nav-link text-white" href="<?= base_url('index.php/Administracion'); ?>">Panel de Control</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="<?= base_url('index.php/Administracion/logout'); ?>">Salir</a>
				</li>
				<?php else: ?>
				<li class="nav-item">
					<a class="nav-link active" href="">Inicio</a>
				</li>
				<li class="nav-item">
					<a id="inicio-sesion" class="nav-link active" href="#">Iniciar Sesión</a>
				</li>
				<form id="form-inicio-sesion" class="inicio-sesion text-body form-mostrar" style="display: none;">
					<?php $this->load->view('template/utiles/alertas'); ?>
					<div class="form-group">
						<label for="is-rfc">RFC</label>
						<input type="email" class="form-control" id="is-rfc" name="rfc">
					</div>
					<div class="form-group">
						<label for="is-password">Password</label>
						<input type="password" class="form-control" id="is-password" name="password">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="is-recuerdame" name="recuerdame">
						<label class="form-check-label" for="is-recuerdame">Recuerdame</label>
					</div>
					<div class="text-right">
						<button id="is-acceder" type="submit" class="btn btn-secondary boton-dorado px-5">Ingresar</button>
					</div>
				</form>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
</div>


