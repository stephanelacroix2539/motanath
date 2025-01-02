
/* Script de la pagination */


jQuery(document).ready(function($) {
    var page = 1;
    var loading = false;

    $('#load-more').on('click', function() {
        if (loading) return;

        loading = true;
        page++;

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page
            },
            success: function(response) {
                if (response) {
                    $('#photo-container').append(response);

                    // Après chaque ajout d'images, réinitialisez les gestionnaires d'événements
                    initLightbox();

                    // Cacher le bouton après l'affichage des résultats
                    $('#load-more').hide();
                } else {
                    // Pas plus de photos à charger
                    $('#load-more').hide();
                }
                loading = false;
            }
        });
    });

    // Fonction pour réinitialiser les événements des icônes de fullscreen après le chargement
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



