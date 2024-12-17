// les 3 filtres js

jQuery(document).ready(function($) {
    $('.filters select').on('change', function() {
        var category = $('#filter-category').val();
        var format = $('#filter-format').val();
        var sortOrder = $('#sort-order').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                sort_order: sortOrder
            },
            success: function(response) {
                $('#photo-container').html(response);
            }
        });
    });
});

