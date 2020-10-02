<section class="section section-xxl bg-image-1">
    <div class="container">
        <h2 class="text-transform-capitalize wow fadeScale text-center">
            <?php _e( 'Featured Posts', 'food-shop' ); ?>
        </h2>
        <!-- Owl Carousel-->
        <div class="owl-carousel" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">

        <?php
            $args = [
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 3,
                'meta_query'     => [
                    [
                        'key'     => 'featured_post',
                        'value'   => '1',
                        'compare' => '=',
                    ],
                ],
            ];
            $posts = new WP_Query( $args );
            while ( $posts->have_posts() ):
                $posts->the_post();
            ?>
	            <article class="post post-classic box-md wow slideInDown">
                    <a class="post-classic-figure" href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="370" height="239"/>
                    </a>
	                <div class="post-classic-content">
	                    <div class="post-classic-time">
	                        <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                                <?php echo get_the_date('F d, Y'); ?>
                            </time>
	                    </div>
	                    <h5 class="post-classic-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h5>
	                    <p class="post-classic-text">
                            <?php the_excerpt(); ?>
                        </p>
	                </div>
	            </article>
	            <?php
                    endwhile;
                    wp_reset_query();
                ?>

        </div>
    </div>
</section>