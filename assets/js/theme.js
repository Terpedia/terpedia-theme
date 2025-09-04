/**
 * Terpedia Scientific Theme JavaScript
 * 
 * @package Terpedia_Scientific
 * @version 1.0.0
 */

(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        initializeTheme();
        initializeMobileMenu();
        initializeScientificFeatures();
        initializeBuddyPressEnhancements();
        initializeAccessibility();
    });
    
    /**
     * Initialize theme functionality
     */
    function initializeTheme() {
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 600);
            }
        });
        
        // Add fade-in animation to content
        $('.content-area').addClass('fade-in');
        
        // Enhanced image loading
        $('img').on('load', function() {
            $(this).addClass('loaded');
        });
        
        // Back to top button
        if ($('.back-to-top').length === 0) {
            $('body').append('<button class="back-to-top" aria-label="Back to top">↑</button>');
        }
        
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                $('.back-to-top').addClass('visible');
            } else {
                $('.back-to-top').removeClass('visible');
            }
        });
        
        $('.back-to-top').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 600);
        });
    }
    
    /**
     * Initialize mobile menu
     */
    function initializeMobileMenu() {
        $('.menu-toggle').on('click', function() {
            var $this = $(this);
            var $menu = $('#primary-menu');
            var expanded = $this.attr('aria-expanded') === 'true';
            
            $this.attr('aria-expanded', !expanded);
            $menu.toggleClass('active');
            $this.toggleClass('active');
            
            // Animate menu items
            if (!expanded) {
                $menu.find('li').each(function(index) {
                    $(this).css('animation-delay', (index * 0.1) + 's');
                    $(this).addClass('slide-in');
                });
            } else {
                $menu.find('li').removeClass('slide-in');
            }
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('#primary-menu').removeClass('active');
                $('.menu-toggle').attr('aria-expanded', 'false').removeClass('active');
            }
        });
        
        // Close menu on escape key
        $(document).keydown(function(e) {
            if (e.keyCode === 27) { // ESC key
                $('#primary-menu').removeClass('active');
                $('.menu-toggle').attr('aria-expanded', 'false').removeClass('active');
            }
        });
    }
    
    /**
     * Initialize scientific features
     */
    function initializeScientificFeatures() {
        // Scientific keyword interactions
        $('.scientific-keyword').on('click', function(e) {
            e.preventDefault();
            var term = $(this).text().toLowerCase();
            
            // Add visual feedback
            $(this).addClass('clicked');
            setTimeout(() => {
                $(this).removeClass('clicked');
            }, 200);
            
            // Navigate to search or encyclopedia
            if (typeof terpedia_ajax !== 'undefined') {
                window.location.href = terpedia_ajax.site_url + '/search/?s=' + encodeURIComponent(term);
            }
        });
        
        // Molecular data interactions
        $('.molecular-data').each(function() {
            var $this = $(this);
            
            // Add expand/collapse functionality
            $this.on('click', function() {
                $this.toggleClass('expanded');
                
                // Animate the expansion
                if ($this.hasClass('expanded')) {
                    $this.find('.molecular-details').slideDown(300);
                } else {
                    $this.find('.molecular-details').slideUp(300);
                }
            });
            
            // Add copy functionality
            $this.find('.molecular-formula, .molecular-value').on('dblclick', function(e) {
                e.stopPropagation();
                copyToClipboard($(this).text());
                showNotification('Copied to clipboard: ' + $(this).text());
            });
        });
        
        // Terpene profile enhancements
        $('.terpene-profile').each(function() {
            var $profile = $(this);
            
            // Add hover effects
            $profile.on('mouseenter', function() {
                $(this).addClass('hovered');
            }).on('mouseleave', function() {
                $(this).removeClass('hovered');
            });
            
            // Add keyboard navigation
            $profile.attr('tabindex', '0').on('keydown', function(e) {
                if (e.keyCode === 13 || e.keyCode === 32) { // Enter or Space
                    e.preventDefault();
                    var link = $(this).find('a').first();
                    if (link.length) {
                        window.location.href = link.attr('href');
                    }
                }
            });
        });
        
        // Research article enhancements
        $('.research-article').each(function() {
            var $article = $(this);
            
            // Add reading time estimation
            var text = $article.find('.entry-content').text();
            var wordCount = text.split(/\s+/).length;
            var readingTime = Math.ceil(wordCount / 200); // Average reading speed
            
            $article.find('.research-meta').append(
                '<span class="reading-time">' + readingTime + ' min read</span>'
            );
            
            // Add progressive enhancement for long articles
            if (wordCount > 500) {
                $article.addClass('long-article');
                
                // Add table of contents for long articles
                var headings = $article.find('h2, h3, h4');
                if (headings.length > 2) {
                    var toc = '<div class="table-of-contents"><h4>Table of Contents</h4><ul>';
                    headings.each(function(index) {
                        var id = 'heading-' + index;
                        $(this).attr('id', id);
                        toc += '<li><a href="#' + id + '">' + $(this).text() + '</a></li>';
                    });
                    toc += '</ul></div>';
                    $article.find('.entry-content').prepend(toc);
                }
            }
        });
    }
    
    /**
     * Initialize BuddyPress enhancements
     */
    function initializeBuddyPressEnhancements() {
        if ($('#buddypress').length === 0) return;
        
        // Enhanced activity feed
        $('#buddypress .activity-list .activity-item').each(function() {
            var $item = $(this);
            
            // Add scientific keyword processing to activity content
            var content = $item.find('.activity-content').html();
            if (content) {
                content = processScientificKeywords(content);
                $item.find('.activity-content').html(content);
            }
            
            // Add expand/collapse for long posts
            var $content = $item.find('.activity-content');
            if ($content.text().length > 300) {
                $content.addClass('expandable');
                $content.append('<button class="expand-toggle">Show more</button>');
                
                $content.find('.expand-toggle').on('click', function() {
                    $content.toggleClass('expanded');
                    $(this).text($content.hasClass('expanded') ? 'Show less' : 'Show more');
                });
            }
        });
        
        // Enhanced member profiles for agents
        $('.buddypress-member.agent-profile').each(function() {
            var $profile = $(this);
            
            // Add agent specializations display
            $profile.addClass('scientific-profile');
            
            // Add interactive elements
            $profile.find('.member-header').after(
                '<div class="agent-quick-actions">' +
                '<button class="quick-consult">Quick Consultation</button>' +
                '<button class="view-expertise">View Expertise</button>' +
                '</div>'
            );
        });
        
        // Enhanced messaging for scientific discussions
        if ($('#send-private-message').length) {
            $('#send-private-message').before(
                '<div class="scientific-message-tools">' +
                '<button type="button" class="insert-formula">Insert Formula</button>' +
                '<button type="button" class="insert-reference">Add Reference</button>' +
                '</div>'
            );
        }
    }
    
    /**
     * Initialize accessibility features
     */
    function initializeAccessibility() {
        // Add skip navigation
        if ($('.skip-navigation').length === 0) {
            $('body').prepend(
                '<nav class="skip-navigation" aria-label="Skip navigation">' +
                '<a href="#content" class="skip-link">Skip to main content</a>' +
                '<a href="#site-navigation" class="skip-link">Skip to navigation</a>' +
                '</nav>'
            );
        }
        
        // Enhance focus management
        $('a, button, input, textarea, select').on('focus', function() {
            $(this).addClass('focused');
        }).on('blur', function() {
            $(this).removeClass('focused');
        });
        
        // Add ARIA labels to interactive elements
        $('.molecular-data').attr('role', 'button').attr('aria-label', 'Click to expand molecular data');
        $('.scientific-keyword').attr('role', 'link').attr('aria-label', 'Search for this scientific term');
        
        // Announce dynamic content changes
        var announcer = $('<div id="aria-announcer" aria-live="polite" aria-atomic="true" class="sr-only"></div>');
        $('body').append(announcer);
        
        window.announceToScreenReader = function(message) {
            announcer.text(message);
            setTimeout(() => announcer.empty(), 1000);
        };
        
        // High contrast mode detection
        if (window.matchMedia && window.matchMedia('(prefers-contrast: high)').matches) {
            $('body').addClass('high-contrast');
        }
        
        // Reduced motion detection
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            $('body').addClass('reduced-motion');
        }
    }
    
    /**
     * Process scientific keywords in content
     */
    function processScientificKeywords(content) {
        var keywords = [
            'myrcene', 'limonene', 'pinene', 'linalool', 'caryophyllene', 'humulene',
            'terpinolene', 'ocimene', 'cannabinoid', 'THC', 'CBD', 'CBG', 'CBN',
            'entourage effect', 'monoterpene', 'sesquiterpene', 'diterpene',
            'pharmacokinetics', 'bioavailability', 'metabolism', 'cytochrome',
            'anti-inflammatory', 'analgesic', 'anxiolytic', 'neuroprotective'
        ];
        
        keywords.forEach(function(keyword) {
            var regex = new RegExp('\\b(' + keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')\\b', 'gi');
            content = content.replace(regex, '<span class="scientific-keyword" role="link" tabindex="0">$1</span>');
        });
        
        return content;
    }
    
    /**
     * Copy text to clipboard
     */
    function copyToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text);
        } else {
            // Fallback for older browsers
            var textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.left = '-999999px';
            textArea.style.top = '-999999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Failed to copy text: ', err);
            }
            
            document.body.removeChild(textArea);
        }
    }
    
    /**
     * Show notification
     */
    function showNotification(message, type = 'info') {
        var notification = $('<div class="terpedia-notification ' + type + '">' + message + '</div>');
        $('body').append(notification);
        
        // Animate in
        setTimeout(() => notification.addClass('visible'), 100);
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            notification.removeClass('visible');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
        
        // Announce to screen readers
        if (window.announceToScreenReader) {
            window.announceToScreenReader(message);
        }
    }
    
    /**
     * Initialize AJAX functionality
     */
    if (typeof terpedia_ajax !== 'undefined') {
        // Set up AJAX defaults
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', terpedia_ajax.nonce);
            }
        });
        
        // Quick search functionality
        var searchTimeout;
        $('#site-search').on('input', function() {
            clearTimeout(searchTimeout);
            var query = $(this).val();
            
            if (query.length > 2) {
                searchTimeout = setTimeout(() => {
                    performQuickSearch(query);
                }, 300);
            }
        });
        
        function performQuickSearch(query) {
            $.ajax({
                url: terpedia_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'terpedia_quick_search',
                    query: query,
                    nonce: terpedia_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        displaySearchResults(response.data);
                    }
                },
                error: function() {
                    console.error('Search request failed');
                }
            });
        }
        
        function displaySearchResults(results) {
            var $resultsContainer = $('#quick-search-results');
            if ($resultsContainer.length === 0) {
                $resultsContainer = $('<div id="quick-search-results" class="quick-search-results"></div>');
                $('#site-search').after($resultsContainer);
            }
            
            if (results.length > 0) {
                var html = '<ul>';
                results.forEach(function(result) {
                    html += '<li><a href="' + result.url + '">' + result.title + '</a></li>';
                });
                html += '</ul>';
                $resultsContainer.html(html).show();
            } else {
                $resultsContainer.hide();
            }
        }
    }
    
    // Window resize handler
    $(window).on('resize', debounce(function() {
        // Adjust layout on resize
        if ($(window).width() > 768) {
            $('#primary-menu').removeClass('active');
            $('.menu-toggle').attr('aria-expanded', 'false').removeClass('active');
        }
    }, 250));
    
    /**
     * Debounce function
     */
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    
})(jQuery);

/**
 * Vanilla JavaScript functionality (for non-jQuery dependent features)
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Progressive Web App functionality
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('ServiceWorker registration successful');
            }, function(err) {
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
    
    // Intersection Observer for animations
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements that should animate in
        document.querySelectorAll('.terpene-profile, .research-article, .molecular-data').forEach(function(el) {
            observer.observe(el);
        });
    }
    
    // Keyboard navigation enhancements
    document.addEventListener('keydown', function(e) {
        // Escape key handling
        if (e.key === 'Escape') {
            // Close any open modals or dropdowns
            document.querySelectorAll('.modal, .dropdown.open').forEach(function(el) {
                el.classList.remove('open', 'visible');
            });
        }
        
        // Tab navigation enhancements
        if (e.key === 'Tab') {
            document.body.classList.add('using-keyboard');
        }
    });
    
    // Mouse usage detection
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('using-keyboard');
    });
    
});