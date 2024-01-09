<?php
// INICIALIZACION DE SESION DE USUARIO
session_start();

// CONSTANTES URL
// define('PORT', '8848');
define('PORT', '80');
define('BASEPATH', '/EcommerceCart-JS-PHP/');
define('URL', 'http://127.0.0.1:'.BASEPATH);     


define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd().DS);
define('APP', ROOT.'app'.DS);
define('INCLUDES', ROOT.'includes'.DS);
define('VIEWS', ROOT.'views'.DS);

define('ASSETS', URL.'assets/');
define('CSS', ASSETS.'css/');
define('IMAGES', ASSETS.'images/');
define('JS', ASSETS.'js/');
define('PLUGINS', ASSETS.'plugins/');

// COSTE DE ENVIO
define('SHIPPING_COST', 300);

// COTIZACION DEL DOLAR
define('COT_DOLAR', 140);

// FUNCIONES
require_once APP.'functions.php'; 


