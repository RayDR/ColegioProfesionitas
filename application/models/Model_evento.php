<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Model_evento extends CI_Model{
    // ==> GETTERS <==
    public function get_eventos_colegio(){
        $this->db->select('evento_id, nombre_evento,fecha_desde, fecha_hasta');
        $eventos = $this->db->get('eventos');
        return $eventos->result();
    }

    // ==> SETTERS <==
    public function registrar_evento($colegio_id, $evento, $usuario){
        $_evento=[];
        foreach ($evento as $name => $value) {
            $_evento[$value['name']]=$value['value'];
        }
        $resultado=['exito'=> TRUE];
        $resultado['evento'] = $_evento;
        try{
            $this->db->trans_begin();
            // #Checo si existe algun evento con los mismos datos
            // $array = array('nombre_evento'=> $_evento['nombre_evento'], 
            //                 'fecha_desde' => $_evento['fecha_inicio'], 
            //                 'fecha_hasta' => $_evento['fecha_termino']);
            // $this->db->where($array);
            $this->db->where('nombre_evento', $_evento["nombre_evento"]);
            $this->db->or_where('fecha_desde', $_evento['fecha_inicio']);
            $this->db->or_where('fecha_hasta', $_evento['fecha_termino']);
            $evento = $this->db->get('eventos');
            if ($evento->num_rows() > 0)
                throw new Exception('Ya existe un evento con los mismos datos');
            $datos_db = array(
                'colegio_id'        => $colegio_id,
                'nombre_evento'     => $_evento["nombre_evento"],
                'fecha_desde'       => $_evento["fecha_inicio"],
                'fecha_hasta'       => $_evento["fecha_termino"],
                'fecha_creacion'    => date('Y-m-d H:m:s'),
                'fecha_modificacion'=> date('Y-m-d H:m:s'),
                'usuario_id_creador'=> $usuario,
                'usuario_id'        => $usuario,
                'status'            => 1
            );

            $this->db->insert('eventos', $datos_db);

            $this->db->trans_commit();
                
        }catch(Exception $e){
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e->getMessage();
        }
        return $resultado;
    }
}