<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| NOMBRE DE LA APLICACIÓN
|--------------------------------------------------------------------------
*/
defined('LOGO')                 OR  define('LOGO', 'Secretaría de Educación Tabasco');
defined('SISTEMA')              OR  define('SISTEMA', 'SERCP');
/*
|--------------------------------------------------------------------------
| CONFIGURADOR DE APLICACION
|--------------------------------------------------------------------------
*/
// -- RUTA DE TEMAS
defined('BASE_TEMA')            OR define('BASE_TEMA', 'template/');                        // Ruta Base Templates
defined('TEMA_PUBLICO')         OR define('TEMA_PUBLICO', BASE_TEMA . 'body_landing/');     // Tema público
defined('TEMA_ADMIN')           OR define('TEMA_ADMIN',   BASE_TEMA . 'body_admin/');       // Tema administrador
defined('RUTA_UTILES')          OR define('RUTA_UTILES',  BASE_TEMA . 'utiles/');           // Utilerias
// -- LOGIN
defined('MAX_CON_FAIL')         OR  define('MAX_CON_FAIL', 10);                             // Limite de Conexiones
// -- CARGA DE DOCUMENTOS
defined('ALLOWED_MIMES_IMG')    OR  define('ALLOWED_MIMES_IMG', 'jpg|jpeg|png|bmp');        // Extensiones permitidas IMG
defined('ALLOWED_MIMES_FILES')  OR  define('ALLOWED_MIMES_FILES', 'pdf');                   // Extensiones permitidas FILES
defined('MAX_SIZE_IMG')         OR  define('MAX_IMG_SIZE', 2048);                           // Tamaño máximo imagenes
defined('MAX_FILE_SIZE')        OR  define('MAX_FILE_SIZE', 10240);                         // Tamaño máximo archivos

defined('UPLOAD_FOLDER')        OR  define('UPLOAD_FOLDER', 'uploads/');                     // Folder carga de archivos
defined('RUTA_NOTICIAS')        OR  define('RUTA_NOTICIAS', UPLOAD_FOLDER . 'noticias/');   // Ruta de imagenes de noticias
defined('RUTA_COLEGIOS')        OR  define('RUTA_COLEGIOS', UPLOAD_FOLDER . 'colegios/');   // Ruta de imagenes de colegios 
defined('UPLOAD_FPATH')         OR  define('UPLOAD_FPATH', FCPATH . UPLOAD_FOLDER );        // Ruta absoluta de archivos
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
