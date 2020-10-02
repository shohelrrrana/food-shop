<?php
    /**
     * The header top for our theme
     *
     * @package food-shop
     */
    $header_top = get_option( 'header_top', [] );
    $phone      = $header_top['phone'] ?? '';
    $email      = $header_top['email'] ?? '';
    global $woocommerce;
    if(function_exists('get_woocommerce_currency_symbol')){
        $currency = get_woocommerce_currency_symbol();
    }else{
        $currency = '$';
    }
?>
<div id="header-top" class="rd-navbar-aside-outer">
    <div class="rd-navbar-aside">
        <div class="rd-navbar-collapse">
            <ul class="contacts-classic">
                <li>
                    <span class="contacts-classic-title">
                        <?php echo $phone ? __('Call us:', 'food-shop') : ''; ?>
                    </span>
                    <a class="link phone" href="tel:<?php echo esc_attr( $phone ); ?>">
                        <?php echo esc_html($phone); ?>
                    </a>
                </li>
                <li>
                    <a class="email" href="mailto:<?php echo esc_html( $email ); ?>">
                        <?php echo esc_html( $email ); ?>
                    </a>
                </li>
            </ul>
            <a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202" href="#">
                <span>2</span>
            </a>
        </div>
        <!-- RD Navbar Panel-->
        <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand">
                <a class="brand" href="<?php echo site_url(); ?>">
                    <img class="brand-logo-light" src="<?php echo wp_get_attachment_url(get_theme_mod('custom_logo')); ?>" alt="" width="150" height="60"/>
                </a>
            </div>
        </div>
        <div class="rd-navbar-aside-element">
            <!-- RD Navbar Search-->
            <div class="rd-navbar-search rd-navbar-search-2">
                <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                <form class="rd-search" action="<?php echo site_url(); ?>" method="GET">
                    <?php 
                        $search = $_GET['s'] ?? '';
                    ?>
                    <div class="form-wrap">
                        <input value="<?php echo esc_attr($search); ?>" class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                        <input type="hidden" name="post_type" value="product">
                        <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                        <div class="rd-search-results-live" id="rd-search-results-live"></div>
                        <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                    </div>
                </form>
            </div>
            <!-- RD Navbar Basket-->
            <?php if(is_object($woocommerce)): ?>
            <div class="rd-navbar-basket-wrap">
                <button class="rd-navbar-basket fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline">
                    <span><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
                </button>
                <div class="cart-inline">
                    <div class="cart-inline-header">
                        <h5 class="cart-inline-title">
                            In cart:
                            <span> <?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span> 
                            Products
                        </h5>
                        <h6 class="cart-inline-title">
                            Total price:<span> <?php echo esc_html($currency . $woocommerce->cart->total); ?></span>
                        </h6>
                    </div>
                    <div class="cart-inline-body">
                        <form action="<?php echo admin_url('/admin-ajax.php'); ?>" method="POST" class="mini-cart">

                        <?php 
                            foreach($woocommerce->cart->get_cart() as $item_key => $item): 
                                $product = $item['data']; 
                                $product_image = wp_get_attachment_image_url(get_post_thumbnail_id($product->get_id()), 'thumbnail');
                            ?>
                        <div class="cart-inline-item">
                            <div class="unit unit-spacing-sm align-items-center">
                                <div class="unit-left">
                                    <a class="cart-inline-figure" href="<?php echo get_permalink( $product->get_id() ); ?>">
                                        <img src="<?php echo esc_url( $product_image ); ?>" alt="" width="106" height="104"/>
                                    </a>
                                </div>
                                <div class="unit-body">
                                    <h6 class="cart-inline-name">
                                        <a href="<?php echo get_permalink($product->get_id()); ?>">
                                            <?php echo esc_html( $product->get_title() ); ?>
                                        </a>
                                    </h6>
                                    <div>
                                        <div class="group-xs group-middle">
                                            <div class="table-cart-stepper">
                                                <input class="form-input" type="number" name="cart[<?php echo $item_key; ?>][qty]" data-zeros="true" value="<?php echo esc_attr( $item['quantity'] ); ?>" min="1" max="100"/>
                                            </div>
                                            <h6 class="cart-inline-title">
                                                <?php echo wp_kses_post( $product->get_price_html() ); ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                            <?php wp_nonce_field('update_mini_cart'); ?>
                            <input type="hidden" name="action" value="update_mini_cart"/>
                        </form>
    
                    </div>
                    <div class="cart-inline-footer">
                        <div class="group-sm">
                            <a class="btn button-default-outline-2 button-zakaria" 
                            href="<?php echo get_permalink(get_page_by_title('Cart')); ?>">
                                <?php _e('Go to cart', 'food-shop'); ?>
                            </a>
                            <a class="btn button-primary button-zakaria" 
                            href="<?php echo get_permalink( get_page_by_title( 'Checkout' ) ); ?>">
                                <?php _e( 'Checkout', 'food-shop' );?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>