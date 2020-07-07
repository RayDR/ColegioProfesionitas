<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body>
	<div class="page-wrapper chiller-theme toggled">
		<!-- Menú lateral -->
		<?php $this->load->view($template.'menu_lateral'); ?>
		<!-- Fin Encabezados/Menú -->
		<!-- Vista dinámica -->
		<?php $this->load->view($view);?>
		<!-- Fin vista dinámica -->
	</div>

	<!-- Modal-mensajes -->
<?php $this->load->view($template.'modales');?>
	<!-- Fin Modal-mensajes -->

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

