<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="http://127.0.0.1/social_media/static/css/style.css">
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
                        <a href="<?= base_url(); ?>index.php/User/profile" class="danger gray" id="danger-big">Profile</a>
                        <hr>
                    </div>
                    <a href="<?= base_url(); ?>index.php/Login/logout" class="danger">
                        <div class="btn">
                            Logout
                        </div>
                    </a>
                </div>
            </div>
            <div class="home-middle">
                <form class="status-form">
                    <h3>Write something here</h3>
                    <textarea name="name"></textarea>
                    <button type="button" name="post">Submit</button>
                </form>
                <div class="status">
                    <div class="home-content content">
                        <div class="information">
                            <h4>Name</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time">
                            <p>Time : 24:40Hrs IST &ensp; | 26 Dec</p>
                        </div>
                    </div>
                    <div class="home-content content">
                        <div class="information">
                            <h4>Name</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time">
                            <p>Time : 24:40Hrs IST &ensp; | 26 Dec</p>
                        </div>
                    </div><div class="home-content content">
                        <div class="information">
                            <h4>Name</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time">
                            <p>Time : 24:40Hrs IST &ensp; | 26 Dec</p>
                        </div>
                    </div><div class="home-content content">
                        <div class="information">
                            <h4>Name</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time">
                            <p>Time : 24:40Hrs IST &ensp; | 26 Dec</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </body>
</html>
