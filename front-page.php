<?php get_header(); ?>

<!-- <div id="hero"> -->
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <a href="/product-category/ropa/">
                <h2 class="carousel-caption">Camiseta Alternativa</h1>
                    <img src="<?php bloginfo('template_directory'); ?>/images/alternativa.jpg" class="d-block w-100" alt="...">
            </a>
        </div>

        <div class="carousel-item">
            <a href="/product-category/fast-food/">
                <h2 class="carousel-caption">Hay que alentar la seleccion</h1>
                    <img src="<?php bloginfo('template_directory'); ?>/images/argentinafinalista.webp" class=" d-block w-100" alt="...">
            </a>
        </div>
        <div class="carousel-item">
            <a href="/product-category/alcohol/">

                <h2 class="carousel-caption">Celebremos con nuestros colores</h2>
                <img src="<?php bloginfo('template_directory'); ?>/images/festejo.jfif" class="d-block w-100" alt="...">
                < </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>
    </div>
    <!-- </div> -->

    <div class="content">

        <div class="container">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="product-wrapper-front-page">
                        <h1>Productos destacados </h1>
                        <div id="carouselExample" class="carousel slide">
                            <?php echo do_shortcode("[products limit='3']"); ?>
                        </div>
                    </div>

                    <?php the_content(); ?>



            <?php endwhile;
            else : endif; ?>
            <?php if (get_theme_mod('front-display') == 'Yes') { ?>
                <section class="customized-section-container" style="display: grid; grid-template-columns: 1fr 1fr; height: 600px; align-items: center">
                    <div class="customized-section-image">
                        <a href="<?php echo get_permalink(get_theme_mod('front-link')); ?>">
                            <img src="<?php echo get_theme_mod('front-image'); ?>" class="image-fluid" alt="Imagen a customizar" style="height: 400px; object-fit: cover">
                        </a>
                    </div>
                    <div class="customized-section-text">
                        <h2><?php echo get_theme_mod('front-headline'); ?></h2>
                        <p><?php echo get_theme_mod('front-description'); ?></p>
                    </div> .
                </section>

            <?php } ?>

            <section id="post-home">
                <h2>Read the best posts from this month</h2>
                <?php

                $productos = new WP_Query(array('post_type' => 'product'));

                // The Query
                $blogPosts = new WP_Query(array('category_name' => 'Blog'));

                $blogPostsLimit2 = new WP_Query('cat=3&posts_per_page=3&orderby=title');

                // The Loop
                if ($blogPostsLimit2->have_posts()) { ?>
                    <div class="post-home-wrapper">

                        <?php
                        while ($blogPostsLimit2->have_posts()) {
                            $blogPostsLimit2->the_post(); ?>


                            <div class="card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(''); ?>" class="card-img-top" />
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <p class="card-text">By: <?php the_author(); ?></p>
                                    <a href="<?php the_permalink(); ?>">
                                        <button class="btn btn-dark">Read More</button>
                                    </a>
                                </div>
                            </div>


                        <?php
                        }
                        ?>


                    </div>
                <?php
                } else {
                    echo '<p>No post found</p>';
                }

                /* Restore original Post Data */
                wp_reset_postdata();

                ?>


            </section>



        </div>

    </div>

    <?php get_footer(); ?>