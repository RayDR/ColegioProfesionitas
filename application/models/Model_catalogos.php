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
				$this->dbC->where($nombre, $valor);
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
				$this->dbC->where($nombre, $valor);
			}
		}
		$this->dbC->where('estado_id', $estado_id);		
		$this->dbC->order_by('d_asenta', 'asc');
		
		$db_datos = $this->dbC->get('codigos_postales');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}
	/**
	|	Función para obtener niveles educativos
	|	@function 	get_cps
	**/
	public function get_niveles($filtros = null, $tipo = TRUE){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->dbC->where($nombre, $valor);
			}
		}		
		
		$db_datos = $this->dbC->get('niveles_educativos');
		if ( $tipo )
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

	public function get_asociados($filtros = null, $tipo = TRUE)
	{
		
		if (is_array($filtros)) {
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$this->db->where('estatus_asociado !=', 5);
		$db_datos = $this->db->get('vw_asociados');
		if ($tipo)
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
	public function get_comunicados($filtros = null, $limite = 0, $tipo = TRUE){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		} else 
		$this->db->where('estatus', 1);

		$limite = ( $limite < 1 )? NULL: $limite;
		
		$db_datos = $this->db->get('vw_comunicados', $limite);
		if ( $tipo )
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}
	
	public function get_carreras($filtros=null,$tipo=true){
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		} else 
		$this->db->where('estatus_carrera', 1);
		
		$db_datos = $this->db->get('carreras');
		if ( $tipo )
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}
	/** 
	|	Función para obtener redes sociales
		@function get_rds
	**/
	public function get_rds($filtros = null, $tipo = TRUE)
	{
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$db_datos=$this->db->get('redes_sociales');
		if($tipo)
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}

	public function get_instituciones($filtros = null, $tipo = TRUE)
	{
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$db_datos=$this->db->get('instituciones');
		if($tipo)
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}

	public function get_estatus_asocioados($filtros = null, $tipo = TRUE)
	{
		if ( is_array($filtros) ){
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$db_datos=$this->db->get('estatus_asociado');
		if($tipo)
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}

	public function get_colegios($filtros = null, $tipo = TRUE)
	{
		if (is_array($filtros)) {
			foreach ($filtros as $nombre => $valor) {
				$this->db->where($nombre, $valor);
			}
		}
		$db_datos = $this->db->get('vw_colegios_redes');
		if ($tipo)
		return $db_datos->result();
		else
		return $db_datos->result_array();
	}

	public function get_colegioss($colegio_id = null, $tipo = TRUE)
	{
		if ( !is_null($colegio_id) )
			$this->db->where('colegio_id', $colegio_id);

		$db_datos = $this->db->get('colegios');

		if ($tipo)
			return $db_datos->result();
		else
			return $db_datos->result_array();
	}

	public function get_colegio_id($colegio_id)
	{
		$this->db->where('colegio_id', $colegio_id);
		$db_datos = $this->db->get('colegios');

		return $db_datos->row();
	}

}


/* End of file model_catalogos.php */
/* Location: ./application/models/model_catalogos.php */
