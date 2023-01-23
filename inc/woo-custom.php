<?php

// Add Content to Single Product + Calculadora

// add_action('woocommerce_single_product_summary', 'show_subtitle');

function show_subtitle()
{
    global $product;

    $id = $product->get_id();

    $category = $product->get_category_ids();

    $array = implode(" ", $category);

    $_product = wc_get_product($id);

?>

    <div id="form-error"></div>

    <form id='cuotas_form' class="calculadora-cuotas-form" method="post">
        <h2>¡Nuestras promociones bancarias!</h2>
        <h5>Calcula las cuotas de acuerdo a tu tarjeta</h5>
        <fieldset>
            <select class="form-select" id="select-tarjetas" name="tarjetas" class="boton-tarjetas-credito">
                <option selected>Elije tu tarjeta</option>

                <option name="master">Master Card</option>
                <option name=" american">AMEX</option>
                <option name="uala">Uala</option>
                <option name="visa">VISA</option>

            </select>
        </fieldset>
        <fieldset>
            <select class="form-select" aria-label="Select de cuotas" id="select-cuotas" name="cuotas" class="boton-cantidad-cuotas">
                <option selected>Elije cuantas cuotas</option>
                <option name="1">1</option>
                <option name="3">3</option>
                <option name="6">6</option>

            </select>
        </fieldset>
        <button type="submit" class="btn btn-dark">Calcular interes</button>


        <div id="form-sucess" class="alert alert-primary" role="alert" style="display: none;"></div>
    </form>

    <script>
        function getData(form) {
            var formData = new FormData(form);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ": " + pair[1]);
            }

            let formularioValores = Object.fromEntries(formData);
            console.log(formularioValores)

            let numero_de_cuotas = formularioValores.cuotas;
            let tarjetas = formularioValores.tarjetas;


            let precioProducto = document.getElementsByClassName('price')[0];
            let numberPrecioProducto = Number(precioProducto.textContent)
            console.log(precioProducto.textContent);
            console.log(numberPrecioProducto)
            let interes_tarjeta = null;

            switch (formularioValores.tarjetas) {
                case (formularioValores.tarjetas = 'master'):
                    interes_tarjeta = 0.3;
                    break;
                case (formularioValores.tarjetas = 'visa'):
                    interes_tarjeta = 0.4;
                    break;
                case (formularioValores.tarjetas = 'uala'):
                    interes_tarjeta = 0.5;
                    break;
                default:
                    (formularioValores.tarjetas = 'american');
                    interes_tarjeta = 0.6;
                    break;
            }


            switch (formularioValores.cuotas) {
                case formularioValores.cuotas = '3':
                    interes_cuota = 0.3;
                    break;
                case formularioValores.cuotas = '6':
                    interes_cuota = 0.6;
                    break;
                default:
                    formularioValores.cuotas = '1';
                    interes_cuota = 0.1;
                    break;
            }

            let interes = interes_tarjeta * (1 + interes_cuota);

            let total = Math.round(Number(numberPrecioProducto * (1 + interes)));

            let precio_cuota = Math.round(Number(total / numero_de_cuotas));

            let formulario = document.getElementById("form-sucess");

            console.log(tarjetas)

            if (typeof tarjetas !== 'undefined') {
                formulario.style.display = 'block';

                formulario.textContent = `Elegiste ${tarjetas} en ${formularioValores.cuotas}
            cuotas y el precio que vas a pagar en total es de ${total} y el montopor cuota es de ${precio_cuota} `;
            }
        }


        let formData = document.getElementById("cuotas_form").addEventListener("submit", function(e) {
            e.preventDefault();
            getData(e.target);
            console.log(e.target)
        });

        getData(formData)
    </script>

    <?php


    // Get the price of the product
    $price = $_product->get_price();

    $tarjeta = '';

    if (isset($_POST['cuotas'])) {
        $numero_de_cuotas = $_POST['cuotas'];
    };

    if (isset($_POST['tarjetas'])) {
        $tarjetas = $_POST['tarjetas'];
    };

    $interes_tarjeta = null;

    switch ($tarjetas) {
        case ($tarjetas = 'master'):
            $interes_tarjeta = 0.3;
            break;
        case ($tarjetas = 'visa'):
            $interes_tarjeta = 0.4;
            break;
        case ($tarjetas = 'uala'):
            $interes_tarjeta = 0.5;
            break;
        default:
            ($tarjetas = 'american');
            $interes_tarjeta = 0.6;
            break;
    }


    switch ($numero_de_cuotas) {
        case $numero_de_cuotas = '3':
            $interes_cuota = 0.3;
            break;
        case $numero_de_cuotas = '6':
            $interes_cuota = 0.6;
            break;
        default:
            $numero_de_cuotas = '1';
            $interes_cuota = 0.1;
            break;
    }

    $interes = $interes_tarjeta * (1 + $interes_cuota);

    $total = round($price * (1 + $interes));

    $precio_cuota = round($total / $numero_de_cuotas);
    // Solucion temporal usar valor de array $_POST
    // if (isset($_POST['cuotas']) &&  (isset($_POST['tarjetas']))) {
    //     echo '<p class="alert alert-danger" role="alert">Elegiste ' . $_POST['tarjetas'] . 'en ' . $_POST['cuotas'] .  ' cuotas y el precio que vas a pagar en total es de ' . $total .  'y el monto por cuota es de ' . $precio_cuota . '</p>';
    // }

    $_product->set_price($total);

    ?>

<?php
}
