<?php
/**
 * The front page template file
 *
 * @package food-shop
 */

get_header();
$sortable_front_page_sections = get_option( 'sortable_front_page_sections', [] );

get_template_part( '/template-parts/front-page/hero-slider' );
get_template_part( '/template-parts/front-page/services' );
get_template_part( '/template-parts/front-page/featured-product-items' );
get_template_part( '/template-parts/front-page/why-go' );
get_template_part( '/template-parts/front-page/subscribe' );
get_template_part( '/template-parts/front-page/blog' );

get_footer();
