<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navegador
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function obtener_detalles(){
		$this->ci->load->library('user_agent');

		if ( $this->ci->agent->is_browser() )
			$navegador = $this->ci->agent->browser().' '.$this->ci->agent->version();
		else if ( $this->ci->agent->is_robot() )
			$navegador = $this->agent->robot();
		else if ( $this->ci->agent->is_mobile() )
			$navegador = $this->ci->agent->mobile();
		else
			$navegador = 'Agente no identificado';

		return $this->ci->agent->platform() . " " . $navegador;
   }

}

/* End of file Navegador.php */
/* Location: ./application/libraries/Navegador.php */
