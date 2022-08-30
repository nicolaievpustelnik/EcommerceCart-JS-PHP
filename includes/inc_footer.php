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
