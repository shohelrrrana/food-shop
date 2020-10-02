<?php
    /**
     * The main template file
     *
     * @package food-shop
     */

    get_header();
    $blog_column_classes = is_active_sidebar( 'blog-sidebar' ) ? 'col-lg-8 col-xl-9' : 'col-12';
?>
<?php get_template_part( '/template-parts/blog/page-title-area' );?>
    <!-- Section Shop-->
<section class="section section-xl bg-default text-md-left">
    <div class="container">
        <div class="row row-50 row-md-60">
            <div class="<?php echo esc_attr( $blog_column_classes ); ?>">
                <div class="inset-xl-right-70">
                    <div class="row row-30">
                    <?php
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( '/template-parts/blog/post' );
                        }
                    ?>
                    </div>

                    <!-- <div class="pagination-wrap">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item page-item-control disabled">
                                    <a class="page-link" href="" aria-label="Previous">
                                        <span class="icon" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="page-item active"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item page-item-control">
                                    <a class="page-link" href="" aria-label="Next">
                                        <span class="icon" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                    <div class="pagination-wrap">
                        <nav aria-label="Page navigation">
                            <?php
                                echo paginate_links( [
                                    'show_all'           => false,
                                    'prev_next'          => true,
                                    'prev_text'          => __( '<span class="icon" aria-hidden="true"></span>' ),
                                    'next_text'          => __( '<span class="icon" aria-hidden="true"></span>' ),
                                    'end_size'           => 1,
                                    'mid_size'           => 2,
                                    'type'               => 'list',
                                    'before_page_number' => '',
                                    'after_page_number'  => '',
                                ] );
                            ?>
                        </nav>
                    </div>

                </div>
            </div>

            <?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
            <div class="col-lg-4 col-xl-3">
              <div class="aside row row-30 row-md-50 justify-content-md-between">
                    <?php dynamic_sidebar( 'blog-sidebar' );?>
              </div>
            </div>
            <?php endif;?>


        </div>
    </div>
</section>

<?php
get_footer();
