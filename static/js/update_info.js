var event;
$(document).ready(function () {
// this is the id of the form
    
    $("#edit-form").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var url = "../User/update_info_submit";
        var data = $('#edit-form').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: update_success
        });


    });


});

var update_success = function (data) {
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