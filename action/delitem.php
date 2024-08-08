<?php
    session_start();
    if(isset($_GET['i'])) {
        array_splice($_SESSION['cart'], $_GET['i'], 1);
        header("Location: http://localhost/doan/cart.php");
    }else {
        header("Location: http://localhost/doan/cart.php");
    }