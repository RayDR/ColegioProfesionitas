<?php
// Obteniendo el icono de navegador
$inconoNav 		= "";
$navegadores 	= array('chrome', 'firefox', 'safari', 'edge', 'explorer');
foreach ($navegadores as $key => $navegador) {
	if (stripos($usuario->navegador_ultima_conexion, $navegador) !== false)
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
<div class="row d-flex justify-content-center my-3 mx-1 rounded shadow-lg bg-light">
	<div class="col-md-7 col-lg-8 mb-2">
		<?= heading('Comunicados', 3, array('class' => 'text-center texto-rojo my-3')) ?>
		<div class="row">
			<div class="col">
				<div class="row mx-0 mx-md-3 mx-lg-5 mb-4 mx-auto text-center bg-transparent">
					<?PHP if (!$comunicados) : ?>
						<div class="mx-auto col-12 py-3">
							<div class="text-center lead">No hay comunicados para mostrar</div>
						</div>
					<?PHP else : ?>
						<?PHP foreach ($comunicados as $key => $comunicado) : ?>
							<?PHP
							$tipo  	= ($comunicado->tipo_clave != 'txt') ?
								$comunicado->tipo_clave . '/' : 'img/';
							$url 	= ($comunicado->es_local) ?
								base_url('sources/comunicados/' . $tipo) : '';
							$media 	= ($comunicado->media_adjunto) ?
								base_url('sources/comunicados/adjuntos/' . $comunicado->media_adjunto) : '';
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
	<div class="col-md-5 col-lg-4 mb-2 ">
		<h5 class="text-center text-muted mt-1 mt-lg-3">
			<small>Bienvenido</small>&nbsp;<span class="texto-rojo"><?= $usuario->nombres, ' ', $usuario->primer_apellido, ' ', $usuario->segundo_apellido ?></span>
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

<?php if ( $this->session->userdata('tuser') < 4 ): ?>
<div class="row my-3 mx-1">
	<div class="shadow bg-white  rounded col-12">

		<h4 class="col-12 mt-4">Colegios Registrados</h4>
		<hr>
		<div class="col-12 table-responsive-sm mt-4 mt-md-0 p-5">
			<table id="tb_colegios" name="colegios" class="table table-hover text-center w-100 ">
				<thead>
					<tr>
						<th>Nombre del colegio</th>
						<th>Curp</th>
						<th>RFC</th>
						<th>Nombre</th>
						<th>Domicilio</th>
						<th>Mapa</th>
						<th>Fecha de constiticón</th>
						<th>Perido mesa directiva</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<?php endif; ?>

<script type="text/javascript" src="<?= base_url("sources/js/administracion/tablero.js") ?>"></script>