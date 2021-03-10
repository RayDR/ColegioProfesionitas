<div class="row d-flex justify-content-center my-3 mx-1">
	<div class="col-md-7 col-lg-8 mb-2 rounded shadow bg-dark">

	</div>
	<div class="col-12">
		<table id="dtSolicitudes" class="table table-hover bg-light shadow-lg">
			<thead>
			<tr>
				<th>#</th>
				<th>RFC</th>
				<th>Nombre de la Asociación</th>
				<th>Calle</th>
				<th>Nombre del Solicitante</th>
				<th>Fecha de Solicitud</th>
				<th>Estatus</th>
				<th>Cambiar de estatus</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($solicitudes as $key => $solicitud): ?>
				<tr>
					<td><?= $solicitud->solicitud_registro_id ?></td>
					<td><?= $solicitud->rfc ?></td>
					<td><?= $solicitud->nombre_asociacion ?></td>
					<td><?= $solicitud->calle ?></td>
					<td><?= $solicitud->solicitante_nombre ?> <?= $solicitud->solicitante_primer_apellido ?> <?= $solicitud->solicitante_segundo_apellido ?></td>
					<td><?= $solicitud->fecha_solicitud ?></td>
					<?PHP if (is_null($solicitud->fecha_aprobacion)): ?>
						<td>
							<span class="badge badge-pill badge-secondary">PENDIENTE</span>
						</td>
						<td>
							<div id="cambiarEstatus" class="dropdown">
								<button class="btn boton-bordes-rojos rounded py-0 px-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Cambiar estatus
								</button>
								<div class="dropdown-menu" aria-labelledby="ddEstatus">
									<a class="dropdown-item" >Pendiente</a>
									<a class="dropdown-item" >Aprobar</a>
									<a class="dropdown-item" >Rechazar</a>
								</div>
							</div>
						</td>
					<?PHP else: ?>
						<td>
							<span class="badge badge-pill badge-secondary fondo-rojo" data-toggle="tooltip"
								  data-title="<?= $solicitud->fecha_aprobacion ?>">APROBADO</span>
						</td>
						<td>
							<div class="dropdown disabled">
								<button class="btn btn-outline-secondary rounded py-0 px-2 dropdown-toggle disabled" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Cambiar estatus
								</button>
							</div>
						</td>
					<?PHP endif; ?>

				</tr>
			<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>

<script src="<?= base_url('sources/js/administracion/solicitudes.js') ?>" type="text/javascript" charset="utf-8" async
		defer></script>
