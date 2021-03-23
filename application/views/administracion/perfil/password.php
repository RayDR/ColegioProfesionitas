<div class="container">
   <div class="shadow-lg bg-white p-5">
   		<div class="row">
			<div class="col-md-10 mx-auto">
				<?php $this->load->view('template/utiles/alertas'); ?>
			</div>
			<div class="col-md-10 form-label-group mx-auto">
				<label for="password" class="text-muted"><small>Contraseña Actual</small></label>
				<div class="input-group">
					<input id="password" type="password" class="form-control" required autofocus autocomplete="off">

					<div class="input-group-append">
						<span class="muestra-password input-group-text text-white fondo-verde-o">
							<small class="fa fa-eye"></small>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 form-label-group mx-auto">
				<label for="nueva_password" class="text-muted"><small>Nueva Contraseña</small></label>
				<div class="input-group">
					<input id="nueva_password" type="password" class="form-control" required autofocus autocomplete="off">
					<div class="input-group-append">
						<span class="muestra-password input-group-text text-white fondo-verde-o">
							<small class="fa fa-eye"></small>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row my-2 py-2 shadow-sm no-gutters">
			<div class="col-10 mx-md-auto">
				<label id="clave_longitud" class="text-danger my-0">
					<small>
						<span class="fa fa-close"> Debe ser mayor a 6 caracteres</span>
					</small>
				</label>
			</div>
			<div class="col-10 mx-md-auto">
				<label id="clave_mayuscula" class="text-danger my-0">
					<small>
						<span class="fa fa-close"> Incluir mayúscula</span>
					</small>
				</label>
			</div>
			<div class="col-10 mx-md-auto">
				<label id="clave_minuscula" class="text-danger my-0">
					<small>
						<span class="fa fa-close"> Incluir minúscula</span>
					</small>
				</label>
			</div>
			<div class="col-10 mx-md-auto">
				<label id="clave_numero" class="text-danger my-0">
					<small>
						<span class="fa fa-close"> Incluir número</span>
					</small>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 form-label-group mx-auto">
				<label for="repetir_password" class="text-muted"><small>Repita Contraseña</small></label>
				<div class="input-group">
					<input id="repetir_password" type="password" class="form-control" required autofocus autocomplete="off">
					<div class="input-group-append">
						<span class="muestra-password input-group-text text-white fondo-verde-o">
							<small class="fa fa-eye"></small>
						</span>
					</div>
				</div>
			</div>
		</div>
   </div>
</div>