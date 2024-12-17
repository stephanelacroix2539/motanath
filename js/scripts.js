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



// Menu Burger 
document.addEventListener("DOMContentLoaded", function () {
    const burgerButton = document.querySelector(".burger-button");
    const menuContainer = document.querySelector(".menu-container");

    if (burgerButton && menuContainer) {
        burgerButton.addEventListener("click", function () {
            menuContainer.classList.toggle("open");
        });
    }
});


