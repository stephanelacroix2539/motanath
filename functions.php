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

//lightbox
function enqueue_lightbox_scripts() {
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_lightbox_scripts');

// Burger
function enqueue_burger_menu_scripts() {
    wp_enqueue_script('burger', get_stylesheet_directory_uri() . '/js/burger.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_burger_menu_scripts');


// Intgration ajax pagination

function my_enqueue_scripts() {
    wp_enqueue_script( 'load-more', get_template_directory_uri() . '/js/pagination.js', array(), null, true );

    // Ajoute la variable ajaxurl à ton script
    wp_localize_script( 'load-more', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

// Intégration ajax filtres
function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-filters', get_template_directory_uri() . '/js/filters.js', array('jquery'), null, true);
    wp_localize_script('custom-filters', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// pagination ajax
function load_more_photos() {
    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => $_POST['page'],
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="photo-block">
                <a href="<?php the_permalink(); ?>" class="photo-link">
                    <?php the_post_thumbnail('medium', ['class' => 'photo-thumbnail']); ?>
                    <div class="overlay">
                        <span class="photo-title"><?php the_title(); ?></span>
                        <span class="photo-category">
                            <?php
                            $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                            if ($terms) {
                                echo implode(', ', $terms);
                            }
                            ?>
                        </span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Voir plus" class="icon-eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" alt="Full screen" class="icon-fullscreen" onclick="openInLightbox(this)">
                    </div>
                </a>
                <div class="category-badge">
                    <?php
                    $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                    if ($terms) {
                        foreach ($terms as $term) {
                            echo esc_html($term);
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endwhile;
    endif;

    wp_reset_postdata();

    die();
}
add_action('wp_ajax_load_more_photos', 'load_more_photos'); // pour les requêtes AJAX
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos'); // pour les utilisateurs non connectés


// function des filtres
function filter_photos() {
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $sort_order = isset($_POST['sort_order']) ? sanitize_text_field($_POST['sort_order']) : '';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => 1,
    );

    if ($category) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format,
        );
    }

    if ($sort_order) {
        if ($sort_order == 'date_desc') {
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
        } elseif ($sort_order == 'date_asc') {
            $args['orderby'] = 'date';
            $args['order'] = 'ASC';
        }
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="photo-block">
                <a href="<?php the_permalink(); ?>" class="photo-link">
                    <?php the_post_thumbnail('medium', ['class' => 'photo-thumbnail']); ?>
                    <div class="overlay">
                        <span class="photo-title"><?php echo get_post_meta(get_the_ID(), 'reference', true); ?></span>
                        <span class="photo-category">
                            <?php
                            $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                            if ($terms) {
                                echo implode(', ', $terms); // Affiche les noms des catégories comme texte simple
                            }
                            ?>
                        </span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Voir plus" class="icon-eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" alt="Full screen" class="icon-fullscreen" onclick="openInLightbox(this)">
                    </div>
                </a>
                <div class="category-badge">
                    <?php
                    $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                    if ($terms) {
                        foreach ($terms as $term) {
                            echo esc_html($term); // Affiche simplement le nom de la catégorie sans lien
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    $output = ob_get_clean();
    echo $output;
    wp_die();
}
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');


?>
