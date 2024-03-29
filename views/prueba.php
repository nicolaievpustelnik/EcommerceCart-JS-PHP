
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/QPagoIcono.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    QPago
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/parsley.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
</head>

<body class="">
  <div class="wrapper">
    <div class="main-panel" style="margin:auto;">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div id="step_1" style="display:block">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Selecciona el método de pago</h4>
                  </div>
                  <div class="card-body">
                    <button class="btn btn-primary col-md-12" onclick="nextStep()">
                      <i class="fa fa-credit-card"></i>
                      &nbsp;<b>Tarjeta de crédito / débito</b>
                    </button>
                    <button class="btn btn-primary col-md-12" id="digitalCard" onclick="digitalCard(this.id)">
                      <b>Tarjeta digital del banco ciudad</b> (Ver más)
                    </button>
                    <div class="card" id="digitalCardDiv" style="margin-top:-4px;border-radius:0px;display:none">
                      <div class="card-body">
                        <a href="https://quasarbox.com"><img src="assets/images/tiendaCiudad2.png" style="width:100%"></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="step_2" style="display:none">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Ingresa los datos de la tarjeta</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div>
                          <div class="card-wrapper" style="padding-bottom:25px;"></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-container active">
                      <form id="card_form" data-parsley-validate>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Número de la tarjeta</label>
                              <input type="text" id="card_number" class="form-control" name="number"to>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Fecha de vencimiento</label>
                              <input class="form-control" id="expiry" maxlength="7" type="tel" name="expiry"to>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8" id="name_div">
                            <div class="form-group">
                              <label class="bmd-label-floating">Nombre y apellido</label>
                              <input type="text" class="form-control" id="card_holder_name" name="name" to>
                            </div>
                          </div>
                          <div class="col-md-4" id="cvc_div">
                            <div class="form-group">
                              <label class="bmd-label-floating">Código de seguridad</label>
                              <input type="text" id="security_code" class="form-control" name="cvc" to>
                            </div>
                          </div>
                        </div>
                        <div class="row" id="cuotas_div">
                          <div class="col-md-12">
                            <div class="form-group">
                              <select class="form-control"   id="quotas">
                                <option disabled selected>Cuotas</option>
                                <option value="1">1 cuota</option>
                                <option value="3">3 cuotas</option>
                                <option value="6">6 cuotas</option>
                                <option value="12">12 cuotas</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <button type="button" onclick="validate()" class="btn btn-primary pull-right">Continuar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">
                    <img src="assets/images/Garbarino.png" width="200">
                  </h6>
                  <h4 class="card-title">Detalle de la compra</h4>
                  <p class="card-description" style="float:left">Productos</p>
                  <p class="card-description" style="float:right">$2.000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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

  <script src="../assets/js/card/card.js"></script>
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
    document.getElementById("digitalCardDiv").style.display = "block";
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
</body>

</html>