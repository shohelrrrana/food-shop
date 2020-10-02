<?php
/**
 * Why_Go class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Kirki_Helper;
use Theme\Customizer\Panels\Front_Page;

class Why_Go extends Front_Page {
    protected $section     = 'front_page_why_go_section';
    protected $option_name = 'front_page_why_go_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Why go food store section', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {

        \Kirki::add_field( $this->config, [
            'type'            => 'select',
            'settings'        => 'prodcuts',
            'label'           => esc_html__( 'Choose Prodcuts', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'prodcuts' => [
                    'selector'        => '#why_go .prodcuts',
                    'render_callback' => function(){
                        return get_option($this->section)['prodcuts'];
                    },
                ],
            ],
            'multiple' => 5,
            'choices' => \Kirki_Helper::get_posts(['post_type'=>'product', 'posts_per_page' => '-1']),

        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'accordion_title',
            'label'           => esc_html__( 'Accordion title', 'food-shop' ),
            'section'         => $this->section,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'accordion_title' => [
                    'selector'        => '#why_go .accordion_title',
                    'render_callback' => function(){
                        return get_option($this->section)['accordion_title'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'repeater',
            'settings'    => 'accordion_items',
            'label'       => esc_html__( 'Accordion items', 'food-shop' ),
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
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'repeater',
            'settings'    => 'benefit_items',
            'label'       => esc_html__( 'Benefit items', 'food-shop' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'row_label'   => [
                'type'  => 'field',
                'field' => 'title',
            ],
            'fields'      => [
                'icon'       => [
                    'type'  => 'select',
                    'label' => esc_html__( 'Icon', 'food-shop' ),
                    'choices' => [
                        'location' => esc_html__( 'Location', 'food-shop' ),
                        'message' => esc_html__( 'Message', 'food-shop' ),
                        'love' => esc_html__( 'Love', 'food-shop' ),
                    ],
                ],
                'title'       => [
                    'type'  => 'textarea',
                    'label' => esc_html__( 'Title', 'food-shop' ),
                ],
                'description' => [
                    'type'  => 'textarea',
                    'label' => esc_html__( 'Description', 'food-shop' ),
                ],
            ],
            'partial_refresh' => [
                $this->section . 'benefit_items' => [
                    'selector'        => '#why_go .benefit_items',
                    'render_callback' => '__return_true',
                ],
            ],
        ] );
    }

}