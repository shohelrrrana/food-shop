<?php
/**
 * Sortable class file for customizer
 *
 * @package food-shop
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Sortable extends Front_Page {
    private $section     = 'sortable_front_page_sections';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Ordering and Visibility Sections', 'food-shop' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'     => 'sortable',
            'settings' => 'sortable_front_page_sections',
            'label'    => esc_html__( 'Ordering and Visibility', 'food-shop' ),
            'section'  => $this->section,
            'default'  => [
                'hero',
            ],
            'choices'  => [
                'hero' => esc_html__( 'Hero Section', 'food-shop' ),
            ],
        ] );
    }

}