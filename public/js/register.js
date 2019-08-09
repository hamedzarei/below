var coords = {};

$(document ).ready(function() {

    var register_form = $('.register-form button[type=submit]');
    var code = register_form.attr('data-code');

    getLocation();
    register_form.click(function () {
        var email = $('.register-form #email').val();
        var verify_url = '/verify/' + email + '/' + code.toString();
        var data = {
            'email': email,
            'firstname': $('.register-form #firstname').val(),
            'lastname': $('.register-form #lastname').val(),
            'password': $('.register-form #password').val(),
            'mobile': $('.register-form #mobile').val(),
            'postalcode': $('.register-form #postalcode').val(),
            'lat': coords.latitude,
            'lon': coords.longitude,
            'accuracy': coords.accuracy
        };
        $.ajax({
            url: '/api/users',
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (result) {
                window.location.href = verify_url;
            },
            error: function (result) {
                toastr.error(result.responseJSON.message);
            }
        })
    });
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log( "Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    coords = position.coords;
}