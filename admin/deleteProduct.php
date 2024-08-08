<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['btndel'])) {
        $pro_id = $_GET['pro_id'];
        $sql = "UPDATE product SET status = 0 WHERE pro_id = $pro_id";
        $result = $conn->query($sql);
    }

    if (isset($_GET['btrendel'])) {
        $pro_id = $_GET['pro_id'];
        $sql = "UPDATE product SET status = 1 WHERE pro_id = $pro_id";
        $result = $conn->query($sql);
    }

    header("Location: http://localhost/doan/admin/");
}
?>
