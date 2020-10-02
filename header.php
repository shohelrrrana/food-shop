<?php
    /**
     * The header for our theme
     *
     * @package food-shop
     */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta <?php echo bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- <div class="preloader">
    <div class="preloader-body">
        <div class="cssload-bell">
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
        </div>
    </div>
</div> -->
<div class="page">

<?php get_template_part('template-parts/header/header'); ?>


