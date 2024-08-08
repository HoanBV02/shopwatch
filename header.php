<?php
$conn = mysqli_connect("localhost", "root", "", "doan") or die("không thể kết nối");
    if(isset($_SESSION['u_id']) && $_SESSION['u_id'] != 0) {
        // Lấy thông tin từ cơ sở dữ liệu
        $userId = $_SESSION['u_id'];
        $sql = "SELECT u_name FROM user WHERE u_id = $userId";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra kết quả truy vấn
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userName = $row['u_name'];

            // Hiển thị thông tin sau chữ "Xin chào"
            $welcomeMessage = 'Xin chào ' . $userName;
        }
    } else {
        // Nếu không có người dùng đăng nhập, không có thông tin để hiển thị
        $welcomeMessage = '';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ SHOP WATCH</title>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <style>
        .pagination {
        justify-content: center;
        align-items: center;
        font-size: 25px;
        display: inline-block;
        }

        .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid black ;
        border-radius: 40px;
        margin: 0 4px;
        }

        .pagination a:hover {
            color: white;
            background-color: green;
        }
        #myCarousel {
            width: 80%;
            margin: auto;
            padding-top: 30px;
        }

        .carousel-inner img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        

    </style>

</head>
<?php
    
?>
<body>
    <div class="app">
        <header id="header">
            <!-- header top -->
            <div class="header__top">
                <div class="container">
                    <section class="row flex">
                        <div class="col-lg-5 col-md-0 col-sm-0 heade__top-left">

                        </div>

                        <nav class="col-lg-7 col-md-0 col-sm-0 header__top-right">
                            <ul class="header__top-list">
                                <?php
                                    if(isset($_SESSION['u_id']) && $_SESSION['u_id'] != 0) {?>
                                        <li class="header__top-item">
                                            <a href="user_info.php" class="header__top-link">Thông tin đơn hàng</a>
                                        </li>
                                        <li>
                                        <a class="header__top-link" style="color: white;"><?php echo $welcomeMessage; ?></a>
                                    </li>
                                        <li class="header__top-item">
                                            <a href="action/logout.php" class="header__top-link">Đăng xuất</a>
                                        </li>
                                        
                                <?php 
                                    } else {
                                ?>
                                        <li class="header__top-item">
                                            <a href="signup_form.php" class="header__top-link">Đăng ký</a>
                                        </li>
                                        <li class="header__top-item">
                                            <a href="login_form.php" class="header__top-link">Đăng nhập</a>
                                        </li>
                                    <?php } ?>
                            </ul>
                        </nav>
                    </section>
                </div>
            </div>

            <form action="search.php" method="post">
                <div class="header__bottom">
                    <div class="container">
                        <section class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 header__logo">
                                <h1 class="header__heading">
                                    <a href="index.php" style="text-decoration: none;" href="#" class="header__logo-link">
                                        <p style="color:white; font-size: 25px; padding-top: 10px;font-weight: 600;">SHOP
                                            WATCH</p>
                                    </a>
                                </h1>
                            </div>
                            
                            <div class="col-lg-6 col-md-7 col-sm-0 header__search">
                                <input type="text" name="search_val" class="header__search-input" placeholder="Tìm kiếm tại đây...">
                                <button type="submit" name="search" class="header__search-btn">
                                    <div class="header__search-icon-wrap">
                                        <i class="fas fa-search header__search-icon"></i>
                                    </div>
                                </button>
                            </div>
                            
                            <div class="col-lg-2 col-md-0 col-sm-0 header__call">
                                <div class="header__call-icon-wrap">
                                    <i class="fas fa-phone-alt header__call-icon"></i>
                                </div>
                                <div class="header__call-info">
                                    <div class="header__call-text">
                                        Gọi điện tư vấn
                                    </div>
                                    <div class="header__call-number">
                                        012366666
                                    </div>
                                </div>
                            </div>
    
                            <a href="cart.php" class="col-lg-1 col-md-1 col-sm-0 header__cart">
                                <div class="header__cart-icon-wrap">
                                    <span class="header__notice">
                                        <?php 
                                            if(isset($_SESSION['cart']) && ($_SESSION['cart'] > 0)) {
                                                echo count($_SESSION['cart']);
                                            } else {
                                                echo 0;
                                            }
                                        ?>
                                    </span>
                                    <i class="fas fa-shopping-cart header__nav-cart-icon"></i>
                                </div>
                            </a>
                        </section>
                    </div>
                </div>

            </form>

            <div class="header__nav">
                <div class="container">
                    <section class="row">
                        <div class=" col-lg-3 col-md-0 col-sm-0">
                        </div>

                        <div class="header__nav col-lg-9 col-md-0 col-sm-0">
                            <ul class="header__nav-list">
                                <li class="header__nav-item">
                                    <a href="index.php" class="header__nav-link">Trang chủ</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="category.php" class="header__nav-link">Danh mục sản phẩm</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="contact.php" class="header__nav-link">Góp ý & Phản hồi</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </header>