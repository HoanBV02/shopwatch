<?php
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    if(isset($_GET['o_id'])) {
        $o_id = $_GET['o_id'];
        //lay ma sp va so luong tu bang order
        $sql = "select * from order_detail where o_id = $o_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pro_id = $row['pro_id'];
        $oQuantity = $row['quantity'];
        // lay ma so luong va so luong da ban san pham tu bang product
        $sql1 = "select * from product where pro_id = $pro_id";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $quantity = $row1['quantity'];
        $sold =$row1['sold'];
        
        $newQuantity = $oQuantity + $quantity;
        $newSold = $sold - $oQuantity;
        //sua lai so luong bang product
        $sql3 = "update product set quantity = $newQuantity, sold = $newSold where pro_id = $pro_id";
        $qr = $conn->query($sql3);

        $sql2 = "update order_detail set status = 2 where o_id = $o_id";
        $qr2 = $conn->query($sql2);
        header("Location: http://localhost/doan/user_info.php");
    }
?>