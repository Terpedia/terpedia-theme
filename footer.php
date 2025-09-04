    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - Encyclopedia of Terpenes</p>
                <p>Advanced molecular data and scientific research platform</p>
                <div class="footer-links">
                    <a href="<?php echo esc_url(home_url('/agents/')); ?>">Expert Agents</a> |
                    <a href="<?php echo esc_url(home_url('/tersona/')); ?>">Terpene Personas</a> |
                    <a href="<?php echo esc_url(home_url('/cyc/')); ?>">Encyclopedia</a> |
                    <a href="<?php echo esc_url(home_url('/research/')); ?>">Research</a>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>