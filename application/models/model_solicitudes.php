<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solicitudes extends CI_Model {

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