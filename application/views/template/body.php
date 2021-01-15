<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body class="fondo-1">
	<div class="container-fluid content">
		<div id="ajax-html" class="" style="min-height: 100vh;">
		<!-- Vista dinámica -->
		<?php $this->load->view($view);?>
		<!-- Fin vista dinámica -->
		</div>
	</div>

	<?php $this->load->view($template.'modales/modal_generico');?>
	<?php $this->load->view($template.'utiles/toast');?>
	<?php $this->load->view($template.'utiles/chambianding');?>

	<input type="hidden" id="base_url" value="<?=base_url()?>">

	<?php $this->load->view($template.'footer');?>
	<script type="text/javascript" src="<?=base_url('sources/js/utilerias.js')?>?<?= date('dmYHis') ?>"></script>
	<script type="text/javascript" src="<?=base_url('sources/js/speedtest.js')?>?<?= date('dmYHis') ?>"></script>
</body>
</html>
