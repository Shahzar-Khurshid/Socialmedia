$(document).ready(function () {
    var limit = 7;
    var start = 0;
    var action = 'inactive';
    var sample_post_div = $('#all-status').html();
    function lazzy_loader(limit)
    {

//        var output = '';
//        for (var count = 0; count < limit; count++)
//        {
//            output += sample_post_div;
//        }
        $('#all-status').append(sample_post_div);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
        var user_id = $('#user-id').val();
        $.ajax({
            url: base_url+"/User/fetch",
            method: "POST",
            data: {limit: limit, start: start, user_id : user_id},
            cache: false,
            success: function (data) {
                data = JSON.parse(data);

                if (typeof data.is_redirect !== 'undefined' && data.is_redirect) {
                    window.location.href = data.redirect_url;
                } else {
                    if (data.success) {
                        if (data.status_data == '')
                        {
                            $('.content-placeholder').remove();
                            $('.rabbit-hole').show();
                            action = 'active';
                        } else
                        {
                            $('.content-placeholder').remove();
                            data.status_data.forEach(function (eachRow) {
                                $('#all-status').append(sample_post_div);
                                $('.content:last-child .status-content').text(eachRow['content']);
                                $('.content:last-child .status-time').text(eachRow['created_at']);
                                if ($('.status-owner')) {
                                    $('.content:last-child .status-owner').text(eachRow['name']);
                                }
                            });
                            action = 'inactive';
                            $('.content').removeClass('content-placeholder');
                        }
                    } else {
                        alert(data.errorMessage);
                    }
                }
            }
        });
    }

    if (action === 'inactive')
    {
        action = 'active';
        load_data(limit, start);
    }

    $('body').scroll(function () {
        if ($('body').scrollTop() + $('body').height() > $("body > div").height() - 100 && action == 'inactive')
        {
            lazzy_loader(limit);
            action = 'active';
            start = start + limit;
            setTimeout(function () {
                load_data(limit, start);
            }, 1000);
        }
    });
});

