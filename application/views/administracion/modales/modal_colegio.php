<div class="card">
  <div class="card-body fondo-cuadros fondo-2">
    <h5 class="card-title text-center h4 texto-rojo"><?= $colegio->nombre_colegio ?></h5>
    <div class="container-fluid py-3">
      <div class="jumbotron-fluid">
        <p class="lead"><b>Representante: </b><?= $colegio->nombres ?> <?= $colegio->primer_apellido ?> <?= $colegio->segundo_apellido ?></p>
      </div>
    </div>
    <hr class="border borde-dorado mb-0">
    <div class="row">
      <?php if( $colegio->mapa ): ?>
      <div class="col-lg-4 m-auto text-center">
        <img class="img-card-top" style="width: 100%; max-height: 200px; object-fit: fill;" src="<?= ( $colegio->imagen )? base_url( RUTA_COLEGIOS . $colegio->colegio_id . '/' .$colegio->imagen): base_url('sources/img/SETAB_COLOR.png') ?>" alt="<?= $colegio->nombre_colegio ?>">
      </div>
      <div class="col-lg-8">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item iframe-placeholder" src="<?= $colegio->mapa ?>" loading="lazy">
          </iframe>
        </div>
      </div>
      <?php endif ?>
      <?php if ( $colegio->pagina_web): ?>
      <div class="col-12 my-3">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item iframe-placeholder" src="<?= $colegio->pagina_web ?>">
          </iframe>
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>
</div>

<style type="text/css" media="screen">
  .iframe-placeholder {
    background: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100% 100%"><text fill="dark" x="50%" y="50%" text-anchor="middle">CARGANDO</text></svg>') 0px 0px no-repeat;
  }
</style>