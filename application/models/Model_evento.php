<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Model_evento extends CI_Model{
    // ==> GETTERS <==
    public function get_eventos_colegio($colegio_id = NULL){

        if ( !is_null($colegio_id) )
            $this->db->where('colegio_id', $colegio_id);
            $this->db->where('status', 1);
            $eventos = $this->db->get('vw_eventos');
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
        $eventos = $this->db->get('vw_eventos');
        return $eventos->result();
    }

    public function get_eventos_pasados($colegio_id){
        $fecha_actual = date('Y-m-d H:m:s');

        if ( !is_null($colegio_id) )
        $this->db->where('colegio_id', $colegio_id);
        $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
        $this->db->where('status', 1);
        $this->db->where('fecha_hasta <=', $fecha_actual);
        $eventos = $this->db->get('vw_eventos');
        return $eventos->result();
    }

    public function get_eventos_futuros($colegio_id){
        $fecha_actual = date('Y-m-d H:m:s');

        if ( !is_null($colegio_id) )
        $this->db->where('colegio_id', $colegio_id);
        $this->db->select('evento_id, nombre_evento, fecha_desde, fecha_hasta');
        $this->db->where('status', 1);
        $this->db->where('fecha_desde >=', $fecha_actual);
        $eventos = $this->db->get('vw_eventos');
        return $eventos->result();
    }

    public function get_asociados_eventos($evento_id){
        $this->db->where('id_evento', $evento_id);
        $query = $this->db->get('servicio_asociados');

        return $query->result();
    }

    

    // ==> SETTERS <==
    public function registrar_evento($colegio_id, $evento, $diff, $usuario){
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

            if ($dbEvento->num_rows() > 0){
                throw new Exception('Ya existe un evento registrado con los mismos datos');
            }

            $datos_db = array(
                'colegio_id'        => $evento['colegio_id'],
                'nombre_evento'     => $evento["nombre_evento"],
                'fecha_desde'       => $evento["fecha_inicio"],
                'fecha_hasta'       => $evento["fecha_termino"],
                'horas_totales'     => $diff,
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

    public function actualizar_evento($colegio_id, $evento, $diff, $usuario){
        $resultado = array('exito' => TRUE);
        try{
            $this->db->trans_begin();
            $datos_db = array(
                'colegio_id'        => $colegio_id,
                'nombre_evento'     => $evento["nombre_evento"],
                'fecha_desde'       => $evento["fecha_inicio"],
                'fecha_hasta'       => $evento["fecha_termino"],
                'horas_totales'     => $diff,
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

    public function guardar_asociado_evento($evento_id, $horas, $hora_asignada, $asociados, $usuario_id){
        $resultado = array('exito' => TRUE);
        try{
            $this->db->trans_begin();
            
            // inserto
            foreach ($asociados as $key => $value) {
                // busco asociado ya registrado con el evento
                $this->db->select('horas_asignadas');
                $this->db->where('id_asociado',$value);
                $this->db->where('id_evento', $evento_id);
                $dbEvento = $this->db->get('servicio_asociados');

                if($dbEvento->num_rows()>0){
                    // recupero columna que corresponde a las horas ya registradas en la bd
                    // actualizo
                    $datos=array(
                            'usuario_modifico' => $usuario_id,
                            'horas_asignadas ' => $hora_asignada
                    );
                    $this->db->where('id_evento', $evento_id);
                    $this->db->update('servicio_asociados', $datos);

                    $this->db->where('asociado_id', $value);
                    $query = $this->db->get('asociados');
                    if($query->num_rows()>0){
                        $hora_sis   = $query->row('horas_servicio_social');
                        $result     = $hora_sis + $horas;
                        $data       = array('horas_servicio_social' => $result);
                        $this->db->where('asociado_id', $value);
                        $this->db->update('asociados', $data);
                    }

                }else{
                    $datos=array(
                                'id_evento'        => $evento_id,
                                'id_asociado'      => $value,
                                'usuario_registro' => $usuario_id,
                                'horas_asignadas'  => $hora_asignada
                                );
                    $this->db->insert('servicio_asociados', $datos);

                    $this->db->where('asociado_id', $value);
                    $query = $this->db->get('asociados');
                    if($query->num_rows()>0){
                        $hora_sis   = $query->row('horas_servicio_social');
                        $result     = $hora_sis + $horas;
                        $data       = array('horas_servicio_social' => $result);
                        $this->db->where('asociado_id', $value);
                        $this->db->update('asociados', $data);
                    }
                }
            }
            //termino la transaccion
            $this->db->trans_commit();
        // en caso de error
        }catch(Exception $e){
            $this->db->trans_rollback();
            $resultado['exito'] = FALSE;
            $resultado['error'] = $e->getMessage();
        }
        return $resultado;
    }  
}