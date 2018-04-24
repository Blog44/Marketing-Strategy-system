$('.date_all').on('change', function() {

    if ($(this).is(":checked")) {
        $from = $('.date_from').attr('data');
        $to = $('.date_to').attr('data');

        $('.date_from').val($from);
        $('.date_to').val($to);
    }
    else {
        $('.date_from').val('');
        $('.date_to').val('');
    }
});

