<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_catalogos extends CI_Model {

/*
|--------------------------------------------------------------------------
| Consultas de Sistema
|--------------------------------------------------------------------------
*/
	private $dbC = NULL; 
	public function __construct()
	{
		parent::__construct();
		$this->dbC = $this->load->database('catalogos', TRUE);
	}

	/**
	|	Función para obtener paises
	|	@function 	get_paises
	**/
	public function get_paises($tipo = TRUE){
		$db_datos = $this->dbC->get('paises');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

	/**
	|	Función para obtener estados
	|	@function 	get_estados
	**/	
	public function get_estados($pais_id = 153, $tipo = TRUE){
		$this->dbC->where('pais_id', $pais_id);

		$db_datos = $this->dbC->get('estados');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

	/**
	|	Función para obtener municipios
	|	@function 	get_municipios
	**/
	public function get_municipios($estado_id = 2563, $filtros = null, $tipo = TRUE){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$this->dbC->where('estado_id', $estado_id);

		$db_datos = $this->dbC->get('municipios');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

	/**
	|	Función para obtener códigos postales
	|	@function 	get_cps
	**/
	public function get_cps($estado_id = 2563, $filtros = null, $tipo = TRUE){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$this->dbC->where('estado_id', $estado_id);
		$db_datos = $this->dbC->get('codigos_postales');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

/*
|--------------------------------------------------------------------------
| CONSULTAS PERSONALIZADAS
|--------------------------------------------------------------------------
*/

	/**
	|	Función para obtener los comunicados
	**/
	public function get_comunicados($filtros = null, $tipo = TRUE){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		} else 
			$this->db->where('estatus', 1);
		
		$db_datos = $this->db->get('vw_comunicados');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

}

/* End of file model_catalogos.php */
/* Location: ./application/models/model_catalogos.php */