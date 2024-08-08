<?php
    session_start();
    if(!isset($_SESSION['u_id'])) {
        echo '<script type="text/javascript">
                alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng");
                window.location.href = "http://localhost/doan/login_form.php";
              </script>';
        exit();
    }
    $a=$_SESSION['u_id'];
    
    if(isset($_POST['addtocart']) && ($_POST['addtocart'])) {
        $pro_id = $_POST['pro_id'];
        $image = $_POST['img'];
        $pro_name = $_POST['name'];
        $price = $_POST['price'];
        if(isset($_POST['quantity']) && (($_POST['quantity']) > 0)) {
            $quantity = $_POST['quantity'];
        }else{
            $quantity = 1;
        }
        $sale= $_POST['sale'];
        $fg = 0;

        $i = 0;

        foreach($_SESSION['cart'] as $item) {
            if($item[2] === $pro_name) {
                $newquantity = $quantity + $item[4];
                $_SESSION['cart'][$i][4] =$newquantity;
                $fg = 1;
                break;
            }
            $i++;
        }

        if($fg==0) {
            $item = array($pro_id, $image, $pro_name, $price, $quantity,$sale);
            $_SESSION['cart'][] = $item;
        }
        
        header("Location: http://localhost/doan/cart.php?u_id=$a");
    }
?>