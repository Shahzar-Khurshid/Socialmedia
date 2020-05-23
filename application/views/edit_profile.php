<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="http://127.0.0.1/social_media/static/css/style.css">
        <script src="http://127.0.0.1/social_media/static/js/external/jquery-3.5.0.min.js"></script>
        <script src="http://127.0.0.1/social_media/static/js/update_info.js"></script>
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        -->
    </head>
    <body>
        <div class="container" id="edit-profile-container">
            <div class="profile-header">
                <?php
                include 'header.php';
                ?>

                <div class="navbar">
                    <div class="dashboard">
                        <a href="./" class="danger gray">My Dashboard</a>
                        <hr>
                    </div>
                    <a href="<?= base_url(); ?>index.php/Login/logout" class="danger">
                        <div class="btn">
                            Logout
                        </div>
                    </a>
                </div>
            </div>
            <div class="chose-profile">
                <div class="select-profile">
                    <div class="profile">
                        <a href="#" class="danger">Profile</a>
                    </div>
                    <div class="edit-profile">
                        <a href="#" class="gray">Edit Profile</a>
                        <hr>
                    </div>
                </div>
                <form class="form" id="edit-form" method="POST" action="">
                    <div class="bigger-view" id="form-heading">
                        <h1>My Account Details</h1>
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Name</label>
                        <input type="text" name="name" class="" value ="<?= $user['name']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Email</label>
                        <input type="text" name="email" class="" value ="<?= $user['email']; ?>" readonly >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Password</label>
                        <input type="password" name="password" minlength="8" maxlength="20" class="" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="" value="<?= $user['date_of_birth']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>College</label>
                        <input type="text" name="college" class="" value="<?= $user['college']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Phone number</label>
                        <input type="number" name="phone_number" class="" minlength="10" maxlength="11"  value="<?= $user['phone_number']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <button class="" type="submit" value="submit">Update</button>
                    </div>
                </form>
                <div class="status my-status">
                    <form class="status-form">
                        <h3>Write something here</h3>
                        <textarea name="name"></textarea>
                        <button type="button" name="post">Submit</button>
                    </form>
                    <div class="content my-content">
                        <div class="information my-information">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time my-date-and-time">
                            <p>Time : 24:40Hrs IST &ensp; | 26 Dec</p>
                        </div>
                    </div>
                    <div class="content my-content">
                        <div class="information my-information">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="date-and-time my-date-and-time">
                            <p> Time : 24:40Hrs IST  | 26 Dec</p>
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
