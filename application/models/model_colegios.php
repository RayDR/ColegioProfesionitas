<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_colegios extends CI_Model {

	public function registrar_asociacion($asociacion,$colegio,$redes_sociales){
		$_asociacion=[];
		$_colegio=[];
		$_redes_sociales=[];
		$id_usuario=$this->session->userdata('uid');
		foreach ($asociacion as $name => $value) {
			$_asociacion[$value['name']]=$value['value'];
		}
		foreach ($colegio as $name => $value) {
			$_colegio[$value['name']]=$value['value'];
		}
		
		
		$resultado  = [ 'exito' => TRUE ];
		$resultado['colegio'] = $_colegio;
	    $resultado['asociacion'] = $_asociacion;	
		
		try {
			
			$this->db->trans_begin();
			
			$this->db->where('rfc', $_asociacion["rfc"]);
			$asociacion = $this->db->get('asociaciones');
			if ( $asociacion->num_rows() > 0 )
			throw new Exception('Ya existe una solicitud con este RFC.');
			$datos_db = array(
				'nombre_asociacion' 			=>	$_asociacion["colegio"],
				'rfc' 							=>	$_asociacion["rfc"],
				'municipio_id' 					=>	$_asociacion["municipio"],
				'cp_id' 						=>	$_asociacion["codigo_postal"],
				'calle' 						=>	$_asociacion["calle"],
				'numero' 						=>	$_asociacion["numero"],
				'fecha'							=>	$_asociacion["fecha_constitucion"],
				'usuario_id'					=>	$id_usuario				
			);
			
			$this->db->insert('asociaciones', $datos_db);
			
			$asociacion_id=$this->db->insert_id();
			
			$this->db->where('rfc',$_colegio["rfc_col"]);
			$colegio=$this->db->get('colegios');
			if($colegio->num_rows()>0)
			throw new Exception('Ya existe el colegio con este RFC.');
			$datos_db=array(
				'asociacion_id'				=>	$asociacion_id,
				'nombres'					=>	$_colegio["nombre"],
				'primer_apellido'			=>	$_colegio["primer_apellido"],
				'segundo_apellido'			=>	$_colegio["segundo_apellido"],
				'nombre_colegio'			=>	$_colegio["colegio"],
				'rfc'						=>	$_colegio["rfc_col"],
				'curp'						=>	$_colegio["curp"],
				'municipio_id'				=>	$_colegio["municipio_col"],
				'cp_id'						=>	$_colegio["codigo_postal_col"],
				'mapa'						=>	$_colegio["mapa"],
				'calle'						=>	$_colegio["calle_col"],
				'numero'					=>	$_colegio["numero_col"],
				'telefono'					=>	$_colegio["telefono"],
				'email'						=>	$_colegio["email"],
				'pagina_web'				=>	$_colegio["pagina-web"],
				'fecha'						=>	$_colegio["fecha_constitucion_col"],
				'periodo_mesa_directiva'	=> 	$_colegio["periodo-mesa-directiva"],
				'usuario_id'				=>	$id_usuario
				
			);
			
			$this->db->insert('colegios', $datos_db);
			
			$colegio_id=$this->db->insert_id();
			
			foreach ($redes_sociales as $name => $value) {
				$datos_db=array(
					'colegio_id'			=>	$colegio_id,
					'rfc'					=>	$_colegio['rfc_col'],
					'red_social_id'			=>	$value['tipo'],
					'cuenta'				=>	$value['cuenta'],
					'usuario_id'			=>	$id_usuario
				);
				$this->db->insert('colegios_redes_sociales', $datos_db);
			}

			$this->db->trans_commit();
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$resultado['exito'] = FALSE;
			$resultado['error'] = $e->getMessage();
		}
       return $resultado;
	}

	public function registrar_asociado($asociado){
		$_asociado=[];
		$id_usuario=$this->session->userdata('uid');

		foreach ($asociado as $name => $value) {
			$_asociado[$value['name']]=$value['value'];
		}
		
		$resultado  = [ 'exito' => TRUE ];	
	    $resultado['asociado'] = $_asociado;

		try {
			
			$this->db->trans_begin();
			
			//$this->db->where('curp', $_asociado["curp"]);
			//$asociaciado = $this->db->get('asociaciones');
			//if ( $asociaciado->num_rows() > 0 )
			//throw new Exception('Ya existe una solicitud con este RFC.');
			$datos_db = array(
				'nombres'					=>	$_asociado['nombre'],
				'primer_apellido'			=>	$_asociado['primer_apellido'],
				'segundo_apellido'			=>	$_asociado['segundo_apellido'],
				'curp'						=>	$_asociado['curp'],
				'fecha_sercp'				=>	$_asociado['fecha_sercp'],
				'nivel_educativo_id'		=>	$_asociado['nivel_educativo'],
				'institucion_id'			=>	$_asociado['institucion'],
				'carrera_id'				=>	$_asociado['carrera'],
				'numero_cedula'				=>	$_asociado['numero_cedula'],
				'telefono'					=>	$_asociado['telefono'],
				'email'						=>	$_asociado['email'],
				'horas_servicio_social'		=>	$_asociado['horas_servicio_social'],
				'usuario_id'				=>	$id_usuario,
				'estatus_asociado'			=>	3,
			);
			
			$this->db->insert('asociados', $datos_db);
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