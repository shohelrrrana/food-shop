<?php
/**
 * Hero_Slider class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Hero_Slider extends Front_Page {
    protected $section     = 'front_page_hero_slider_section';
    protected $option_name = 'front_page_hero_slider_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Hero Slider Section', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {

        \Kirki::add_field( $this->config, [
            'type'            => 'toggle',
            'settings'        => 'display_section',
            'label'           => esc_html__( 'Display hero slider section', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'default'         => '1',
            'partial_refresh' => [
                $this->section . 'display_section' => [
                    'selector'        => '#hero_slider .container',
                    'render_callback' => '__return_true',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'repeater',
            'settings'    => 'sliders',
            'label'       => esc_html__( 'Sliders', 'food-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'row_label'   => [
                'type'  => 'field',
                'field'  => 'title',
            ],
            'fields'      => [
                'content_align' => [
                    'type'    => 'select',
                    'label'   => esc_html__( 'Content align', 'food-shop' ),
                    'choices' => [
                        'left'   => esc_html__( 'Left', 'food-shop' ),
                        'center' => esc_html__( 'Center', 'food-shop' ),
                    ],
                ],
                'bg_image' => [
                    'type'    => 'image',
                    'label'   => esc_html__( 'Background image', 'food-shop' ),
                ],
                'title' => [
                    'type'    => 'textarea',
                    'label'   => esc_html__( 'Title', 'food-shop' ),
                ],
                'description' => [
                    'type'    => 'textarea',
                    'label'   => esc_html__( 'Description', 'food-shop' ),
                ],
                'btn_title' => [
                    'type'    => 'text',
                    'label'   => esc_html__( 'Button title', 'food-shop' ),
                ],
                'btn_link' => [
                    'type'    => 'text',
                    'label'   => esc_html__( 'Button link', 'food-shop' ),
                ],
            ],
        ] );
    }

}