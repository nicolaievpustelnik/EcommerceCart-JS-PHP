<?php
// COTIZACION
// CUENTA PARA EL PAGO EN DOLARES
if ($_SESSION) {
  if (!$_SESSION['cart']['cart_totals']['total']) {
    $total = 1;
  }else {
    $total = $_SESSION['cart']['cart_totals']['total'];
  }
  $cotDolar = $_SESSION['cart']['cart_totals']['cotDolar'];
  $pagoPaypal = number_format($total / $cotDolar,2,'.',',');
}else {
  $pagoPaypal = number_format(1,2,'.',',');
}
// END COTIZACION
?>
<footer class="bd-footer text-muted bg-secondary mt-5">
        <div class="container-fluid">
            <ul class="bd-footer-links row pt-2">
            <a class="ml-0" href="#">GitHub</a>
            <a class="ml-2" href="#">Twitter</a>
            <a class="ml-2" href="#">Examples</a>
            <a class="ml-2" href="#">About</a>
            </ul>
            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel alias vitae ipsum ex eaque! <a href="#">Molestiae</a>, aliquid inventore.</p>
            <p class="text-white pb-2">Lorem v4.5.2. Code licensed <a href="#">MIT</a>, docs <a href="#">CC BY 3.0</a>.</p>
        </div>
    </footer>
<!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.1/dist/sweetalert2.all.min.js"></script>
<script src="assets/plugins/waitMe/waitMe.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="assets/js/main.js"></script>
<script src="assets/js/style.js"></script>

<!-- END PAYPAL JS -->
<!-- PAYPAL USUARIOS DE PRUEBA
(COMPRADOR)
PERSONAL  sb-u5t5h3293509@personal.example.com  U8=wv3*v

(VENDEDOR)
BUSINESS  sb-d1col3326118@business.example.com  Ow/r4<mO
-->
</body>
</html>