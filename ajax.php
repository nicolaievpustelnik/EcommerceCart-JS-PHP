<?php
require_once 'app/config.php';

//-----------------------PRUEBA---------------------
// // RESPUESTA QUE REGRESA A AJAX
// $products = get_products();
// $response = 
// [
//     'status' => 200,
//     'mensaje' => 'Respuesta ajax',
//     'data' => $products
// ];

// // FUNCION PARA SACAR UN JSON EN PANTALLA
// echo json_encode($response);
//--------------------END PRUEBA---------------------


//--------------------------------------------------
// QUE TIPO DE PETICION ESTA SOLICITANDO AJAX
//--------------------------------------------------
if (!isset($_POST['action'])) {
    json_output(403);
}

$action = $_POST['action'];

// GET
switch ($action) {
    case 'get':
        $cart = get_cart();
        $output = '';
        if (!empty($cart['products'])) {
            $disabled = '';
            $output .= '
            <!-- CART CONTENT -->
            <div class="table-responsive">
            <table class="table table-hover table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Precio</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>

            <tbody>';
            foreach ($cart['products'] as $p) {
                $output .= 
                '<tr>
                <td class="align-middle" width="35%">
                    <span class="d-block text-truncate">'.$p['nombre'].'</span>
                    <small class="d-block text-muted">SKU '.$p['sku'].'</small>
                </td>
                <td class="align-middle text-center">'.format_currency($p['precio']).'</td>
                <td class="align-middle text-right" width="5%">
                    <input data-id="'.$p['id'].'" data-cantidad="'.$p['cantidad'].'" class="form-control form-control-sm do_update_cart" type="number" min="1" max="99" value="'.$p['cantidad'].'">
                </td>
                <td class="align-middle text-right">'.format_currency(floatval($p['cantidad'] * $p['precio'])).'</td>
                <td class="align-middle text-right">
                    <button class="btn btn-sm btn-danger btn-circle rounded-circle do_delete_from_cart" data-id="'.$p['id'].'">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
                </tr>';
            }
                $output .= '
            </tbody>
            </table>
            </div>
            <button class="btn btn-sm btn-danger do_destroy_cart">Vaciar carrito</button>';
        } else {
            $disabled = 'disabled';
            $output .= '
            <div class="text-center">
                <img src="'.IMAGES.'carrito.png'.'" title="No hay producto" class="img-fluid pt-2">
                <br><br>
                <p class="text-muted">No hay productos en el carrito</p>
            </div>';
        }
        
        $output .= '
        <br><br>
        <!-- END CART CONTENT -->
        
        <!-- CART TOTALS -->
        <table class="table">
            <tr>
                <th class="border-0">Subtotal</th>
                <td class="text-primary text-right border-0">'.format_currency($cart['cart_totals']['subtotal']).'</td>
            </tr>
            <tr> 
                <th class="border-top border-secondary">Envio</th>
                <td class="text-primary text-right border-top border-secondary">'.format_currency($cart['cart_totals']['shipment']).'</td>
            </tr>
            <tr>
                <th class="border-top border-secondary">Total</th>
                <td class="text-right border-top border-secondary"><h5 id="pagoTotal" data-total="'.$cart['cart_totals']['total'].'" class="text-primary font-weight-bold">'.format_currency($cart['cart_totals']['total']).'</h5></td>
            </tr>
        </table>
        <!-- END CART TOTALS -->

        <!-- PAY NOW BUTTON -->
        <a href="payCart.php" class="btn btn-primary btn-lg btn-block '.$disabled.'">Pagar ahora</a>
        <!-- END PAY NOW BUTTON -->';
        json_output(200, 'OK', $output);
        break; 

    // PARA AGREGAR AL CARRITO
    case 'post':
        if(!isset($_POST['id'],$_POST['cantidad'])){
            json_output(403);
        }

        if (!add_to_cart((int)$_POST['id'],(int)$_POST['cantidad'])) {
        json_output(400, 'No se pudo agregar al carrito intenta de nuevo');
        }
        
        json_output(201);
        break;

    case 'put':
        if (!isset($_POST['id'],$_POST['cantidad'])) {
            json_output(403);
        }

        if (!update_cart_product((int)$_POST['id'],$_POST['cantidad'])) {
            json_output(400, 'No se pudo actualizar el producto, intenta de nuevo');
        }

        json_output(200);
        break;

    case 'destroy':
        if (!destroy_cart()) {
            json_output(400, 'No se pudo destruir el carrito intenta de nuevo'); 
        }

        json_output(200);
        break;

    case 'delete':
        if(!isset($_POST['id'])){
            json_output(403);
        }

        if (!delete_from_cart((int)$_POST['id'])) {
            json_output(400, 'No se pudo borrar el producto del carrito, intenta de nuevo'); 
        }

        json_output(200);
        break;
    
    default:
        json_output(403);
        break;
}



