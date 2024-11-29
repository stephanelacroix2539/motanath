<?php


function mon_theme_enqueue_styles() {
    // Charger le style du thème principal
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');



// Menu main-menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


//Menu - liens - pied de pages
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Menu du pied de page', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );


// Modale de contact
function my_theme_enqueue_scripts() {
    // Enqueue le fichier JavaScript pour la modale
    wp_enqueue_script('modal-scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


// photo
function register_my_custom_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Photos',
        'rewrite' => array( 'slug' => 'photo' ), // Assurez-vous que le slug est bien 'photo'
        'show_in_rest' => true, // Si vous utilisez l'éditeur Gutenberg
    );
    register_post_type('photo', $args);
}
add_action('init', 'register_my_custom_post_type');

add_filter('template_include', function($template) {
    if (is_singular('photo')) {  // Remplacez 'photo' par le slug de votre CPT
        $new_template = locate_template('single-photo.php');
        if (!empty($new_template)) {
            return $new_template;  // Charge le template single-photo.php
        }
    }
    return $template;
});



?>