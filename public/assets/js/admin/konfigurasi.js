formUrl = currentUrl +  '/edit';

function data(form){
    $(form)[0].reset();
    $.ajax({
        type: "post",
        url: currentUrl + "/data",
        dataType: "json",
        success: function (response) {
            $('[name="name"]').val(response.name);
            $('[name="phone"]').val(response.phone);
            $('[name="instagram"]').val(response.instagram);
            $('[name="email"]').val(response.email);
            $('[name="facebook"]').val(response.facebook);
            $('[name="address"]').text(response.address);

            toastr.success(response.msg);
        },
        error: function (response) {
            toastr.warning(response.msg);
        }
    });
}

$(document).ready(function () {
    var form = $('#form');
    data(form);

    $(form).validate({
        rules: {
            name: {
                required: true
            }
        },    
        submitHandler: function(form) {
            $.ajax({
                type: "post",
                url: formUrl,
                data: new FormData($(form)[0]),
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    toastr.success(response.msg);
                    data(form);
                },
                error: function (response) {
                    toastr.warning(response.msg);
                }
            });
        }
    })
});