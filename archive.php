<?php  /* Template name: Archive */
get_header();
?>

<div class="content">

    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="sticky-top" style="top:50px">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="blog-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(''); ?>" />
                    <?php endif; ?>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


                            <a href="<?php the_permalink(); ?>">
                                <h1><?php the_title(); ?></h1>
                            </a>
                            <?php the_excerpt(); ?>

                    <?php endwhile;
                    else : endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>






</div>


<?php get_footer(); ?>