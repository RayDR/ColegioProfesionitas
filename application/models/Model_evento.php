<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Model_evento extends CI_Model{
    // ==> GETTERS <==
    public function get_eventos_colegio($colegio_id = NULL){

        if ( !is_null($colegio_id) )
            $this->db->where('colegio_id', $colegio_id);
        
            $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
            $this->db->where('status', 1);
            $eventos = $this->db->get('eventos');
        return $eventos->result();
    }

    public function get_eventos_activos($colegio_id){
        $fecha_actual = date('Y-m-d H:m:s');

        if ( !is_null($colegio_id) )
        $this->db->where('colegio_id', $colegio_id);
        $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
        $this->db->where('status', 1);
        $this->db->where('fecha_desde <=', $fecha_actual);
        $this->db->where('fecha_hasta >=', $fecha_actual);
        $eventos = $this->db->get('eventos');
        return $eventos->result();
    }

    public function get_eventos_pasados($colegio_id){
        $fecha_actual = date('Y-m-d H:m:s');

        if ( !is_null($colegio_id) )
        $this->db->where('colegio_id', $colegio_id);
        $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
        $this->db->where('status', 1);
        $this->db->where('fecha_hasta <=', $fecha_actual);
        $eventos = $this->db->get('eventos');
        return $eventos->result();
    }

    public function get_eventos_futuros($colegio_id){
        $fecha_actual = date('Y-m-d H:m:s');

        if ( !is_null($colegio_id) )
        $this->db->where('colegio_id', $colegio_id);
        $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
        $this->db->where('status', 1);
        $this->db->where('fecha_desde >=', $fecha_actual);
        $this->db->where('fecha_hasta >=', $fecha_actual);
        $eventos = $this->db->get('eventos');
        return $eventos->result();
    }

    // ==> SETTERS <==
    public function registrar_evento($colegio_id, $evento, $usuario){
        $resultado = array('exito' => TRUE);
        try{
            $this->db->trans_begin();
            // #Checo si existe algun evento con los mismos datos
            $array = array('nombre_evento' => $evento["nombre_evento"],
                           'fecha_desde'   => $evento['fecha_inicio'], 
                           'fecha_hasta'   => $evento['fecha_termino'],
                           'colegio_id'    => $colegio_id);            
            $this->db->where($array);
            $dbEvento = $this->db->get('eventos');

            if ($dbEvento->num_rows() > 0)
                throw new Exception('Ya existe un evento registrado con los mismos datos');

            $datos_db = array(
                'colegio_id'        => $evento['colegio_id'],
                'nombre_evento'     => $evento["nombre_evento"],
                'fecha_desde'       => $evento["fecha_inicio"],
                'fecha_hasta'       => $evento["fecha_termino"],
                'usuario_id_creador'=> $usuario,
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

    public function actualizar_evento($colegio_id, $evento, $usuario){
        $resultado = array('exito' => TRUE);
        try{
            $this->db->trans_begin();
            $datos_db = array(
                'colegio_id'        => $colegio_id,
                'nombre_evento'     => $evento["nombre_evento"],
                'fecha_desde'       => $evento["fecha_inicio"],
                'fecha_hasta'       => $evento["fecha_termino"],
                'usuario_id'        => $usuario,
                'status'            => 1
            );
            $this->db->where('evento_id', $evento['id_evento']);
            $this->db->update('eventos', $datos_db);

            $this->db->trans_commit();
        }catch(Exception $e){
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e->getMessage();
        }
        return $resultado;
    }

    public function elimina_evento($evento, $usuario){
        $resultado = array('exito'=>TRUE);
        try{
            $this->db->trans_begin();
            $datos=array(
                'usuario_id'    => $usuario,
                'status'        => 0,
            );
            
            $this->db->where('evento_id', $evento['id_evento']);
            $this->db->update('eventos', $datos);

            $this->db->trans_commit();
        }catch(Exception $e){
            $this->db->trans_rollback();
            $resultado['exito']= FALSE;
            $resultado['error']=$e->getMessage();
        }
        return $resultado;
    }
}