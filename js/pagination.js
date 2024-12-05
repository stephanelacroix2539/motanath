/* Script de la pagination */

document.getElementById('load-more').addEventListener('click', function () {
    let button = this;
    let page = parseInt(button.getAttribute('data-page'));
    let nextPage = page + 1;

    fetch(ajaxurl + '?action=load_more_photos&page=' + nextPage)
        .then(response => response.text())
        .then(data => {
            if (data.trim() !== '') {
                let photoContainer = document.getElementById('photo-container');
                photoContainer.innerHTML += data; // Ajouter les nouvelles photos

                // Assurez-vous que les images nouvellement ajoutées ont le même style
                let newPhotos = photoContainer.querySelectorAll('.photo-block img');
                newPhotos.forEach(function(photo) {
                    photo.style.width = '100%';  // Assure-toi que chaque image occupe toute la largeur du bloc
                    photo.style.height = 'auto'; // Pour garder les proportions
                });

                button.setAttribute('data-page', nextPage);
            } else {
                button.style.display = 'none'; // Masquer le bouton si plus de contenu à charger
            }
        });
});

