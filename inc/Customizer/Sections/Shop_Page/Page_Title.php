<?php
/**
 * Page_Title class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Shop_Page;

use Theme\Customizer\Panels\Shop_Page;

class Page_Title extends Shop_Page {
    protected $section     = 'shop_page_page_title_section';
    protected $option_name = 'shop_page_page_title_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Page Title Section', 'food-shop' ),
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
                    'selector'        => '#shop_page_title',
                    'render_callback' => '__return_true',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'image',
            'settings'        => 'section_bg_image',
            'label'           => esc_html__( 'Section Background Image', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'section_title',
            'label'           => esc_html__( 'section_title', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_title' => [
                    'selector'        => '#shop_page_title .section_title',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_title'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'section_description',
            'label'           => esc_html__( 'section_description', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_description' => [
                    'selector'        => '#shop_page_title .section_description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'toggle',
            'settings'        => 'display_breadcrumb',
            'label'           => esc_html__( 'Display breadcrumb', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'default'         => '1',
        ] );

    }

}