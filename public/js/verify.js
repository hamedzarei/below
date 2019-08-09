$(document ).ready(function() {
    var verify_form = $('.verify-form button[type=submit]');
    var code = verify_form.attr('data-code');
    var email = verify_form.attr('data-email');
    var verify_url = '/api/users/' + email + '/verify';

    verify_form.click(function () {

        var data = {
            'email': email,
            'code': code,
            'verification': $('.verify-form #verification').val()
        };
        $.ajax({
            url: verify_url,
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (result) {
                toastr.info(result.message);
            },
            error: function (result) {
                toastr.error(result.responseJSON.message);
            }
        })
    });
});