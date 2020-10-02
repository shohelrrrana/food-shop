<?php
    /**
     * The Content File
     *
     * @package aquila
     */
?>

<article id="post-<?php the_ID()?>"<?php post_class( 'mb-5' )?>>
    <?php
        get_template_part( 'template-parts/blog/entry-header' );
        get_template_part( 'template-parts/blog/entry-meta' );
        get_template_part( 'template-parts/blog/entry-content' );
        get_template_part( 'template-parts/blog/entry-footer' );
    ?>
</article>
