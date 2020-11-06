<?php

// LEER PRODUCTOS
function get_products(){
    $products = require APP.'products.php';
    return $products;
}

// LEER PRODUCTOS POR ID
function get_products_by_id($id){
    $products = get_products();
    foreach ($products as $key => $value) {
        if ($value['id'] === (int) $id) {
            return $products[$key];
        }
    }
    return false;
}

// EJP: PASO UNA VISTA --------- render_view(carrito);
function render_view($view, $data = []){
    if (!is_file(VIEWS.$view.'.php')) {
        //    SI NO EXISTE LA VISTA YO QUIERO QUE HAGAS ESTO
        echo 'No existe la vista '.$view;
        exit;
    }

    require_once VIEWS.$view.'.php';
}

// FORMATEAR NUMEROS (PRECIOS)
function format_currency($number, $symbol = '$'){
    if (!is_float($number) && !is_integer($number)) {
        $number = 0;
    }

   return $symbol.number_format($number,2,'.',',');
}


// --------------------------------------------------------

// -----------------FUNCIONES DEL CARRITO------------------

// --------------------------------------------------------

function get_cart(){
    // PRODUCTS: ID - SKU - IMAGEN - PRECIO - CANTIDAD
    // TOTAL PRODUCTOS
    // SUBTOTAL
    // SHIPMENT
    // TOTAL
    // PAYMENT URL
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart']['cart_totals'] = calculate_cart_totals();
        return $_SESSION['cart'];
    }

    $cart = 
    [
        'products' => [],
        'cart_totals' => calculate_cart_totals(),
        'payment_url' => NULL
    ];

    $_SESSION['cart'] = $cart;

    return $_SESSION['cart'];
}

function calculate_cart_totals(){
    // COTIZACION DEL DOLAR
    $cotDolar = COT_DOLAR;

    // EL CARRO NO EXISTE, SE INICIALIZA
    // SI NO HAY PRODUCTOS AUN PRODUCTOS PERO EL CARRITO SI EXISTE YA
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart']['products'])) {
        $cart_totals = 
        [
            'cotDolar' => $cotDolar,
            'subtotal' => 0,
            'shipment' => 0,
            'total' => 0,
        ];
        return $cart_totals;
    }

    // ---------------------------------------------------
    // CALCULAR LOS TOTALES SEGUN LOS PRODUCTS EN CARRITO

    // COSTE DE ENVIO
    $shipment = SHIPPING_COST;
    $subtotal = 0;
    $total = 0;

    
    if (empty($_SESSION['cart']['products'])) {
        $cart_totals = 
        [
            'cotDolar' => $cotDolar,
            'subtotal' => 0,
            'shipment' => 0,
            'total' => 0
        ];
        $_SESSION['cart']['cart_totals'] = $cart_totals;
        return $cart_totals;
    }

    // SI YA HAY PRODUCTOS HAY QUE SUMAR LAS CANTIDADES 
    foreach ($_SESSION['cart']['products'] as $p) {
       $_total = floatval($p['cantidad'] * $p['precio']);
       $subtotal = floatval($subtotal + $_total);
    }

    $total = floatval($subtotal + $shipment);
    $cart_totals = 
    [   
        'cotDolar' => $cotDolar,
        'subtotal' => $subtotal,
        'shipment' => $shipment,
        'total' => $total
    ];
    return $cart_totals;
}

function add_to_cart($id_producto, $cantidad = 1){
    $new_product = 
    [
        'id' => NULL,
        'sku' => NULL,
        'nombre' => NULL,
        'imagen' => NULL,
        'cantidad' => NULL,
        'precio' => NULL
    ];

    $product = get_products_by_id($id_producto);
    // ALGO PASO O NO EXISTE EL PRODUCTO
    if (!$product) {
        return false;
    }

    $new_product = 
    [
        'id' => $product['id'],
        'sku' => $product['sku'],
        'nombre' => $product['nombre'],
        'cantidad' => $cantidad,
        'precio' => $product['precio'],
        'imagen' => $product['imagen']
    ];

    // SI NO EXISTE EL CARRO, ES OBVIO QUE NO EXISTE EL PRODUCTO 
    // ENTONCES LA AGREGAMOS DIRECTAMENTE
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart']['products'])) {
        $_SESSION['cart']['products'][] = $new_product;
        return true;
    }

    // SI SE AGREGA PERO VAMOS A LOOPEAR EN EL ARRAY DE TODOS LOS PRODUCTOS
    // PARA BUSCAR UNO CON EL MISMO ID SI EXISTE
    foreach ($_SESSION['cart']['products'] as $i => $p) {
        if ($p['id'] === $id_producto) {
            $_cantidad = $p['cantidad'] + $cantidad;
            $p['cantidad'] = $_cantidad;
            $_SESSION['cart']['products'][$i] = $p;
            return true;

        }
    }
    $_SESSION['cart']['products'][] = $new_product;
    return true;
}

function update_cart_product($id_producto, $cantidad = 1){
    // SI NO EXISTE EL CARRO, ES OBVIO QUE NO EXISTE EL PRODUCTO 
    // ENTONCES LA AGREGAMOS DIRECTAMENTE
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart']['products'])) {
        return false;
    }

    // SI SE AGREGA VAMOS A LOOPEAR EN EL ARRAY DE TODOS LOS PRODUCTOS
    // PARA BUSCAR UNO CON EL MISMO ID SI EXISTE
    foreach ($_SESSION['cart']['products'] as $i => $p) {
        if ($id_producto === $p['id']) {
            $p['cantidad'] = (int)$cantidad;
            $_SESSION['cart']['products'][$i] = $p;
            return true;

        }
    }
    return false;
}

function delete_from_cart($id_producto){
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart']['products'])) {
        return false;
    }

    foreach ($_SESSION['cart']['products'] as $i => $p) {
        if ($p['id'] === $id_producto) {
            unset($_SESSION['cart']['products'][$i]);
            return true;
        }
    }
    return false;
}

function destroy_cart(){
    unset($_SESSION['cart']);
    // ESTO NO LO PUEDO USAR CUANDO TENGA MAS SESIONES AGREGADAS COMO DE LOGUEO 
    session_destroy();
    return true;
}

function json_output($status = 200, $msg = '', $data = []){
    http_response_code($status);
    $r = 
    [
        'status' => $status,
        'msg' => $msg,
        'data' => $data
    ];
    echo json_encode($r);
    exit;
}