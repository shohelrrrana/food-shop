<?php
    /**
     * Template parts fir front page
     *
     * @package food-shop
     */
    $section             = get_option( 'front_page_subscribe_section', [] );
    $section_bg_image    = $section['section_bg_image'] ?? '';
    $section_title       = $section['section_title'] ?? '';
    $section_description = $section['section_description'] ?? '';
    $mailchimp_api_key   = $section['mailchimp_api_key'] ?? '';
    $mailchimp_list_id   = $section['mailchimp_list_id'] ?? '';
?>
<section id="subscribe" class="parallax-container" data-parallax-img="<?php echo esc_url($section_bg_image); ?>">
    <div class="parallax-content section-xxl context-dark text-md-left">
        <div class="container">
            <div class="row row-30 justify-content-center align-items-center align-items-md-end">
                <div class="col-lg-3">
                    <h3 class="text-spacing-100 wow fadeInLeft section_title">
                        <?php echo esc_html( $section_title ); ?>
                    </h3>
                    <p class="wow fadeInLeft section_description" data-wow-delay=".1s">
                        <?php echo esc_html( $section_description ); ?>
                    </p>
                </div>
                <div class="col-lg-9 inset-lg-bottom-10">
                    <!-- RD Mailform-->
                    <form action="<?php echo esc_url(admin_url('/admin-ajax.php')); ?>" id="subscribe-form" class="rd-form rd-form-inline form-lg rd-form-text-center" method="post">
                        <?php wp_nonce_field( 'subscribe', 'subscribe_wpnonce' ); ?>
                        <input type="hidden" name="action" value="subscribe">
                        <input type="hidden" name="mailchimp_api_key" value="<?php echo esc_attr( $mailchimp_api_key ); ?>">
                        <input type="hidden" name="mailchimp_list_id" value="<?php echo esc_attr( $mailchimp_list_id ); ?>">
                        <div class="form-wrap wow fadeInUp">
                            <input class="form-input" id="email" type="text" name="email"/>
                            <label class="form-label" for="email">
                                <?php _e( 'Enter your e-mail address', 'food-shop' );?>
                            </label>
                        </div>
                        <div class="form-button wow fadeInRight">
                            <button class="button button-shadow-2 button-zakaria button-lg button-primary" type="submit">
                                <?php _e( 'Subscribe', 'food-shop' );?>
                            </button>
                        </div>
                    </form>
                    <div id="subscribe-message" class="alert form-message"></div>
                </div>
            </div>
        </div>
    </div>
</section>