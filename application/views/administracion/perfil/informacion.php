<div class="container">
   <div class="shadow-lg bg-white p-4">
      <div class="row">
         <div class="col-12">
            <img src="<?= base_url('sources/img/SETAB_COLOR.png') ?>" class="mx-auto d-block" style="width: 60%; height: auto;" alt="">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 form-label-group mx-auto">
            <label for="rfc" class="text-muted"><small>RFC de Asociación</small></label>
            <input id="rfc" type="text" class="form-control" readonly value="<?= $usuario->rfc ?>">
         </div>
         <div class="col-lg-8 form-label-group mx-auto">
            <label for="colegio" class="text-muted"><small>Nombre del Colegio</small></label>
            <input id="colegio" type="text" class="form-control" readonly value="<?= $usuario->nombre_colegio ?>">
         </div>
      </div>
      <legend class="my-3 texto-dorado lead">Información de Contacto</legend>
      <div class="row">
         <div class="col-md-6 form-label-group mx-auto">
            <label for="email" class="text-muted"><small>Email</small></label>
            <input id="mi-email" name="email" type="email" class="form-control" value="<?= $usuario->email ?>">
         </div>
         <div class="col-md-6 form-label-group mx-auto">
            <label for="telefono" class="text-muted"><small>Teléfono</small></label>
            <input id="mi-telefono" name="telefono" type="text" class="form-control util_snumeros" maxlength="10" value="<?= $usuario->telefono ?>">
         </div>
      </div>
      <div class="row mt-4 py-2">
         <div class="col-12">
            <button type="button" id="guardar" class="btn btn-secondary boton-rojo btn-lg">Guardar</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
   $('#guardar').click(function(event) {
      event.preventDefault();
      var datos = {
         'nombres'            : $('#nombres').val(),
         'apellido_paterno'   : $('#apellido_paterno').val(),
         'apellido_materno'   : $('#apellido_materno').val(),
         'email'              : $('#mi-email').val(),
         'telefono'           : $('#mi-telefono').val()
      }
      futil_json_query(url('Administracion/'));
   });
</script>