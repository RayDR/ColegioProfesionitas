<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

    private $template   = 'template/';
    private $contenido  = 'template/body_admin';
    private $bcontenido = 'template/body';

    public function __construct(){
        parent::__construct();
        $this->load->model('model_sistema');
        $this->load->model('model_catalogos');
        $this->load->model('model_colegios');
        $this->load->model('model_evento');

        defined('HOME_ADM') OR define('HOME_ADM', 'index.php/Administracion');
    }

/*
|--------------------------------------------------------------------------
| VISTAS
|--------------------------------------------------------------------------
*/
    public function index(){        
        if ( ! $this->session->estatus_usuario_sesion() )
            redirect(base_url(),'refresh');
        $usuario    = $this->session->userdata('uid');
        $data = array(
            'titulo'            =>  'Bienvenido a ' . SISTEMA,
            'template'          =>  $this->template,
            'view'              =>  'administracion/dashboard',
            'comunicados'       =>  $this->model_catalogos->get_comunicados(),
            'usuario'           => $this->model_sistema->get_usuario(['usuario_id' => $usuario])
        );
        $this->load->view( $this->contenido, $data );
    }

    public function listar_cps($municipio_id){
        $respuesta = array('exito' => true);
        $data = array(
            'view'              =>  'ajax/codigos_postales',
            'codigos_postales'  =>  $this->model_catalogos->get_cps(2563,['municipio_id'=>$municipio_id])
        );
        $respuesta['html']=$this->load->view( $data['view'], $data, TRUE );
        return print(json_encode($respuesta));
    }

    public function listar_rds()
    {
        $respuesta=array('exito'=>true);
        $data=array(
            'view'              =>'ajax/redes_sociales',
            'redes_sociales'    =>$this->model_catalogos->get_rds()
        );
        $respuesta['html']=$this->load->view($data['view'],$data,TRUE);
        return print(json_decode($respuesta));
    }

    public function logout(){
        // Eliminar datos de sesión
        $this->session->sess_destroy();
        redirect( base_url(),'refresh' );
    }

    public function menu(){
        $respuesta  = ['exito' => true];
        $link       = $this->input->post('link');
        switch ($link) {
            case 'dashboard':
                $respuesta["html"] = $this->vista_tablero();
                break;
            case 'asociados':
                $respuesta["html"] = $this->vista_asociados();
                break; 
            case 'eventos':
                $respuesta["html"] = $this->vista_eventos();
                break; 
            case 'registrar':
                $respuesta["html"] = $this->vista_registro();
                break;
            case 'solicitudes':
                $respuesta["html"] = $this->vista_solicitudes();
                break;
            case 'validacion':
                $respuesta["html"] = $this->vista_validacion();
                break;
            case 'perfil':
                $respuesta["html"] = $this->vista_perfil();
                break;          
            default:
                $respuesta["exito"] = false;
                break;
        }
        if ( ! $this->session->estatus_usuario_sesion() ) {
            $respuesta["exito"] = false;
            $respuesta["error"] = 'ACCESS';
        }
        return print(json_encode($respuesta));
    }

    public function modal_asociado(){
        $json = array('exito' => TRUE);

        $usuario    = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id' => $usuario]);

        if ( $dbUsuario->colegio_id )
            $colegios = $this->model_catalogos->get_colegio_id($dbUsuario->colegio_id);
        else 
            $colegios = $this->model_catalogos->get_colegioss();

        $data = array(
            'niveles_educativos'    => $this->model_catalogos->get_niveles(),
            'instituciones'         => $this->model_catalogos->get_instituciones(),
            'colegios'              => $colegios,
            'carreras'              => $this->model_catalogos->get_carreras()
        );
        $json['html'] = $this->load->view( 'administracion/modales/modal_asociado', $data, TRUE );
        return print(json_encode($json));
    }

    public function vista_form_solicitud_modal(){
        $json = array('exito' => TRUE);
        $json['html'] = $this->load->view( 'administracion/registro', null, TRUE );
        return print(json_encode($json));
    }

    public function guardar_registro()
    {       
        $json  = array('exito' => TRUE);
        $asociacion = $this->input->post('asociacion');
        $colegio    = $this->input->post('colegio');
        $redes_sociales=$this->input->post('redes_sociales');

        if ( $asociacion && $colegio ){
            // Registro 
            $respuesta = $this->model_colegios->registrar_asociacion($asociacion,$colegio,$redes_sociales);
            $json['exito'] = $respuesta['exito'];
            if ( ! $json['exito'] )
                $json['mensaje'] = $respuesta['error'];

        } else {
            $json['exito']   = FALSE;
            $json['mensaje'] = 'No se encontraron datos';
        }
        return print(json_encode($json));
    }

    public function guardar_asociado(){
        $json   =   array('exito'=>TRUE);
        $asociado=$this->input->post('asociado');

        if($asociado){
            $json['modelo']=$this->model_colegios->registrar_asociado($asociado);
        }else {
            $json['exito']  =FALSE;
            $json['mensaje']='No se encontraron datos';
            $json['datos']  =$asociado;
        }
        return print(json_encode($json));
    }
    
    public function get_colegios_ajax(){
        $json= $this->model_catalogos->get_colegios();
        return print(json_encode($json));
    }

    public function get_solicitudes_ajax(){     
        $this->load->model('model_solicitudes');
        $json= $this->model_solicitudes->get_solicitudes_registro();
        return print(json_encode($json));
    }

    public function get_datatable_asociados(){
        $condicion = NULL;
        if ( $this->session->userdata('colegio_id') )
            $condicion = array('colegio_id' => $this->session->userdata('colegio_id') );
        $json= $this->model_catalogos->get_asociados($condicion);
        return print(json_encode($json));
    }

    public function actualizar_solicitud(){
        $this->load->model('model_solicitudes');
        $json           = array('exito'=>TRUE);
        $solicitud_id   = $this->input->post('solicitud');
        $estatus_id     = $this->input->post('estatus');

        if ( $solicitud_id && $estatus_id ){
            // Validar estatus
            $db_solicitud = $this->model_solicitudes ->get_solicitudes_registro(
                                ['solicitud_registro_id' => $solicitud_id] );
            if ( $db_solicitud ){
                $datos = $db_solicitud[0];              
                if ( $datos->estatus != 'Aprobado' ){
                    if ( ! $this->model_solicitudes->set_estatus_solicitud($solicitud_id, $estatus_id) ){
                        $json['exito']      = FALSE;
                        $json['mensaje']    = 'No fue posible actualizar la solicitud.';
                    }
                }
                else {
                    $json['exito']      = FALSE;
                    $json['mensaje']    = 'No se puede actualizar un solicitud previamente Aprobada.';
                }                   
            } else {
                $json['exito']      = FALSE;
                $json['mensaje']    = 'Solicitud inexistente.';
            }
        } else {
            $json['exito']      = FALSE;
            $json['mensaje']    = 'No se encontraron datos';
        }
        return print( json_encode($json) );
    }

    public function modal_colegio() 
    {
        $json   =   array('exito' => TRUE);
        $datos=$this->input->post();
        $usuario = $this->session->userdata('uid');
        $data = array(
            'carreras'              =>  $this->model_catalogos->get_carreras(),
            'usuario'               =>  $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
            'niveles'               =>  $this->model_catalogos->get_niveles(),
            'instituciones'         =>  $this->model_catalogos->get_instituciones(),
            'estatus_asociados'     =>  $this->model_catalogos->get_estatus_asocioados(),
            'asociados_list'        =>  $this->model_catalogos->get_asociados(['nombre_colegio' => $datos['nombre_colegio']]),
            'datos'                 =>  $datos
        );

        $json['html'] = $this->load->view('administracion/colegio_detalles',$data,true);
        return print(json_encode($json));
    }

    public function modal_aprobar_solicitud($solicitud_id){
        if ( $this->session->estatus_usuario_sesion( [1,2,3] ) == FALSE )
            return $this->vista_tablero();
        $this->load->model('model_solicitudes');
        $json   =   array('exito' => TRUE);

        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'              => 'administracion/registro_solicitud',
            'datos'             => $this->model_solicitudes->get_solicitudes_registro( ['solicitud_registro_id' => $solicitud_id] ),
            'municipios'        => $this->model_catalogos->get_municipios(),
            'usuario'           => $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
            'redes_sociales'    => $this->model_catalogos->get_rds()
        );
        
        $json['html'] = $this->load->view( $data["view"], $data, TRUE );
        return print(json_encode($json));
    }

    public function actualizar_listado_asociados(){
        $json   =   array('exito' => TRUE);

        $colegio_id = $this->input->post('colegio_id');
        $data = array(
            'view'             =>  'administracion/perfil/listado_asociados',
            'asociados'        =>  $this->model_catalogos->get_asociados(['colegio_id' => $colegio_id])
        );
        $json['html'] = $this->load->view( $data["view"], $data, TRUE );
        return print(json_encode($json));
    }

    public function modal_evento(){
        $json = array('exito' => TRUE);
        $data = array(
            'colegios' => $this->model_catalogos->get_colegioss()
        );
        $json['html'] = $this->load->view( 'administracion/modales/modal_evento', $data, TRUE);
        return print(json_encode($json));
    }

    public function guardar_evento(){
        $json   =   array('exito' => FALSE);
        #id_sesion
        $usuario_id = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id' => $usuario_id]);

        if ( $dbUsuario ){
            $colegio_id = (isset($dbUsuario->colegio_id))? $dbUsuario->colegio_id : $this->input->post('colegio_id');
            if ( $colegio_id ){
                $evento =   $this->input->post();
                if ($evento) {
                    $respuesta = $this->model_evento->registrar_evento($colegio_id, $evento, $usuario_id);
                    $json['exito']=$respuesta['exito'];
                    if(! $json['exito'])
                        $json['error']=$respuesta['error'];
                }else{
                    $json['exito'] = FALSE;
                    $json['mensaje'] = 'No se encontraron datos';
                    $json['datos']=$evento;
                }
            } else 
                $json = array('exito' => FALSE, 'error' => 'No se pudo obtener el folio del Colegio.');
        } else {
            $json = array('exito' => FALSE, 'error' => 'No se pudo obtener los datos del asociado.');
        }
        return print(json_encode($json));
    }

    public function editar_evento(){
        $json = array('exito'=>FALSE);
        // ID
        $usuario_id = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id' => $usuario_id]);

        if ($dbUsuario) {
            $colegio_id= (isset($dbUsuario->colegio_id)) ? $dbUsuario->colegio_id : $this->input->post('colegio_id');
            if ($colegio_id) {
                $evento = $this->input->post();
                if ($evento) {
                    $respuesta=$this->model_evento->actualizar_evento($dbUsuario->colegio_id, $evento, $usuario_id);
                    $json['exito']=$respuesta['exito'];
                    if (!$json['exito']) {
                        $json['mensaje']=$respuesta['error'];
                    }
                }else{
                    $json['exito']=FALSE;
                    $json['mensaje']='No se encontro datos';
                    $json['datos']=$evento;
                }
            }else{
                $json = array('exito'=>FALSE, 'error'=>'No se encontro folio del colegio');
            }
        }else{
            $json = array('exito'=>FALSE, 'error'=>'No se pudo obtener datos del asociado');
        }
        return print(json_encode($json));
    }

    public function eliminar_evento(){
        $json= array('exito'=>FALSE);
        // ID
        $usuario_id = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id'=>$usuario_id]);

        if($dbUsuario){
            $evento = $this->input->post();
            if ($evento) {
                $respuesta = $this->model_evento->elimina_evento($evento, $usuario_id);
                $json['exito']=$respuesta['exito'];
                if (!$json['exito']) {
                    $json['mensaje']=$respuesta['error'];
                }
            }else{
                $json['exito']=FALSE;
                    $json['mensaje']='No se encontro datos';
                    $json['datos']=$evento;
            }
        }else{
            $json = array('exito'=>FALSE, 'error'=>'No se pudo obtener datos del asociado');
        }
        return print(json_encode($json));
    }
    
    public function get_eventos_ajax(){
        $usuario_id = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id' => $usuario_id]);

        $json       = $this->model_evento->get_eventos_colegio($dbUsuario->colegio_id);
        return print_r(json_encode($json));
    }


    // Para asignar horas de servicio
    // mostrar modal
    public function modal_servicio(){   
        $usuario    = $this->session->userdata('uid');
        $db_usuario = $this->model_sistema->get_usuario(['usuario_id' => $usuario]);
        $colegio_id = (isset($dbUsuario->colegio_id)) ? $dbUsuario->colegio_id : false;    
        $json       = array('exito' => TRUE); 
        $datos      = $this->input->post();
        $fechaIn    = new DateTime($datos['fecha_desde']);
        $fechaOut   = new DateTime($datos['fecha_hasta']); 
        $diff       = $fechaIn->diff($fechaOut)->format("%h");
        $data       = array(
            'eventos'    =>$this->model_evento->get_eventos_colegio($colegio_id),
            'datos'      =>$datos,
            'fecha'      =>$diff
        ); 

        $json['html'] = $this->load->view( 'administracion/modales/modal_servicio', $data, TRUE);
        return print(json_encode($json));
    }

    public function guardar_asociado_evento(){
        $json   =   array('exito' => FALSE);
        #id_sesion
        $usuario_id = $this->session->userdata('uid');
        $dbUsuario  = $this->model_sistema->get_usuario(['usuario_id' => $usuario_id]);

        if ($dbUsuario) {
            $colegio_id = (isset($dbUsuario->colegio_id)) ? $dbUsuario->colegio_id : $this->input->post('colegio_id');
            if ($colegio_id) {
                $eventoAsoc = $this->input->post();
                if($eventoAsoc){
                    $evento_id          =   '';
                    $hora_disponible    =   '';
                    $hora_asignada      =   '';
                    $asociados          =   [];
                    $evento_id          =   $eventoAsoc['evento_id'];
                    $hora_disponible    =   $eventoAsoc['horas_evento'];
                    $hora_asignada      =   $eventoAsoc['horas_servicio'];
                    $asociados = $eventoAsoc['asociados'];
                    $respuesta = $this->model_evento->guardar_asociado_evento($evento_id, $hora_disponible, $hora_asignada, $asociados, $usuario_id);
                     $json['exito']=$respuesta['exito'];
                    if(! $json['exito'])
                        $json['error']=$respuesta['error'];
                    $json['exito'] = $respuesta['exito'];
                }else{
                    $json['exito']  = FALSE;
                    $json['mensaje']= 'No se encontro datos que guardar';
                    $json['datos']  = $evento;
                }
            }else{
                $json = array('exito'=>FALSE, 'error' => 'No se obtuvo datos del colegio');
            }
        }else{
            $json = array('exito'=>FALSE, 'error' => 'No se pudo obtener datos del asociado');
        }
        return print(json_encode($json));
    }

    public function get_asociados_eventos(){
        $condicion = NULL;
        if ( $this->input->post('colegio_id') )
            $condicion = array('colegio_id' => $this->input->post('colegio_id') );
        else if ( $this->session->userdata('colegio_id') )
            $condicion = array('colegio_id' => $this->session->userdata('colegio_id') );
        $evento_id = $this->input->post('evento_id');
        $asociados_eventos = $this->model_evento->get_asociados_eventos($evento_id);

        $asociados = $this->model_catalogos->get_asociados($condicion);
        foreach ($asociados as $key => $asociado) {
             $asociado->corrida = TRUE;
             foreach ($asociados_eventos as $key => $asociado_e) {
                if($asociado->asociado_id == $asociado_e->id_asociado){
                    $asociado->asignado = TRUE;
                    break;
                }

            }
        }

        return print(json_encode($asociados));
    }    

    public function get_asoc_event(){
        $evento_id = $this->input->post('evento_id');
        $json = $this->model_evento->get_asociados_eventos($evento_id);
        return print(json_encode($json));
    }
