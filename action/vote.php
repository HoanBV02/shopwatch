<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');

    $pro_id = $_GET['pro_id'];
    if(!isset($_SESSION['u_id'])) {
        echo '<script type="text/javascript">
                alert("Bạn cần đăng nhập để bình chọn");
                window.location.href = "http://localhost/doan/login_form.php";
              </script>';
        exit();
    } else {
        $u_id = $_SESSION['u_id'];
        
        // Kiểm tra xem tài khoản đã bình chọn cho sản phẩm này chưa
        $checkSql = "SELECT * FROM vote WHERE u_id = $u_id AND pro_id = $pro_id";
        $checkResult = $conn->query($checkSql);
        if ($checkResult->num_rows > 0) {
            echo '<script type="text/javascript">
                    alert("Tài khoản của bạn đã bình chọn cho sản phẩm này");
                    window.location.href = "http://localhost/doan/product.php?pro_id='.$pro_id.'";
                  </script>';
            exit();
        }
        
        if(isset($_POST['vote'])){
            if(!isset($_POST['star']) || $_POST['star'] == null) {
                echo '<script type="text/javascript">
                        alert("Vui lòng chọn số sao");
                        window.location.href = "http://localhost/doan/product.php?pro_id='.$pro_id.'";
                      </script>';
                exit();
            } else {
                $star = (int)$_POST['star'];
                $sql = "INSERT INTO vote (u_id, pro_id, star) VALUES ($u_id, $pro_id, $star)";
                $result = $conn->query($sql);

                echo '<script type="text/javascript">
                        alert("Bình chọn thành công");
                        window.location.href = "http://localhost/doan/product.php?pro_id='.$pro_id.'";
                      </script>';
                exit();
            }
        }
    }
    header("Location: http://localhost/doan/product.php?pro_id=$pro_id");  
?>