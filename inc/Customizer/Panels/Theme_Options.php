<?php
/**
 * Front_Page class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Panels;

use Theme\Customizer\Customizer;

class Theme_Options extends Customizer {
    protected $panel = 'theme_typography_panel';

    public function __construct() {
        //Load panel
        $this->register_panel();
    }

    public function register_panel() {
        \Kirki::add_panel( $this->panel, [
            'priority' => 10,
            'title'    => esc_html__( 'Theme Options', 'food-shop' ),
        ] );
    }

}