<div id="landing_jumbo" class="row" style="min-height: 80vh;">
	<div class="col-12 m-auto">
		<div class="row ">
			<div class="col-md-10 col-lg-8 mx-auto my-auto" >
				<div class="row rounded p-5" style="background-color: rgba(0,0,0,0.6);">
					<div class="col-12 mb-3">
						<h1 class="text-center text-white contenido-mostrar">Sistema Estatal de Registro de Colegios de Profesionistas</h1>
					</div>
					<div class="col-md-4 mx-auto counter-mostrar">
						<h3 class="text-center texto-dorado">Colegios</h3>
						<div class="row">
							<div class="col d-flex justify-content-center">
								<h2 class="text-white my-auto"><?= $counters->counter_colegios ?></h2>
							</div>
						</div>
					</div>
					<div class="col-md-4 mx-auto counter-mostrar border-md-left border-md-right">
						<h3 class="text-center texto-dorado">Asociados</h3>
						<div class="row">
							<div class="col d-flex justify-content-center">
								<h2 class="text-white my-auto"><?= $counters->counter_asociados ?></h2>
								<i class="fas fa-users fa-3x text-white ml-3"></i>
							</div>
						</div>
					</div>
					<div class="col-md-4 mx-auto counter-mostrar">
						<h3 class="text-center texto-dorado">Eventos</h3>
						<div class="row">
							<div class="col d-flex justify-content-center">
								<h2 class="text-white lead my-auto">PRÓXIMAMENTE</h2>
								<i class="fas fa-bullhorn fa-3x text-white ml-3"></i>
							</div>
						</div>
					</div>
					<div class="col-12 row">
						<div class="col-md-5 mt-3 mt-md-5 mx-auto text-center py-2 counter-mostrar">
							<button id="form-registro" class="btn btn-secondary btn-block boton-rojo">Registrarse</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view($template.'menu_landing');?>

