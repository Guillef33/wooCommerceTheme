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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Roboto&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Roboto&display=swap'); </style>
</head>

<body <?php body_class('test'); ?> <header>
    <nav class="navbar navbar-expand-lg " style="background-color: white;">
        <div class="container">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo-afa.png" class="header-logo">
            </a>
            <?php

            wp_nav_menu(array('theme_location' => 'top-menu'))

            ?>

            <!-- Buscador de productos -->
            <div class="search-site-header">
                <form action="/search" method="get">
                    <input type="text" class="search_text" name="search_text">
                    <!-- <label>Type</label>
                    <select name="category_name">
                        <option value="">Any</option>
                        <option value="fast-food">Fast-Food</option>
                        <option value="ropa">Ropa</option>
                    </select> -->
                    <button type="submit" name="" class="button-search">Search</button>
                </form>
            </div>

            <!-- Buscador por tipo de post -->
            <!-- <div class="search-site-header">
                <form action="/search" method="get">
                    <input type="text" name="search_text">
                    <label>Type</label>
                    <select name="type">
                        <option value="">Any</option>
                        <option value="post">Post</option>
                        <option value="product">Products</option>
                    </select>
                    <button type="submit" name="">Search</button>
                </form>
            </div> -->

            <?php

            if (is_active_sidebar('custom-header-widget')) : ?>
                <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                    <?php dynamic_sidebar('custom-header-widget'); ?>
                </div>

            <?php endif; ?>


        </div>
    </nav>
    </header>