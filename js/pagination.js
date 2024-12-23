
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
});


