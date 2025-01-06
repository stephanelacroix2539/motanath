<!-- Modale Lightbox -->
<div id="lightbox-modal" class="lightbox-modal">
<span id="prev-image" class="lightbox-nav-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente.svg" alt="Précédent" class="prec1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente2.svg" alt="Précédente2" class="prec2">
</span>
           
    
    <div class="lightbox-content">
 
        <img id="lightbox-image" src="" alt="Image en plein écran">
        <div class="lightbox-info">
        
        <span class="photo-reference">
    <?php
    // Récupérer la valeur du champ 'reference' dans le groupe de champs 'photos'
    $photo_reference = get_field('reference', get_the_ID(), false);
    
    // Vérifier si une référence a été trouvée
    if ($photo_reference) {
        echo esc_html($photo_reference);
    }
    add_action('acf/save_post', 'update_photo_reference', 20);
function update_photo_reference($post_id) {
    if( $post_id ) {
        $photo_reference = get_field('reference', $post_id);
        // Logic to update the reference if needed
    }
}

    ?>
</span>



        <span class="photo-category-lightbox">
                        <?php
                        $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                        if ($terms) {
                            echo implode(', ', $terms);
                        }
                        ?>
                    </span>
            <span id="lightbox-title" class="lightbox-title"></span>
        </div>
    </div>
    <span class="lightbox-close" onclick="closeLightbox()">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.png" alt="Close">
</span>


<span id="next-image" class="lightbox-nav-btn">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante.svg" alt="Suivant" class="suiv1">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante2.svg" alt="Suivant2" class="suiv2">
</span>



</div>