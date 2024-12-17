
document.addEventListener("DOMContentLoaded", function () {
    const fullscreenIcons = document.querySelectorAll(".icon-fullscreen");
    const lightboxModal = document.getElementById("lightbox-modal");
    const lightboxImage = document.getElementById("lightbox-image");

    // Fonction pour ouvrir la lightbox
    function openInLightbox(event) {
        event.preventDefault();
        const image = event.target.closest(".photo-block").querySelector(".photo-thumbnail");
        if (image) {
            lightboxImage.src = image.src; // Récupère la source de l'image
            lightboxModal.style.display = "flex";
        }
    }

    // Fonction pour fermer la lightbox
    function closeLightbox() {
        lightboxModal.style.display = "none";
        lightboxImage.src = ""; // Réinitialise l'image
    }

    // Écouteur sur chaque icône fullscreen
    fullscreenIcons.forEach(icon => {
        icon.addEventListener("click", openInLightbox);
    });

    // Fermeture de la modale en cliquant sur l'overlay
    lightboxModal.addEventListener("click", function (event) {
        if (event.target === lightboxModal) {
            closeLightbox();
        }
    });

    // Ajout de la fonction closeLightbox à la portée globale (pour le bouton)
    window.closeLightbox = closeLightbox;
});
