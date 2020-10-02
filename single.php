<?php
    /**
     * The single template file
     *
     * @package food-shop
     */

    get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
		<?php if(is_home() && !is_front_page() ): ?>
			<header class="page_header">
				<h2 class="text-center py-3 my-5">
					<?php single_post_title();?>
				</h2>
			</header>
		<?php endif; ?>

        <?php if ( have_posts() ): ?>
            <div class="row">
                <div class="col-12">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                ?>
                </div>
            </div>
        <?php
            else:
                get_template_part( 'template-parts/content-none' );
            endif;
        ?>

    </div>
</main>

<?php
get_footer();
