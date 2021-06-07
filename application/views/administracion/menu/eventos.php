<!-- AlloyUI JS -->
<script src="<?= base_url('vendor/alloyui_3.0.1/build/aui/aui-min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
<link type="text/css" href="<?= base_url('sources/css/alloyui.css') ?>" rel="stylesheet">
<!-- Global CSS -->
<link href="<?= base_url('sources/css/global.css') ?>" rel="stylesheet" />

<script type="text/javascript" charset="utf-8">
	var eventos = <?= json_encode($eventos, JSON_HEX_TAG); ?>;
</script>
<div class="pb-4 rounded">	
	<nav aria-label="breadcrumb" style="margin: 0; !important">
	    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
	        <li class="breadcrumb-item"><a href="<?= base_url(HOME_ADM) ?>"><span class="fas fa-home"></span></a></li>
	        <li class="breadcrumb-item active" aria-current="page"><?= $titulo_pagina ?></li>
	    </ol>
	</nav>
</div>
<div class="container">
	<legend>PRÓXIMAMENTE</legend>
	<div class="pb-4">
		<div class="btn-group" role="group" aria-label="Botones de Acción">
		    <button id="evento-crear" class="btn btn-secondary boton-rojo" disabled>
		        <span class="fas fa-plus"></span><span class="d-none d-md-inline">&nbsp;Nuevo Evento</span>
		    </button>
		    <button id="evento-buscar" class="btn btn-dark" type="button" disabled>
		        <span class="fas fa-search"></span><span class="d-none d-md-inline">&nbsp;Buscar Evento</span>
		    </button>
		</div>
	</div>
	<div id="wrapper" class="bg-white">
		<div id="eventos"></div>
	</div>
</div>

<script src="<?= base_url('sources/js/administracion/eventos.js') ?>?v1.0" type="text/javascript" charset="utf-8" async defer></script>