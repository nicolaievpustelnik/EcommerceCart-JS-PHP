<?php
require_once './includes/inc_header.php';

// LLAMO A LA VISTA DE PAGO Y METODOS DE PAGO
render_view('pago');
?>

<!-- MERCADO PAGO -->
<!-- TEST DE USUARIO DE PRUEBA
curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-1507633793131148-092816-9c700b52278c72c6050e9cea38b154b2-347922076" -d "{'site_id':'MLA'}" 

COMPRADOR 
{"id":652283193,"nickname":"TETE2320113","password":"qatest7655","site_status":"active","email":"test_user_73264498@testuser.com"}

VENDEDOR
{"id":652283868,"nickname":"TETE1621655","password":"qatest1209","site_status":"active","email":"test_user_35992539@testuser.com"} 

/*----------------------------------------------------*/
TARJETAS DE PRUEBA
Mastercard	      5031 7557 3453 0604    123	11/25
Visa	          4509 9535 6623 3704    123	11/25
American Express  3711 803032 57522	     1234	11/25
/*----------------------------------------------------*/

REMPLAZAR LA FINALIZACION DEL PAGO EN EL NOMBRE

APRO: Pago aprobado.
CONT: Pago pendiente.
OTHE: Rechazado por error general.
CALL: Rechazado con validación para autorizar.
FUND: Rechazado por monto insuficiente.
SECU: Rechazado por código de seguridad inválido.
EXPI: Rechazado por problema con la fecha de expiración.
FORM: Rechazado por error en formulario.
-->
<!-- END MERCADO PAGO -->



<!-- PAYPAL USUARIOS DE PRUEBA
(COMPRADOR)
PERSONAL  sb-u5t5h3293509@personal.example.com  U8=wv3*v

(VENDEDOR)
BUSINESS  sb-d1col3326118@business.example.com  Ow/r4<mO
-->
<!-- END PAYPAL JS -->
