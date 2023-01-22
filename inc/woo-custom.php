<?php

// Add Content to Single Product + Calculadora

add_action('woocommerce_single_product_summary', 'show_subtitle');

function show_subtitle()
{
    global $product;

    $id = $product->get_id();

    $category = $product->get_category_ids();

    $array = implode(" ", $category);

    $_product = wc_get_product($id);

?>

    <div id="form-sucess"></div>
    <div id="form-error"></div>

    <form id='cuotas_form' class="calculadora-cuotas-form" method="post">
        <h2>¡Nuestras promociones bancarias!</h2>
        <h5>Calcula las cuotas de acuerdo a tu tarjeta</h5>
        <fieldset>
            <select id="select-tarjetas" name="tarjetas">
                <option name="master" style="background-image:url(" <?php bloginfo('template_directory'); ?>/images/alternativa.jpg")">Master Card</option>
                <option name=" american">AMEX</option>
                <option name="uala">Uala</option>
                <option name="visa">VISA</option>

            </select>
        </fieldset>
        <fieldset>
            <select id="select-cuotas" name="cuotas">
                <option name="1">1</option>
                <option name="3">3</option>
                <option name="6">6</option>

            </select>
        </fieldset>
        <button type="submit">Calcular interes</button>
    </form>

    <script>
        $('#cuotas_form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            console.log(form)
        })
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

    // var_dump($_POST);

    $interes = $interes_tarjeta * (1 + $interes_cuota);

    $total = round($price * (1 + $interes));

    $precio_cuota = round($total / $numero_de_cuotas);
    // Solucion temporal usar valor de array $_POST



    if (isset($_POST['cuotas']) &&  (isset($_POST['tarjetas']))) {
        echo '<p>Elegiste ' . $_POST['tarjetas'] . 'en ' . $_POST['cuotas'] .  ' cuotas y el precio que vas a pagar en total es de ' . $total .  'y el monto por cuota es de ' . $precio_cuota . '</p>';
    }

    // $_product->set_price('200');


    $_product->set_price($total);

    $_ENV["PRICE"] = $total;

    ?>

    <p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo $_product->get_price(); ?></p>

<?php
    // var_dump($nuevoPrecio);
    // function return_custom_price($product, $total)
    // {
    //     global $product;

    //     $id = $product->get_id();

    //     $_product = wc_get_product($id);

    //     $price = $total;
    //     return $price;
    // }
    // add_filter('woocommerce_get_price', 'return_custom_price', 10, 2);


    // update_post_meta();

    // var_dump($price = $total);
    // var_dump($_product->set_price(0));

    // $_product->set_price($total);
    // $_product->save();
}
