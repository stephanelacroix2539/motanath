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

<?php
// Inclure la modale de contact
get_template_part('templates_part/modal-contact');
?>
<?php
function theme_enqueue_scripts() {
  wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true);  // 'true' pour le footer
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
?>
<?php wp_footer(); ?>
</body>
</html>