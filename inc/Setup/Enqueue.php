<?php
/**
 * Enqueue class file
 *
 * @package food-shop
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Enqueue {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Action
        add_action( 'wp_enqueue_scripts', [$this, 'register_style'] );
        add_action( 'wp_enqueue_scripts', [$this, 'register_script'] );
    }

    public function register_style() {
        wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700', [], THEME_VERSION );
        wp_enqueue_style( 'bootstrap', THEME_URI . '/assets/vendor/bootstrap/css/bootstrap.css', [], THEME_VERSION );
        wp_enqueue_style( 'fonts', THEME_URI . '/assets/css/fonts.css', [], THEME_VERSION );
        wp_enqueue_style( 'main-style', THEME_URI . '/assets/css/style.css', [], THEME_VERSION );
        wp_enqueue_style( 'theme-style', get_stylesheet_uri(), [], THEME_VERSION );
    }

    public function register_script() {
        wp_enqueue_script( 'template-help', '//livedemo00.template-help.com/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js', [], THEME_VERSION, false );
        wp_enqueue_script( 'core.min', THEME_URI . '/assets/js/core.min.js', ['jquery'], THEME_VERSION, true );
        wp_enqueue_script( 'script', THEME_URI . '/assets/js/script.js', ['jquery'], THEME_VERSION, true );
        wp_enqueue_script( 'subscribe', THEME_URI . '/assets/js/subscribe.js', ['jquery'], THEME_VERSION, true );
        wp_enqueue_script( 'fix-design', THEME_URI . '/assets/js/fix-design.js', ['jquery'], THEME_VERSION, true );
        wp_enqueue_script( 'theme-script', THEME_URI . '/assets/js/theme-script.js', ['jquery'], THEME_VERSION, true );
    }
}