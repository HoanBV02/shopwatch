<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'doan');

if (!$conn) {
    die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
}

if (isset($_POST['register'])) {
 
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];


    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['message'] = "Vui lòng nhập đầy đủ thông tin.";
    } else {
      
        if ($password !== $confirmPassword) {
            $_SESSION['message'] = "Mật khẩu xác nhận không khớp.";
        } else {
            
            $checkUsernameQuery = "SELECT * FROM user WHERE u_name = '$username'";
            $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
            if (!$checkUsernameResult) {
                $_SESSION['message'] = "Lỗi trong quá trình kiểm tra tên đăng nhập: " . mysqli_error($conn);
            } elseif (mysqli_num_rows($checkUsernameResult) > 0) {
                $_SESSION['message'] = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.";
               
                header("Location: http://localhost/doan/signup_form.php");
                exit();
            
            } else {
                
                $insertUserQuery = "INSERT INTO user (u_name, email, password, status) VALUES ('$username', '$email', '$password', 1)";
                $insertUserResult = mysqli_query($conn, $insertUserQuery);

                if ($insertUserResult) {
                    $_SESSION['message'] = "Đăng ký thành công!";
                    
                    header("Location: http://localhost/doan/login_form.php");
                    exit();
                } else {
                    $_SESSION['message'] = "Đăng ký thất bại. Vui lòng thử lại.";
                    
                    header("Location: http://localhost/doan/signup_form.php");
                    exit();
                }
            }
        }
    }
}


if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
