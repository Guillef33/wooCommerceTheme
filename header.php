<?php

/**
 * The template file for displaying the deader
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lucky Store

 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Roboto&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Roboto&display=swap'); </style> -->
</head>

<body <?php body_class('test'); ?>>

    <div class="alert-promo-home">
        <div class="container alert-promo-home-wrapper">
            <p>Envío gratuito a partir de 10.000 ARS</p>
            <p> | </p>
            <p>3 CUOTAS SIN INTERÉS</p>
        </div>
    </div>

    <header>
        <nav class="navbar navbar-expand-lg " style="background-color: white;">
            <div class="container">
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo-afa.png" class="header-logo">
                </a>
                <div class="navbar-mobile-wrapper">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
                        <div>
                            <?php

                            wp_nav_menu(array(
                                'theme_location' => 'top-menu',
                                'menu_id' => 'primary-menu',
                                'container_class' => 'ms-auto ',
                                'menu_class' => 'navbar-nav'
                            ))

                            ?>
                        </div>
                        <!-- Buscador de productos -->
                        <div class="header-search">
                            <form action="/search" method="get">
                                <div class="header-search-wrapper">
                                    <div class="header-search-input-wrapper">
                                        <input type="text" class="search_text" name="search_text">
                                        <button type="submit" name="" class="button-search">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/icono-busqueda.svg" class="icono-busqueda">
                                        </button>

                                    </div>

                                </div>
                            </form>
                        </div>
                        <?php

                        if (is_active_sidebar('custom-header-widget')) : ?>
                            <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                                <?php dynamic_sidebar('custom-header-widget'); ?>
                            </div>

                        <?php endif; ?>
                    </div>


                </div>




            </div>
        </nav>
    </header>