<!-- Modale Lightbox -->
<div id="lightbox-modal" class="lightbox-modal">
    <div class="lightbox-content">
        <img id="lightbox-image" src="" alt="Image en plein écran">
        <div class="lightbox-info">
        
        <span class="photo-reference">
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



        <span class="photo-category">
                        <?php
                        $terms = wp_get_post_terms(get_the_ID(), 'categorie', ['fields' => 'names']);
                        if ($terms) {
                            echo implode(', ', $terms);
                        }
                        ?>
                    </span>
            <span id="lightbox-title" class="lightbox-title"></span>
            <div class="lightbox-navigation">
                <span id="prev-image" class="lightbox-nav-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Précédent">
</span>
                <span id="next-image" class="lightbox-nav-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.png" alt="Suivant">
</span>
            </div>
        </div>
    </div>
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
</div>