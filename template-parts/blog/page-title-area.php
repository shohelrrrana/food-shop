<?php
    /**
     * Template parts for blog page
     *
     * @package food-shop
     */
    $section             = get_option( 'blog_page_page_title_section', [] );
    $display_section     = $section['display_section'] ?? '';
    $section_bg_image    = $section['section_bg_image'] ?? '';
    $section_title       = $section['section_title'] ?? '';
    $section_description = $section['section_description'] ?? '';
    $display_breadcrumb  = $section['display_breadcrumb'] ?? '';
?>
<?php if( is_array($section) && !empty($section) && $display_section ): ?>
<section id="page_title" class="breadcrumbs-custom">
    <div class="parallax-container" data-parallax-img="<?php echo esc_url( $section_bg_image ); ?>">
        <div class="material-parallax parallax">
            <img src="<?php echo esc_url( $section_bg_image ); ?>" alt="" style="display: block; transform: translate3d(-50%, 97px, 0px);">
        </div>
        <div class="breadcrumbs-custom-body parallax-content context-dark">
        <div class="container">
            <h2 class="text-transform-capitalize breadcrumbs-custom-title text-center section_title">
                <?php echo wp_kses_post( $section_title ); ?>
            </h2>
            <h5 class="breadcrumbs-custom-text text-center section_description">
               <?php echo wp_kses_post( $section_description ); ?>
            </h5>
        </div>
        </div>
    </div>
    <?php if($display_breadcrumb): ?>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li>
                <a href="<?php echo site_url(); ?>">
                    <?php echo get_the_title( get_option('page_on_front') ); ?>
                </a>
            </li>
            <li class="active">
                <?php single_post_title();?>
            </li>
        </ul>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>