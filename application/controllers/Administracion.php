<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	private $template		= 'template/';
	private $contenido	= 'template/body_admin';
	private $bcontenido	= 'template/body';

	public function __construct(){
		parent::__construct();
		$this->load->model('model_sistema');
		$this->load->model('model_catalogos');
	}

/*
|--------------------------------------------------------------------------
| VISTAS
|--------------------------------------------------------------------------
*/
	public function index(){		
		if ( ! $this->session->estatus_usuario_sesion() )
			redirect(base_url(),'refresh');
		
		$usuario 	= $this->session->userdata('uid');
		$data = array(
			'titulo'				=>	'Bienvenido a ' . SISTEMA,
			'template'			=>	$this->template,
			'view'				=>	'administracion/dashboard',
			'comunicados'		=>	$this->model_catalogos->get_comunicados(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		$this->load->view( $this->contenido, $data );
	}

	public function logout(){
      // Eliminar datos de sesión
      $this->session->sess_destroy();
      redirect( base_url(),'refresh' );
   }

   public function menu(){
   	$respuesta 	= ['exito' => true];
   	$link			= $this->input->post('link');
   	switch ($link) {
   		case 'dashboard':
   			$respuesta["html"] = $this->vista_tablero();
   			break;
   		case 'registrar':
   			$respuesta["html"] = $this->vista_registro();
   			break;
   		case 'solicitudes':
   			$respuesta["html"] = $this->vista_solicitudes();
   			break;
   		case 'perfil':
   			$respuesta["html"] = $this->vista_perfil();
   			break;   		
   		default:
   			$respuesta["exito"] = false;
   			break;
   	}
		if ( ! $this->session->estatus_usuario_sesion() ) {
			$respuesta["exito"] = false;
			$respuesta["error"] = 'ACCESS';
		}
   	return print(json_encode($respuesta));
   }

/*
|--------------------------------------------------------------------------
| VISTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

	protected function vista_tablero(){
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/tablero',
			'comunicados'		=>	$this->model_catalogos->get_comunicados(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_registro(){
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/registro',
			'comunicados'		=>	$this->model_catalogos->get_comunicados(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_solicitudes(){
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/solicitudes',
			'comunicados'		=>	$this->model_catalogos->get_comunicados(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_perfil(){
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/perfil',
			'comunicados'		=>	$this->model_catalogos->get_comunicados(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario])
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */