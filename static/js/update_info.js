var event;
$(document).ready(function () {
// this is the id of the form

    $("#edit-form").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var url = base_url+"/User/update_info_submit";
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
            alert(data.successMessage, '/');
            $('#user-name').val(data.new_data.name);
            $('#user-date-of-birth').text(data.new_data.date_of_birth);
            $('#user-college').val(data.new_data.college);
            $('#user-phone-number').text(data.new_data.phone_number);
            $("#user-oldpassword").val("");
            $("#user-newpassword").val("");
        } else {
            alert(data.errorMessage);
        }
    }
};