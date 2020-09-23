<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	private $template	= 'template/';
	private $contenido	= 'template/body_landing';

	public function __construct(){
		parent::__construct();
	}

	/** *******************  VISTAS  ****************** **/

	public function index(){
		$data=array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'index',
			'comunicados'		=>	array()
		);
		$this->load->view( $this->contenido, $data );
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */