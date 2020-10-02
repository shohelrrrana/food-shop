<?php
    /**
     * The single template file
     *
     * @package aquila
     */
    if ( !is_active_sidebar( 'blog-sidebar' ) || !is_active_sidebar( 'shop-sidebar' ) ) {
        return;
    }
?>
<aside class="sidebar">
    <?php
        if ( is_active_sidebar( 'blog-sidebar' ) && is_home() ) {
            dynamic_sidebar( 'blog-sidebar' );
        } elseif ( is_active_sidebar( 'shop-sidebar' ) && is_shop() ) {
            dynamic_sidebar( 'shop-sidebar' );
        }
    ?>
</aside>
