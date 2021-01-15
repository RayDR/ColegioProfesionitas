<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session
{
	protected $ci;
	/**
	| Contiene usuario_id activo
	| @var	int
	*/
	protected $s_usuario;
	/**
	| Intentos de conexión fallidas
	| @var	int
	*/
	protected $s_icon_fallida = array();
	
	public function __construct(array $params = array())
	{
		parent::__construct();
		$this->ci=& get_instance();
		$this->ci->load->model('model_sistema');

		log_message('debug', "Librería de Sesión inicializada.");
	}
	
	public function establecer_sesion($usuario, $datos = array() ){
		$exito = TRUE;		
		// Eliminar intentos
		$this->var_sesion( 'intentos', FALSE );
		// Asignar el id de usuario
		$this->var_sesion( array('uid' => $usuario) );
		if ( $datos ){ // Almacenar las variables enviadas
			$this->var_sesion( $datos );
		}
		// Verificar el estatus del usuario
		if ( ! $this->estatus_usuario_sesion() )
			$exito = FALSE;
		// Guardar 
		return $exito;
	}

	/**
	| Consulta el estatus del usuario (Estatus en BD y Conexión Local)
	| @return	bool
	**/
	public function estatus_usuario_sesion(){
		$sesion_activa = TRUE;
		if ( $this->has_userdata('ulogin') ) // Si existe la variable de sesión
			$sesion_activa = $this->userdata('ulogin');

		if ( ! $this->has_userdata('uid') )
			$sesion_activa = FALSE;

		if ( $sesion_activa ){
			$sesion_activa 		= FALSE; 	// Desactivar para forzar prueba de BD
			$estatus_usuario 		= $this->ci->model_sistema
													->get_usuario( 
														array( 'usuario_id' => $this->userdata('uid') )
													);
			if ( $estatus_usuario ){
				if ( $estatus_usuario->status_usuario_id == 1 )
					$sesion_activa = TRUE;
				else
					$sesion_activa = FALSE;
			}
		}
		return $sesion_activa;
	}

	/**
	| Límite de conexiónes fallidas
	| @return	bool
	**/
	public function intentos_conexion( $usuario_id ){
		$existe 		= FALSE;
		$intentos 	= MAX_CON_FAIL;

		if ( $this->has_userdata('intentos') )
			$this->s_icon_fallida = $this->userdata('intentos');

		// Revisa que el usuario exista en el arreglo de intentos de conexión
		foreach ($this->s_icon_fallida as $key => $usuario) {
			if ( array_key_exists('id', $usuario) ){
				if ( $usuario["id"] == $usuario_id ){
					$existe = TRUE;					
					$intentos = $usuario["intentos"] -= 1;

					$this->s_icon_fallida[$key]["intentos"] = $intentos;

					if ( $intentos <= 0  ){
						$this->bloquear_usuario( $usuario_id );
						$this->s_icon_fallida[$key]["intentos"] = MAX_CON_FAIL;
						$intentos = 0;
					}

				}
			}
		}
		$this->var_sesion('intentos', FALSE);

		if ( ! $existe ){
			array_push( $this->s_icon_fallida, array('id' => $usuario_id, 'intentos' => MAX_CON_FAIL) );
			$this->var_sesion( array( 'intentos' => $this->s_icon_fallida ) );
		} else
			$this->var_sesion( array( 'intentos' => $this->s_icon_fallida ) );	
		return $intentos;
	}

	/**
	| Bloquear usuario con límite de conexiones fallidas
	| @return	void
	**/
	public function bloquear_usuario( $usuario_id ){
		$exito = TRUE;
		try
		{
			$this->ci->db->trans_begin();

			$this->ci->db->where( 'usuario_id', $usuario_id );
			$this->ci->db->update(	
								'usuarios', 
								array( 
									'bloqueado_el' 		=>	date('Y-m-d H:m:s'),
									'status_usuario_id'	=>	3 // Bloqueado
								));	

			// Bloquear el usuario
			$this->ci->db->trans_commit();
		}
		catch ( Exception $error )
		{
			$this->ci->db->trans_rollback();
			$exito	=	FALSE;
		}
		return $exito;
	}

	/**
	| Establece/Elimina variables de sesión
	|
	| @param	mixed	$variables	Variable o arreglo de variables de sesión
	| @param	bool	$modo		Establecer(True)/Eliminar(False)
	| @return	void
	**/
	private function var_sesion($variables, $modo = TRUE){
		if ( $modo )
			$this->set_userdata( $variables );
		else
			$this->unset_userdata( $variables );
	}
}
