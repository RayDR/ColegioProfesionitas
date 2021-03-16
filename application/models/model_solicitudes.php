<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solicitudes extends CI_Model {

    public function solicitud_registro($datos_preregistro){
        $resultado  = [ 'exito' => TRUE ];
      try {

        $this->db->trans_begin();

        $this->db->where('rfc', $datos_preregistro["rfc"]);
        $asociacion = $this->db->get('solicitudes_registro');
        if ( $asociacion->num_rows() > 0 )
            throw new Exception('Ya existe una solicitud con este RFC.');
        $datos_db = array(
            'rfc'                       =>  $datos_preregistro["rfc"],
            'nombre_asociacion'         =>  $datos_preregistro["colegio"],
            'municipio_id'          =>  $datos_preregistro["municipio"],
            'cp_id'                         =>  $datos_preregistro["colonia"],
            'calle'                         =>  $datos_preregistro["calle"],
            'numero'                    =>  $datos_preregistro["numero"],
            'solicitante_nombre'                =>  $datos_preregistro["nombre"],
            'solicitante_primer_apellido'   =>  $datos_preregistro["primer_apellido"],
            'solicitante_segundo_apellido'  =>  $datos_preregistro["segundo_apellido"],
            'solicitante_email'                     =>  $datos_preregistro["correo_electronico"],
            'solicitante_telefono'              =>  $datos_preregistro["telefono"],
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

    public function get_solicitudes_registro($filtros=null,$tipo=true)
    {
        if ( is_array($filtros) ){
            foreach ($filtros as $nombre => $valor) {
                $this->db->where($nombre, $valor);
            }
        }

        $db_datos = $this->db->get('vw_solicitudes');
        if ( $tipo )
            return $db_datos->result();
        else
            return $db_datos->result_array();
    }

    public function set_estatus_solicitud($solicitud_id, $estatus_registro_id){
        $exito = TRUE;
        try {
            $this->db->trans_begin();
            $this->db->where('solicitud_registro_id', $solicitud_id);

            $this->db->update( 'solicitudes_registro', 
                               ['estatus_registro_id' => $estatus_registro_id] );
            $this->db->trans_commit();
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $exito = FALSE;
        }
        return $exito;
    }
}
?>