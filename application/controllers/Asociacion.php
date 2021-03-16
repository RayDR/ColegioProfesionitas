<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asociacion extends CI_Controller {		
	private $template		= 'template/';
	private $contenido	= 'template/body_admin';
	private $bcontenido	= 'template/body';

	public function __construct(){
		parent::__construct();
		$this->load->model('model_sistema');
		if ( ! $this->session->estatus_usuario_sesion() )
			redirect(base_url(),'refresh');
	}

/*
|--------------------------------------------------------------------------
| VISTAS
|--------------------------------------------------------------------------
*/
	public function index(){
		$usuario 	= $this->session->userdata('uid');
		$data = array(
			'titulo'			=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'administracion/dashboard',
			'comunicados'		=>	array(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		$this->load->view( $this->contenido, $data );
	}


}

/* End of file Asociacion.php */
/* Location: ./application/controllers/Asociacion.php */