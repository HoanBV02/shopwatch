<?php
$wall_paper = "images/bg.jpg";
session_start();
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

    <div class="login-box">
        <form method="post" action="action/login_action.php">
            <span class="icon-close">
                <a href="index.php"><i class="ti-close"></i></a>
            </span>
            <h2>LOGIN</h2>
            
            <div class="input-box">
                <span class="icon"><i class="ti-user"></i></span>
                <input type="text" name="username" required>
                <label>UserName</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="ti-lock"></i></span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <a href="#">Fogot Password?</a>
            </div>
            <p style="color: red" align=center><?php echo isset($_SESSION['err_ms']) ? $_SESSION['err_ms'] : ''?></p>
            <br>
            <button class="login-btn" type="submit" name="login">Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="signup_form.php"> Register</a></p>
            </div>
        </form>
    </div>
    
    <script src="js/hide.js"></script>

</body>

</html>

<?php
    unset($_SESSION['err_ms'])
?>