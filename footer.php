<footer>
    <nav class="footer-menu">
        <?php
        // Affiche le menu de pied de page WordPress
        wp_nav_menu([
            'theme_location' => 'footer-menu', 
        ]);
        ?>
    </nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>