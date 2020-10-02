<?php
require_once get_template_directory() . '/inc/Plugins/class-tgm-plugin-activation.php';

function cleaner_plugin_activation() {

    $plugins = [
        [
            'name'     => __( 'Kirki Customizer Framework', 'cleaner' ),
            'slug'     => 'kirki',
            'required' => true,
        ],
        [
            'name'     => __( 'One Click Demo Import', 'cleaner' ),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        ],
        [
            'name'     => __( 'Woocommerce', 'cleaner' ),
            'slug'     => 'woocommerce',
            'required' => true,
        ],
        [
            'name'     => __( 'Advanced Custom Fields', 'cleaner' ),
            'slug'     => 'advanced-custom-fields',
            'required' => true,
        ],
    ];

    $config = [
        'id'          => 'cleaner_plugins_activation',
        'menu'        => 'cleaner-plugins-activation',
        'parent_slug' => 'themes.php',
        'has_notices' => true,

    ];

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'cleaner_plugin_activation' );