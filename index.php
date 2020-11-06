<?php
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTEN TODAS ATRAS DE ESTO
require_once 'app/config.php';

// session_destroy();exit;

// INGRESAR EL TITULO A LA VISTA
$data = 
[
    'title' => 'Tienda de carrito',
    'products' => get_products()
];

// $producto = get_products_by_id(1);
// add_to_cart(1);
// print_r(get_cart());


// get_cart();exit;
// $_SESSION['cart']['products'] = get_products_by_id(1);

// RENDERIZADO DE LA VISTA
render_view('carrito', $data);
// require_once 'views/carrito.php';

?>