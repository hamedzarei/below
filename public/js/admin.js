
from_date = '';
to_date = '';
$(document).ready(function () {
    checkAuth();
    $('#from_date').change(function(){
        var $this = $(this),
            from_date = $this.val();
        to_date = $('#to_date').val();
        refreshTable(from_date, to_date);
    });

    $('#to_date').change(function(){
        var $this = $(this),
            to_date = $this.val();
        from_date = $('#from_date').val();
        refreshTable(from_date, to_date);
    });

});

function checkAuth() {
    var username = localStorage.getItem('username');
    var password = localStorage.getItem('password');

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
            if (result.data.role != 'admin') {
                window.location.href = '/login';
            }
        },
        error: function (result) {
            window.location.href = '/login';
        }
    })

}

function refreshTable(from_date, to_date) {

    var data = {
        'from_date': from_date,
        'to_date': to_date
    };
    $.ajax({
        url: '/api/users',
        type: "GET",
        data: data,
        contentType: "application/json",
        success: function (result) {
            reloadTable(result.data)
        },
        error: function (result) {
            toastr.error(result.responseJSON.message);
        }
    })
}

function reloadTable(users) {
    table = $('.table tbody');
    table.html('');
    rows = '';
    $.each(users, function (key, value) {
        rows += generateRow(key, value);
    });
    table.html(rows);
}

function generateRow(index, user) {
    var row = "<tr>";
    row += '<th scope="row">' + (index+1) + '</th>';
    row += '<td>' + user.firstname + '</td>';
    row += '<td>' + user.lastname + '</td>';
    row += '<td>' + user.email + '</td>';
    row += '<td>' + user.created_at + '</td>';
    row += "</tr>";

    return row;
}