
<?php

// Add Content to Single Product + Calculadora

add_action('woocommerce_single_product_summary', 'show_subtitle');

function show_subtitle()
{
    global $product;

    $id = $product->get_id();

    $category =    $product->get_category_ids();

    $array = implode(" ", $category);

    ?>
    <form>
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

add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);


?>