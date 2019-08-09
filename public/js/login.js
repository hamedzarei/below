var coords = {};

$(document ).ready(function() {
    var login_form = $('.login-form button[type=submit]');

    login_form.click(function () {

        var username = $('.login-form #username').val();
        var password = $('.login-form #password').val();
        localStorage.setItem('username', username);
        localStorage.setItem('password', password);
        var data = {
            'username': username,
            'password': password
        };
        $.ajax({
            url: '/api/auth',
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (result) {
                console.log(result.data.role)
                if (result.data.role == 'admin') {
                    window.location.href = '/admin';
                } else {
                    toastr.error('sorry you are not admin to see admin page')
                }
            },
            error: function (result) {

            }
        })
    });
});