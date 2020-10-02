<?php

//Define theme constant
define( 'THEME_PATH', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

if ( get_site_url() == 'http://food-shop.test' ) {
    define( 'THEME_VERSION', time() );
} else {
    define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );
}

function dd( $data ) {
    echo '<pre>';
    print_r( $data );
    echo '<pre>';
    wp_die();
}