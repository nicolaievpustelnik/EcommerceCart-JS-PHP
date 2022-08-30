<?php
// Configurations
require_once 'app/config.php';

// Set title and data
$data = 
[
    'title' => 'Tienda de carrito',
    'products' => get_products()
];

// Render view
render_view('cart', $data);