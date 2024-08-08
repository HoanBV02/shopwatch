<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    
    if(isset($_POST['login'])) {
        $u_name = $_POST['username'];
        $password = $_POST['password'];
    }

    $sql = "select * from user where u_name = '$u_name' and password = '$password'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    // print_r($row);
    

    if ($result->num_rows > 0) {
        if ($row['status'] == 1) {
            $_SESSION['u_id'] = $row['u_id'];
            if (isset($_SESSION['pro_id'])) {
                $x = $_SESSION['pro_id'];
                header("Location: http://localhost/doan/product.php?pro_id=$x");
            } else {
                header("Location: http://localhost/doan/index.php");
            }
        } elseif ($row['status'] == 2) {
            header("Location: http://localhost/doan/admin/");
            exit();
        }
    } else {
        $_SESSION['err_ms'] = "Sai thông tin đăng nhập";
        header("Location: http://localhost/doan/login_form.php");
        exit();
    }
?>