<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header_landing'); ?>

<body>
	<!-- Vista dinámica -->
	<?php $this->load->view($view);?>
	<!-- Fin vista dinámica -->

	<!-- Modal-mensajes -->
<?php $this->load->view($template.'modales');?>
	<!-- Fin Modal-mensajes -->

	<!-- Back To Top -->
	<span class="back-to-top fa fa-arrow-circle-up" data-title="Volver arriba" data-toggle="tooltip" data-placement="left"></span>
	<!-- Fin Back To Top -->

	<!-- Loader -->
	<div id="loader-background"></div>
	<div id="loader"></div>
	<!-- Fin Loader -->
	
	<!-- URL Web -->
	<input type="hidden" id="base_url" value="<?=base_url()?>">

<?php $this->load->view($template.'footer');?>
	<script type="text/javascript" src="<?=base_url()?>sources/js/utilerias.js"></script>
</body>

</html>

