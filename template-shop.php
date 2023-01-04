<?php

/*
Template Name: Shop Page
*/


get_header(); ?>

<div class="main-container">
    <div class="container">
        <h1 class="product-title-h1"><?php the_title(); ?></h1>
    </div>
</div>

<div class="content">

    <div class="container">

        <div class="row">
            <div class="col-12">
                <img src="<?php the_post_thumbnail_url(''); ?>" />
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?> <?php the_content(); ?> <?php endwhile;
                                                                                                else : endif; ?>
            </div>


        </div>
    </div>
</div>






</div>


<?php get_footer(); ?>