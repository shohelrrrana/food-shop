<?php
    /**
     * The page template file
     *
     * @package restaurant
     */
    get_header();
    ?>

<section class="section section-sm section-first bg-default">
    <div class="container">
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
</section>

<?php
get_footer();