<?php
session_start();
unset($_SESSION['u_id']);
unset($_SESSION['cart']);
if(isset($_SESSION['pro_id'])) {
    $x = $_SESSION['pro_id'];
    header("Location: http://localhost/doan/product.php?pro_id=$x");
    unset($_SESSION['pro_id']);
    session_destroy();
} else {
    header("Location: http://localhost/doan/");
}

?>