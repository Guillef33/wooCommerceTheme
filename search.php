<?php
/* Template name: Custom Search */
get_header();
?>

<?php

if ($_GET['search_text'] && !empty($_GET['search_text'])) {
    $text = $_GET['search_text'];
}

$type = 'product';

?>


<div class="container">

    <?php
    // Revisar esto
    //if (isset($type) && isset($text)) {
    $args = array(
        // 'product_cat' => $category,
        'post_type' => $type,
        'posts_per_page' => -1,
        's' => $text,
        //  'exact' => true,
        //  'sentence' => true
    );


    // }
    $query = new WP_Query($args);
    ?>
    <div class="search-breadcrumb">
        <h4> Searching for: <?php echo $text; ?></h4>
    </div>
    <div class="card-grid-search-results">
        <?php
        if ($query->have_posts()) { ?>
            <?php

            while ($query->have_posts()) : $query->the_post();
            ?>


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
                        <a href="<?php the_permalink(); ?>">
                            <button class="btn btn-dark">Ver producto</button>
                        </a>
                    </div>
                </div>



            <?php endwhile;
            ?>
    </div>
<?php
        } else {
            echo '<p>No post found</p>';
        }
        //  wp_reset_query(); 
        wp_reset_postdata();

?>

</div>












<?php get_footer(); ?>