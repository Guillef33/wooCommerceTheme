<?php  /* Template name: Archive */
get_header();
?>

<div class="content">

    <div class="container">

        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="sticky-top" style="top:50px">
                    <?php get_sidebar(); ?>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="blog-post">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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

                    <?php endwhile;
                    else : endif; ?>
                </div>
            </div>



        </div>
    </div>
</div>






</div>


<?php get_footer(); ?>