var root_url = "http://localhost:8000/";

$(document).ready(function(){


    $('.interest').select2({
        placeholder: 'Select Interest',
        minimumInputLength: 3 ,
        ajax: {
            url: root_url+'search-interest',
            dataType: 'json',
            delay: 250,

            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.interest_name,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        }
    });
});