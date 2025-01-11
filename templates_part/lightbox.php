<div id="lightbox-modal" class="lightbox-modal">
    <span id="prev-image" class="lightbox-nav-btn">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente.svg" alt="Précédent" class="prec1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/precedente2.svg" alt="Précédente2" class="prec2">
    </span>

    <div class="lightbox-content">
        <div class="lightbox-info-overlay">
            <span class="photo-reference">
                <?php
                $photo_reference = get_field('reference', get_the_ID(), false);
                if ($photo_reference) {
                    echo esc_html($photo_reference);
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
        </div>
        <img id="lightbox-image" src="" alt="Image en plein écran">
        <span id="lightbox-title" class="lightbox-title"></span>
    </div>
    
    <span class="lightbox-close" onclick="closeLightbox()">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.png" alt="Close">
    </span>

    <span id="next-image" class="lightbox-nav-btn">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante.svg" alt="Suivant" class="suiv1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/suivante2.svg" alt="Suivant2" class="suiv2">
    </span>
</div>
