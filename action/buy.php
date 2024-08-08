<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');

    if(!isset($_SESSION['u_id'])) {
        header("Location: http://localhost/doan/login_form.php");
     } else {
        if(isset($_POST['buy'])) {
            $u_id = $_SESSION['u_id'];
            $fullname = $_POST['fullname'];
            $addr = $_POST['address'];
            foreach($_SESSION['cart'] as $item) {
                $pro_id = $item[0];
                $image = $item[1];
                $pro_name = $item[2];
                $quantity = $item[4];
                $price = ($item[3] - ($item[3] * $item[5] / 100 )) * $item[4];
                $date = date('Y-m-d');
                $status = 0;
                $sql = "insert into order_detail(pro_id, u_id, fullname, image, pro_name, quantity, price, address,
                date_time, status) values
                ($pro_id, $u_id, '$fullname', '$image', '$pro_name', $quantity, $price, '$addr' , '$date', $status)";
                $result = $conn->query($sql);
                if($result) {
                    $sql2 = "select * from product where pro_id = $pro_id";
                    $result2 = $conn->query($sql2);
                    $row1 = $result2->fetch_assoc();
                    $newquantity = $row1['quantity'] - $quantity;
                    $newsold = $row1['sold'] + $quantity;
                    $sql3 = "update product set quantity = $newquantity, sold = $newsold where pro_id = $pro_id";
                    $result3 = $conn->query($sql3);
                    if($result3) {
                        unset($_SESSION['cart']);
                    }
                }   
            }
        }
        header("Location: http://localhost/doan/index.php");
        
    }
?>