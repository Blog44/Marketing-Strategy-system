
var root_url = "http://localhost:8000/";

$(document).ready(function(){


    $('.product').select2({
        placeholder: 'Select Product type',
        minimumInputLength: 3 ,
        ajax: {
            url: root_url+'search-product',
            dataType: 'json',
            delay: 250,

            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.product_name,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        }
    });
});

$('.product').on('select2:select', function () {

    $(".create_report").submit();
    // var id= $(this).select2("val");
    // var  ajax_url = root_url+"report/generate/product";
    // var formData = new FormData();
    // formData.append('id',id);
    // var result =  $.ajax(  {
    //     type: "POST",
    //     url: ajax_url,
    //     data        : formData, // our data object
    //     dataType: 'json',
    //     contentType: false,
    //     processData: false,
    //     // what type of data do we expect back from the serve
    //     // encode          : true,
    //     success: function (data) {
    //
    //     },
    //     error: function (data) {
    //         console.log('Error:', data);
    //     }
    // });
});


