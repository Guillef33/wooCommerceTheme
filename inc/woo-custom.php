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

    // Ejemplo https://www.fravega.com/p/heladera-ciclica-sigma-2f1200pa-239lts-plata-160813/

    // Calculadora de Cuotas
    $price = $_product->get_price();
    $numero_de_cuotas = 3;
    $tasa_interes = 100;

    // $tasa_interes = if (cuota == 3) {
    //     $tasa_interes = 100;
    // } else if (cuota == 6) {
    //     $tasa_interes = 150;
    // }

    $interes = $tasa_interes / 100;

    $tasa = $tasa_interes * $price + $price;

    $price_con_interes = $price * (1 + $interes);

    $cuota = $price_con_interes / $numero_de_cuotas;

    // $tasa_de_interes = ($tasa_interes_anual * $numero_de_cuotas * ($price / $numero_de_cuotas))  / 100;

    // $precio_con_interes = ($price / $numero_de_cuotas) + $tasa_de_interes;

    var_dump('El precio es de:' . $price . '<br />');
    // var_dump('Tasa de interes:' . $interes . '<br />');
    // var_dump('La tasa es:' . $tasa . '<br />');
    var_dump('El coste es de :' . $price_con_interes . '<br />');
    var_dump('Vas a tener que pagar una cuota de :' . $cuota . '<br />');
    // var_dump("El precio final con interes es de:" . $precio_con_interes * 3 . '<br />');

?>
    <form>
        <h2>¡Nuestras promociones bancarias!</h2>
        <h5>Calcula las cuotas de acuerdo a tu tarjeta</h5>
        <select>
            <option name="american" style="background-image: url (" <?php bloginfo('template_directory'); ?>/images/logosBancos/amex.jpg");">
                <img src="<?php bloginfo('template_directory'); ?>/images/logosBancos/amex.jpg" class="d-block w-100" alt="...">
                AMEX
            </option>
            <option name="visa">VISA</option>
            <option name="master">Master Card</option>
            <option name="master">Uala</option>
        </select>
        <select>
            <option name="una">1</option>
            <option name="tres">3</option>
            <option name="seis">6</option>

        </select>
        <button type="submit">Calcular interes</button>
        <p>El precio final es $precio</p>
    </form>
<?php
}

// add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);

// TODO revisar porque no aplica el filtro de acortar el excerpt a productos
if (is_shop()) {


    function product_excerpt_length($length)
    {
        return 10;
    }
    add_filter('excerpt_length', 'product_excerpt_length', 1);
}


?>