<div class="pb-4 rounded">	
	<nav aria-label="breadcrumb" style="margin: 0; !important">
	    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
	        <li class="breadcrumb-item"><a href="<?= base_url(HOME_ADM) ?>"><span class="fas fa-home"></span></a></li>
	        <li class="breadcrumb-item active" aria-current="page"><?= $titulo_pagina ?></li>
	    </ol>
	</nav>
</div>
<div class="container">
	<div class="pb-4">
		<div class="btn-group" role="group" aria-label="Botones de Acción">
		    <button id="asociado-agregar" class="btn btn-secondary boton-rojo" disabled>
		        <span class="fas fa-plus"></span><span class="d-none d-md-inline">&nbsp;Agregar Asociado</span>
		    </button>
		</div>
	</div>
	<div class="alert alert-secondary mb-3"><b class="text-danger">*</b>&nbsp;Todo cambio al registro de asociados debe ser aprobado por la Dirección de Profesiones. Puede consultar el estatus de su solicitud en el listado debajo.</div>
	<div class="table-responsive">
		<table id="dtAsociados" class="table table-hover bg-light ">
			<thead>
			<tr>
				<th>CURP</th>
				<th>Nombre Completo</th>
				<th>Profesión</th>
				<th>Cédula</th>
				<th>Fecha de Incorporación</th>
				<th>Contacto</th>
			</tr>
			</thead>
		</table>
	</div>
</div>

<script src="<?= base_url('sources/js/administracion/asociados.js') ?>?v1.0" type="text/javascript" charset="utf-8" async defer></script>