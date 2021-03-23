<div class="container">
   <?php print_r($this->session->userdata()); ?>
   <br>
   <?php print_r($usuario); ?>
   <div class="shadow-lg bg-white p-4">
      <div class="picture-container text-center">
         <div class="picture">
            <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" class="img-thumbnail picture-src" id="imagen-perfil" style="max-height: 250px; max-width: 280px;">
            <input type="file" id="cambiar-imagen-perfil" accept="image/*">
         </div>
         <label for="cambiar-imagen-perfil" class="h6">Cambiar imagen</label>
         <br>
         <i class="text-muted small">( Tamaño máximo 1MB )</i>
      </div>
      <div class="row">
         <div class="col-lg-4 form-label-group mx-auto">
            <label for="rfc" class="text-muted"><small>RFC de Asociación</small></label>
            <input id="rfc" type="text" class="form-control" readonly value="">
         </div>
         <div class="col-lg-8 form-label-group mx-auto">
            <label for="colegio" class="text-muted"><small>Nombre del Colegio</small></label>
            <input id="colegio" type="text" class="form-control" readonly value="">
         </div>
      </div>
      <legend class="my-3 texto-dorado lead">Datos del Representante</legend>
      <div class="row">
         <div class="col form-label-group mx-auto">
            <label for="nombres" class="text-muted"><small>Nombre(s)</small></label>
            <input id="nombres" name="nombres" type="text" class="form-control"  value="">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 form-label-group mx-auto">
            <label for="apellido_paterno" class="text-muted"><small>Primer Apellido</small></label>
            <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" value="">
         </div>
         <div class="col-lg-6 form-label-group mx-auto">
            <label for="apellido_materno" class="text-muted"><small>Segundo Apellido</small></label>
            <input id="apellido_materno" name="apellido_materno" type="text" class="form-control" value="">
         </div>
      </div>
      <legend class="my-3 texto-dorado lead">Información de Contacto</legend>
      <div class="row">
         <div class="col-md-6 form-label-group mx-auto">
            <label for="email" class="text-muted"><small>Email</small></label>
            <input id="email" name="email" type="email" class="form-control" value="">
         </div>
         <div class="col-md-6 form-label-group mx-auto">
            <label for="telefono" class="text-muted"><small>Teléfono</small></label>
            <input id="telefono" name="telefono" type="text" class="form-control util_snumeros" maxlength="10" value="">
         </div>
      </div>
   </div>
</div>