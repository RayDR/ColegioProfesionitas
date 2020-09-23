<main class="page-content">
	<div class="container-fluid">		
		<?php $this->load->view($template.'menu_superior_admin');?>
	</div>
	<div id="main-content" class="container-fluid">
		<div class="row d-flex justify-content-center my-5">
			<div class="col-md-8 col-lg-6 col-xl-6 m-3 m-lg-0 border shadow">
				<div class="row" style="max-height: 40vh;" >
					<div class="col-12">
						<h3 class="text-center texto-rojo my-3">Comunicados</h3>
						<hr class="border borde-dorado">
					</div>
				</div>
				<div class="row" style="max-height: 40vh; overflow-x: scroll;" >
					<div class="col">
						<div class="row mx-auto px-2">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-lg-6 col-xl-5 m-3 m-lg-0">
				<div class="card">
					<div class="card-header bg-white border-0">
						<h5 class="card-title text-center text-muted"><small>Bienvenido</small> <span class="texto-rojo">usuario</span></h5>
					</div>
					<div class="row">
						<div class="col-md-4 text-center">
							<img class="img-fluid mx-auto" src="<?= base_url('sources/img/favicon.png') ?>" alt="SETAB" style="max-height: 150px;">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<table class="table">
									<tr>
										<th class="align-middle">Última conexión</th>
										<td class="align-middle text-right">
										</td>
									</tr>
									<tr>
										<th class="align-middle">Detalles</th>
										<td class="align-middle text-right">
											ultima conexión
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 mx-4 justify-content-center">
			<div class="col">
				<div class="card text-white mb-3">
					<div class="card-header fondo-rojo">Detalles de Convocatoria Activa</div>
					<div id="convocatorias-activas" class="card-body fondo-rojo-o">
						<h5 class="card-title">Totales</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card text-white mb-3">
					<div class="card-header fondo-dorado">Histórico de Solicitudes</div>
					<div id="historico" class="card-body fondo-dorado-o">
						<h5 class="card-title">Totales</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?= base_url('sources/js/administracion/acceso.js') ?>"></script>