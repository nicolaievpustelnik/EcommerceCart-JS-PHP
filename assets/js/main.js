$(document).ready(function () {

    // CARGAR EL CARRO 
    function load_cart() {
        var load_wrapper = $('#load_wrapper'),
            wrapper = $('#cart_wrapper'),
            action = 'get';

        // PETICION AJAX
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'JSON', //--------------> POR SI HAY QUE DEFINIR UN JSON
            data:
            {
                action
            },
            beforeSend: function () {
                load_wrapper.waitMe();
            }

            // PROMISES
        }).done(function (res) {
            if (res.status === 200) {
                setTimeout(() => {
                    wrapper.html(res.data);
                    load_wrapper.waitMe('hide');
                }, 1000);
            } else {
                Swal.fire('Upps!', 'Ocurrio un error', 'error');
                wrapper.html('Intenta de nuevo, por favor...!');
                return true;
            }
        }).fail(function (err) {
            // ALERT DE OCURRIO UN ERROR DE UN ARCHIVO AJAX
            Swal.fire('Upps!', 'Ocurrio un error', 'error');
            return false;
        }).always(function () {

        });

    };

    load_cart();

    // AGREGAR AL CARRO AL DAR CLICK EN BOTON 
    // ACTUALIZAR LAS CANTIDADES DEL CARRO SI EL PRODUCTO YA EXISTE DENTRO 
    $('.do_add_to_cart').on('click', function (event) {
        // Pueden utilizarlo para prevenir alguna acción
        // submit / redirección
        //<i class="fas fa-spinner"></i>
        event.preventDefault();
        var id = $(this).data('id'),
            cantidad = $(this).data('cantidad'),
            action = 'post';

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'JSON',
            cache: false,
            data:
            {
                action,
                id,
                cantidad
            },
            beforeSend: function () {
                console.log('Agregando');
            }
        }).done(function (res) {
            if (res.status === 201) {
                Swal.fire('!Bien hecho!', 'Producto agregado al carrito', 'success');
                load_cart();
                return;
            } else {
                Swal.fire('Upps!', 'No se pudo agregar al carrito intenta de nuevo', 'error');
                return;
            }
        }).fail(function (err) {
            // swal('Upps!','Ocurrió un error','error');
        }).always(function () {
            // setTimeout(() => {
            //   boton.html(old_label);
            // }, 1500);
        });
    });

    // ACTUALIZAR CARRO CON INPUT 
    $('body').on('blur', '.do_update_cart', do_update_cart);
    function do_update_cart(event) {
        var input = $(this),
            cantidad = parseInt(input.val()),
            id = input.data('id'),
            action = 'put',
            cant_original = parseInt(input.data('cantidad'));

        // VALIDAR QUE SEA UN NUMERO INT
        if (Math.floor(cantidad) !== cantidad) {
            cantidad = 1;
        }

        // HAY QUE VALIDAR QUE EL NUMERO SEA MAYOR A CERO Y MENOR A 99
        if (cantidad < 1) {
            cantidad = 1;
        } else if (cantidad > 99) {
            cantidad = 99;
        }

        if (cantidad === cant_original) return false;

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'JSON',
            data:
            {
                action,
                id,
                cantidad
            }
        }).done(function (res) {
            if (res.status === 200) {
                Swal.fire('Producto actualizado con exito');
                load_cart();
                return;
            }
        }).fail(function (err) {
            Swal.fire('Upps!', 'No se pudo actualizar el producto, intenta de nuevo', 'error');
            return;
        }).always(function () {

        });
    }

    // BORRAR ELEMENTO DEL CARRO 
    $('body').on('click', '.do_delete_from_cart', delete_from_cart);
    function delete_from_cart(event) {
        var confirmation,
            id = $(this).data('id')
        action = 'delete';

        confirmation = confirm('Estas seguro de eliminar el producto?');

        if (!confirmation) return;

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'JSON',
            data:
            {
                action,
                id
            }
        }).done(function (res) {
            console.log(res);
            if (res.status === 200) {
                Swal.fire('Producto borrado con exito');
                load_cart();
                return;
            } else {
                Swal.fire('Upps!', 'No se pudo aliminar el producto, intenta de nuevo', 'error');
                return;
            }
        }).fail(function (err) {
            Swal.fire('Upps!', 'Intenta de nuevo', 'error');
        }).always(function () {

        });
    }

    // VACIAR CARRO
    $('body').on('click', '.do_destroy_cart', destroy_cart);
    function destroy_cart(event) {
        var confirmation,
            action = 'destroy';

        confirmation = confirm('Estas seguro de eliminar el carrito?');

        if (!confirmation) return;

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'JSON',
            data:
            {
                action
            }
        }).done(function (res) {
            console.log(res);
            if (res.status === 200) {
                Swal.fire('Carrito borrado con exito');
                load_cart();
                return;
            } else {
                Swal.fire('Upps!', 'No se pudo aliminar el carrito, intenta de nuevo', 'error');
                return;
            }
        }).fail(function (err) {
            Swal.fire('Upps!', 'Intenta de nuevo', 'error');
        }).always(function () {

        });
    }

    // REALIZAR EL PAGO

});




