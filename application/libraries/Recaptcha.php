<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recaptcha
{
    protected $ci;
    // Almacenes de configuración reCaptcha v3
    protected $site_secret; // Clave Secreta de API
    protected $site_key;    // Clave de Sitio de API

    protected $url;         // URL de validación

    public function __construct()
    {
        $this->ci   =& get_instance();

        $this->url      = 'https://www.google.com/recaptcha/api/siteverify';
        $this->site_secret   = '6Le459kZAAAAAJP0o8cHYULcwQnMlx-KGR4h-HgT';
        $this->site_key      = '6Le459kZAAAAANnsoWbFLHGYqZvBh1uzrIiAmxf3';
        $this->modo_local();
    }

    private function modo_local(){
        $this->site_secret   = '6Ldf8tkZAAAAAK20CP-vbwpLFGUYecubJ1assrwI';
        $this->site_key      = '6Ldf8tkZAAAAAC5sQgsuDghoYicr6KhhsEZ910gs';
    }

    public function get_key(){
        return $this->site_key;
    }
    
    public function validacion_google($token){
        $recaptcha_url      = $this->url;
        $recaptcha_secret   = $this->site_secret;
        $recaptcha_response = $token;

        $recaptcha = file_get_contents(
            $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        return json_decode($recaptcha);
    }
    
}

/* End of file recaptcha.php */
/* Location: ./application/libraries/recaptcha.php */
