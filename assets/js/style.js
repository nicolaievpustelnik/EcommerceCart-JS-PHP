$(document).ready(function () {

    // OCULTAR Y MOSTRAR IMG DE METODOS DE PAGO
    $('#medios_pago_block2').hide();
    $('#medios_pago_block1').click(function () {
        $('#medios_pago_block2').toggle();
    });

    // END OCULTAR Y MOSTRAR IMG DE METODOS DE PAGO

    $('#medios_pago_block1').mouseover(function () {
        $('#medios_pago_block1').addClass('animated pulse')
    })
    $('#medios_pago_block1').mouseout(function () {
        $('#medios_pago_block1').removeClass('animated pulse')
    })

});