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



// hero
function enqueue_hero_script() {
    wp_enqueue_script('hero-script', get_stylesheet_directory_uri() . '/js/hero.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_hero_script');

// photo




?>