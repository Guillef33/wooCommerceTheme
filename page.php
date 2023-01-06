<?php get_header(); ?>

<div class="main-container">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<div class="content">

    <div class="container">

        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="sticky-top" style="top:50px">
                    <?php // get_sidebar(); ?>
                </div>
            </div> -->
            <div class="col-lg-12">
                <!-- <div style="height: 500px; background-image: url(<?php the_post_thumbnail_url(''); ?>)"> -->
                <img src="<?php the_post_thumbnail_url(''); ?>" />
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?> <?php the_content(); ?> <?php endwhile;
                                                                                                else : endif; ?>
            </div>


        </div>
    </div>
</div>






</div>


<?php get_footer(); ?>