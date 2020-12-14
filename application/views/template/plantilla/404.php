<div class="row align-items-center fondo-rojo py-1">
	<div class="col-12">					
		<h1 class="text-center text-white"><?= SISTEMA ?></h1>
	</div>
</div>
<?php $this->load->view($template.'menu_superior');?>
<div class="jumbotron fondo-dorado-o mt-3">
  <h1 class="display-4 text-center font-weight-bold">PÁGINA NO ENCONTRADA</h1>
  <h2 class="display-1 text-center texto-rojo font-weight-bold">404</h2>
  <p class="lead text-center font-weight-bold">LA PAGÍNA QUE ESTABAS BUSCANDO NO EXISTE O NO ESTÁ DISPONIBLE EN ESTE MOMENTO.</p>
  <hr class="my-4 borde-rojo">
  <div class="text-center mx-auto">
	  <a class="btn btn-secondary btn-lg boton-rojo" href="<?= base_url() ?>" role="button">VOLVER A INICIO</a>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function($) {
		loader(false);
	});
</script>