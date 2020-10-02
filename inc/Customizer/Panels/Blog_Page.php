<?php
/**
 * Blog_Page class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Panels;

use Theme\Customizer\Customizer;

class Blog_Page extends Customizer {
    protected $panel = 'blog_page_panel';

    public function __construct() {
        //Load panel
        $this->register_panel();
    }

    public function register_panel() {
        \Kirki::add_panel( $this->panel, [
            'priority'        => 10,
            'title'           => esc_html__( 'Blog Page Sections', 'food-shop' ),
            'active_callback' => function () {return is_home();},
        ] );
    }

}