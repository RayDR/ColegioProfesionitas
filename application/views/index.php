<main class="page-content">
	<div class="row align-items-center fondo-rojo" style="min-height: 15vh;">
		<div class="col-12">					
			<h1 class="text-center text-white"><?= SISTEMA ?></h1>
		</div>
	</div>
	<?php $this->load->view($template.'menu_superior');?>
	<div class="row mt-3" style="min-height: 20%;">
		<div class="col-12 col-lg-7 ">
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

		<div class="col-12 col-lg-5 col-xl-4">
			<div class="row no-gutters border borde-dorado rounded-top shadow fondo-dorado">
				<div class="col-12 py-2">
					<h4 class="text-white text-center">Menú</h4>
				</div>
			</div>
			<div class="row no-gutters rounded-bottom mb-4 shadow">
				<div class="col-12 px-2 px-lg-3 py-2">
					<div id="convocatorias" class="btn-group grupo-rojo py-2" role="group" aria-label="Convocatorias">
						<button type="button" class="btn btn-block btn-lg btn-secondary boton-en-grupo boton-grupo-secundario py-lg-3">
							<span class="fa fa-bullhorn"></span>
						</button>
						<a class="btn btn-block btn-lg btn-secondary boton-en-grupo py-lg-3 m-0" href="#" target="_blank">Boton 1
						</a>
					</div>
				</div>
			
				<div class="col-12 px-2 px-lg-3 py-2">
					<div id="preguntas" class="btn-group grupo-dorado py-2" role="group" aria-label="Preguntas Frecuentes">
						<button type="button" class="btn btn-block btn-lg btn-secondary boton-en-grupo boton-grupo-secundario py-lg-3">
							<span class="fa fa-comments-o"></span>
						</button>
						<a href="#" class="btn btn-block btn-lg btn-secondary boton-en-grupo py-lg-3 m-0">Boton 2
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 offset-xl-1"></div>
	</div>
</main>