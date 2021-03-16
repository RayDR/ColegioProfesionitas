<main class="page-content">
	<div id="ajax-perfil" class="mx-auto">
		<form id="formulario-perfil" class="form-row">
			<div class="col-5 col-md-3">
				<div class="nav flex-column nav-pills bg-light shadow-xl py-2 px-1 rounded text-center" id="menu-perfil" role="tablist" aria-orientation="vertical">
					<a class="nav-link active shadow" id="menu-perfil-informacion" data-toggle="pill" href="#mi-informacion" role="tab" aria-controls="mi-informacion" aria-selected="true">Mi Información</a>
					<a class="nav-link shadow" id="menu-perfil-asociados" data-toggle="pill" href="#mi-asociados" role="tab" aria-controls="mi-asociados" aria-selected="true">Asociados</a>
					<a class="nav-link shadow" id="menu-perfil-password" data-toggle="pill" href="#perfil-password" role="tab" aria-controls="perfil-password" aria-selected="false">Cambiar Contraseña</a>
					<a class="nav-link shadow texto-rojo" id="menu-perfil-cerrar" href="<?= base_url('index.php/Administracion/logout') ?>">Cerrar Sesión</a>
				</div>
			</div>
			<div class="col-8 col-md-9">
				<div class="tab-content" id="menu-perfil-contenido">
					<!-- Sección de Información de Perfil -->
					<div class="tab-pane fade show active" id="mi-informacion" role="tabpanel" aria-labelledby="menu-perfil-informacion">
					</div>
					<!-- Fin de Sección de Información de Perfil -->

					<!-- Sección de Firmantes de Institución -->
					<div class="tab-pane fade" id="perfil-firmantes" role="tabpanel" aria-labelledby="menu-perfil-firmantes">
					</div>
					<!-- Fin Sección de Firmantes de Institución -->

					<!-- Sección de Actividad -->
					<div class="tab-pane fade" id="perfil-actividad" role="tabpanel" aria-labelledby="menu-perfil-actividad">
					</div>
					<!-- Fin Sección de Actividad -->

					<!-- Sección de Notificaciones -->
					<div class="tab-pane fade" id="perfil-notificaciones" role="tabpanel" aria-labelledby="menu-perfil-notificaciones">
					</div>
					<!-- Fin Sección de Notificaciones -->

					<!-- Sección de Cambio de Contraseña -->
					<div class="tab-pane fade" id="perfil-password" role="tabpanel" aria-labelledby="menu-perfil-password">
					</div>
					<!-- Fin Sección de Cambio de Contraseña -->
				</div>
			</div>
		</form>
	</div>
</main>