<?php
    /**
     * WC_Product class file
     *
     * @package food-shop
     */

    namespace Theme\Custom;
    use Theme\Traits\Singleton;

    class WC_Product {
        use Singleton;

        protected function __construct() {
            $this->setup_hooks();
        }

        public function setup_hooks() {
            //Action & filter
            // add_action( 'woocommerce_before_main_content', [$this, 'before_main_content_open_tag'] );
            // add_action( 'woocommerce_after_main_content', [$this, 'after_main_content_close_tag'] );
            add_action( 'woocommerce_before_shop_loop_item', [$this, 'before_shop_loop_item_open_tag'] );
            add_action( 'woocommerce_after_shop_loop_item', [$this, 'after_shop_loop_item_close_tag'] );
            add_action( 'woocommerce_before_shop_loop_item_title', [$this, 'shop_loop_item_title_close_tag'], 30 );
            add_action( 'woocommerce_shop_loop_item_title', [$this, 'shop_loop_product_title'] );
            add_action( 'woocommerce_after_shop_loop_item_title', [$this, 'shop_loop_item_price'] );
            add_action( 'woocommerce_after_shop_loop_item_title', [$this, 'shop_loop_sale_flash'] );
            add_action( 'woocommerce_after_shop_loop_item_title', [$this, 'shop_loop_sale_flash'] );

            add_filter( 'woocommerce_show_page_title', '__return_false' );

            remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
            remove_action( 'woocommerce_archive_description', 'woocommerce_product-item_archive_description', 10 );
            remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
        }

        public function before_main_content_open_tag() {
            $shop_columns = is_active_sidebar( 'shop-sidebar' ) ? 'col-lg-8 col-xl-9' : 'col-12';
            echo '<section class="section section-xxl bg-default text-md-left">';
            echo '<div class="container">';
            echo '<div class="row row-50">';
            echo '<div class="' . $shop_columns . '"';
        }

        public function after_main_content_close_tag() {
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        }

        public function before_shop_loop_item_open_tag() {
            echo '<article class="product-item">';
            echo '<div class="product-item-body">';
            echo '<div class="product-item-figure">';
        }

        public function after_shop_loop_item_close_tag() {
            echo '</div>';
            $this->shop_loop_add_to_cart();
            echo '</article>';

        }

        public function shop_loop_item_title_close_tag() {
            echo '</div>';
        }

        public function shop_loop_product_title() {
            the_title( '<h5 class="product-item-title text-center">', '</h5>' );
        }

        public function shop_loop_item_price() {
            global $product;
            $price = '<div class="product-item-price-wrap text-center">';
            if ( $product->get_sale_price() ) {
                $price .= ' <div class="product-item-price product-item-price-old"> ' . get_woocommerce_currency_symbol() . $product->get_regular_price() . '</div>';
            }
            $price .= '<div class="product-item-price">' . get_woocommerce_currency_symbol() . $product->get_price() . '</div>';
            $price .= '</div>';
            echo $price;
        }

        public function shop_loop_sale_flash() {
            global $product;
            if ( $product->get_sale_price() ) {
                echo '<span class="product-item-badge product-item-badge-sale">Sale</span>';
            }
        }

        public function shop_loop_add_to_cart() {
            global $product;
        ?>
            <div class="product-item-button-wrap">
                <div class="product-item-button">
                    <a class="btn button-secondary button-zakaria fl-bigmug-line-search74 no-wc-css"
                    href="<?php the_permalink();?>"></a>
                </div>
                <div class="product-item-button">
                    <a
                    href="?add-to-cart=<?php the_ID();?>"
                    data-quantity="1"
                    class="btn button-primary button-zakaria fl-bigmug-line-shopping202 add_to_cart_button ajax_add_to_cart no-wc-css"
                    data-product_id="<?php the_ID();?>"
                    data-product_sku=""
                    rel="nofollow" >
                    </a>
                </div>
            </div>
    <?php
        }

    }