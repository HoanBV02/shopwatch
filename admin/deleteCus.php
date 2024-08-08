<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['block'])) {
        $u_id = $_GET['u_id'];
        $sql = "UPDATE user SET status = 0 WHERE u_id = $u_id";
        $result = $conn->query($sql);
    } elseif (isset($_GET['unlock'])) {
        $u_id = $_GET['u_id'];
        $sql = "UPDATE user SET status = 1 WHERE u_id = $u_id";
        $result = $conn->query($sql);
    }

    header("Location: http://localhost/doan/admin/customer.php");
    exit();
}
?>
