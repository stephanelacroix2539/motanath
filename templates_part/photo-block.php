<?php
$args = [
    'post_type'      => 'photo',
    'posts_per_page' => 8,
    'paged'          => 1,
];
$query = new WP_Query($args);

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
?>

<script type="text/javascript">
    function openInLightbox(element) {
        var imageSrc = element.parentElement.previousElementSibling.getAttribute('src'); // Récupère l'URL de l'image
        var lightboxLink = '<?php echo get_template_directory_uri(); ?>/templates_part/lightbox.php?image=' + encodeURIComponent(imageSrc);
        window.open(lightboxLink, '_blank');
    }
</script>
