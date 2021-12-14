<div class="container-fluid">
  <div class="row">
    <div class="col-4 col-xl-3">
      <img class="img-thumbnail border-0" style="width: auto; max-height: 300px; object-fit: fill;" src="<?= ( $colegio->imagen )? base_url( RUTA_COLEGIOS . $colegio->colegio_id . '/' .$colegio->imagen): base_url('sources/img/SETAB_COLOR.png') ?>" alt="<?= $colegio->nombre_colegio ?>">
    </div>
    <div class="col-8 col-xl-9 my-auto">
      <h1 class="h2 texto-rojo"><?= $colegio->nombre_colegio ?></h1>
    </div>
  </div>
</div>

<div class="row align-items-center border-0 rounded-bottom navegacion-mostrar">
  <div id="menul_scroller" class="col bg-light py-lg-3 shadow-sm">
    <nav class="nav justify-content-center ">
      <a class="nav-link px-lg-3 lead" data-spy="scroll" data-target="#acercade" href="#acercade">Acerca de <?= $colegio->nombre_colegio ?></a>
      <!-- <a class="nav-link px-lg-3 lead" data-spy="scroll" data-target="#cultura" href="#cultura">Cultura Institucional</a> -->
      <a class="nav-link px-lg-3 lead" data-spy="scroll" data-target="#contacto" href="#contacto">Contacto</a>
      <a class="nav-link px-lg-3 lead font-weight-bold" href="<?= base_url() ?>"><b>Salir</b></a>
    </nav>
  </div>
</div>

<fieldset id="acercade" class="container-fluid">
  <div class="jumbotron-fluid p-5">
    <div class="container">
      <h4>Presidente: <small><?= $colegio->nombres ?> <?= $colegio->primer_apellido ?> <?= $colegio->segundo_apellido ?></small></h4>
      <hr class="my-4">
      <div class="accordion" id="asociados">
        <div class="card">
          <div class="card-header fondo-dorado-o" id="hAsociados">
            <h2 class="mb-0">
              <button class="btn btn-block btn-link text-left text-white" type="button" data-toggle="collapse" data-target="#tcAsociados" aria-expanded="true" aria-controls="tcAsociados">
                Asociados
              </button>
            </h2>
          </div>          
          <div id="tcAsociados" class="collapse" aria-labelledby="hAsociados" data-parent="#asociados">
            <div class="card-body">
              <div class="table-responsive">
                <table id="dtAsociados" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre Completo</th>
                      <th>Profesión</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($asociados as $key => $asociado): ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $asociado->nombres ?> <?= $asociado->primer_apellido ?> <?= $asociado->segundo_apellido ?></td>
                      <td><?= $asociado->carrera ?></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>  
        </div>
      </div>

        <div class='accordion' id='eventos'>
          <div class="card">
              <div class="card-header fondo-dorado-o" id="hEventos">
                <h2 class="mb-0">
                  <button class="btn btn-block btn-link text-left text-white" type="button" data-toggle="collapse" data-target="#tcEventos" aria-expanded="true" aria-controls="tcEventos">
                    Eventos
                  </button>
                </h2>
              </div>          
              <div id="tcEventos" class="collapse" aria-labelledby="hEventos" data-parent="#eventos">
                <div class="card-body">
                  <!--Navs-->
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-link active" id="nav-activos-tab" data-toggle="tab" href="#nav-activos" role="tab" aria-controls="nav-activos" aria-selected="true">Eventos hoy</a>
                      <a class="nav-link" id="nav-futuros-tab" data-toggle="tab" href="#nav-futuros" role="tab" aria-controls="nav-futuros" aria-selected="false">Eventos próximos</a>
                      <a class="nav-link" id="nav-pasados-tab" data-toggle="tab" href="#nav-pasados" role="tab" aria-controls="nav-pasados" aria-selected="false">Eventos expirados</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-activos" role="tabpanel" aria-labelledby="nav-activos-tab">
                      <!-- eventos activos -->
                        <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Nombre Evento</th>
                              <th>Fecha inicio</th>
                              <th>Fecha conclusión</th>
                          </thead>
                          <tbody>
                          <?php foreach ($eventos as $key => $evento): ?>
                            <tr>
                              <td><?= $evento->nombre_evento ?> </td>
                              <td><?= $evento->fecha_desde ?></td>
                              <td><?= $evento->fecha_hasta ?></td>
                            </tr>
                          <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="nav-futuros" role="tabpanel" aria-labelledby="nav-futuros-tab">
                      <!-- eventos futuros -->
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Nombre Evento</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha conclusión</th>
                                </thead>
                                <tbody>
                                <?php foreach ($futuros as $key => $futuro): ?>
                                  <tr>
                                    <td><?= $futuro->nombre_evento ?> </td>
                                    <td><?= $futuro->fecha_desde ?></td>
                                    <td><?= $futuro->fecha_hasta ?></td>
                                  </tr>
                                <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="nav-pasados" role="tabpanel" aria-labelledby="nav-pasados-tab">
                    <!-- eventos pasados -->
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Nombre Evento</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha conclusión</th>
                                </thead>
                                <tbody>
                                <?php foreach ($expirados as $key => $expirado): ?>
                                  <tr>
                                    <td><?= $expirado->nombre_evento ?> </td>
                                    <td><?= $expirado->fecha_desde ?></td>
                                    <td><?= $expirado->fecha_hasta ?></td>
                                  </tr>
                                <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                    </div>
                  </div>
                  <!-- fin navs -->
                </div>
              </div>  
            </div>
        </div>

    </div>
  </div>
