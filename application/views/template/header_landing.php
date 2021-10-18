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
		<meta name="keywords" content="Gobierno del Estado de Tabasco,Secretaría de Educación,Registro de Profesiones,Títulos Electrónicos" />
		<meta name="rights" content="Secretaría de Educación del Estado de Tabasco 2020 © - Todos los derechos reservados" />
		<meta name="description" content="Sistema Estatal de Registro de Profesiones - Secretaría de Educación Tabasco - Gobierno del Estado de Tabasco" />

		<link rel="icon" type="image/png" href="<?=base_url('sources/img/favicon.ico')?>" sizes="64x64">
		<!---------------------- Título Dinámico ----------------------->
		<title><?=$titulo?></title>
		<!----------------------- Hojas de Estilo ----------------------->
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>

		<!------------------------- Scripts JS ------------------------->
		<!-- jQuery Js -->
		<script type="text/javascript" src="<?=base_url('sources/lib/JQuery/jquery-3.4.1.js');?>"></script>	
		<!-- Popper Js -->
		<script type="text/javascript" src="<?=base_url('sources/lib/Popper/popper.js');?>"></script>
		<!-- Datatable JS -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>
		<!-- Bootstrap Core JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>
		<!--------------- Estilos Globales Personalizados --------------->
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/global.css');?>?<?= date('dmYHis') ?>"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('sources/css/landing.css');?>?<?= date('dmYHis') ?>"/>
		<!--------------- Scripts Globales Personalizados --------------->
		<script type="text/javascript" src="<?=base_url('sources/js/encodeB64.js');?>?<?= date('dmYHis') ?>"/></script>
	</head>