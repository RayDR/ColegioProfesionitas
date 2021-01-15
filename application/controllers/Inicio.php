<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	private $template	= 'template/';
	private $contenido	= 'template/body_landing';

	public function __construct(){
		parent::__construct();
		$this->load->model('model_catalogos');
		$this->load->model('model_colegios');
		$this->load->model('model_sistema');
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
			'view'				=>	'index',
			'comunicados'		=>	array(),
		);
		$this->load->view( $this->contenido, $data );
	}

	public function registro(){
      $respuesta  = ['exito' => true];
		$data=array(
			'view'				=>	'registro',
			'municipios'		=>	$this->model_catalogos->get_municipios(),
			'colonias'			=>	$this->model_catalogos->get_cps()
		);
		$respuesta["html"] = $this->load->view( $data["view"] , $data, TRUE );
      return print(json_encode($respuesta));
	}

/*
|--------------------------------------------------------------------------
| FUNCTIONES AJAX
|--------------------------------------------------------------------------
*/
	public function guardar_preregistro(){
		$datos 		= $this->input->post();
		$respuesta 	= $this->model_colegios->solicitud_registro($datos);
		return print(json_encode($respuesta));
	}

	public function acceder(){
      $respuesta = array(
         'exito'     =>  FALSE,
         'mensaje'   =>  ''
      );
		$email 		= $this->input->post('correo_electronico');
		$password 	= $this->input->post('password');

      $db_usuario	= $this->model_sistema->get_usuario_acceso($email);
      if ( $db_usuario ) 
      {  // Comprobación de usuario
         if ( $db_usuario->status_usuario_id != 1 )
         {  // Usuario no Activo
            switch ( $db_usuario->status_usuario_id ) 
            {
               case 2:  // Usuario no inactivo
                  $respuesta["mensaje"] = "<b>El usuario está inactivo.</b><br><small>Pongase en contacto con la administración para reactivar su cuenta.</small>";
                  break;
               case 3:  // Usuario bloqueado
                  $respuesta["mensaje"] = "<b>El usuario ha sido bloqueado.</b><br><small>Por favor, solicite la ayuda de la administración para desbloquearlo.</small>";
                  break;
               default:  // Opción no controlada
                  $respuesta["mensaje"] = "<b>No se pudo obtener el estatus de su usuario. </b><br><small>Por favor, solicite asistencia al administrador del sistema.</small>";
                  break;
            }
         } else if ( password_verify( $password, $db_usuario->password ) )
         {  // Todo correcto - Permitir Login
            $array_login = array('ulogin' => TRUE);
            if ($this->session->establecer_sesion($db_usuario->usuario_id, $array_login))
            {
               $respuesta["exito"]     =   TRUE;
               $respuesta["last_cnx"]  =   $this->model_sistema->set_ultima_conexion( $db_usuario->usuario_id );
               $respuesta["usuario"]   =   array(  'value' =>  $db_usuario->usuario_id, 
                                                   'name'  =>  'usuario_id' );
               $respuesta["mensaje"]   =   "<b>Acceso concedido.</b>";
            } else 
               $respuesta["mensaje"]   =   "<b>No fue posible crear la sesión del usuario</b>. Intente nuevamente.";
         } 
         else
         {
            $respuesta["mensaje"]   =   "<b>La combinación de usuario y contraseña no son correctas.</b>";                        
            $respuesta["intentos"]  =   $this->session->intentos_conexion($db_usuario->usuario_id);
         }
      } else
         $respuesta["mensaje"]   =   "<b>El usuario ingresado no existe.</b>";
      return print( json_encode($respuesta) );
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */