var event;
$(document).ready(function () {
// this is the id of the form
    
    $("#registration_form").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var url = base_url+"/registration/submit";
        var data = $('#registration_form').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: registration_success
        });


    });


});

var registration_success = function (data) {
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