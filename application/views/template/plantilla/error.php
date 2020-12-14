<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body class="fondo-1">
	<main class="page-content">
	<div class="container-fluid">

		<?php $this->load->view($template.'menu_superior');?>
			<div id="ajax-html" style="min-height: 100vh;">
			<!-- Vista dinámica -->
			<div class="container">
				<div class="row">
					<div class="col-12 p-4 bg-light mt-2 shadow">
						<div class="mx-auto text-center">
							<img class="img-fluid" src="<?= base_url('sources/img/SETAB_COLOR.png') ?>" alt="Secretaría de Educación Tabasco" style="max-width: 450px">
						</div>
						<h4 class="text-center font-weight-bold">
							<span class="badge badge-info"><?= SISTEMA?></span>
						</h4>
					</div>
					<div class="col-12 p-4 bg-light mt-2 shadow">
						<div class="row d-flex justify-content-center">
						<?php $columna = ( count($errores) == 1 )? 10: 6;	?>
						<?php foreach ($errores as $key => $error): ?>
							<div class="col-md-<?= $columna ?> mb-3">
								<?php if ( isset($error["acciones"]) ): ?>
								<div class="card">
									<?php if ( isset($error["encabezado"]) ): ?>
									<div class="card-header fondo-rojo text-white">
										<div class="h5"><?= $error["encabezado"] ?></div>
									</div>
									<?php endif; ?>
									<?php if ( isset($error["contenido"]) ): ?>
									<div class="card-body">
										<div class="card-text lead"><?= $error["contenido"] ?></div>
									</div>
									<?php endif; ?>
									<?php if ( isset($error["acciones"]) ): ?>
									<div class="card-footer">									
										<?php foreach ($error["acciones"] as $keyA => $accion): ?>
											<button id="<?= $keyA ?>" type="button" class="btn btn-secondary"><?= $accion ?></button>
										<?php endforeach; ?>
									</div>
										<?php if ( isset($error["scripts"]) ): ?>
											<?php foreach ($error["scripts"] as $keyS => $script): ?>
											<script type="text/javascript" src="<?=base_url($script)?>"></script>
											<?php endforeach; ?>										
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<?php else: ?>
								<div class="container">
									<div id="alert-mensaje" tabindex="-1" class="alert alert-danger" role="alert">
										<?php if ( isset($error["encabezado"]) ): ?>
										<div class="h5 alert-heading"><?= $error["encabezado"] ?></div>
										<hr>
										<?php endif; ?>
										<?php if ( isset($error["contenido"]) ): ?>
										<p class="lead"><?= $error["contenido"] ?></p>
										<?php endif; ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
						</div>
						<div class="col-12 p-md-4 mt-md-2">
							<a href="<?= $boton['url'] ?>" class="btn btn-secondary boton-<?= $boton['color'] ?>"><?= $boton['texto'] ?></a>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin vista dinámica -->
			</div>
		</div>
	</main>

	<!-- Loader -->
	<div id="loader" class="loader-background">
		<div class="loader">
			<div class="loader--dot"></div>
			<div class="loader--dot"></div>
			<div class="loader--dot"></div>
			<div class="loader--dot"></div>
			<div class="loader--dot"></div>
			<div class="loader--dot"></div>
			<div class="loader--text"></div>
		</div>
	</div>
	<!-- Fin Loader -->

<?php $this->load->view($template.'footer');?>
	<script type="text/javascript" src="<?=base_url()?>sources/js/utilerias.js"></script>
	<script type="text/javascript" src="<?=base_url()?>sources/js/main.js"></script>
</body>

</html>

