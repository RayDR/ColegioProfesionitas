<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	private $template	= 'template/';
	private $contenido	= 'template/body_admin';
	private $bcontenido	= 'template/body';

	public function __construct(){
		parent::__construct();
	}

/*
|--------------------------------------------------------------------------
| VISTAS
|--------------------------------------------------------------------------
*/
	public function index(){
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'administracion/dashboard',
			'comunicados'		=>	array()
		);
		$this->load->view( $this->contenido, $data );
	}

	public function acceso(){
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'administracion/acceso',
			'comunicados'		=>	array()
		);
		$this->load->view( $this->bcontenido, $data );
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */