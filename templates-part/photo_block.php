<!-- Section - Vignettes des publications personnalisées -->
<div class="custom-post-thumbnails">
    <input type="hidden" name="page" value="1">
    <div class="thumbnail-container-accueil">
        <?php
        // Configuration - Paramètres pour la requête de publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',          // Type de contenu personnalisé (photo)
            'posts_per_page' => 12,          // Nombre de publications à afficher par page
            'orderby' => 'date',             // Tri des publications selon la date
            'order' => 'DESC',               // Tri décroissant, de la plus récente à la plus ancienne
        );

        $custom_posts_query = new WP_Query($args_custom_posts);

        // Boucle - Traitement des publications retournées par la requête
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
        ?>
        <div class="custom-post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="thumbnail-wrapper">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                            <!-- Section - Détails supplémentaires affichés au survol de l'image -->
                            <div class="thumbnail-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône œil"> <!-- Icône affichant plus d'infos sur la photo -->
                                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Icône pour ouvrir en plein écran -->
                                <?php
                                // Extraction de la référence et des catégories associées à l'image
                                $related_reference_photo = get_field('reference_photo');   // Obtention de la référence de la photo
                                $related_categories = get_the_terms(get_the_ID(), 'categorie');   // Obtention des catégories liées à la photo
                                $related_category_names = array();

                                if ($related_categories) {
                                    foreach ($related_categories as $category) {
                                        $related_category_names[] = esc_html($category->name);
                                    }
                                }
                                ?>
                                <!-- Superposition - Affichage des informations sur la photo lors du survol -->
                                <div class="photo-info">
                                    <div class="photo-info-left">
                                        <p><?php echo esc_html($related_reference_photo); ?></p>
                                    </div>
                                    <div class="photo-info-right">
                                        <p><?php echo implode(', ', $related_category_names); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </a>
        </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); // Réinitialisation | Retour aux données de publications d'origine ?>
    </div>
    <!-- Section - Bouton permettant de charger d'autres publications personnalisées -->
    <div class="view-all-button">
        <button id="load-more-posts">Voir plus</button>
    </div>
</div>
