<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	private $template	= 'template/';
	private $contenido	= 'template/body';
	private $landingContenido	= 'template/body_landing';

	public function __construct(){
		parent::__construct();
	}

	/** *******************  VISTAS  ****************** **/

	public function index(){
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'landing'
		);
		$this->load->view( $this->landingContenido, $data );
	}

	public function cp(){
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'inicio'
		);
		$this->load->view( $this->contenido, $data );
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */