<?php
// Obteniendo el icono de navegador
	$inconoNav 		= "";
	$navegadores 	= array('chrome', 'firefox', 'safari', 'edge', 'explorer');
	foreach ($navegadores as $key => $navegador) {		
		if ( stripos($usuario->navegador_ultima_conexion, $navegador) !== false )
			$inconoNav = $navegador;
	}
	switch ($inconoNav) {
		case 'chrome':
			$inconoNav = "fab fa-chrome text-danger";
			break;
		case 'firefox':
			$inconoNav = "fab fa-firefox text-warning";
			break;
		case 'safari':
			$inconoNav = "fab fa-safari text-success";
			break;
		case 'edge':
			$inconoNav = "fab fa-edge text-info";
			break;
		case 'explorer':
			$inconoNav = "fab fa-internet-explorer text-success";
			break;	
		default:
			$inconoNav = "fas fa-server texto-rojo";
			break;
	}
?>
<main class="page-content">
	<div class="container-fluid">
		<?php $this->load->view($template.'menu_superior_admin');?>
	</div>
	<div>
		<div class="container-fluid">
<!-- <?php print_r($this->session->userdata('uid')); ?> -->
			<div class="row my-3">
				<legend class="col-12 lead text-center texto-dorado">Menú de opciones</legend>
				<div class="col-12">
					<nav id="menu-navegacion" class="nav nav-pills shadow rounded bg-light flex-column flex-sm-row" style="font-size: 1rem;">
						<a class="flex-sm-fill text-sm-center nav-link active" href="#dashboard">Tablero</a>
						<a class="flex-sm-fill text-sm-center nav-link" href="#registrar">Registrar Asociación</a>
						<a class="flex-sm-fill text-sm-center nav-link" href="#solicitudes">Solicitudes de Registro</a>
						<a class="flex-sm-fill text-sm-center nav-link" href="#perfil" tabindex="-1" aria-disabled="true">Mi Asociación</a>
					</nav>
				</div>
			</div>
			<div id="ajax-admin-html">
				<div class="row d-flex justify-content-center my-3 mx-1">
					<div class="col-md-7 col-lg-8 mb-2 rounded shadow bg-dark">
						
					</div>
					<div class="col-md-5 col-lg-4 mb-2 shadow rounded bg-white" style="max-height: 28vh;">					
						<h5 class="text-center text-muted mt-1 mt-lg-3">
							<small>Bienvenido</small>&nbsp;<span class="texto-rojo"><?= $usuario->nombres,' ', $usuario->primer_apellido, ' ', $usuario->primer_apellido ?></span>
						</h5>
						<div class="row my-1 my-lg-3">
							<div class="col-3 col-sm-4 text-center d-flex align-items-middle">
								<img class="img-fluid m-auto" src="<?= base_url('sources/img/favicon.png') ?>" alt="SETAB" style="max-height: 120px;">
							</div>
							<div class="col-9 col-sm-8">
								<table class="table table-borderless">
									<tr>
										<th class="align-middle text-center">Última conexión</th>
									</tr>
									<tr>
										<td class="align-middle text-center">
											<?= $usuario->fecha_ultima_conexion ?> <i class="<?= $inconoNav ?> lead" data-toggle="tooltip" data-title="<?= $usuario->navegador_ultima_conexion ?> IP: <?= $usuario->ip_ultima_conexion ?>"></i>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-3">
					<div class="col-lg-10 mx-auto rounded shadow bg-white">
						<?= heading('Comunicados Recientes', 3, array('class' => 'text-center texto-rojo my-3') ) ?>			
						<hr class="border borde-dorado mx-5">
						<div class="row">
							<div class="col">							
								<div class="row mx-0 mx-md-3 mx-lg-5 mb-4 mx-auto text-center bg-transparent">
									<?PHP if ( ! $comunicados ): ?>
										<div class="mx-auto col-12 py-3">
											<div class="text-center lead">No hay comunicados para mostrar</div>
										</div>
									<?PHP else: ?>
										<?PHP foreach ($comunicados as $key => $comunicado): ?>
											<?PHP 
												$tipo  	= ( $comunicado->tipo_clave != 'txt' )?
															$comunicado->tipo_clave . '/': 'img/';
												$url 	= ( $comunicado->es_local )? 
															base_url( 'sources/comunicados/'. $tipo ) : '';
												$media 	= ( $comunicado->media_adjunto )? 
															base_url( 'sources/comunicados/adjuntos/'. $comunicado->media_adjunto ) : '';
											?>
										<div class="col-md-6 col-lg-4 card mx-auto" style="width: 18rem;">
											<div class="card-body">
												<h5 class="card-title"><?= $comunicado->titulo ?></h5>
												<p class="card-text"><?= $comunicado->texto ?></p>
												<a href="#" class="btn btn-secondary boton-rojo stretched-link">Leer más</a>
											</div>
										</div>
										<?PHP endforeach; ?>
									<?PHP endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?= base_url('sources/js/administracion/panel_control.js') ?>"></script>