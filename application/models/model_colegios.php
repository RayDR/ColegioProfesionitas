<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_colegios extends CI_Model {

	public function solicitud_registro($datos_preregistro){
		$resultado  = [ 'exito' => TRUE ];
      try {

      	$this->db->trans_begin();

      	$this->db->where('rfc', $datos_preregistro["rfc"]);
      	$asociacion = $this->db->get('solicitudes_registro');
      	if ( $asociacion->num_rows() > 0 )
      		throw new Exception('Ya existe una solicitud con este RFC.');
      	$datos_db = array(
      		'rfc' 						=>	$datos_preregistro["rfc"],
      		'nombre_asociacion' 		=>	$datos_preregistro["colegio"],
      		'municipio_id' 			=>	$datos_preregistro["municipio"],
      		'cp_id' 						=>	$datos_preregistro["colonia"],
      		'calle' 						=>	$datos_preregistro["calle"],
      		'numero' 					=>	$datos_preregistro["numero"],
      		'solicitante_nombre' 				=>	$datos_preregistro["nombre"],
      		'solicitante_primer_apellido' 	=>	$datos_preregistro["primer_apellido"],
      		'solicitante_segundo_apellido' 	=>	$datos_preregistro["segundo_apellido"],
      		'solicitante_email' 					=>	$datos_preregistro["correo_electronico"],
      		'solicitante_telefono' 				=>	$datos_preregistro["telefono"],
      	);

			$this->db->insert('solicitudes_registro', $datos_db);

			$this->db->trans_commit();
      } catch (Exception $e) {
         $this->db->trans_rollback();
         $resultado['exito'] = FALSE;
         $resultado['error'] = $e->getMessage();
      }
      return $resultado;
	}

}

/* End of file model_colegios.php */
/* Location: ./application/models/model_colegios.php */