<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
    
    <style>
        /* Additional inline styles for immediate application */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        }
        
        .site-header {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        /* Full-screen layout - no card styling */
        article {
            background: transparent !important;
            backdrop-filter: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        
        .content-area {
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }
        
        /* Elementor page overrides */
        .elementor-page article,
        .elementor-page .content-area {
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }
    </style>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'fallback_cb' => function() {
                    echo '<ul>';
                    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/members/')) . '">Members</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/activity/')) . '">Activity</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/agents/')) . '">Agents</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/tersona/')) . '">Tersona</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/cyc/')) . '">Encyclopedia</a></li>';
                    echo '</ul>';
                }
            ));
            ?>
        </nav>
    </div>
</header>