<div class="contenido-mostrar">
	<div id="descripcion" class="row">
		<div class="col shadow-sm py-5">
			<div class="row py-5">
				<div class="col-md-10 mx-auto py-4">
					<h3 class="display-4 font-weight-bolder text-center texto-dorado">¿Qué es el SERCP?</h3>
					<hr class="borde-grueso borde-dorado my-4">
					<p class="lead text-center">Es un sistema que integra el registro de los Colegios de Profesionistas vigentes en el Estado de Tabasco, a quienes permite realizar trámites por medios electrónicos para el cumplimiento de los propósitos establecidos en la Ley Reglamentaria del Artículo 4° y 5° Constitucional, Relativa al Ejercicio de las Profesiones en el Estado de Tabasco.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="objetivo" class="row fondo-2">
		<div class="col-md-7 my-auto">
			<div class="container py-5">
				<h3 class="display-4 my-4">
					<span class="font-weight-bolder text-muted">Objetivo</span>
				</h3>
				<p class="lead text-justify">Dar certidumbre a la sociedad tabasqueña, de las agrupaciones constituidas como Colegios de Profesionistas vigentes, cuyo propósito tienda al cumplimiento de sus estatutos y elevar los servicios profesionales en el Estado.</p>
			</div>
		</div>
		<div class="col-md-5 pr-0">
			<img class="img-fluid" src="<?= base_url('sources/img/persona_leyendo.jpg') ?>">
		</div>
	</div>

	<div id="marcolegal" class="row">
		<div class="col-md-5 pl-0">
			<img class="img-fluid" src="<?= base_url('sources/img/reunion.jpg') ?>">
		</div>
		<div class="col-md-7 my-auto">
			<div class="container">
				<h3 class="display-4">
					<span class="font-weight-bolder text-muted">Fundamento legal</span>
				</h3>
				<ul class="list-unstyled">
					<li class="media text-justify mb-2">
						<div class="media-body">
							<i class="fas fa-angle-right"></i>
							<a href="https://tabasco.gob.mx/leyes/descargar/0/360" class="card-link" target="_blank">Ley Reglamentaria de los Artículo 4° y 5° de la Constitución Federal, relativa al Ejercicio de las Profesiones en el Estado de Tabasco.</a>
						</div>
					</li>
					<li class="media text-justify mb-2">
						<div class="media-body">
							<i class="fas fa-angle-right"></i>
							<a href="https://congresotabasco.gob.mx/leyes/" class="card-link" target="_blank">Código Civil para el Estado de Tabasco</a>
						</div>
					</li>
					<li class="media text-justify mb-2">
						<div class="media-body">
							<i class="fas fa-angle-right"></i>
							<a href="https://congresotabasco.gob.mx/leyes/" class="card-link" target="_blank">Ley de Ingreso del Estado de tabasco</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="colegios" class="row py-5 my-3">
		<h3 class="col-12 font-weight-bolder text-center texto-dorado">Colegios registrados</h3>
		<hr class="col-md-10 borde-grueso borde-dorado">
      <div class="col-md-11 mx-auto py-3">
         <div id="galeria-colegios" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <?php $counter = 0; ?>
               <?php foreach ($colegios as $key => $colegio): ?>
                  <?php if ( $key == 0 || $key % 3 == 0 ): // Imprime un boton por cada 3 items ?>
                  <li data-target="#galeria-colegios" data-slide-to="<?= $counter ?>" class="bg-dark <?= ($key == 0)? 'active': '' ?>"></li>
                  <?php $counter++; ?>
                  <?php endif ?>
               <?php endforeach ?>
            </ol>
            <div class="carousel-inner p-1 p-lg-5">
                  <?php foreach ($colegios as $key => $colegio): ?>
                  <?php if ( $key == 0 || $key % 3 == 0 ): // Imprime un slide para cada 3 items?>
                     <?php if ( $key > 0 ): ?>
                     </div> <!-- Fin del row -->
                  </div> <!-- Fin carousel-item -->
                     <?php endif ?>
                  <div class="carousel-item <?= ($key == 0)? 'active' : '' ?>">
                     <div class="row">
                  <?php endif; ?>
                     <div class="col-md-6 col-lg-4 m-auto">
                        <div class="card">
                        	<?php if ( $colegio->imagen ): ?>
                        	<img src="<?= base_url( RUTA_COLEGIOS . $colegio->colegio_id . $colegio->imagen) ?>" class="card-img-top" alt="<?= $colegio->nombre_colegio ?>">
                        	<?php else: ?>
                        	<img src="<?= base_url('sources/img/SETAB_COLOR.png') ?>" class="card-img-top" alt="<?= $colegio->nombre_colegio ?>">
                        	<?php endif ?>
                           <div class="card-body my-auto" style="min-height: 180px;">
                              <h5 class="card-title"><?= $colegio->nombre_colegio ?></h5>
                              <a href="#colegio<?= $colegio->colegio_id ?>" data-colegio="<?= $colegio->colegio_id ?>" data-nombre="<?= $colegio->nombre_colegio ?>" class="card-link stretched-link ver-colegio">Ver Colegio</a>

                              <?php if ( $colegio->pagina_web ): ?>
                              <div class="position-relative text-right mb-auto">
                                 <a href="<?= ( strpos($colegio->pagina_web, 'http://') || strpos($colegio->pagina_web, 'https://') )? $colegio->pagina_web : 'http://' . $colegio->pagina_web ?>" target="_blank" class="card-link stretched-link">Sitio Web</a>
                              </div>
                              <?php endif ?>
                           </div>
                        </div>
                     </div>
                  <?php if ( $key == count($colegios)-1 ): ?>
                     </div> <!-- Fin del row -->
                  </div> <!-- Fin carousel-item -->
                  <?php endif ?>
                  <?php endforeach ?>
               </div>
            </div>
         </div>
      </div>
	</div>
</div>


<script src="<?= base_url('sources/js/landing.js') ?>?<?= date('dmYHis') ?>"></script>