<?php
/**
 * Services class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Services extends Front_Page {
    protected $section     = 'front_page_services_section';
    protected $option_name = 'front_page_services_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Services Section', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {

        \Kirki::add_field( $this->config, [
            'type'            => 'image',
            'settings'        => 'section_image',
            'label'           => esc_html__( 'Display hero slider section', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_image' => [
                    'selector'        => '#services .section_image',
                    'render_callback' => '__return_true',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'repeater',
            'settings'    => 'services',
            'label'       => esc_html__( 'Services items', 'food-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'row_label'   => [
                'type'  => 'field',
                'field' => 'title',
            ],
            'fields'      => [
                'title'       => [
                    'type'  => 'textarea',
                    'label' => esc_html__( 'Title', 'food-shop' ),
                ],
                'description' => [
                    'type'  => 'textarea',
                    'label' => esc_html__( 'Description', 'food-shop' ),
                ],
                'svg_icon'    => [
                    'type'              => 'textarea',
                    'label'             => esc_html__( 'Svg icon code', 'food-shop' ),
                    'sanitize_callback' => function ( $value ) {return $value;},
                ],
            ],
        ] );
    }

}