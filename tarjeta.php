<?php
require_once 'app/config.php';
// require_once 'includes/inc_navbar.php';
// LLAMO A LA VISTA DE PAGO Y METODOS DE PAGO
require 'validarTarjeta.php';
render_view('pagoTarjeta');
?>


