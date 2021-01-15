<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header_admin'); ?>
<body class="fondo-1">
	<!-- Fin Encabezados/Menú -->
	<div id="ajax-html" style="min-height: 100vh;">
		<!-- Vista dinámica -->
		<?php $this->load->view($view);?>
		<!-- Fin vista dinámica -->
	</div>
	<?php $this->load->view($template.'footer');?>

	<?php $this->load->view($template.'modales/modal_generico');?>
	<?php $this->load->view($template.'utiles/toast');?>	
	<?php $this->load->view($template.'utiles/back_to_top');?>
	<?php $this->load->view($template.'utiles/chambianding');?>

	<input type="hidden" id="base_url" value="<?=base_url()?>">
	
	<script type="text/javascript" src="<?=base_url('sources/js/utilerias.js')?>?<?= date('dmYHis'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('sources/js/administracion/panel_control.js') ?>?<?= date('dmYHis') ?>"></script>
</body>
</html>

