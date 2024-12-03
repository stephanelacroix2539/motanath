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


// scripts JS
function my_theme_enqueue_scripts() {
    // Enqueue le fichier JavaScript pour la modale
    wp_enqueue_script('modal-scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');



// pagination ajax
function load_more_photos() {
    $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $paged,
    ];

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/photo_block');
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

// function des filtres
function filter_photos() {
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
    $format = isset($_GET['format']) ? sanitize_text_field($_GET['format']) : '';
    $sort_order = isset($_GET['sort_order']) ? sanitize_text_field($_GET['sort_order']) : '';

    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 6,
        'tax_query'      => [],
        'orderby'        => 'date',
        'order'          => 'DESC', // Par défaut, les résultats sont triés par date décroissante
    ];

    // Filtrage par catégorie
    if ($category) {
        $args['tax_query'][] = [
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
        ];
    }

    // Filtrage par format
    if ($format) {
        $args['tax_query'][] = [
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        ];
    }

    // Gestion du tri
    if ($sort_order === 'date_asc') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    } elseif ($sort_order === 'date_desc') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($sort_order === 'title_asc') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($sort_order === 'title_desc') {
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
    }

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/photo_block');
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');



?>
