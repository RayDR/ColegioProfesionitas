<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_colegios extends CI_Model {

// --- GETTERS --------------------------------------- 

    public function get_colegio($colegio_id){
        $this->db->where('colegio_id', $colegio_id);
        $colegio = $this->db->get('usuarios')->row('colegio_id');
    }

    public function get_colegio_id_galeria( $colegio_id ){
        $this->db->where( 'colegio_id', $colegio_id );

        $colegios = $this->db->get('vw_colegio_imagen');

        return $colegios->row();
    }

    public function get_galeria_colegios(){
        $this->db->select( 'colegio_id, nombre_colegio, pagina_web, email, telefono, imagen, mapa' );
        $colegios = $this->db->get('vw_colegio_imagen');
        return $colegios->result();
    }

    public function get_counters(){
        return $this->db->get('vw_counters')->row();
    }

    public function get_colegio_asociados( $colegio_id ){
        $this->db->where( 'colegio_id', $colegio_id );

        $colegios = $this->db->get('vw_asociados');
        return $colegios->result();
    }

    public function get_colegio_redes( $colegio_id ){
        $this->db->where( 'colegio_id', $colegio_id );

        $colegios = $this->db->get('colegios_redes_sociales');
        return $colegios->result();
    }


// --- SETTERS --------------------------------------- 

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
                'nombre_asociacion'             =>  $_asociacion["colegio"],
                'rfc'                           =>  $_asociacion["rfc"],
                'municipio_id'                  =>  $_asociacion["municipio"],
                'cp_id'                         =>  $_asociacion["codigo_postal"],
                'calle'                         =>  $_asociacion["calle"],
                'numero'                        =>  $_asociacion["numero"],
                'fecha'                         =>  $_asociacion["fecha_constitucion"],             
                'acta_notariada'                =>  $_asociacion["acta_notariada_asociacion"],
                'usuario_id'                    =>  $id_usuario             
            );
            
            $this->db->insert('asociaciones', $datos_db);
            
            $asociacion_id=$this->db->insert_id();
            
            $this->db->where('rfc_colegio',$_colegio["rfc_colegio"]);
            $colegio=$this->db->get('colegios');
            if( $colegio->num_rows()>0 )
                throw new Exception('Ya existe el colegio con este RFC.');
            $datos_db=array(
                'asociacion_id'             =>  $asociacion_id,
                'nombres'                   =>  $_colegio["nombre"],
                'primer_apellido'           =>  $_colegio["primer_apellido"],
                'segundo_apellido'          =>  $_colegio["segundo_apellido"],
                'nombre_colegio'            =>  $_colegio["colegio"],
                'rfc_representante'         =>  $_colegio["rfc_representante"],
                'rfc_colegio'               =>  $_colegio["rfc_colegio"],
                'curp'                      =>  $_colegio["curp"],
                'municipio_id'              =>  $_colegio["municipio_col"],
                'cp_id'                     =>  $_colegio["codigo_postal_col"],
                'mapa'                      =>  $_colegio["mapa"],
                'calle'                     =>  $_colegio["calle_col"],
                'numero'                    =>  $_colegio["numero_col"],
                'telefono'                  =>  $_colegio["telefono"],
                'email'                     =>  $_colegio["email"],
                'pagina_web'                =>  $_colegio["pagina-web"],
                'fecha'                     =>  $_colegio["fecha_constitucion_col"],
                'periodo_mesa_directiva'    =>  $_colegio["periodo-mesa-directiva"],
                'usuario_id'                =>  $id_usuario,
                'acta_notariada'            =>  $_colegio["acta_notariada_colegio"],
                'acta_secretaria_economia'  =>  $_colegio["acta_secretaria_economia"]               
            );
            
            $this->db->insert('colegios', $datos_db);
            
            $colegio_id=$this->db->insert_id();

            if ( is_array($redes_sociales) ){           
                foreach ($redes_sociales as $name => $value) {
                    $datos_db=array(
                        'colegio_id'            =>  $colegio_id,
                        'rfc'                   =>  $_colegio['rfc_colegio'],
                        'red_social_id'         =>  $value['tipo'],
                        'cuenta'                =>  $value['cuenta'],
                        'usuario_id'            =>  $id_usuario
                    );
                    $this->db->insert('colegios_redes_sociales', $datos_db);
                }
            }

            $this->db->where('rfc', $_asociacion["rfc"]);
            $this->db->or_where('rfc', $_colegio["rfc_colegio"]);
            $solicitudes = $this->db->get('solicitudes_registro');
            if ( $solicitudes->num_rows() > 0 ){
                $this->db->where('rfc', $_asociacion["rfc"]);
                $this->db->or_where('rfc', $_colegio["rfc_colegio"]);
                $this->db->update( 'solicitudes_registro', [ 'estatus_registro_id' =>  2 ] );
            }

            // Crear usuario
            $datos_usuarios = array(
                'password'          => password_hash('Setab' . date('Y'), PASSWORD_DEFAULT),
                'rfc'               => $_asociacion["rfc"],
                'colegio_id'        => $colegio_id,
                'tipo_usuario_id'   => 4,
                'status_usuario_id' => 1,
                'nombres'           => $_colegio["colegio"]
            );
            $this->db->insert('usuarios', $datos_usuarios);

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

        try { 
            foreach ($asociado as $name => $value) {
                $_asociado[$value['name']]=$value['value'];
            }
            
            $resultado  = [ 'exito' => TRUE ];  
            $resultado['asociado'] = $_asociado;
            $this->db->trans_begin();
            if ( isset( $_asociado["asociado_id"] ) )
                $this->db->where( 'asociado_id', $_asociado["asociado_id"] );
            else {
                if ( isset($_asociado["curp"]) ){
                    if ( $_asociado["curp"] )
                        $this->db->where('curp', $_asociado["curp"]);
                }
                $this->db->where('numero_cedula', $_asociado["numero_cedula"]);
                $asociados = $this->db->get('asociados');
                if ($asociados->num_rows() > 0)
                throw new Exception('Ya existe un asociado con el mismo numero de cedula');
            }
           
            $datos_db = array(
                'colegio_id'                =>  $_asociado['colegio_id'],
                'nombres'                   =>  $_asociado['nombre'],
                'primer_apellido'           =>  $_asociado['primer_apellido'],
                'segundo_apellido'          =>  $_asociado['segundo_apellido'],
                'curp'                      =>  isset($_asociado['curp'])? $_asociado['curp']: NULL,
                'fecha_sercp'               =>  isset($_asociado['fecha_sercp'])? $_asociado['fecha_sercp']: NULL,
                'nivel_educativo_id'        =>  isset($_asociado['nivel_educativo'])? $_asociado['nivel_educativo']: NULL,
                'institucion_id'            =>  isset($_asociado['institucion'])? $_asociado['institucion']: NULL,
                'carrera_id'                =>  isset($_asociado['carrera'])? $_asociado['carrera']: NULL,
                'numero_cedula'             =>  $_asociado['numero_cedula'],
                'telefono'                  =>  isset($_asociado['telefono'])? $_asociado['telefono']: NULL,
                'email'                     =>  isset($_asociado['email'])? $_asociado['email']: NULL,
                'horas_servicio_social'     =>  isset($_asociado['horas_servicio_social'])? $_asociado['horas_servicio_social']: NULL,
                'estatus_asociado'          =>  3,
                'usuario_id'            =>  $id_usuario
            );
            
            if ( $asociados->num_rows() > 0 ){
                $this->db->where('asociado_id', $asociados->row('asociado_id'));
                $this->db->update('asociados', $datos_db);
            } else 
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