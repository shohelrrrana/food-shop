<?php
    /**
     * Template parts fir front page
     *
     * @package food-shop
     */
    $section         = get_option( 'front_page_hero_slider_section', [] );
    $sliders         = $section['sliders'] ?? [];
    $display_section = $section['display_section'] ?? '';
?>
<?php if ( is_array( $section ) && !empty( $section ) && $display_section ): ?>
<section id="hero_slider" class="section swiper-container swiper-slider swiper-slider-4" data-loop="true" data-autoplay="5000">
    <div class="swiper-wrapper context-dark">

        <?php foreach ( $sliders as $slider ):
                $content_align = $slider['content_align'] ?? '';
                $bg_image      = $slider['bg_image'] ?? '';
                $title         = $slider['title'] ?? '';
                $description   = $slider['description'] ?? '';
                $btn_title     = $slider['btn_title'] ?? '';
                $btn_link      = $slider['btn_link'] ?? '';
                $bg_image      = wp_get_attachment_image_url($bg_image, 'large');
            ?>
                <?php if($content_align != 'center'): ?>
		        <div class="swiper-slide swiper-slide-1" data-slide-bg="<?php echo esc_url($bg_image); ?>">
		            <div class="swiper-slide-caption section-md text-sm-left">
		                <div class="container">
		                    <div class="row">
		                        <div class="col-sm-8 col-md-7">
		                            <h2 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100">
                                        <?php echo wp_kses_post( $title ); ?>
		                            </h2>
		                            <h5 class="swiper-title-2 text-width-medium" data-caption-animate="fadeInLeft" data-caption-delay="250">
                                        <?php echo wp_kses_post( $description ); ?>
                                    </h5>
		                            <div class="button-wrap" data-caption-animate="fadeInLeft" data-caption-delay="400">
                                        <a class="button button-lg button-shadow-5 button-default-outline button-zakaria" 
                                        href="<?php echo esc_url( $btn_link ); ?>">
                                            <?php echo esc_html( $btn_title ); ?>
                                        </a>
                                    </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
                </div>
                <?php endif; ?>

                <?php if($content_align == 'center'): ?>
		        <div class="swiper-slide swiper-slide-2" data-slide-bg="<?php echo esc_url( $bg_image ); ?>">
		            <div class="swiper-slide-caption section-md text-center">
		                <div class="container">
		                    <h2 class="swiper-title-1 text-center" data-caption-animate="fadeInLeft" data-caption-delay="100">
                                <?php echo wp_kses_post( $title ); ?>
                            </h2>
		                    <h5 class="swiper-title-2 text-center" data-caption-animate="fadeInRight" data-caption-delay="250">
                                <?php echo wp_kses_post( $description ); ?>
		                    </h5>
		                    <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
                                <a class="button button-lg button-shadow-5 button-default-outline button-zakaria" 
                                href="<?php echo esc_url( $btn_link ); ?>">
                                    <?php echo esc_html( $btn_title ); ?>
                                </a>
                            </div>
		                </div>
		            </div>
                </div>
                <?php endif; ?>
            <?php endforeach;?>

    </div>
    <!-- Swiper Pagination-->
    <div class="swiper-pagination"></div>
    <!-- Swiper Navigation-->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>
<?php endif;?>