<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="<?= base_url() ?>/static/css/style.css">
        <script src="<?= base_url() ?>/static/js/external/jquery-3.5.0.min.js"></script>
        <script src="<?= base_url() ?>/static/js/update_info.js"></script>
        <script src="<?= base_url() ?>/static/js/post.js"></script>
        <script src="<?= base_url() ?>/static/js/fetch_status.js"></script>
        <script src="<?= base_url() ?>/static/js/script.js"></script>
        <script>
            var base_url = '<?= base_url(); ?>';
        </script>
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
                        <a href="<?= base_url() ?>" class="danger gray">My Dashboard</a>
                        <hr>
                    </div>
                    <a href="<?= base_url(); ?>/Login/logout" class="danger">
                        <div class="btn">
                            Logout
                        </div>
                    </a>
                </div>
            </div>
            <div class="chose-profile">
                <div class="select-profile">
                    <div class="profile">
                        <a href="#" class="danger" id="profile">Profile</a>
                        <hr class="hr-profile" style="display:none">
                    </div>
                    <div class="edit-profile">
                        <a href="#" class="gray" id="edit-profile">Edit Profile</a>
                        <hr class="hr-edit-profile">
                    </div>
                </div>
                <form class="form" id="edit-form" method="POST" action="">
                    <div class="bigger-view" id="form-heading">
                        <h1>My Account Details</h1>
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Name</label>
                        <input type="text" name="name" id="user-name" class="" value ="<?= $user['name']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Email</label>
                        <input type="text" name="email" class="" value ="<?= $user['email']; ?>" readonly >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Old Password</label>
                        <input type="password" name="old-password" id="user-oldpassword" minlength="8" maxlength="20" class="" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>New Password</label>
                        <input type="password" name="new-password" id="user-newpassword" minlength="8" maxlength="20" class="" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" id="user-date-of-birth" class="" value="<?= $user['date_of_birth']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>College</label>
                        <input type="text" name="college" id="user-college" class=""  value="<?= $user['college']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <label>Phone number</label>
                        <input type="number" name="phone_number" id="user-phone-number" class="" minlength="10" maxlength="11"  value="<?= $user['phone_number']; ?>" >
                    </div>
                    <div class="each-form-field for-positioning">
                        <button class="" type="submit" value="submit">Update</button>
                    </div>
                </form>
                <div class="status my-status">
                    <form id="status-form" class="status-form">
                        <h3>Write something here</h3>
                        <textarea name="status" ></textarea>
                        <input type="text" name="id" value="<?= $user['id']; ?>" hidden />
                        <input type="text" name="unique_id" value="<?= $user['unique_id']; ?>" hidden />
                        <button type="submit" name="post" id="submit-post" disabled="disabled">Submit</button>
                    </form>

                    <div class="new-post">
                    </div>
                    <input type="hidden" value="<?= $_SESSION['user_id'] ?>" id="user-id"  hidden />
                    <div id="all-status">
                        <div class="content my-content content-placeholder">
                            <div class="information my-information ">
                                <p class="status-content">
                                </p>
                            </div>
                            <div class="date-and-time my-date-and-time">
                                <p class="status-time">
                                </p>
                            </div>
                        </div>    
                    </div>
                    <img src="<?= base_url() ?>/static/image/rabbit_hole.png" alt="end of rabbit's hole" class='rabbit-hole'/>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </body>
</html>
