<?php
    include 'connect.php';
    if(isset($_POST['add'])){
        $pro_name = $_POST['pro_name'];
        $cate_id = $_POST['cate_id'];
        $quantity = $_POST['quantity'];
        $dateadd = date('Y-m-d');
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $description = $_POST['description'];

        $sql = "insert into product(pro_name, cate_id, quantity, dateadd, price, sale, description, status)
                values('$pro_name', $cate_id, $quantity, '$dateadd', $price, $sale, '$description', 1)";

        $result = $conn->query($sql);

        // header("Location: http://localhost/doan/admin/");
    }
?>