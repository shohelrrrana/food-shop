<?php
    /**
     * Template parts fir front page
     *
     * @package food-shop
     */
    $section = get_option( 'front_page_featured-product-items_section', [] );
?>
<section id="featured_product-items" class="section section-xxl bg-default">
    <div class="container">
        <h2 class="text-transform-capitalize wow fadeScale text-center">
            <?php _e('Featured Products', 'food-shop') ?>
        </h2>
        <div class="row row-lg row-30 row-lg-50">

            <?php
                $args = [
                    'post_type'      => 'product-item',
                    'post_status'    => 'publish',
                    'posts_per_page' => 8,
                    'meta_query' => [
                        [
                            'key' => 'featured_product-item',
                            'value' => '1',
                            'compare' => '=',
                        ]
                    ],
                ];
                $products = new WP_Query($args);
                while($products->have_posts()):
                    $products->the_post();
                    global $product;
                    $product_badge = $product->get_sale_price() ? 'sale' : 'new';
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <!-- Product-->
                <article class="product-item wow fadeInRight">
                    <div class="product-item-body">
                        <div class="product-item-figure">
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" width="196" height="134"/>
                        </div>
                        <h5 class="product-item-title text-center">
                            <a href="<?php the_permalink();?>">
                                <?php the_title(); ?>
                            </a>
                        </h5>
                        <div class="product-item-price-wrap">
                            <?php if($product->get_sale_price()): ?>
                            <div class="product-item-price product-item-price-old">
                                <?php echo esc_html($product->get_regular_price()); ?>
                            </div>
                            <?php endif; ?>
                            <div class="product-item-price">
                                <?php echo esc_html( $product->get_price() ); ?>
                            </div>
                        </div>
                    </div>
                    <span class="product-item-badge product-item-badge-<?php echo esc_attr( $product_badge ); ?>">
                        <?php echo esc_html($product_badge); ?>
                    </span>
                    <div class="product-item-button-wrap">
                        <div class="product-item-button">
                            <a class="button button-secondary button-zakaria fl-bigmug-line-search74" 
                            href="<?php the_permalink();?>"></a>
                        </div>
                        <div class="product-item-button">
                            <a 
                            class="button button-primary button-zakaria fl-bigmug-line-shopping202 add_to_cart_button ajax_add_to_cart"
                            data-quantity="1"
                            data-product-item_id="<?php the_ID(); ?>"
                            data-rel="nofollow"
                            href="?add-to-cart=<?php the_ID(); ?>"></a>
                        </div>
                    </div>
                </article>
            </div>
            <?php 
        endwhile;
        wp_reset_query();
         ?>


        </div>
    </div>
</section>