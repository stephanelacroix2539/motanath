
// Lightbox

document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments DOM essentiels
    const fullscreenIcons = document.querySelectorAll(".icon-fullscreen");
    const lightboxModal = document.getElementById("lightbox-modal");
    const lightboxImage = document.getElementById("lightbox-image");
    const lightboxTitle = document.getElementById("lightbox-title");
    const prevButton = document.getElementById("prev-image");
    const nextButton = document.getElementById("next-image");
    const closeButton = lightboxModal.querySelector(".lightbox-close"); // Bouton de fermeture de la lightbox

    let currentImageIndex = 0; // Index de l'image actuellement affichée
    const images = []; // Tableau pour stocker les données des images

    // Boucle sur toutes les icônes fullscreen pour récupérer les données associées
    fullscreenIcons.forEach((icon, index) => {
        const photoBlock = icon.closest(".photo-block");
        if (!photoBlock) {
            console.error('Photo block not found for icon:', icon);
            return;
        }

        // Récupération des données associées à l'image
        const image = photoBlock.querySelector(".photo-thumbnail");
        const title = photoBlock.querySelector(".photo-title").innerText;
        const reference = photoBlock.getAttribute('data-reference');
        const category = photoBlock.querySelector(".photo-category")?.innerText || '';

        // Ajout des données au tableau
        images.push({
            src: image.src,
            title: title,
            reference: reference || '',
            category: category,
        });

        // Ajout d'un événement pour ouvrir la lightbox
        icon.addEventListener("click", function (event) {
            event.preventDefault();
            openInLightbox(index);
        });
    });

    // Fonction pour ouvrir la lightbox avec l'image, le titre, la référence et la catégorie
    function openInLightbox(index) {
        console.log('Opening Lightbox for Index:', index, images[index]);
        currentImageIndex = index;

        // Mise à jour de l'image, du titre, de la référence et de la catégorie dans la lightbox
        lightboxImage.src = images[currentImageIndex].src;
        lightboxTitle.textContent = images[currentImageIndex].title;

        const referenceElement = document.querySelector('.photo-reference');
        if (referenceElement) {
            referenceElement.textContent = images[currentImageIndex].reference || 'Référence indisponible';
        }

        const categoryElement = document.querySelector('.photo-category-lightbox');
        if (categoryElement) {
            categoryElement.textContent = images[currentImageIndex].category || 'Catégorie non spécifiée';
        }

        // Affiche la lightbox
        lightboxModal.style.display = "flex";
    }

    // Fonction pour fermer la lightbox
    function closeLightbox() {
        lightboxModal.style.display = "none";
    }

    // Écouteur pour le bouton précédent
    prevButton.addEventListener("click", function () {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        openInLightbox(currentImageIndex);
    });

    // Écouteur pour le bouton suivant
    nextButton.addEventListener("click", function () {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        openInLightbox(currentImageIndex);
    });

    // Fermeture de la lightbox en cliquant sur le bouton "Fermer"
    closeButton.addEventListener("click", function () {
        closeLightbox();
    });

    // Fermeture de la lightbox en cliquant sur l'overlay
    lightboxModal.addEventListener("click", function (event) {
        if (event.target === lightboxModal || event.target.classList.contains("lightbox-close")) {
            closeLightbox();
        }
    });
});

