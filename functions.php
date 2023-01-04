<?php

function loadStylesheets()
{
    wp_register_style(
        'stylesheet',
        get_template_directory_uri() . '/style.css',
        '',
        1,
        'all'
    );
    wp_enqueue_style('stylesheet');
}

add_action('wp_enqueue_scripts', 'loadStylesheets');

function loadWoocommerce()
{
    wp_register_style(
        'woocommerceCustom',
        get_template_directory_uri() . '/woocommerce.css',
        '',
        1,
        'all'
    );
    wp_enqueue_style('woocommerceCustom');
}


add_action('wp_enqueue_scripts', 'loadWoocommerce');


function loadJavascript()
{
    wp_register_script(
        'custom',
        get_template_directory_uri() . '/app.js',
        'jquery',
        1,
        true
    );
    wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'loadJavascript');


function add_type_attribute($tag, $handle, $src)
{
    // if not your script, do nothing and return original $tag
    if ('your-script-handle' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}

add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

function bootstrapCdn()
{
    // Add the following two lines //
    wp_enqueue_style('bootstrap-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-cdn-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js');
}

add_action('wp_enqueue_scripts', 'bootstrapCdn');


// Add Menu

add_theme_support("menus");
add_theme_support('post-thumbnails');

// Add Author and comments to blog post

add_theme_support('title-tag');
add_theme_support('custom-logo', array(
    'height' => 480,
    'width'  => 720,
));

// Register some menus
register_nav_menus(
    array(
        'top-menu' => __('Top Menu', 'theme')
    )
);

// Add image sizes
add_image_size('post_image', 1100, 750, true);

// Add a widget
register_sidebar(
    array(
        "name" => "Page Siderbar",
        "id" => "page-sidebar",
        "class" => '',
        "before_title" => '<h4>',
        "after_title" => "</h4>"
    )
);



// Add Woocommerce Theme Support
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


/// Product Gallery WooCommerce

function yourtheme_setup()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'yourtheme_setup');



add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/**
 * Rename "home" in breadcrumb
 */
add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text');
function wcc_change_breadcrumb_home_text($defaults)
{
    // Change the breadcrumb home text from 'Home' to 'Apartment'
    $defaults['home'] = 'Apartment';
    return $defaults;
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

add_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);



function customJavascript()
{
    if (is_single('3')) {
?>
        <script type="module">
            // your javscript code goes here
            import Swiper from "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js";

            const swiper = new Swiper(".swiper", {
                // Optional parameters
                direction: "vertical",
                loop: true,

                // If we need pagination
                pagination: {
                    el: ".swiper-pagination",
                },

                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },

                // And if we need scrollbar
                scrollbar: {
                    el: ".swiper-scrollbar",
                },
            });
        </script>
    <?php
    }
}
add_action('wp_head', 'customJavascript');


// Allow WebP in WordPress
function webp_upload_mimes($existing_mimes)
{
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');



//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/* Add Open Sans */

function google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');

// Add Front Page section to admin appereance 
function frontPageEditable($wp_customize)
{
    $wp_customize->add_section('frontPageEditable', array(
        'title' => 'Front Page Section'
    ));

    $wp_customize->add_setting('front-display', array(
        'default' => 'No'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'front-page-control-display', array(
        'label' => 'Display this section?',
        'section' => 'frontPageEditable',
        'settings' => 'front-display',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes')

    )));

    $wp_customize->add_setting('front-headline', array(
        'default' => 'Example headline text'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'front-page-control', array(
        'label' => 'Headline',
        'section' => 'frontPageEditable',
        'settings' => 'front-headline'

    )));

    $wp_customize->add_setting('front-description', array(
        'default' => 'Example description text'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'front-page-control-description', array(
        'label' => 'Description',
        'section' => 'frontPageEditable',
        'settings' => 'front-description'

    )));

    $wp_customize->add_setting('front-link', array(
        'default' => 'Portfolio'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'front-page-control-link', array(
        'label' => 'Link',
        'section' => 'frontPageEditable',
        'settings' => 'front-link',
        'type' => 'dropdown-pages'

    )));

    $wp_customize->add_setting('front-image');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front-page-control-link', array(
        'label' => 'Image',
        'section' => 'frontPageEditable',
        'settings' => 'front-image',
        'width' => 750,
        'height' => 500,

    )));
}


add_action('customize_register', 'frontPageEditable');

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
