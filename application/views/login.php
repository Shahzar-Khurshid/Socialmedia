<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Social Media</title>
        <link rel="stylesheet" href="../static/css/style.css">
        <script src="../static/js/external/jquery-3.5.0.min.js"></script>
        <script src="../static/js/login.js"></script>
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
                    <h1>Existing User</h1>
                    <h1>Log-in</h1>
                    <a href="./Registration" class="danger">New User Create Account</a>
                </div>
            </div>
            <div class="middle">
                <div class="type-selection">
                    <div class="existing-user">
                        <a href="#" class="danger">Existing User</a>
                        <hr>
                    </div>
                    <div class="new-user">
                        <a href="./Registration" class="danger">New user</a>
                    </div>
                </div>
                <div class="existing-user-form">
                    <h3>Login into Edubook Account</h3>
                    <div class="bigger-view">
                        <h3>Log-in</h3>
                    </div>
                    <form class="form" id="login-form" method="POST" action="">
                        <div class="each-form-field">
                            <label>Email</label>
                            <input type="text" name="email" class="" required>
                        </div>
                        <div class="each-form-field">
                            <label>Password</label>
                            <input type="password" name="password" class="" required>
                        </div>
                        <div class="each-form-field">
                            <button class="" type="submit" value="submit">Log-in</button>
                        </div>
                    </form>
                    <div class="new-existing-choice">
                        <a href="./Registration" class="danger">New User, Create Account</a>
                    </div>
                </div>
            </div>
            <?php
            include 'footer.php';
            ?>
        </div>
    </body>
</html>
