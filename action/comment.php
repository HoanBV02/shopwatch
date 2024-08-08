<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');

    $u = $_SESSION['u_id']; //user id
    $p = $_GET['pro_id'];   // product id
    $c = $_POST['content']; // comment content
    $d = date('Y-m-d H:i:sa');

    if(!isset($_SESSION['u_id'])) {
        header("Location: http://localhost/doan/login_form.php");
    } else {
        if(isset($_GET['pro_id'])) {
            $sql="insert into comment(pro_id, u_id, content, date_time) values($p, $u, '$c', '$d')";
            $result = $conn->query($sql);
                if($result) {
                    header("Location: http://localhost/doan/product.php?pro_id=$p");
                }
        }
    }
?>