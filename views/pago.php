<?php
require_once 'includes/inc_header.php';
require_once 'includes/inc_navbar.php';
require_once 'pagar.php';
require_once 'mercadoPago.php';
?>
   <!-- CONTENT -->
   <section class="container-fluid py-5">
        <div class="row">
            <!-- PRODUCTS -->
            <div class="col-xl-8">
                <article class="mb-4">
                    <div>
                        <h2 class="pt-1 text-center">Mis productos</h2>
                    </div>
                </article>
                <article class="row">
                    
                    <!-- LOOP O BUCLE PRODUCTS (RECORRO TODOS LOS PRODUCTOS) -->
                    <?php foreach ($_SESSION['cart']['products'] as $p):?>
                        <div class="col-3 mb-3">
                            <div class="card" >
                                <img src="<?= IMAGES.$p['imagen'];?>" class="card-img-top" alt="<?= $p['nombre'];?>">
                                <div class="card-body p-2">
                                    <h5 class="card-title text-truncate"><?= $p['nombre'];?></h5>
                                    <p class="text-primary"><?= format_currency($p['precio']);?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </article>
            </div>
            <!-- END PRODUCTS -->
            
            <!-- CARTS -->
            <div class="col-xl-4 bg-light" id="load_wrapper">
                <article class="mb-4">
                    <div>
                        <h2 class="pt-1 text-center">Mi carrito</h2>
                    </div>
                </article>
                <article>

                    <div >
                        <!-- CART TOTALS -->
                        <table class="table">
                            <tr> 
                                <th class="border-top border-secondary">Envio</th>
                                <td class="text-primary text-right border-top border-secondary"><?=format_currency(SHIPPING_COST)?></td>
                            </tr>
                            <tr>
                                <th class="border-top border-secondary">Total</th>
                                <td class="text-right border-top border-secondary"><h5 id="pagoTotal" data-total="" class="text-primary font-weight-bold"><?=format_currency($_SESSION['cart']['cart_totals']['total']);?></h5></td>
                            </tr>
                        </table>
                        <!-- END CART TOTALS -->

                        <!-- PAY NOW BUTTON -->
                        <a href="tarjeta.php" class="btn btn-primary btn-lg btn-block '.$disabled.'">Pagar ahora</a>
                        <!-- END PAY NOW BUTTON -->
                    </div>

                    <div id="medios_pago_block1" class="text-center mt-4 mb-5" >
                        <h6 class="text-primary"><strong>Otros medios de pago</strong></h6>
                        <img class="img_metodoPago" src="<?php echo IMAGES;?>payMercado.png" alt="Metodo de pago" width="300">
                    </div>

                    <div id="medios_pago_block2" class="animate__animated animate__bounceInDown">
                        <div class="block_marcadoPago mt-3">
                            <!-- MERCADOPAGO -->
                            <div class="row ">
                            <div class="col-8">
                                <img src="<?php echo IMAGES;?>mercadoPago.png" alt="MercadoPago" width="200">
                            </div>
                            
                            <div class="col-4 mt-4">
                                <div class="checkout-btn"></div>
                                <script>
                                const mp = new MercadoPago('TEST-24d68536-40c1-4c39-acaa-21254feb3a39', {
                                    locale: 'es-AR'
                                });

                                mp.checkout({
                                    preference: {
                                    id: '<?php echo $preference->id; ?>'
                                    },
                                    render: {
                                    container: '.cho-container',
                                    label: 'Pagar',
                                    }
                                });
                                </script>
                            </div>

                            <!-- END MERCADOPAGO -->
                        </div>
                            
                        <!-- PAYPAL -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <script src="https://www.paypal.com/sdk/js?client-id=AQXIys7QhVWuxFIFuZ247o9xfdj-uNJSvdwnOTXOgy4IzRBdz6_vv-75bCJGGN7aaKDgKeRpiLtVSC1V"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
                                </script>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                        <!-- END PAYPAL -->
                    </div>

                </article>
            </div>
            <!-- END CARTS -->

        </div>
    </section>
<!-- END CONTENT -->
    
    <!-- PAYPAL -->
    <script src="https://www.paypal.com/sdk/js?client-id=AQXIys7QhVWuxFIFuZ247o9xfdj-uNJSvdwnOTXOgy4IzRBdz6_vv-75bCJGGN7aaKDgKeRpiLtVSC1V&currency=MXN"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>
    <div id="paypal-button-container" class="col-3"></div>

    <!-- PAYPAL JS -->
    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?=$_SESSION['cart']['cart_totals']['total']?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            Swal.fire('!Confirmado!','Transaccion exitosa ' + details.payer.name.given_name,'success');
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
<?php
require_once 'includes/inc_footer.php';
?>