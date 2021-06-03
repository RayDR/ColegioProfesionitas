<div class="card">
  <?php if ( $colegio->imagen ): ?>
  <img src="<?= base_url( RUTA_COLEGIOS . $colegio->colegio_id . $colegio->imagen) ?>" class="card-img-top" alt="<?= $colegio->nombre_colegio ?>">
  <?php else: ?>
  <img src="<?= base_url('sources/img/SETAB_COLOR.png') ?>" class="card-img-top" alt="<?= $colegio->nombre_colegio ?>">
  <?php endif ?>
  <div class="card-body fondo-cuadros fondo-2">
    <h5 class="card-title text-center h4 texto-rojo"><?= $colegio->nombre_colegio ?></h5>
    <div class="row">
      <?php if ( $colegio->pagina_web): ?>
      <div class="col-12">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item iframe-placeholder" src="<?= $colegio->pagina_web ?>">
          </iframe>
        </div>
      </div>
      <?php endif ?>
      <?php if( $colegio->mapa ): ?>
      <div class="col-12">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item iframe-placeholder" src="<?= $colegio->mapa ?>" loading="lazy">
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