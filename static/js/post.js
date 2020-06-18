var event;

$(document).ready(function () {
// this is the id of the form
    var sample_post_div = $('#all-status').html();

    $('textarea').on('keyup', function () {
        if (!$('textarea').val().trim()) {
            $('#submit-post').attr("disabled", "disabled");
        } else {
            $('#submit-post').removeAttr("disabled");
            ;
        }
    });

    $(".status-form").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var url = base_url+"/User/insert_status_submit";
        var data = $('.status-form').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (data) {
                data = JSON.parse(data);

                if (typeof data.is_redirect !== 'undefined' && data.is_redirect) {
                    window.location.href = data.redirect_url;
                } else {
                    if (data.success) {
                        $('#all-status').prepend(sample_post_div);
                        $('.content:first .status-content').text(decodeURIComponent(data.status_data['content']));
                        $('.content:first .status-time').text(data.status_data['created_at']);
                        if ($('.status-owner')) {
                            $('.content:first .status-owner').text(data.status_data['name']);
                        }
                        $('.content').removeClass('content-placeholder');
                        $('.content:first').hide().show('slow');
                    } else {
                        alert(data.errorMessage);
                    }
                }
            }
        });


    });


});
