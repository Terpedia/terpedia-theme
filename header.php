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
    <div class="header-container">
        <!-- Logo and Branding -->
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                <div class="logo-container">
                    <div class="logo-icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/../attached_assets/IMG_9616_1752358879287.png'); ?>" alt="Terpedia Logo" width="32" height="32" style="object-fit: contain;" />
                    </div>
                    <div class="brand-text">
                        <h1 class="site-title">Terpedia</h1>
                        <p class="site-tagline">Research Social Network</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Main Navigation -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'fallback_cb' => function() {
                    echo '<ul class="nav-menu">';
                    echo '<li><a href="' . esc_url(home_url('/')) . '" class="nav-link"><span class="nav-icon">🏠</span>Home</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/research-feed/')) . '" class="nav-link"><span class="nav-icon">📊</span>Research Feed</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/terports/')) . '" class="nav-link"><span class="nav-icon">🔬</span>Terports</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/cases/')) . '" class="nav-link"><span class="nav-icon">🏥</span>Cases</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/podcasts/')) . '" class="nav-link"><span class="nav-icon">🎙️</span>Podcasts</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/newsletters/')) . '" class="nav-link"><span class="nav-icon">📧</span>Newsletters</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/products/')) . '" class="nav-link"><span class="nav-icon">🧪</span>Products</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/encyclopedia/')) . '" class="nav-link"><span class="nav-icon">🧬</span>Encyclopedia</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/about/')) . '" class="nav-link"><span class="nav-icon">ℹ️</span>About</a></li>';
                    echo '</ul>';
                }
            ));
            ?>
        </nav>
        
        <!-- Search and User Actions -->
        <div class="header-actions">
            <div class="search-container">
                <input type="text" placeholder="Search research..." class="search-input" id="header-search">
                <button class="search-button" type="button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                        <path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            
            <div class="user-actions">
                <a href="<?php echo esc_url(home_url('/login/')); ?>" class="action-link login-link">Login</a>
                <a href="<?php echo esc_url(home_url('/signup/')); ?>" class="action-link signup-link">Sign Up</a>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
    
    <!-- Mobile Navigation -->
    <div class="mobile-navigation" id="mobile-navigation">
        <nav class="mobile-nav">
            <ul class="mobile-nav-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link">🏠 Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/research-feed/')); ?>" class="mobile-nav-link">📊 Research Feed</a></li>
                <li><a href="<?php echo esc_url(home_url('/terports/')); ?>" class="mobile-nav-link">🔬 Terports</a></li>
                <li><a href="<?php echo esc_url(home_url('/cases/')); ?>" class="mobile-nav-link">🏥 Cases</a></li>
                <li><a href="<?php echo esc_url(home_url('/podcasts/')); ?>" class="mobile-nav-link">🎙️ Podcasts</a></li>
                <li><a href="<?php echo esc_url(home_url('/newsletters/')); ?>" class="mobile-nav-link">📧 Newsletters</a></li>
                <li><a href="<?php echo esc_url(home_url('/products/')); ?>" class="mobile-nav-link">🧪 Products</a></li>
                <li><a href="<?php echo esc_url(home_url('/encyclopedia/')); ?>" class="mobile-nav-link">🧬 Encyclopedia</a></li>
            </ul>
        </nav>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileNavigation = document.getElementById('mobile-navigation');
    
    if (mobileMenuToggle && mobileNavigation) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileNavigation.classList.toggle('active');
            
            // Animate hamburger lines
            const lines = mobileMenuToggle.querySelectorAll('.hamburger-line');
            if (mobileNavigation.classList.contains('active')) {
                lines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                lines[1].style.opacity = '0';
                lines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                lines[0].style.transform = 'none';
                lines[1].style.opacity = '1';
                lines[2].style.transform = 'none';
            }
        });
        
        // Close mobile menu when clicking on a link
        const mobileNavLinks = mobileNavigation.querySelectorAll('.mobile-nav-link');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileNavigation.classList.remove('active');
                const lines = mobileMenuToggle.querySelectorAll('.hamburger-line');
                lines[0].style.transform = 'none';
                lines[1].style.opacity = '1';
                lines[2].style.transform = 'none';
            });
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuToggle.contains(event.target) && !mobileNavigation.contains(event.target)) {
                mobileNavigation.classList.remove('active');
                const lines = mobileMenuToggle.querySelectorAll('.hamburger-line');
                lines[0].style.transform = 'none';
                lines[1].style.opacity = '1';
                lines[2].style.transform = 'none';
            }
        });
    }
    
    // Search functionality
    const searchInput = document.getElementById('header-search');
    const searchButton = document.querySelector('.search-button');
    
    if (searchInput && searchButton) {
        searchButton.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                // Redirect to search results page
                window.location.href = '<?php echo esc_url(home_url('/search/')); ?>?s=' + encodeURIComponent(query);
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const query = searchInput.value.trim();
                if (query) {
                    window.location.href = '<?php echo esc_url(home_url('/search/')); ?>?s=' + encodeURIComponent(query);
                }
            }
        });
    }
});
</script>