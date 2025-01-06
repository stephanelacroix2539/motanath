// Gestion de la modale contact

 
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('contactModal');
    const closeModal = document.getElementById('closeModal');
    const referenceInput = document.getElementById('photoReference');

    // Log la présence des éléments
    console.log('Modal:', modal);
    console.log('CloseModal:', closeModal);

    const menuItem = document.getElementById('menu-item-13');
    if (menuItem) {
        menuItem.addEventListener('click', (event) => {
            console.log('Menu item clicked');
            event.preventDefault();
            modal.style.display = 'block';
        });
    }

    const openModal = document.getElementById('openModal');
    if (openModal) {
        openModal.addEventListener('click', function () {
            console.log('Open modal button clicked');
            modal.style.display = 'flex';
        });
    }

    window.addEventListener('click', (event) => {
        console.log('Window clicked', event.target);
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});



// Popup Contact préremplie avec jQuery //
document.addEventListener('DOMContentLoaded', function () {
    // Bouton d'ouverture de la modale
    const openModalButton = document.getElementById('openModal');
    const modal = document.getElementById('contactModal');
    const closeModalButton = document.getElementById('closeModal');

    // Ouvrir la modale avec la référence
    openModalButton.addEventListener('click', function () {
        const reference = openModalButton.getAttribute('data-reference');

        // Afficher la modale
        modal.style.display = 'block';

        // Préremplir le champ "Réf. Photo" dans Contact Form 7
        const subjectField = document.querySelector('input[name="your-subject"]');
        if (subjectField) {
            subjectField.value = reference;
        }
    });

    // Fermer la modale
    closeModalButton.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    // Fermer la modale en cliquant en dehors du contenu
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});






// overlay menu burger //
// Récupérer les éléments nécessaires
const menuButton = document.getElementById('open-fullscreen-menu-button');
const closeButton = document.getElementById('close-fullscreen-menu-button');
const overlay = document.querySelector('.overlay');
const body = document.body;

// Ouvrir le menu et afficher l'overlay
menuButton.addEventListener('click', function () {
    body.classList.add('menu-opened'); // Active l'overlay
});

// Fermer le menu et cacher l'overlay
closeButton.addEventListener('click', function () {
    body.classList.remove('menu-opened'); // Désactive l'overlay
});

// Fermer le menu si on clique sur l'overlay
overlay.addEventListener('click', function () {
    body.classList.remove('menu-opened'); // Désactive l'overlay
});



