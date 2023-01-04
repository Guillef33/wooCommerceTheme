<?php
/* Template name: Custom Search */
get_header();
?>

<?php

if ($_GET['search_text'] && !empty($_GET['search_text'])) {
    $text = $_GET['search_text'];
}

// if ($_GET['type'] && !empty($_GET['type'])) {
// $type = $_GET['type'];
//}

$type = 'product';

if ($_GET['category_name'] && !empty($_GET['category_name'])) {
    $category = $_GET['category_name'];
}

?>


<div class="container">

    <?php
    // Revisar esto
    //if (isset($type) && isset($text)) {
    $args = array(
        'product_cat' => $category,
        'post_type' => $type,
        'posts_per_page' => -1,
        's' => $text,
        //  'exact' => true,
        //  'sentence' => true
    );


    // }
    $query = new WP_Query($args);
    ?>
    <h4> Searching for: <?php echo $text; ?></h4>
    <?php
    if ($query->have_posts()) { ?>
        <?php

        while ($query->have_posts()) : $query->the_post();
        ?>
            <div class="posts clearfix">
                <h5><?php the_title(); ?></h5>
                <strong>
                    <?php if (get_post_type() == 'product') {
                        echo 'Product';
                    } ?>
                </strong>

            </div>

    <?php endwhile;
    } else {
        echo '<p>No post found</p>';
    }
    //  wp_reset_query(); 
    wp_reset_postdata();

    ?>

</div>












<?php get_footer(); ?>