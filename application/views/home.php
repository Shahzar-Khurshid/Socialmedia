<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="<?= base_url() ?>/static/css/style.css">
        <script src="<?= base_url() ?>/static/js/external/jquery-3.5.0.min.js"></script>
        <script src="<?= base_url() ?>/static/js/post.js"></script>
        <script src="<?= base_url() ?>/static/js/fetch_status.js"></script>
        <script>
            var base_url = '<?= base_url(); ?>';
        </script>
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        -->
    </head>
    <body>
        <div class="container">
            <div class="home-header">
                <?php
                include 'header.php';
                ?>

                <div class="navbar">
                    <div class="dashboard">
                        <a href="<?= base_url(); ?>User/profile" class="danger gray" id="danger-big">Profile</a>
                        <hr>
                    </div>
                    <a href="<?= base_url(); ?>Login/logout" class="danger">
                        <div class="btn">
                            Logout
                        </div>
                    </a>
                </div>
            </div>
            <div class="home-middle">
                <form class="status-form">
                    <h3>Write something here</h3>
                    <textarea name="status" ></textarea>
                    <input type="text" name="id" value="<?= $user['id']; ?>" hidden />
                    <input type="text" name="unique_id" value="<?= $user['unique_id']; ?>" hidden />
                    <button type="submit" name="post" id="submit-post" disabled="disabled">Submit</button>
                </form>

                <div class="new-post">
                </div>

                <div class="status" id="all-status">
                    <div class="home-content content content-placeholder">
                        <div class="information">
                            <h4 class="status-owner"></h4>
                            <p class="status-content">

                            </p>
                        </div>
                        <div class="date-and-time">
                            <p class="status-time"></p>
                        </div>
                    </div>
                </div>
                <img src="<?= base_url() ?>/static/image/rabbit_hole.png" alt="end of rabbit's hole" class='rabbit-hole'/>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </body>
</html>
