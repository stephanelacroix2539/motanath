// Gestion de la modale

document.addEventListener('DOMContentLoaded', function () {
    // Récupérer les éléments de la modale
    var contactLink = document.querySelector('a[href="#contact"]');
    var modal = document.getElementById('contactModal');
    var closeModal = document.getElementById('closeModal');
  
    // Ouvrir la modale lorsque l'utilisateur clique sur le lien "Contact"
    contactLink.addEventListener('click', function (e) {
      e.preventDefault();  // Empêcher le comportement de défilement du lien
      modal.style.display = 'block';  // Afficher la modale
    });
  
    // Fermer la modale lorsque l'utilisateur clique sur le bouton de fermeture
    closeModal.addEventListener('click', function () {
      modal.style.display = 'none';  // Masquer la modale
    });
  
    // Fermer la modale si l'utilisateur clique en dehors de la modale
    window.addEventListener('click', function (e) {
      if (e.target === modal) {
        modal.style.display = 'none';  // Masquer la modale
      }
    });
  });
  


// Ouverture photo

jQuery(document).ready(function($) {
    $('#contact-button').on('click', function() {
        let photoRef = $(this).data('ref');
        alert("Référence photo : " + photoRef); // Exemple, remplacez par l'ouverture de votre popup
        // Code pour ouvrir la popup et préremplir avec photoRef
    });
});

