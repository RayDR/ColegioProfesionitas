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
		$this->load->model('model_colegios');
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

	public function listar_cps($municipio_id){
		$respuesta = array('exito' => true);
		$data = array(
			'view'				=>	'ajax/codigos_postales',
			'codigos_postales'  =>	$this->model_catalogos->get_cps(2563,['municipio_id'=>$municipio_id])
		);
		$respuesta['html']=$this->load->view( $data['view'], $data, TRUE );
		return print(json_encode($respuesta));
	}

	public function listar_rds()
	{
		$respuesta=array('exito'=>true);
		$data=array(
			'view'				=>'ajax/redes_sociales',
			'redes_sociales'	=>$this->model_catalogos->get_rds()
		);
		$respuesta['html']=$this->load->view($data['view'],$data,TRUE);
		return print(json_decode($respuesta));
	}

	public function logout(){
      // Eliminar datos de sesión
      $this->session->sess_destroy();
      redirect( base_url(),'refresh' );
   }

   public function menu(){
   	$respuesta 	= ['exito' => true];
   	$link		= $this->input->post('link');
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

	public function vista_form_solicitud_modal(){
		$json = array('exito' => TRUE);
		$json['html'] = $this->load->view( 'administracion/registro', null, TRUE );
		return print(json_encode($json));
	}

	public function guardar_registro()
	{		
		$json  = array('exito' => TRUE);
		$asociacion = $this->input->post('asociacion');
		$colegio 	= $this->input->post('colegio');
		$redes_sociales=$this->input->post('redes_sociales');

		if ( $asociacion && $colegio ){
			// Registro	
			$respuesta = $this->model_colegios->registrar_asociacion($asociacion,$colegio,$redes_sociales);
			$json['exito'] = $respuesta['exito'];
			if ( ! $json['exito'] )
				$json['mensaje'] = $respuesta['error'];

		} else {
			$json['exito']   = FALSE;
			$json['mensaje'] = 'No se encontraron datos';
		}
		return print(json_encode($json));
	}

	public function guardar_asociado(){
		$json	=	array('exito'=>TRUE);
		$asociado=$this->input->post('asociado');

		if($asociado){
			$json['modelo']=$this->model_colegios->registrar_asociado($asociado);
		}else {
			$json['exito']=FALSE;
			$json['mensaje']='No se encontraron datos';
			$json['datos']=$asociado;
		}
		return print(json_encode($json));
	}
	public function get_colegios_ajax(){
		$json= $this->model_catalogos->get_colegios();
		return print(json_encode($json));
	}

	public function get_solicitudes_ajax(){		
		$this->load->model('model_solicitudes');
		$json= $this->model_solicitudes->get_solicitudes_registro();
		return print(json_encode($json));
	}

	public function actualizar_solicitud(){
		$this->load->model('model_solicitudes');
		$json           = array('exito'=>TRUE);
		$solicitud_id   = $this->input->post('solicitud');
		$estatus_id     = $this->input->post('estatus');

		if ( $solicitud_id && $estatus_id ){
			// Validar estatus
			$db_solicitud = $this->model_solicitudes ->get_solicitudes_registro(
								['solicitud_registro_id' => $solicitud_id] );
			if ( $db_solicitud ){
				$datos = $db_solicitud[0];
				if ( $datos->estatus != 'Aprobado' ){
					if ( ! $this->model_solicitudes->set_estatus_solicitud($solicitud_id, $estatus_id) ){
						$json['exito']		= FALSE;
						$json['mensaje']	= 'No fue posible actualizar la solicitud.';
					}
				}
				else {
					$json['exito']		= FALSE;
					$json['mensaje']	= 'No se puede actualizar un solicitud previamente Aprobada.';
				}					
			} else {
				$json['exito']		= FALSE;
				$json['mensaje']	= 'Solicitud inexistente.';
			}
		} else {
			$json['exito']		= FALSE;
			$json['mensaje']	= 'No se encontraron datos';
		}
		return print( json_encode($json) );
	}

	public function modal_colegio()
	{
		$json	=	array('exito' => TRUE);

		$datos=$this->input->post();
		$json['html']	=	$this->load->view('administracion/colegio_detalles',['datos'=>$datos],true);
		return print(json_encode($json));
	}

	public function modal_aprobar_solicitud($solicitud_id){
		if ( $this->session->estatus_usuario_sesion( [1,2,3] ) == FALSE )
			return $this->vista_tablero();
		$this->load->model('model_solicitudes');
		$usuario = $this->session->userdata('uid');
		$json	=	array('exito' => TRUE);
		$data = array(
			'view'				=> 'administracion/registro_solicitud',
			'datos'				=> $this->model_solicitudes->get_solicitudes_registro(
										['solicitud_registro_id' => $solicitud_id]
									),
			'municipios'		=> $this->model_catalogos->get_municipios(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
			'redes_sociales'	=> $this->model_catalogos->get_rds()
		);
		$json['html'] = $this->load->view( $data["view"], $data, TRUE );
		return print(json_encode($json));
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
			'usuario'			=> 	$this->model_sistema->get_usuario(['usuario_id' => $usuario]),
			'colegios'			=>	$this->model_catalogos->get_colegios()
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_registro(){
		if ( $this->session->estatus_usuario_sesion( [1,2,3] ) == FALSE )
			return $this->vista_tablero();
		
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/registro',
			'municipios'		=>	$this->model_catalogos->get_municipios(),
			'usuario'			=> $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
			'redes_sociales'	=>$this->model_catalogos->get_rds()
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_solicitudes(){
		if ( $this->session->estatus_usuario_sesion( [1, 2, 3] ) == FALSE )
			return $this->vista_tablero();
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'				=>	'administracion/solicitudes',
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}

	protected function vista_perfil(){
		$usuario = $this->session->userdata('uid');
		$data = array(
			'view'					=>	'administracion/perfil',
			'carreras'				=>	$this->model_catalogos->get_carreras(),
			'usuario'				=>	$this->model_sistema->get_usuario(['usuario_id' => $usuario]),
			'niveles'				=>	$this->model_catalogos->get_niveles(),
			'instituciones'			=> 	$this->model_catalogos->get_instut(),
			'estatus_asociados'		=>	$this->model_catalogos->get_estatus_asocioados(),
			'asociados_list'		=>	$this->model_catalogos->get_asociados()
		);
		return $this->load->view( $data["view"], $data, TRUE );
	}



}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */
