
document.addEventListener("DOMContentLoaded", function () {
    const fullscreenIcons = document.querySelectorAll(".icon-fullscreen");
    const lightboxModal = document.getElementById("lightbox-modal");
    const lightboxImage = document.getElementById("lightbox-image");
    const lightboxTitle = document.getElementById("lightbox-title");
    const prevButton = document.getElementById("prev-image");
    const nextButton = document.getElementById("next-image");

    let currentImageIndex = 0;
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
            openInLightbox(index);
        });
    });

    // Ouvrir la lightbox avec une image
    function openInLightbox(index) {
        console.log('essai reussi');
        currentImageIndex = index;
        lightboxImage.src = images[currentImageIndex].src;
        lightboxTitle.textContent = images[currentImageIndex].title;
        lightboxModal.style.display = "flex";
        
    }

    // Fermer la lightbox
    function closeLightbox() {
        lightboxModal.style.display = "none";
        lightboxImage.src = "";
    }

    // Navigation vers l'image précédente
    prevButton.addEventListener("click", function () {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        openInLightbox(currentImageIndex);
    });

    // Navigation vers l'image suivante
    nextButton.addEventListener("click", function () {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        openInLightbox(currentImageIndex);
    });

    // Fermer la lightbox en cliquant sur l'overlay
    lightboxModal.addEventListener("click", function (event) {
        if (event.target === lightboxModal || event.target.classList.contains("lightbox-close")) {
            closeLightbox();
        }
    });

    // Export global de closeLightbox
    window.closeLightbox = closeLightbox;
});
