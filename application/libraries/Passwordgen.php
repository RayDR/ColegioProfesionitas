<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwordgen
{
	protected 	$ci;
	private 	$sCaracteres = "ABCDEFGHIJKLMNOPKRSTUVWXYZ1234567890";
	private 	$caracteres = "ABCDEFGHIJKLMÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789.!$#";

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function get_spassword(){
		// Crear contraseña aleatoria y enviarla al correo proporcionado
		$password = "";
		for( $i = 0; $i <= LONGITUD_PWD; $i++ ) {
			$password .= substr($this->sCaracteres, rand(0, strlen($this->sCaracteres) ) , 1);
		}
		return $password;
	}

	public function get_password(){
		// Crear contraseña aleatoria y enviarla al correo proporcionado
		$password = "";
		for( $i = 0; $i <= LONGITUD_PWD; $i++ ) {
			$password .= substr($this->caracteres, rand(0, strlen($this->caracteres) ) , 1);
		}
		return $password;
	}

}

/* End of file Passwordgen.php */
/* Location: ./application/libraries/Passwordgen.php */
