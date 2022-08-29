<?php
/* // PHP Y SUS FUNCIONES PREDEFINIDAS ESTEN TODAS ATRAS DE ESTO
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
// require_once 'views/carrito.php'; */

require './vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-1507633793131148-092816-9c700b52278c72c6050e9cea38b154b2-347922076');

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <title>Document</title>
</head>
<body>
    <h1>MP</h1>
<div class="cho-container"></div>
<script>
  const mp = new MercadoPago('TEST-24d68536-40c1-4c39-acaa-21254feb3a39', {
    locale: 'es-AR'
  });

  mp.checkout({
    preference: {
      id: <?php echo $preference->id; ?>
    },
    render: {
      container: '.cho-container',
      label: 'Pagar',
    }
  });
</script>
</body>
</html>