<div class="col-sm-6 col-lg-4">
    <article class="post post-classic box-md">
        <a class="post-classic-figure" href="<?php the_permalink();?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="370" height="239">
        </a>
        <div class="post-classic-content">
        <div class="post-classic-time">
            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                <?php echo get_the_date('F d, Y');?>
            </time>
        </div>
        <h5 class="post-classic-title">
            <a href="<?php the_permalink();?>">
                <?php the_title(); ?>
            </a>
        </h5>
        <p class="post-classic-text">
            <?php the_excerpt();?>
        </p>
        </div>
    </article>
</div>