<?php
/**
 * subscribe class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Subscribe extends Front_Page {
    protected $section     = 'front_page_subscribe_section';
    protected $option_name = 'front_page_subscribe_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Subscribe section', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'            => 'image',
            'settings'        => 'section_bg_image',
            'label'           => esc_html__( 'Section Background Image', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_bg_image' => [
                    'selector'        => '#subscribe',
                    'render_callback' => '__return_false',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_title',
            'label'           => esc_html__( 'Section title', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_title' => [
                    'selector'        => '#subscribe .section_title',
                    'render_callback' => function () {
                        return get_option( $this->section )['section_title'];
                    },
                ],
            ],
        ] );
        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_description',
            'label'           => esc_html__( 'Section description', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_description' => [
                    'selector'        => '#subscribe .section_description',
                    'render_callback' => function () {
                        return get_option( $this->section )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'mailchimp_api_key',
            'label'       => esc_html__( 'Mailchimp api key', 'food-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'mailchimp_list_id',
            'label'       => esc_html__( 'Mailchimp list id', 'food-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
        ] );

    }

}