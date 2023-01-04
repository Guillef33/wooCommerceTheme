      <?php
        $productos = new WP_Query(array('post_type' => 'product'));
        ?>
      <?php
        while ($productos->have_posts()) {
            $productos->the_post(); ?>
          <div class="carousel-item">
              <a href="<?php the_permalink(); ?>">
                  <h3> <?php the_title(); ?></h3>
                  <?php
                    if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url(''); ?>" class="d-block w-100" />
                  <?php endif; ?>
              </a>
          </div>

      <?php
        }
        ?>