<?php
//SDK DE MARCADO PAGO
require __DIR__ .  "/vendor/autoload.php";

//AGREGA CREDENCIALES DE MP.
MercadoPago\SDK::setAccessToken("TEST-3116024690219396-092817-7e86e92410fead3d3d85f162f9d4c99e-652283868");

//CREA UN OBJETO DE PREFERENCIA
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "http://localhost:8848/carrito/insertarPago.php",
    "failure" => "http://localhost:8848/carrito/errorPago.php?error=failure",
    "pending" => "http://localhost:8848/carrito/errorPago.php?error=pending"
);
$preference->auto_return = "approved";
//CREA UN ITEM EN LA PREFERENCIA
$datos = array();
$item = new MercadoPago\Item();
$item->title = "Mi producto carrito";
$item->quantity = 1;
$item->unit_price = $_SESSION['cart']['cart_totals']['total'];
$datos[]=$item;  
$preference->items = $datos;
$preference->save();