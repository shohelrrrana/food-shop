<?php
/**
 * Header_Top class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Theme_Options;

use Theme\Customizer\Panels\Theme_Options;

class Header_Top extends Theme_Options {
    protected $section     = 'header_top';
    protected $option_name = 'header_top';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'header_top', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'phone',
            'label'           => __( 'Phone', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . 'phone' => [
                    'selector'        => '#header-top .phone',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['phone'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'email',
            'label'           => __( 'Email', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'priority'        => 10,
            'partial_refresh' => [
                $this->section . 'email' => [
                    'selector'        => '#header-top .email',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['email'];
                    },
                ],
            ],
        ] );

    }

}