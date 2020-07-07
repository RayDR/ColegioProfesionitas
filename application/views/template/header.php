<?php
	$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
	$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
	$this->output->set_header('Pragma: no-cache');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<!-------------------- Declaración de METAS -------------------->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="icon" type="image/png" href="<?=base_url('sources/img/favicon.ico')?>" sizes="64x64">
		<!---------------------- Título Dinámico ----------------------->
		<title><?=$titulo?> | SETAB <?= date('Y') ?></title>
		<!----------------------- Hojas de Estilo ----------------------->
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/lib/Bootstrap-4.4.1/css/bootstrap.css');?>"/>
		<!------------------------- Scripts JS ------------------------->
		<!-- jQuery Js -->
		<script type="text/javascript" src="<?=base_url('sources/lib/JQuery/jquery-3.4.1.js');?>"></script>	
		<!-- Popper Js -->
		<script type="text/javascript" src="<?=base_url('sources/lib/Popper/popper.js');?>"></script>
		<!-- Bootstrap Core JS -->
		<script type="text/javascript" src="<?=base_url('sources/lib/Bootstrap-4.4.1/js/bootstrap.min.js');?>"></script>
		<!-- Fontawesome JS -->
		<script type="text/javascript" src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>

		<!--------------- Menú Lateral --------------->
		<!-- Menú Lateral CSS -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/menu/menu_lateral.css');?>"/>
		<!-- Menú Lateral JS -->
		<script type="text/javascript" src="<?=base_url('sources/js/menu/menu_lateral.js');?>"></script>
		<!--------------- Estilos Globales Personalizados --------------->
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/global.css');?>"/>
	</head>