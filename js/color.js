/* Couleur des filtres */

document.querySelectorAll('.filter-select').forEach((select) => {
    // Ajout d'un survol sur l'ensemble du <select>
    select.addEventListener('mouseover', (event) => {
        event.target.style.backgroundColor = 'red';
        event.target.style.color = 'white';
    });

    // Réinitialisation des styles lors du "mouseout"
    select.addEventListener('mouseout', (event) => {
        event.target.style.backgroundColor = '';
        event.target.style.color = '';
    });

    // Ajout d'effets visuels sur les options (non pris en charge par CSS de base)
    select.addEventListener('change', () => {
        select.style.borderColor = 'red'; // Exemple d'effet visuel au choix
    });
});
