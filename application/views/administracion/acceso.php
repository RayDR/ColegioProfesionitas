<div class="row align-items-center fondo-rojo" style="min-height: 15vh;">
	<div class="col-12">					
		<h1 class="text-center text-white"><?= SISTEMA ?></h1>
	</div>
</div>
<?php $this->load->view($template.'menu_superior');?>
<div class="row mt-4">
	<div class="col-10 col-lg-6 p-4 mx-auto mx-lg-0 ml-lg-auto shadow bg-light mb-4">
		<div class="row no-gutters border rounded mb-4 shadow position-relative bg-light" style="min-height: 70vh;">
			<div class="col-12">
				<h3 class="text-center texto-rojo my-3">Comunicados</h3>
				<hr class="border borde-dorado mx-5">

				<div class="row">
					<div class="col pt-3">
						<div class="row border mx-0 mx-md-3 mx-lg-5 rounded mb-4 shadow-sm bg-white" style="min-height: 20%">
							<?php if ( ! $comunicados ): ?>
								<div class="mx-auto col-12 py-3">
									<div class="text-center lead">No hay comunicados para mostrar</div>
								</div>
							<?php else: ?>
								<?php foreach ($comunicados as $key => $comunicado): ?>
									<div id="noticia-<?= $comunicado["noticia_id"] ?>" class="col-12">
										<h5 class="texto-rojo font-weight-bold mt-3"><?= $comunicado["titulo_noticia"] ?> - <small><?= date_format( new DateTime( $comunicado["actualizada_el"] ), 'd/m/Y H:i') ?></small></h5>
										<hr class="borde-rojo my-0">
										<?php 
										$url = ( $comunicado["adjunto_desde_fuente"] )? 
												$comunicado["adjunto_noticia"] : 
												base_url( $comunicado["adjunto_noticia"] );

										switch ($comunicado["tipo_noticia_id"]) {
											case '2':
												echo '<img class="img-fluid" src="'. $url . '" alt="'. $comunicado["titulo_noticia"].'"/>';
												break;
											case '3':												
												echo '<div class="card-img-top">
														<iframe frameborder="0" width="100%" height="350px" src="'. $url . '" />">
														</iframe>
													 </div>';
												break;
											case '4':
												echo '<div class="embed-responsive embed-responsive-16by9">
														<iframe width="100%" class="embed-responsive-item" src="'. $url . '" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
														</iframe>
													</div>';
												break;
											default:
												echo '<p class="lead">'. 
														$comunicado["texto_noticia"] .
													 '</p>';
												break;
										}
										?>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-10 col-lg-5 col-xl-4 mx-auto">
		<div class="row border rounded mb-4 shadow fondo-rojo-o align-items-center" style="min-height: 55vh;">
			<div class="col-12">
				<h3 class="text-center text-white mb-3">Iniciar sesión</h3>
				<hr class="border borde-dorado mx-4">
				<div class="row">
					<form class="col-12" method="POST" action="#">
						<?php $this->load->view('template/utiles/alertas'); ?>
						<div class="container mb-3 px-5">
							<div class="input-group input-group">
								<div class="input-group-prepend">
									<label for="usuario" class="input-group-text">
										<i class="fa fa-user texto-dorado"></i>
									</label>
								</div>
								<input
									type="text" 
									id="usuario" 
									name="usuario" 
									placeholder="Ingrese nombre de usuario"
									class="form-control rounded-right" 
									autocomplete="off">
								<div class="invalid-feedback text-warning">
									Nombre de usuario inválido
								</div>
							</div>
						</div>

						<div class="container px-5">
							<div class="input-group input-group">
								<div class="input-group-prepend">
									<label for="password" class="input-group-text">
										<i class="fa fa-lock texto-dorado"></i>
									</label>
								</div>
								<input	type="password" 
									id="password" 
									name="password" 
									placeholder="Ingrese su contraseña"
									class="form-control rounded-right" 
									autocomplete="off">
								<div class="invalid-feedback text-warning">
									Su contraseña no es válida
								</div>
							</div>

							<p class="my-2">
								<a class="javascript:void(0)" id="recuperar-password">
									<span class="text-white">Recuperar mi contraseña</span>
								</a>
							</p>
						</div>

						<div class="container text-center mt-3 px-5">
							<button id="ingresar" type="submit" class="btn btn-block btn-secondary boton-rojo">Ingresar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LfI9rAZAAAAAK9J6_F1Jd5GxNOdQtEJ3hV-VjVM"></script>
<script src="<?= base_url('sources/js/administracion/acceso.js') ?>"></script>