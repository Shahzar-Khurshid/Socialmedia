var event;
$(document).ready(function () {
// this is the id of the form
    
    $("#login-form").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var url = base_url+"/login/submit";
        var data = $('#login-form').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: login_success
        });


    });


});

var login_success = function (data) {
    data = JSON.parse(data);

    if (typeof data.is_redirect !== 'undefined' && data.is_redirect) {
        window.location.href = data.redirect_url;
    } else {
        if (data.success) {
            showSuccess(data.successMessage, '/');
        } else {
            alert(data.errorMessage);
        }
    }
}