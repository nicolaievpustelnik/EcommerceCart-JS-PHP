<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="assets/js/plugins/moment.min.js"></script>
<script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
<script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
<script src="assets/js/plugins/parsley.min.js"></script>
<script src="assets/js/plugins/sweetalert2.js"></script>

<script src="assets/js/card/card.js"></script>
<script>
    new Card({
        form: document.querySelector('form'),
        container: '.card-wrapper'
    });
</script>
<script src="assets/js/card/patterns.js"></script>
<script type="text/javascript">
function nextStep(){
  document.getElementById("step_1").style.display = "none";
  document.getElementById("step_2").style.display = "block";
}

function digitalCard(){
  document.getElementById("digitalCardDiv").style.display = "none";
}

function validate(){

  console.log(document.querySelector(".card-wrapper"));  
  console.log(document.querySelector(".jp-card-container")); 

  $(document).ready(function(){
    if ($('.jp-card').hasClass('jp-card-visa')) {
      alert(true + " La terjeta es de credito tipo: VISA")
      // alert('No se aceptan tarjetas de crédito');
    }else if($('.jp-card').hasClass('jp-card-mastercard')){
      alert(true+ " La terjeta es de credito tipo: MASTER")
      // alert('No se aceptan tarjetas de crédito');
    }else {
      alert(false + " La terjeta no es de credito")
    }
  });

  $('#card_form').parsley().validate();
      if($('#card_form').parsley().isValid()){
        var cardNumber = document.getElementById("card_number").value.replace(/\s/g, '');
        var cardExpiration = document.getElementById("expiry").value;
        cardExpiration = cardExpiration.split("/");
        var cardExpirationMonth = cardExpiration[0].replace(/\s/g, '');
        var cardExpirationYear = cardExpiration[1].replace(/\s/g, '');
        var securityCode = document.getElementById("security_code").value;
        var cardHolderName = document.getElementById("card_holder_name").value;
        var quotas = document.getElementById("quotas").options[document.getElementById("quotas").selectedIndex].value;

        //ACA VENDRIA LA LLAMADA DE AJAX
        /*ACA ES DONDE TENDRÍA QUE VENIR LA LLAMADA EL AJAX Y EN EL SUCCESS DEL AJAX VENDRÍA EL CÓDIGO QUE ESTÁ ABAJO*/
        /*DEJO ACÁ EL CODIGO QUE ABRE EL MENSAJE DE PANTALLA COMPLETA PARA QUE SE ABRA EN EL MOMENTO EN QUE SE REALIZA EL PAGO, SEA DONDE SEA*/

        /*
        HoldOn.open({
          theme:'sk-circle',
          message:"<h4>Aguarda un momento... Se está realizando el pago</h4>"
        });
        */
        window.location.href = "validation.html";
      }
        
}  
</script>