/*
|--------------------------------------------------------------------------
| VISTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

    protected function vista_tablero(){
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'              =>  'administracion/menu/tablero',
            'comunicados'       =>  $this->model_catalogos->get_comunicados(),
            'usuario'           =>  $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
            'colegios'          =>  $this->model_catalogos->get_colegios()
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }

    protected function vista_registro(){
        if ( $this->session->estatus_usuario_sesion( [1,2,3] ) == FALSE )
            return $this->vista_tablero();
        
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'              => 'administracion/registro',
            'titulo_pagina'     => 'Registro de Colegio',
            'municipios'        => $this->model_catalogos->get_municipios(),
            'usuario'           => $this->model_sistema->get_usuario(['usuario_id' => $usuario]),
            'redes_sociales'    => $this->model_catalogos->get_rds()
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }

    protected function vista_solicitudes(){
        if ( $this->session->estatus_usuario_sesion( [1, 2, 3] ) == FALSE )
            return $this->vista_tablero();
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'              => 'administracion/menu/solicitudes',
            'titulo_pagina'     => 'Solicitudes de Registro e Información',
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }

    protected function vista_perfil(){
        if ( $this->session->estatus_usuario_sesion( [4,5] ) == FALSE )
            return $this->vista_tablero();
        $usuario    = $this->session->userdata('uid');
        $db_usuario = $this->model_sistema->get_usuario(['usuario_id' => $usuario]);
        $data = array(
            'view'                  =>  'administracion/perfil',
            'carreras'              =>  $this->model_catalogos->get_carreras(),
            'usuario'               =>  $db_usuario,
            'niveles'               =>  $this->model_catalogos->get_niveles(),
            'instituciones'         =>  $this->model_catalogos->get_instituciones(),
            'estatus_asociados'     =>  $this->model_catalogos->get_estatus_asocioados(),
            'asociados_list'        =>  $this->model_catalogos->get_asociados(['colegio_id' => $db_usuario->colegio_id])
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }

    protected function vista_asociados(){
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'          =>  'administracion/menu/asociados',
            'titulo_pagina' => 'Asociados',
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }
    
    protected function vista_eventos(){
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'          =>  'administracion/menu/eventos',
            'titulo_pagina' => 'Eventos',
            'eventos'       =>  $this->model_evento->get_eventos_colegio()
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }

    protected function vista_validacion(){
        $usuario = $this->session->userdata('uid');
        $data = array(
            'view'              =>  'administracion/menu/validacion',
            'titulo_pagina'     => 'Validar Solicitudes de Cambio de Información',
        );
        return $this->load->view( $data["view"], $data, TRUE );
    }
}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */