<?php
//SDK DE MARCADO PAGO
require __DIR__ .  "/vendor/autoload.php";

//AGREGA CREDENCIALES DE MP.
MercadoPago\SDK::setAccessToken("TEST-1507633793131148-092816-9c700b52278c72c6050e9cea38b154b2-347922076");

//CREA UN OBJETO DE PREFERENCIA
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "http://localhost:".PORT."/EcommerceCart-JS-PHP/insertarPago.php",
    "failure" => "http://localhost:".PORT."/EcommerceCart-JS-PHP/errorPago.php?error=failure",
    "pending" => "http://localhost:".PORT."/EcommerceCart-JS-PHP/errorPago.php?error=pending"
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


