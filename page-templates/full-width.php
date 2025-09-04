<?php
/**
 * Template Name: Full Width
 * 
 * A full-width page template without sidebar
 * 
 * @package Terpedia
 */

get_header(); ?>

<div id="primary" class="content-area full-width">
    <main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'terpedia-scientific' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
