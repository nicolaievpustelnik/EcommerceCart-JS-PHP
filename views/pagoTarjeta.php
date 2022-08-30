<section>
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
</section> 