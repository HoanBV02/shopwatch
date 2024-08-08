<?php
    include 'connect.php';
    if(isset($_POST['edit'])){
        $pro_id = $_POST['pro_id'];
        $name = $_POST['namebn'];
        $idbn = $_GET['idbn'];

        $sql = "UPDATE banner SET name='$name', pro_id = '$pro_id' WHERE idbn = $idbn";
        $result = $conn->query($sql);

        header("Location: http://localhost/doan/admin/banner.php"); 
        exit(); 
    }
?>