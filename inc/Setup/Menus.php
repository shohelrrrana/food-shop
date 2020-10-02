<?php
/**
 * Menu class file for handle navigation
 *
 * @package restaurant
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Actions & filters
        add_action( 'init', [$this, 'register_menus'] );
        // add_filter( 'nav_menu_css_class', [$this, 'add_class_to_all_menu_list'] );
        // add_filter( 'nav_menu_link_attributes', [$this, 'add_class_to_all_menu_anchors'] );

    }

    public function register_menus() {
        register_nav_menus( [
            'primary-menu' => __( 'Primary Menu', 'restaurant' ),
            'footer-menu'  => __( 'Footer Menu', 'restaurant' ),
        ] );
    }

    public function add_class_to_all_menu_list( $classes ) {
        $classes[] = 'rd-nav-item';
        return $classes;
    }

    public function add_class_to_all_menu_anchors( $atts ) {
        $atts['class'] = 'rd-nav-link';
        return $atts;
    }

    public static function get_child_menu_items( $menu_array, $parent_id ) {
        $child_menu_items = [];
        if ( !empty( $menu_array ) && is_array( $menu_array ) ) {
            foreach ( $menu_array as $menu ) {
                if ( intval( $menu->menu_item_parent ) === intval( $parent_id ) ) {
                    array_push( $child_menu_items, $menu );
                }
            }
        }
        return $child_menu_items;
    }

    public static function is_current_menu( $menu_item ) {
        if ( is_object( $menu_item ) && !empty( $menu_item ) && ( intval( get_queried_object()->ID ) === intval( $menu_item->object_id ) ) ) {
            return true;
        }
        return false;
    }
}