</fieldset>
<fieldset id="cultura" class="container-fluid"></fieldset>
<fieldset id="contacto" class="container-fluid">
  <div class="row justify-content-end">
    <div class="col-6">
      <ul class="list-group text-right">
        <?php foreach ($redes as $key => $red): ?>
        <?php 
          $link = '';
          $logo = ''; 
          switch ($red->red_social_id) {
            case '1':
              $link = 'https://www.facebook.com/' . $red->cuenta;
              $logo = 'fab fa-facebook-square';
              break;
            case '2':
              $link = 'https://www.youtube.com/channel/' . $red->cuenta;
              $logo = 'fab fa-youtube';
              break;
            case '3':
              $link = 'https://www.instagram.com/' . $red->cuenta;
              $logo = 'fab fa-instagram';
              break;
            case '6':
              $link = 'https://twitter.com/' . $red->cuenta;
              $logo = 'fab fa-twitter';
              break;
            default:
              $link = '#';
              break;
          }
        ?>
        <li class="list-group-item border-0">
          <a href="<?=$link?>" class="card-link stretched-link" target="_blank"><span class="<?= $logo ?> fa-3x"></span></a>
        </li>
        <?php endforeach ?> 
      </ul>
    </div>
  </div>
  <?php if ( $colegio->pagina_web ): ?>
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-md-6 d-none d-md-block m-auto">
        <img class="img-thumbnail border-0 text-center" style="width: auto; max-height: 300px; object-fit: fill;" src="<?= ( $colegio->imagen )? base_url( RUTA_COLEGIOS . $colegio->colegio_id . '/' .$colegio->imagen): base_url('sources/img/SETAB_COLOR.png') ?>" alt="<?= $colegio->nombre_colegio ?>">
        <p class="lead"><a href="<?= $colegio->pagina_web ?>" class="card-link stretched-link" target="_blank">Sitio web&nbsp;<i class="fas fa-external-link-alt"></i></a></p>
      </div>
      <div class="col-md-6">
        <div class="col-12 my-3">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item iframe-placeholder" src="<?= $colegio->pagina_web ?>">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>

  <hr class="border borde-dorado mb-0">

  <?php if( $colegio->mapa ): ?>
  <div class="row">
    <div class="col-12 my-3">
      <div class="embed-responsive embed-responsive-21by9" style="max-height: 50vh;">
        <iframe class="embed-responsive-item iframe-placeholder rounded" src="<?= $colegio->mapa ?>" loading="lazy">
        </iframe>
      </div>
    </div>
  </div>
  <?php endif ?>
</fieldset>
<style type="text/css" media="screen">
  .iframe-placeholder {
    background: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100% 100%"><text fill="dark" x="50%" y="50%" text-anchor="middle">CARGANDO</text></svg>') 0px 0px no-repeat;
  }
</style>
<script src="<?= base_url('sources/js/landing.js') ?>?<?= date('dmYHis') ?>"></script>
<script>
  $(document).ready(function(){
    
    $("#dtAsociados").dataTable({
      
      language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        },
        dom: 't<"mb-3"i>p',
        

      });
  })
</script>