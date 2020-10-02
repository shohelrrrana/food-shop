<?php
    /**
     * Template parts fir front page
     *
     * @package food-shop
     */
    $section         = get_option( 'front_page_services_section', [] );
    $section_image   = $section['section_image'] ?? [];
    $services        = $section['services'] ?? [];
    $total_services  = ceil( count( $services ) / 2 );
    $services        = array_chunk( $services, $total_services );
    $first_services  = $services[0] ?? [];
    $second_services = $services[1] ?? [];
?>
<section id="services" class="section section-xxl bg-image-1">
    <div class="container">
        <div class="row row-xl row-30 row-md-40 row-lg-50 align-items-center">
            <div class="col-md-5 col-xl-4">
                <div class="row row-30 row-md-40 row-lg-50 bordered-2">

                    <?php
                        foreach ( $first_services as $service ):
                            $svg_icon    = $service['svg_icon'] ?? '';
                            $title       = $service['title'] ?? '';
                            $description = $service['description'] ?? '';
                        ?>
	                    <div class="col-sm-6 col-md-12">
	                        <article class="box-icon-classic box-icon-nancy-right text-center text-lg-right wow fadeInLeft">
	                            <div class="unit flex-column flex-lg-row-reverse">
	                                <div class="unit-left">
	                                    <div class="box-icon-classic-svg">
	                                        <?php echo $svg_icon; ?>
	                                    </div>
	                                </div>
	                                <div class="unit-body">
	                                    <h4 class="box-icon-classic-title text-right">
	                                        <a href="#"><?php echo wp_kses_post( $title ); ?></a>
	                                    </h4>
	                                    <p class="box-icon-classic-text text-right">
	                                        <?php echo wp_kses_post( $description ); ?>
	                                    </p>
	                                </div>
	                            </div>
	                        </article>
	                    </div>
	                    <?php endforeach;?>

                </div>
            </div>
            <div class="col-md-2 col-xl-4 d-none d-md-block wow fadeScale section_image">
                <img src="<?php echo esc_url( $section_image ) ?>" alt="" width="399" height="407"/>
            </div>
            <div class="col-md-5 col-xl-4">
                <div class="row row-30 row-md-40 row-lg-50 bordered-2">

                    <?php
                        foreach ( $second_services as $service ):
                            $svg_icon    = $service['svg_icon'] ?? '';
                            $title       = $service['title'] ?? '';
                            $description = $service['description'] ?? '';
                        ?>
	                    <div class="col-sm-6 col-md-12">
	                        <article class="box-icon-classic box-icon-nancy-left text-center text-lg-left wow fadeInRigth">
	                            <div class="unit flex-column flex-lg-row">
	                                <div class="unit-left">
	                                    <div class="box-icon-classic-svg">
	                                        <?php echo $svg_icon; ?>
	                                    </div>
	                                </div>
	                                <div class="unit-body">
	                                    <h4 class="box-icon-classic-title">
	                                        <a href="#"><?php echo wp_kses_post( $title ); ?></a>
	                                    </h4>
	                                    <p class="box-icon-classic-text">
	                                        <?php echo wp_kses_post( $description ); ?>
	                                    </p>
	                                </div>
	                            </div>
	                        </article>
	                    </div>
	                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
</section>