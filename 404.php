<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package food-shop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page cannot be found.', 'food-shop' ); ?></h1>
			</header>
		</section>

	</main>

<?php
get_footer();
