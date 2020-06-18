var event;
$(document).ready(function () {

    $("#edit-profile-container").on("click", "#profile", function () {
        $("#edit-form").hide();
        $('.status').show();
    });

    $("#edit-profile-container").on("click", "#edit-profile", function () {
        $("#edit-form").show();
        $('.status').hide();
    });

});
