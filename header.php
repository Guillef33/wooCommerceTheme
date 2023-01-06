<!DOCTYPE html>
<html lang="en">

<head>
    <title>WooCommerce Guille</title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

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
                    <input type="text" name="search_text">
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