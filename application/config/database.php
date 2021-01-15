<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'produccion';
$query_builder = TRUE;

$db['catalogos']   = array(
   'dsn'      => '',
   'hostname' => '10.57.18.80',
   'username' => 'root',
   'password' => 'SuperDba2020#',
   'database' => 'catalogos',
   'dbdriver' => 'mysqli',
   'dbprefix' => '',
   'pconnect' => FALSE,
   'db_debug' => (ENVIRONMENT !== 'production'),
   'cache_on' => FALSE,
   'cachedir' => '',
   'char_set' => 'utf8',
   'dbcollat' => 'utf8_general_ci',
   'swap_pre' => '',
   'encrypt'  => FALSE,
   'compress' => FALSE,
   'stricton' => FALSE,
   'failover' => array(),
   'save_queries' => TRUE
);

$db['produccion'] = array(
   'dsn'      => '',
   'hostname' => '10.57.18.80',
   'username' => 'root',
   'password' => 'SuperDba2020#',
   'database' => 'colegios_profesionistas',
   'dbdriver' => 'mysqli',
   'dbprefix' => '',
   'pconnect' => FALSE,
   'db_debug' => (ENVIRONMENT !== 'production'),
   'cache_on' => FALSE,
   'cachedir' => '',
   'char_set' => 'utf8',
   'dbcollat' => 'utf8_general_ci',
   'swap_pre' => '',
   'encrypt'  => FALSE,
   'compress' => FALSE,
   'stricton' => FALSE,
   'failover' => array(),
   'save_queries' => TRUE
);
