<?php
    /**
     * The template for displaying the footer
     *
     * @package food-shop
     */
?>

<!-- Page Footer-->
    <footer id="footer" class="section footer-modern footer-modern-2">
        <div class="footer-modern-body section-xl context-dark">
            <div class="container">
                <div class="row row-40 row-md-50 justify-content-xl-between">
                    <div class="col-md-10 col-lg-3 col-xl-4 wow fadeInRight">
                        <div class="inset-xl-right-70 block-1">
                            <?php
                                if ( is_active_sidebar( 'footer-one' ) ) {
                                    dynamic_sidebar( 'footer-one' );
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
                        <?php
                            if ( is_active_sidebar( 'footer-two' ) ) {
                                dynamic_sidebar( 'footer-two' );
                            }
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                        <?php
                            if ( is_active_sidebar( 'footer-three' ) ) {
                                dynamic_sidebar( 'footer-three' );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-modern-panel text-center">
            <div class="container">
                <?php
                    if ( is_active_sidebar( 'footer-bottom' ) ) {
                        dynamic_sidebar( 'footer-bottom' );
                    }
                ?>
            </div>
        </div>
    </footer>
</div>

<div class="snackbars" id="form-output-global"></div>
<?php wp_footer();?>
</body>
</html>
