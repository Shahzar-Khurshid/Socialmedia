<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="../static/css/style.css">
        <script src="../static/js/external/jquery-3.5.0.min.js"></script>
        <script src="../static/js/registration.js"></script>
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        -->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php
                include 'header.php';
                ?>
                <div class="bigger-view" id="about-login">
                    <h1>New User</h1>
                    <h1>Create Account</h1>
                    <a href="./Login" class="danger">Existing User Log-in</a>
                </div>
            </div>
            <div class="middle">
                <div class="type-selection">
                    <div class="existing-user">
                        <a href="./Login" class="danger">Existing User</a>
                        <hr>
                    </div>
                    <div class="new-user">
                        <a href="#" class="danger">New user</a>
                    </div>
                </div>
                <div class="new-user-form">
                    <h3>Create New Account at Edubook</h3>
                    <div class="bigger-view">
                        <h3>Create Account</h3>
                    </div>
                    <form class="form" id="registration_form" method="POST">
                        <div class="each-form-field">
                            <label>Name</label>
                            <input type="text" name="name" class="" required>
                        </div>
                        <div class="each-form-field">
                            <label>Email</label>
                            <input type="email" name="email" class="" required>
                        </div>
                        <div class="each-form-field">
                            <label>Password</label>
                            <input type="password" name="password" minlength="8" maxlength="20" class="" id="password" required>
                        </div>
                        <div class="each-form-field">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="" id="date-of-birth" required>
                        </div>
                        <div class="each-form-field">
                            <button class="" type="submit" value="submit">Create Account</button>
                        </div>
                    </form>
                    <div class="new-existing-choice">
                        <a href="./Login" class="danger">Existing User,Login</a>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </body>
</html>
