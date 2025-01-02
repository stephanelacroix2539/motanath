// les 3 filtres js

jQuery(document).ready(function($) {
    $('.filters select').on('change', function() {
        var category = $('#filter-category').val();
        var format = $('#filter-format').val();
        var sortOrder = $('#sort-order').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                sort_order: sortOrder
            },
            success: function(response) {
                // Remplacez le contenu des photos avec le nouveau contenu filtré
                $('#photo-container').html(response);

                // Après chaque ajout d'images, réinitialisez les gestionnaires d'événements
                initLightbox();
            }
        });
    });

    // Fonction pour réinitialiser les événements des icônes "fullscreen" après chaque filtre
    function initLightbox() {
        // Récupère toutes les icônes "fullscreen" et associe un événement à chaque
        const fullscreenIcons = document.querySelectorAll(".icon-fullscreen");
        const lightboxModal = document.getElementById("lightbox-modal");
        const lightboxImage = document.getElementById("lightbox-image");
        const lightboxTitle = document.getElementById("lightbox-title");
        
        const images = [];

        // Récupère toutes les images avec leur titre
        fullscreenIcons.forEach((icon, index) => {
            const photoBlock = icon.closest(".photo-block");
            const image = photoBlock.querySelector(".photo-thumbnail");
            const title = photoBlock.querySelector(".photo-title").innerText;

            images.push({
                src: image.src,
                title: title,
            });

            // Ajoute l'écouteur pour ouvrir la lightbox
            icon.addEventListener("click", function (event) {
                event.preventDefault();
                openInLightbox(index, images, lightboxImage, lightboxTitle, lightboxModal);
            });
        });
    }

    // Ouvrir la lightbox avec une image
    function openInLightbox(index, images, lightboxImage, lightboxTitle, lightboxModal) {
        console.log('essai reussi');
        lightboxImage.src = images[index].src;
        lightboxTitle.textContent = images[index].title;
        lightboxModal.style.display = "flex";
    }

    // Fermer la lightbox
    function closeLightbox() {
        lightboxModal.style.display = "none";
        lightboxImage.src = "";
    }

    // Fermer la lightbox en cliquant sur l'overlay
    $('#lightbox-modal').on('click', function(event) {
        if (event.target === lightboxModal || event.target.classList.contains("lightbox-close")) {
            closeLightbox();
        }
    });
});
