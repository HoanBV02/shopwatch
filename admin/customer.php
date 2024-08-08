<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="form.css"> -->
    <style>
        a {
            text-decoration: none;
            padding: 5px;
            color: black;
        }

    </style>
</head>
<?php
    include 'connect.php'
?>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="admin/home.php">
                        <span class="icon">
                            <ion-icon name="watch"></ion-icon>
                        </span>
                        <span class="title">Watch Shop</span>
                    </a>
                </li>

                <li>
                    <a href="home.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Tổng quan</span>
                    </a>
                </li>

                <li class="active">
                    <a href="customer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Người dùng</span>
                    </a>
    </li>
    <li>
                    <a href="banner.php">
                        <span class="icon">
                            <ion-icon name="image-outline"></ion-icon>
                        </span>
                        <span class="title">Banner</span>
                    </a>
                </li>
                <li>
                <a href="http://localhost/doan/">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

               

                <div class="user">
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <?php include 'showCustomer.php'; showCustomer();?>

        </div>
        <script src="main.js"></script>

         <!-- =========== Scripts =========  -->

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>