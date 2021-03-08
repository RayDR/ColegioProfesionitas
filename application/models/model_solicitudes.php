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

    $db_datos = $this->db->get('solicitudes_registro');
    if ( $tipo )
        return $db_datos->result();
    else
        return $db_datos->result_array();
}
}
?>