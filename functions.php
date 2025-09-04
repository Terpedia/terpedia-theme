<?php
/**
 * Terpedia Scientific Theme Functions
 */

// Theme setup
function terpedia_scientific_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Add Elementor support
    add_theme_support('elementor');
    add_theme_support('elementor-pro');
    
    // Add full-width page support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'terpedia_scientific_setup');

// Enqueue styles and scripts
function terpedia_scientific_scripts() {
    // Get dynamic version from version manager
    if (file_exists(get_template_directory() . '/version-manager.php')) {
        require_once get_template_directory() . '/version-manager.php';
        $theme_version = TerpediaThemeVersionManager::getCurrentVersion();
    } else {
        $theme_version = '1.1.9';
    }
    
    wp_enqueue_style('terpedia-style', get_stylesheet_uri(), array(), $theme_version);
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null);
    
    // Enqueue Elementor compatibility styles
    if (did_action('elementor/loaded')) {
        wp_enqueue_style('terpedia-elementor', get_template_directory_uri() . '/assets/css/elementor-compatibility.css', array('terpedia-style'), $theme_version);
    }
    
    // Enqueue BuddyPress activity custom styles
    if (function_exists('bp_is_active')) {
        wp_enqueue_style('terpedia-buddypress-activity', get_template_directory_uri() . '/assets/css/buddypress-activity.css', array('terpedia-style'), $theme_version);
    }
}
add_action('wp_enqueue_scripts', 'terpedia_scientific_scripts');

// BuddyPress customizations
if (function_exists('bp_is_active')) {
    // Add BuddyPress support
    add_theme_support('buddypress');
    
    // Custom BuddyPress activity loop
    function terpedia_custom_activity_entry() {
        ?>
        <script>
        // Add mobile-friendly interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for activity interactions
            const likeButtons = document.querySelectorAll('.activity-like-btn');
            likeButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.classList.toggle('liked');
                });
            });
        });
        </script>
        <?php
    }
    add_action('wp_footer', 'terpedia_custom_activity_entry');
}

// Add custom body classes
function terpedia_custom_body_classes($classes) {
    $classes[] = 'terpedia-scientific-theme';
    return $classes;
}
add_filter('body_class', 'terpedia_custom_body_classes');

// Custom WordPress dashboard styling
function terpedia_admin_style() {
    echo '<style>
        .wp-admin {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .update-nag, .notice {
            display: none !important;
        }
    </style>';
}
add_action('admin_head', 'terpedia_admin_style');

// Remove WordPress version from head for security
remove_action('wp_head', 'wp_generator');

// Custom excerpt length
function terpedia_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'terpedia_excerpt_length');

// Custom excerpt more text
function terpedia_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'terpedia_excerpt_more');

// Elementor compatibility functions
function terpedia_elementor_support() {
    // Add Elementor locations
    if (function_exists('elementor_theme_do_location')) {
        add_action('elementor/page_templates/canvas/before_content', 'terpedia_elementor_canvas_before_content');
        add_action('elementor/page_templates/canvas/after_content', 'terpedia_elementor_canvas_after_content');
    }
}
add_action('elementor/loaded', 'terpedia_elementor_support');

// Elementor canvas template hooks
function terpedia_elementor_canvas_before_content() {
    echo '<div class="terpedia-elementor-canvas">';
}

function terpedia_elementor_canvas_after_content() {
    echo '</div>';
}

// Full-width page template support
function terpedia_add_page_templates($templates) {
    $templates['page-templates/full-width.php'] = 'Full Width';
    $templates['page-templates/elementor-full-width.php'] = 'Elementor Full Width';
    return $templates;
}
add_filter('theme_page_templates', 'terpedia_add_page_templates');

// Add body classes for page templates
function terpedia_body_classes($classes) {
    if (is_page_template('page-templates/full-width.php')) {
        $classes[] = 'page-template-full-width';
    }
    if (is_page_template('page-templates/elementor-full-width.php')) {
        $classes[] = 'page-template-elementor-full-width';
    }
    if (did_action('elementor/loaded') && \Elementor\Plugin::$instance->preview->is_preview_mode()) {
        $classes[] = 'elementor-preview-mode';
    }
    return $classes;
}
add_filter('body_class', 'terpedia_body_classes');

// Remove theme container for Elementor pages
function terpedia_remove_theme_container() {
    if (did_action('elementor/loaded') && \Elementor\Plugin::$instance->preview->is_preview_mode()) {
        remove_action('wp_head', 'wp_generator');
    }
}
add_action('wp_head', 'terpedia_remove_theme_container', 1);
?>