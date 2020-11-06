<?php
require_once 'includes/inc_header.php';
require_once 'includes/inc_navbar.php';
?>

<!-- CONTENT -->
    <section class="container-fluid py-5">
        <div class="row">
            <!-- PRODUCTS -->
            <div class="col-xl-8">
                <article class="mb-4">
                    <div>
                        <h2 class="pt-1 text-center">Productos</h2>
                    </div>
                </article>
                <article class="row">
                    
                    <!-- LOOP O BUCLE PRODUCTS (RECORRO TODOS LOS PRODUCTOS) -->
                    <?php foreach ($data['products'] as $p):?>
                        <div class="col-3 mb-3">
                            <div class="card" >
                                <img src="<?= IMAGES.$p['imagen'];?>" class="card-img-top" alt="<?= $p['nombre'];?>">
                                <div class="card-body p-2">
                                    <h5 class="card-title text-truncate"><?= $p['nombre'];?></h5>
                                    <p class="text-primary"><?= format_currency($p['precio']);?></p>
                                    <button class="btn btn-sm btn-success do_add_to_cart" data-cantidad="1" data-id="<?= $p['id'];?>" data-toggle="tooltip" title="Agregar al carrito"><i class="fas fa-plus"> Agregar al carrito</i></button>
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
                        <h2 class="pt-1 text-center">Carrito</h2>
                    </div>
                </article>
                <article>

                    <div id="cart_wrapper">
                        
                    </div>

                    <div id="medios_pago_block2" class="animate__animated animate__bounceInDown">
                        <div class="block_marcadoPago mt-3">
                            <!-- MERCADOPAGO -->
                            <div class="row ">
                            <div class="col-8">
                                <img src="<?php echo IMAGES;?>mercadoPago.png" alt="MercadoPago" width="200">
                            </div>
                            
                            <form class="col-4 mt-4" action="http://localhost:8848/carrito/insertarPago.php" method="POST">
                                <script
                                    src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                                    data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                            </form>
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

<?php
require_once 'includes/inc_footer.php';
?>