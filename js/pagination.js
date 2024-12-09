/* Script de la pagination */
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
                } else {
                    $('#load-more').hide(); // Pas plus de photos à charger
                }
                loading = false;
            }
        });
    });
});


