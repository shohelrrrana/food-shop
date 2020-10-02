<?php
    /**
     * The header for our theme
     *
     * @package food-shop
     */
    $front_page_header_classes = is_front_page() ? 'header-creative-wrap context-dark' : '';
?>
<!-- Page Header-->
<header class="section page-header <?php echo esc_attr($front_page_header_classes); ?>">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <div class="rd-navbar rd-navbar-creative rd-navbar-creative-2" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="112px" data-xxl-stick-up-offset="132px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>

                <?php 
                get_template_part( '/template-parts/header/header-top' );
                get_template_part( '/template-parts/header/nav' );
                ?>

            </div>
        </div>
    </div>
</header>