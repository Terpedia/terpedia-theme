<?php
/**
 * Terpedia Scientific Theme - Main Index Template
 * 
 * @package Terpedia_Scientific
 * @version 1.0.0
 */

get_header(); ?>

<main class="content-area">
    <div class="container">
        <?php if (have_posts()) : ?>
            
            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                    <?php if (get_post_type() === 'terpene') : ?>
                        <!-- Terpene Profile Display -->
                        <div class="terpene-profile">
                            <div class="terpene-header">
                                <h1 class="terpene-title"><?php the_title(); ?></h1>
                                <p class="terpene-subtitle">Molecular Structure & Properties</p>
                            </div>
                            
                            <div class="terpene-content">
                                <?php if (get_post_meta(get_the_ID(), '_molecular_formula', true)) : ?>
                                    <div class="molecular-data">
                                        <?php 
                                        $molecular_formula = get_post_meta(get_the_ID(), '_molecular_formula', true);
                                        $molecular_weight = get_post_meta(get_the_ID(), '_molecular_weight', true);
                                        $boiling_point = get_post_meta(get_the_ID(), '_boiling_point', true);
                                        $density = get_post_meta(get_the_ID(), '_density', true);
                                        $smiles = get_post_meta(get_the_ID(), '_smiles', true);
                                        ?>
                                        
                                        <?php if ($molecular_formula) : ?>
                                            <div class="molecular-formula">
                                                <span class="molecular-label">Molecular Formula:</span>
                                                <span class="molecular-value"><?php echo esc_html($molecular_formula); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($molecular_weight) : ?>
                                            <div class="molecular-weight">
                                                <span class="molecular-label">Molecular Weight:</span>
                                                <span class="molecular-value"><?php echo esc_html($molecular_weight); ?> g/mol</span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($boiling_point) : ?>
                                            <div class="boiling-point">
                                                <span class="molecular-label">Boiling Point:</span>
                                                <span class="molecular-value"><?php echo esc_html($boiling_point); ?>°C</span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($density) : ?>
                                            <div class="density">
                                                <span class="molecular-label">Density:</span>
                                                <span class="molecular-value"><?php echo esc_html($density); ?> g/cm³</span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($smiles) : ?>
                                            <div class="smiles-notation">
                                                <span class="molecular-label">SMILES Notation:</span>
                                                <span class="molecular-value"><?php echo esc_html($smiles); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        
                    <?php elseif (get_post_type() === 'research') : ?>
                        <!-- Research Article Display -->
                        <div class="research-article">
                            <header class="entry-header">
                                <h1 class="research-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h1>
                                <div class="research-meta">
                                    <span class="research-date"><?php echo get_the_date(); ?></span>
                                    <?php if (get_the_category()) : ?>
                                        <span class="research-category"><?php the_category(', '); ?></span>
                                    <?php endif; ?>
                                </div>
                            </header>
                            
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        
                    <?php else : ?>
                        <!-- Standard Post Display -->
                        <header class="entry-header">
                            <h1 class="entry-title">
                                <?php if (is_singular()) : ?>
                                    <?php the_title(); ?>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php endif; ?>
                            </h1>
                            
                            <?php if (!is_page()) : ?>
                                <div class="entry-meta">
                                    <span class="posted-on"><?php echo get_the_date(); ?></span>
                                    <span class="byline"> by <?php the_author(); ?></span>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <div class="entry-content">
                            <?php 
                            if (is_singular()) {
                                the_content();
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!is_singular()) : ?>
                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                        </footer>
                    <?php endif; ?>
                    
                </article>
                
            <?php endwhile; ?>
            
            <?php the_posts_navigation(); ?>
            
        <?php else : ?>
            
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title">Nothing Found</h1>
                </header>
                
                <div class="page-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p>Ready to publish your first post? <a href="<?php echo esc_url(admin_url('post-new.php')); ?>">Get started here</a>.</p>
                    <?php elseif (is_search()) : ?>
                        <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </section>
            
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>