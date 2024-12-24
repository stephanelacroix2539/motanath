// Gestion de la modale contact

 
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('contactModal');
    const closeModal = document.getElementById('closeModal');

    // Ouvrir la modale via l'élément du menu
    const menuItem = document.getElementById('menu-item-13');
    if (menuItem) {
        menuItem.addEventListener('click', (event) => {
            event.preventDefault(); // Empêche le lien par défaut
            modal.style.display = 'block';
        });
    }

    //ouvrir la modale depuis le bouton single
      // Ouvrir la modale
      openModal.addEventListener('click', function () {
        modal.style.display = 'flex'; // Passe de `none` à `flex` pour afficher la modale
    });

    // Fermer la modale avec le bouton de fermeture
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer la modale en cliquant à l'extérieur
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});



// Popup Contact préremplie avec jQuery //
document.addEventListener('DOMContentLoaded', function () {
    const contactButton = document.getElementById('contact-button');

    if (contactButton) {
        contactButton.addEventListener('click', function () {
            const reference = this.getAttribute('data-reference');
            document.getElementById('contactModal').style.display = 'block';

            // Préremplir le champ de référence dans la popup
            const referenceInput = document.querySelector('[name="ref-photo"]');
            if (referenceInput) {
                referenceInput.value = reference;
            }
        });
    }
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



