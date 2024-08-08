<?php
    include 'connect.php';
    if(isset($_POST['edit'])){
        $pro_id = $_GET['pro_id'];
        $pro_name = $_POST['pro_name'];
        $cate_id = $_POST['cate_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $description = $_POST['description'];

        $sql = "update product set pro_name = '$pro_name', cate_id = $cate_id, quantity = $quantity, 
            price = $price, sale = $sale, description = '$description' where pro_id = $pro_id";
        $result = $conn->query($sql);

        header("Location: http://localhost/doan/admin/");
    }
?>