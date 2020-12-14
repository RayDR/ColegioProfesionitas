<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas
{
	protected $ci;

	// Almacena fichas con información estadística
	private $apartados = array();
	// Fondo global de apartados
	private $fondo     = 'bg-white';

	// Usada para almacenar el html generado por cada apartado generado
	private $html;

	public function __construct( $html = "", $apartados = [] )
	{
        $this->ci =& get_instance();
        $this->html = $html;

        if ( $apartados )
        	$this->crear_apartado( $apartados );
	}

	public function obtener_estadistica(){
		$this->generar_estadistica();
		return $this->html;
	}

	public function crear_apartado($datos){
		$exito = TRUE;
		if ( is_array($datos) ){
			if ( array_key_exists('titulo', $datos) && array_key_exists('valor', $datos) )
			{
				array_push( $this->apartados, $datos );
			} else
			{
				foreach ($datos as $key => $dato) {
					if ( array_key_exists('titulo', $dato) && array_key_exists('valor', $dato) ){
						array_push( $this->apartados, $dato );
					} else if ( is_string($dato) ){
						array_push( $this->apartados, array('titulo' => $dato, 'valor' => $dato) );
					} else
					{ 
						$exito = FALSE;
						$this->apartados = [];
					}
				}
			}
		} else
			array_push( $this->apartados, array('titulo' => $datos, 'valor' => $datos) );
		return $exito;
	}

	public function modificar_fondo($color){
		if ( is_string($color) )
		{
			$this->fondo = $color;
			return TRUE;
		}
		return FALSE;
	}

	public function modificar_apartado(){

	}

	private function generar_estadistica(){
		$bHtml = $this->html;
		$this->html = '<div id="seccion-estadistica" class="row d-flex justify-content-center">';
		if ( $this->apartados )
		{
			$this->html .= $bHtml;
			foreach ($this->apartados as $key => $apartado) {
				$estdID	= array_key_exists('id', $apartado)? $apartado['id'] : $apartado['titulo'];
				$medida	= array_key_exists('medida', $apartado)? $apartado['medida'] : 4;
				$color	= array_key_exists('color', $apartado)? $apartado['color'] : $this->fondo;
				$colorT	= array_key_exists('color_titulo', $apartado)? $apartado['color_titulo'] : 'texto-dorado';
				$colort	= array_key_exists('color_texto', $apartado)? $apartado['color_texto'] : 'texto-rojo';
				$colorI	= array_key_exists('color_icono', $apartado)? $apartado['color_icono'] : 'texto-rojo';
				$icono 	= array_key_exists('icono', $apartado)? $apartado['icono'] : '<i class="fas fa-chart-line"></i>';
				$link   = array_key_exists('link', $apartado)? $apartado['link'] : '';

				$this->html .= '
				<div class="col-12 col-sm-6 col-md-'. $medida .'">
					<div id="apEstadistica-'. $estdID .'" class="row no-gutters border rounded overflow-hidden flex-md-row mx-1 mb-2 shadow-sm h-md-250 position-relative '. $color .' estadisticas">
						<div class="col-12 p-1 mt-2 text-center d-flex flex-column position-static">
							<strong class="d-inline-block mb-2 '. $colorT .'">'. $apartado["titulo"] .'</strong>
						</div>
						<div class="col-5 mb-4 d-flex flex-column position-static">
							<div class="text-center '. $colorI .' h2">'. $icono .'</div>
							'. $link .'
						</div>
						<div class="col-7 mb-4 d-flex flex-column position-static">
							<div class="lead text-center '. $colort .'">'. $apartado["valor"] .'</div>
						</div>
					</div>

				</div>
				';
			}
		} else 
		{
			if ( $bHtml == "" )
				$this->html .= '<h3 class="col-12 text-muted text-center p-4">No se han encontrado datos estadísticos</h3>';
			else
				$this->html .= $bHtml;
		}
		$this->html .= '</div>';
	}
}

/* End of file Estadisticas.php */
/* Location: ./application/libraries/Estadisticas.php */
