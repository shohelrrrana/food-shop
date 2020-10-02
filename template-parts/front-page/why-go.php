<?php
    /**
     * Template parts fir front page
     *
     * @package food-shop
     */
    $section         = get_option( 'front_page_why_go_section', [] );
    $prodcut_ids        = $section['prodcuts'] ?? [];
    $accordion_title = $section['accordion_title'] ?? '';
    $accordion_items = $section['accordion_items'] ?? [];
    $benefit_items   = $section['benefit_items'] ?? [];
?>
<section id="why_go" class="section section-xxl bg-default text-md-left">
    <div class="container">
        <div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
            <div class="col-sm-8 col-md-5 col-xl-6">
                <div class="inset-xl-right-20">
                    <div class="product-item-wrap-1 bg-image-1 block-1 prodcuts">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel owl-style-5" data-items="1" data-margin="30" data-dots="true" data-autoplay="true">
                            
                            <?php 
                                if(function_exists('wc_get_product')):
                                foreach($prodcut_ids as $prodcut_id):
                                    $product = wc_get_product($prodcut_id);
                                    $product_img_id = get_post_thumbnail_id($product->get_id());
                                    $product_img = wp_get_attachment_image_url($product_img_id, 'large');
                             ?>
                            <article class="product-item-creative">
                                <div class="product-item-figure">
                                    <img src="<?php echo esc_url($product_img); ?>" alt="" width="470" height="324"/>
                                </div>
                                <h4 class="product-item-creative-title text-center">
                                    <a href="<?php echo get_permalink($product->get_id()); ?>">
                                        <?php echo esc_html($product->get_name()); ?>
                                    </a>
                                </h4>
                                <div class="product-item-creative-price-wrap">
                                    <?php if( $product->get_sale_price() ): ?>
                                    <div class="product-item-creative-price product-item-creative-price-old">
                                        <?php echo esc_html( $product->get_regular_price() ); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="product-item-creative-price">
                                        <?php echo esc_html( $product->get_price() ); ?>
                                    </div>
                                </div>
                            </article>
                            <?php 
                        endforeach;
                        endif
                         ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-6">
                <h2 class="text-transform-capitalize wow fadeInRight accordion_title">
                    <?php echo esc_html( $accordion_title ); ?>
                </h2>
                <!-- Bootstrap collapse-->
                <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist" aria-multiselectable="false">
                    
                      <?php 
                        $i = 0;
                        foreach($accordion_items as $accordion_item):
                            $i++;
                            $title = $accordion_item['title'] ?? '';
                            $description = $accordion_item['description'] ?? '';
                        ?>                  
                    <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
                        <div class="card-header" role="tab">
                            <div class="card-title">
                                <a class="<?php echo $i === 1 ? '' : 'collapsed'; ?>" id="accordion1-card-head-<?php echo esc_attr($i); ?>" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-<?php echo esc_attr( $i ); ?>" aria-controls="accordion1-card-body-<?php echo esc_attr( $i ); ?>" aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>" role="button">
                                    <?php echo esc_html( $title ); ?>
                                    <div class="card-arrow">
                                        <div class="icon"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse <?php echo $i === 1 ? 'show' : ''; ?>" id="accordion1-card-body-<?php echo esc_attr( $i ); ?>" aria-labelledby="accordion1-card-head-<?php echo esc_attr($i); ?>" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                                <p>
                                    <?php echo esc_html( $description ); ?>
                                </p>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>


                </div>
            </div>
            <div class="col-xl-12">
                <div class="row row-30 benefit_items">

                    <?php 
                    foreach($benefit_items as $benefit_item):
                        $icon = $benefit_item['icon'] ?? '';
                        $title = $benefit_item['title'] ?? '';
                        $description = $benefit_item['description'] ?? '';
                    ?> 
                    <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                        <article class="box-icon-creative">
                            <div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                <div class="unit-left">
                                    <?php if($icon == 'location' || !$icon): ?>
                                    <div class="box-icon-creative-icon fl-bigmug-line-big104"></div>
                                    <?php endif; ?>
                                    <?php if($icon == 'message'): ?>
                                    <div class="box-icon-creative-icon fl-bigmug-line-chat55"></div>
                                    <?php endif; ?>
                                    <?php if($icon == 'love'): ?>
                                    <div class="box-icon-creative-icon fl-bigmug-line-like51"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="unit-body">
                                    <h5 class="box-icon-creative-title">
                                        <a href="#"><?php echo esc_html( $title ); ?></a>
                                    </h5>
                                    <p class="box-icon-creative-text">
                                        <?php echo esc_html( $description ); ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?> 

                </div>
            </div>
        </div>
    </div>
</section>

