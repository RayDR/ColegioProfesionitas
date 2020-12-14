<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficas
{
	// Utilizado con https://www.chartjs.org/
	protected $ci;

	// Almacena la configuración dada de un objeto
	private $config	= array();

	// Configuraciones de gráficas por defecto
	private $tipo		= "line";
	private $tension	= "0.4";

	// Variables de configuración
	private $data 		= array();
	private $opciones	= array();


	public function __construct($opciones = NULL)
	{
        $this->ci =& get_instance();

        $this->opciones = array(
			'responsive'	=> TRUE,
			'tooltips'		=> array( 'mode' => 'index', 'intersect' => FALSE ),
			'hover'			=> array( 'mode' => 'nearest', 'intersect' => TRUE ),
			'elements'		=> array( 'line' => array('tension' => 0.4) )
		);

		if ( $opciones )
			$this->set_opciones($opciones);

        $this->config = array(
			'type' 		=> $this->tipo,
			'options'	=> $this->opciones
		);
	}

	public function crear_grafica( $tipo = NULL, $data = [], $opciones = [] )
	{
		if ( $opciones )
			$this->set_opciones( $opciones );
		if ( $data )
			$this->set_data( $data );
		
		$this->config = array(
			'type' 		=> ( $tipo )? $tipo: $this->tipo,
			'data'		=> $this->data,
			'options'	=> $this->opciones
		);
		return $this->config;
	}

	/**
	|	Función que establece las configuraciones para las gráficas
	|
	*/
	public function set_opciones($opciones)
	{
		if ( is_array($opciones) )
		{
			foreach ($opciones as $key => $opcion) 
			{
				$this->opciones[$key] = $opcion;
			}
		}
		return TRUE;
	}

	/**
	|	Función que establece datos de la gráfica
	|
	*/
	public function set_data($data)
	{
		$exito = TRUE;
		if ( is_array($data) )
			$this->data = $data;
		else
			$exito = FALSE;
		return $exito;
	}

	/**
	|	Función que modifica atributos de un indice de los datos a graficar
	|
	*/
	public function config_data($configData)
	{
		if ( $this->config )
		{
			if ( 
				array_key_exists('datasets', $this->config ) 
				&&
				array_key_exists('label', $configData )
			)
			{
				foreach ( $this->config["datasets"] as $indice => $datasets) {
					if ( $configData['label'] == $datasets['label'] ){
						foreach ($configData as $key => $nuevaConfig) {
							$datasets[$key] = $nuevaConfig;
						}
						$this->data["datasets"][$indice] = $datasets;
					}
				}
			}
		}
		if ( $this->data )
		{
			if ( 
				array_key_exists('datasets', $this->data ) 
				&&
				array_key_exists('label', $configData )
			)
			{
				foreach ( $this->data["datasets"] as $indice => $datasets) {
					if ( $configData['label'] == $datasets['label'] ){
						foreach ($configData as $key => $nuevaConfig) {
							$datasets[$key] = $nuevaConfig;
						}
						$this->data["datasets"][$indice] = $datasets;
					}
				}
			}
		}
		return $this->data;
	}

}

/* End of file Graficas.php */
/* Location: ./application/libraries/Graficas.php */
