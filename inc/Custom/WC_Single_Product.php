<?php
    /**
     * WC_Single_Product class file
     *
     * @package food-shop
     */

    namespace Theme\Custom;
    use Theme\Traits\Singleton;

    class WC_Single_Product {
        use Singleton;

        protected function __construct() {
            $this->setup_hooks();
        }

        public function setup_hooks() {
            //Action & filter
            add_action( 'woocommerce_single_product_summary', [$this, 'single_product_summary'] );
            add_action( 'woocommerce_simple_add_to_cart', [$this, 'add_to_cart_before_open_tag'] );
            add_action( 'woocommerce_simple_add_to_cart', [$this, 'add_to_cart_after_close_tag'], 30 );
            add_action( 'woocommerce_before_single_product', [$this, 'before_single_product_open_tag'] );
            add_action( 'woocommerce_after_single_product', [$this, 'after_single_product_close_tag'] );
            add_action( 'woocommerce_before_single_product_summary', [$this, 'show_product_images'], 20 );

            add_filter( 'woocommerce_product_related_products_heading', [$this, 'related_products_heading'] );

            remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        }

        public function before_single_product_open_tag() {
            echo '<section class="section section-sm section-first bg-default">';
            echo '<div class="container">';
        }

        public function after_single_product_close_tag() {
            echo '</div>';
            echo '</section>';
        }

        public function related_products_heading() {
            echo '<h4 class="font-weight-sbold mb-5 text-center">' . __( 'Related products', 'food-shop' ) . '</h4>';
        }

        public function add_to_cart_before_open_tag() {
            echo '<div class="group-xs group-middle">';
        }

        public function add_to_cart_after_close_tag() {
            echo '</div>';
        }

        public function show_product_images() {
            global $product;
            $image_ids = $product->get_gallery_image_ids();
        ?>
            <div class="signle-product-image-wrapper">
              <div class="slick-vertical slick-product">

                  <div class="slick-slider carousel-parent" id="carousel-parent" data-items="1" data-swipe="true" data-child="#child-carousel" data-for="#child-carousel">
                    <?php
                        $i = 0;
                        foreach ( $image_ids as $image_id ):
                            $i++;
                            $image = wp_get_attachment_url( $image_id, 'large' );
                        ?>
	                    <div class="item">
	                      <div class="slick-product-figure">
	                        <img src="<?php echo esc_url( $image ); ?>" alt="" width="530" height="480"/>
	                      </div>
	                    </div>
	                    <div class="item">
	                      <div class="slick-product-figure">
	                        <img src="<?php echo esc_url( $image ); ?>" alt="" width="530" height="480"/>
	                      </div>
	                    </div>
	                    <?php endforeach;?>
                  </div>

                  <div class="slick-slider child-carousel slick-nav-1" id="child-carousel" data-arrows="true" data-items="3" data-sm-items="3" data-md-items="3" data-lg-items="3" data-xl-items="3" data-xxl-items="3" data-md-vertical="true" data-for="#carousel-parent">
                    <?php
                        $i = 0;
                        foreach ( $image_ids as $image_id ):
                            $i++;
                            $image = wp_get_attachment_url( $image_id, 'large' );
                        ?>
	                    <div class="item">
	                      <div class="slick-product-figure">
	                        <img src="<?php echo esc_url( $image ); ?>" alt="" width="530" height="480"/>
	                      </div>
	                    </div>
	                    <div class="item">
	                      <div class="slick-product-figure">
	                        <img src="<?php echo esc_url( $image ); ?>" alt="" width="530" height="480"/>
	                      </div>
	                    </div>
	                  <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php
                }

                    public function single_product_summary() {
                        global $product;
                    ?>
        <div class="single-product">
                <h3 class="text-transform-none font-weight-medium">
                  <?php the_title();?>
                </h3>
                <div class="group-md group-middle">
                  <div class="single-product-price">
                    <?php echo wp_kses_post( $product->get_price_html() ); ?>
                  </div>
                  <div class="single-product-rating"><span class="icon mdi mdi-star"></span><span class="icon mdi mdi-star"></span><span class="icon mdi mdi-star"></span><span class="icon mdi mdi-star"></span><span class="icon mdi mdi-star-half"></span></div>
                </div>
                <p>
                  <?php echo wp_kses_post( $product->get_short_description() ); ?>
                </p>
                <hr class="hr-gray-100">
                <ul class="list list-description">
                  <li>
                    <span>Categories:</span>
                    <?php echo wc_get_product_category_list( the_ID() ); ?>
                  </li>
                  <?php if ( $product->has_weight() ): ?>
                  <li>
                    <span>Weight:</span>
                    <span><?php echo $product->get_weight(); ?> kg</span>
                  </li>
                  <?php endif;?>
                </ul>
                <hr class="hr-gray-100">
              </div>
        <?php
            }

        }