<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sistema extends CI_Model {

	/**
	|	Función para consultar la tabla de usuarios
	|	@function 	get_usuario
	|	@access 	public
	|	@param 		array() $filtros 	->	Recibe un arreglo de filtrados
	|	@param 		boolean $tipoArray 	->	False/True = (Objetos/Arreglo)
	|	@return 	object|array	
	**/
	public function get_usuario( $filtros = array(), $tipoArray = FALSE )
	{
		if ( $filtros )
		{
			foreach ($filtros as $key => $filtro) { 
				$this->db->where( $key, $filtro );
			}
		}

		$db_usuario = $this->db->get('vw_usuarios');

		switch ( $db_usuario->num_rows() ) {
			case 1:
				if ( ! $tipoArray )	// Objeto único
					$respuesta = $db_usuario->row();
				else 				// Arreglo único
					$respuesta = $db_usuario->result();
				break;			
			default:
				if ( ! $tipoArray )	// Arreglo de Objetos
					$respuesta = $db_usuario->result();
				else 				// Arreglo Multidimensional
					$respuesta = $db_usuario->result_array();
				break;
		}
		return $respuesta;
	}

	/**
	| 	Función para retornar un usuario de acuerdo a su ID
	|	@function 	get_usuario_id
	|	@access 	public
	|	@param 		string 	$usuario
	|	@param 		int 	$acceso
	|	@return 	object|array
	**/
	public function get_usuario_acceso($usuario){
		$db_usuario = $this->get_usuario( array( 'rfc' => $usuario ) );
		return $db_usuario;
	}

	/**
	|	Función para actualizar la última conexión de un usuario
	|	@function 	set_ultima_conexion
	|	@access 	public
	|	@param 		varchar|integer $usuario_id
	|	@return 	boolean	
	**/
	public function set_ultima_conexion( $usuario_id )
	{
		$exito = FALSE;
		try
		{
			$this->db->trans_begin();
			$this->db->where( 'usuario_id', $usuario_id );

			$this->load->library('Navegador');
			if ( 
				$this->db->
						update(
							'usuarios', 
							array(
								'fecha_ultima_conexion'		=>	date('Y-m-d H:m:s'),
								'ip_ultima_conexion'		=>	$this->input->ip_address(),
								'navegador_ultima_conexion'	=>	$this->navegador->obtener_detalles()
							)
						) 
			)
				$exito = TRUE;
			
			$this->db->trans_commit();
		}
		catch ( Exception $error )
		{
			$this->db->trans_rollback();
		}
		return $exito;
	}

}

/* End of file model_sistema.php */
/* Location: ./application/models/model_sistema.php */