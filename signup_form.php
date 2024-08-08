    <?php
    $wall_paper = "images/bg.jpg";
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intinial-scale=1">
        <link rel="stylesheet" href="themify-icons-font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body style="background-image: url(<?php echo $wall_paper?>);background-repeat: no-repeat">

        <div class="signup-box">
            <form method="post" action="action/register_action.php">
                <span class="icon-close">
                    <a href="index.php"><i class="ti-close"></i></a>
                </span>
                <h2>Register</h2>
                <div class="input-box">
                    <span class="icon"><i class="ti-user"></i></span>
                    <input type="text" name="username" required>
                    <label>UserName</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="ti-email"></i></span>
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="ti-lock"></i></span>
                    <input type="password" name="password"required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="ti-lock"></i></span>
                    <input type="password" name="confirmPassword" required>
                    <label>Confirm Password</label>
                </div>
                <button type="submit" name ="register">Register</button>
                <div class="register-link">
                    <p>Already have an account?<a href="login_form.php"> Login</a></p>
                </div>
            </form>
        </div>

    </body>

    <script src="js/hide.js"></script>

    </html>