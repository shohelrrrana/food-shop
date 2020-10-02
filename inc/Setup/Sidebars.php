<?php
/**
 * Sidebars class file
 *
 * @package food-shop
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Action
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
    }

    public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Shop Sidebar', 'food-shop' ),
            'id'            => 'shop-sidebar',
            'description'   => __( 'Widgets in this area will be shown on shop page.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6 class="widgettitle aside-title">',
            'after_title'   => '</h6>',
        ] );

        register_sidebar( [
            'name'          => __( 'Blog Sidebar', 'food-shop' ),
            'id'            => 'blog-sidebar',
            'description'   => __( 'Widgets in this area will be shown on blog page.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6 class="widgettitle aside-title">',
            'after_title'   => '</h6>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #1', 'food-shop' ),
            'id'            => 'footer-one',
            'description'   => __( 'Widgets in this area will be shown on footer.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widgettitle footer-modern-title">',
            'after_title'   => '</h5>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #2', 'food-shop' ),
            'id'            => 'footer-two',
            'description'   => __( 'Widgets in this area will be shown on footer.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widgettitle footer-modern-title">',
            'after_title'   => '</h5>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #3', 'food-shop' ),
            'id'            => 'footer-three',
            'description'   => __( 'Widgets in this area will be shown on footer.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widgettitle footer-modern-title">',
            'after_title'   => '</h5>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer Botom', 'food-shop' ),
            'id'            => 'footer-bottom',
            'description'   => __( 'Widgets in this area will be shown on footer bottom area.', 'food-shop' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widgettitle footer-modern-title">',
            'after_title'   => '</h5>',
        ] );
    }
}