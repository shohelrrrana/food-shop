<?php
/**
 * Theme Main class file
 *
 * @package food-shop
 */

namespace Theme;

use Theme\Customizer\Customizer;
use Theme\Custom\Form;
use Theme\Custom\Social_Icons_Widget;
use Theme\Custom\WC_Product;
use Theme\Custom\WC_Single_Product;
use Theme\Setup\Enqueue;
use Theme\Setup\Menus;
use Theme\Setup\Setup;
use Theme\Setup\Sidebars;

class Theme {
    static $boot;

    public function __construct() {
        //Load Methods
        $this->include_files();
        $this->setup_hooks();

        //Get Instance Classes
        Setup::get_instance();
        Enqueue::get_instance();
        Customizer::get_instance();
        Menus::get_instance();
        Sidebars::get_instance();
        Form::get_instance();
        WC_Product::get_instance();
        WC_Single_Product::get_instance();
    }

    public function setup_hooks() {
        add_action( 'widgets_init', [$this, 'register_widgets'] );
    }

    public function register_widgets() {
        register_widget( Social_Icons_Widget::class );
    }

    public function include_files() {
        require_once get_template_directory() . '/inc/Helpers/helper.php';
        require_once get_template_directory() . '/inc/Helpers/template-tags.php';
        require_once get_template_directory() . '/inc/Helpers/plugin_activation.php';
        require_once get_template_directory() . '/inc/Plugins/Kirki_Installer_Section.php';
        require_once get_template_directory() . '/demo-data/demo-data.php';
    }

    static public function boot() {
        if ( !static::$boot ) {
            static::$boot = new Theme();
        }
        return static::$boot;
    }
}