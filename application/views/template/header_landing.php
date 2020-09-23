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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<!------------------------- Scripts JS ------------------------->
		<!-- jQuery Js -->
		<script type="text/javascript" src="<?=base_url();?>sources/lib/JQuery/jquery-3.4.1.js"></script>
		<!-- Popper Js -->
		<script type="text/javascript" src="<?=base_url();?>sources/lib/Popper/popper.js"></script>
		<!-- Bootstrap Core JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>

		<!--------------- Estilos Globales Personalizados --------------->
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/global.css');?>"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/landing.css');?>"/>
		<!--------------- Scripts Globales Personalizados --------------->
		<script type="text/javascript" src="<?=base_url('sources/js/encodeB64.js');?>"/></script>
	</head>