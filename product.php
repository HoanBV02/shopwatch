<?php
    session_start();
    include 'header.php';
    include 'function.php';
    $_SESSION['pro_id'] = $_GET['pro_id'];
?>
<?php
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');

    if(isset($_GET['pro_id'])) {
        $pro_id = $_GET['pro_id'];
        $sql="SELECT * FROM product WHERE pro_id = '$pro_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $cate_id = $row['cate_id'];
    }
?>


<html>

<head>
    <link rel="stylesheet" href="css/product.css">
    <style>
        .unchecked {
            color: black;
        }
        .scale_vote {
            color: red;
        }
        .scale_vote h2{
            font-size: 4rem;
            font-weight: bold;
        }
        .product__main-content-wrap p{
            margin-bottom: 0px;
        }
        .vote {
            display: inline-block;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></button>

    <section class="product">
        <div class="container">
            <div class="row bg-white pt-4 pb-4 border-bt pc">
                <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">

                </nav>

                <article class="product__main col-lg-9 col-md-12 col-sm-12">
                    <div class="row">
                        <?php 
                                if ($row['sale'] != 0) {
                            ?>
                        <div class="product__main-img col-lg-4 col-md-4 col-sm-12">
                            <div class="product__main-img-primary">
                                <img src="image/<?php echo $row["image"]?>">
                            </div>
                        </div>

                        <div class="product__main-info col-lg-8 col-md-8 col-sm-12">
                            <div class="product__main-info-breadcrumb">
                                Trang chủ / Sản phẩm
                            </div>

                            <a href="#" class="product__main-info-title">
                                <h2 class="product__main-info-heading">
                                    <?php echo $row["pro_name"]?>(giảm <?php echo $row['sale']?>%)
                                </h2>
                            </a>

                            <?php showStar2($row['pro_id']);?>

                            <div class="product__main-info-price">
                                <span style="font-size: 2.0rem; text-decoration: line-through;"
                                    class="product__main-info-price-old">
                                    <?php echo formatCurrency($row["price"])?>đ
                                </span>
                                <span class="product__main-info-price-current">
                                    <?php echo formatCurrency(($row["price"] - $row['price'] * $row['sale'] / 100))?>đ
                                </span>

                            </div>

                            <div class="product__main-info-description">
                                <?php echo $row["description"]?>đ
                            </div>

                            <div style="margin-top: 20px">
                                <span style="font-size: 1.6rem; padding-right: 10px; border-right: 1px solid gray;">
                                    Số lượng:
                                    <?php echo $row["quantity"]?>
                                </span>
                                <span style="font-size: 1.6rem; padding-left: 10px">
                                    Đã bán:
                                    <?php echo $row["sold"]?>
                                </span>
                            </div>

                            <?php }
                            else { ?>
                            <div class="product__main-img col-lg-4 col-md-4 col-sm-12">
                                <div class="product__main-img-primary">
                                    <img src="image/<?php echo $row["image"]?>">
                                </div>
                            </div>

                            <div class="product__main-info col-lg-8 col-md-8 col-sm-12">
                                <div class="product__main-info-breadcrumb">
                                    Trang chủ / Sản phẩm
                                </div>

                                <a href="#" class="product__main-info-title">
                                    <h2 class="product__main-info-heading">
                                        <?php echo $row["pro_name"]?>
                                    </h2>
                                </a>

                                <?php showStar2($row['pro_id']);?>

                                <div class="product__main-info-price">
                                    <span class="product__main-info-price-current">
                                        <?php require_once 'function.php'; echo formatCurrency($row["price"])?>d
                                    </span>
                                </div>

                                <div class="product__main-info-description">
                                    <?php echo $row["description"]?>
                                </div> 
                                
                                <div style="margin-top: 20px">
                                    <span style="font-size: 1.6rem; padding-right: 10px; border-right: 1px solid gray;">
                                        Số lượng:
                                        <?php echo $row["quantity"]?>
                                    </span>
                                    <span style="font-size: 1.6rem; padding-left: 10px">
                                        Đã bán:
                                        <?php echo $row["sold"]?>
                                    </span>
                                </div>

                                <?php }?>
                            
                                <form style="margin-top: 25px" action="action/addcart.php" method="post">
                                    <div class="product__main-info-cart">
                                    
                                    <div class="product__main-info-cart-btn-wrap">
                                        <input class="product__main-info-cart-quantity" type="number" name="quantity" step="1" min = "1" max="5" value="1">
                                        <input class="product__main-info-cart-btn" type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                                    </div>
                                    <div>
                                        <input type="hidden" value="<?php echo $row['pro_id']?>" name="pro_id">
                                        <input type="hidden" value="<?php echo $row['image']?>" name="img">
                                        <input type="hidden" value="<?php echo $row['pro_name']?>" name="name">
                                        <input type="hidden" value="<?php echo $row['price']?>" name="price">
                                        <input type="hidden" value="<?php echo $row['sale']?>" name="sale">
                                    </div>
                                </form>
                            </div>
                            </div>
                            
                        </div>
                    

                        <div class="row bg-white">
                            <div style="padding-left: 0;" class="col-12 product__main-tab">
                                <a href="#" class="product__main-tab-link product__main-tab-link--active">
                                    Đánh giá
                                </a>
                            </div>
                            <div class="col-12 product__main-content-wrap">
                                <div class="scale_vote">
                                    <h2><?php showVoteRate($pro_id)?>/5</h2>
                                </div>
                                <form action="action/vote.php?pro_id=<?php echo $pro_id?>" method="post">
                                    <input type="radio" name="star" value="5">
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <p class="vote">(<?php showNumVotes($pro_id, 5)?> đánh giá)</p> 
                                    <br>
                                    <input type="radio" name="star" value="4"> 
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <p class="vote">(<?php showNumVotes($pro_id, 4)?> đánh giá)</p>
                                    <br>
                                    <input type="radio" name="star" value="3"> 
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <p class="vote">(<?php showNumVotes($pro_id, 3)?> đánh giá)</p>
                                    <br>
                                    <input type="radio" name="star" value="2"> 
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <p class="vote">(<?php showNumVotes($pro_id, 2)?> đánh giá)</p>
                                    <br>
                                    <input type="radio" name="star" value="1"> 
                                    <i class="fas fa-star product__main-info-rate"></i>
                                    <p class="vote">(<?php showNumVotes($pro_id, 1)?> đánh giá)</p>
                                    <br>
                                    <?php
                                        if(isset($_SESSION['err_ms'])) { ?>
                                            <p><?php echo $_SESSION['err_ms']?></p>
                                        <?php }
                                    ?>
                                    <input style="margin-top: 20px;font-size:1.6rem; background-color:red; border: none" type="submit" name="vote" id="submitcomment" class="btn btn-primary" value="Gửi">
                                </form>
                                    
                            </div>

                        </div>
                </article>

                <aside class="product__aside col-lg-3 col-md-0 col-sm-0">
                    <div class="product__aside-top">
                        <div class="product__aside-top-item">
                            <img src="images/shipper.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Giao hàng nhanh chóng
                                </p>
                                <span>
                                    Chỉ trong vòng 24h
                                </span>
                            </div>
                        </div>
                        <div class="product__aside-top-item">
                            <img src="images/brand.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Sản phẩm chính hãng
                                </p>
                                <span>
                                    Sản phẩm nhập khẩu 100%
                                </span>
                            </div>
                        </div>
                        <div class="product__aside-top-item">
                            <img src="images/less.png">
                            <div class="product__aside-top-item-text">
                                <p>
                                    Mua hàng tiết kiệm
                                </p>
                                <span>
                                    Rẻ hơn từ 10% đến 30%
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="product__aside-bottom">
                        <h3 class="product__aside-heading">
                            Có thể bạn thích
                        </h3>

                        <div class="product__aside-list">
                            <?php
                                $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by sold asc limit 6";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) { ?>
                            <div class="product__aside-item product__aside-item--border">
                                <div class="product__aside-img-wrap">
                                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>">
                                        <img src="image/<?php echo $row['image']?>" class="product__aside-img">
                                    </a>
                                </div>
                                <div class="product__aside-title">
                                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__aside-link">
                                        <h4 class="product__aside-link-heading">
                                            <?php echo $row['pro_name']?>
                                        </h4>
                                    </a>

                                    <?php showStar2($row['pro_id']);?>

                                    <div class="product__aside-price">
                                        <span class="product__aside-price-current">
                                            <?php require_once 'function.php'; echo formatCurrency(($row["price"] - $row['price'] * $row['sale'] / 100))?>đ
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php }} 
                                else {
                                    echo "0 results";
                                }
                                ?>

                        </div>
                    </div>
                </aside>

            </div>


            <div class="customer-reviews row pb-4 pb-4  py-4 pb-4 py-4 py-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Bình luận sản phẩm</h3>
                    <form action="action/comment.php?pro_id=<?php echo $pro_id?>" id="formgroupcomment" method="post">
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="content" required="" rows="8" id='formcontent'
                                class="form-control"></textarea>
                        </div>
                        <input style="font-size:1.6rem" type="submit" name="comment" id="submitcomment" class="btn btn-primary" value="Gửi">
                    </form>
                </div>
            </div>

            <div class="product-comment row pb-4 pb-4  py-4 pb-4 py-4 py-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
                        $sql = "select * from comment,user where user.u_id = comment.u_id and comment.pro_id = $pro_id order by date_time desc limit 5";
                        $result = $conn->query($sql);
                        
                        if($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>

                                <div class="comment-item">
                                    <ul class=item-reviewer>
                                        <div class="comment-item-user">
                                            <img src="images/2.png" alt="" class="comment-item-user-img">
                                            <li><b><?php echo $row['u_name']?></b></li>
                                        </div>
                                
                                        <br>
                                        <li><?php echo $row['date_time']?></li>
                                        <li>
                                            <h4><?php echo $row['content']?></h4>
                                        </li>
                                    </ul>
                                </div>
                            <?php }
                        } else { ?>
                            <p style="font-size:1.6rem">Không có bình luận nào cho sản phẩm này</p>
                        <?php }
                    ?>


                </div>
            </div>

            <section class="product__love col-12 mt-4">
                <div class="row bg-white">
                    <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                        <h2 class="product__love-heading">
                            Sản phẩm tương tự
                        </h2>
                    </div>
                </div>
                <div class="row bg-white">
                <?php
                        $sql = "SELECT * FROM product where cate_id = $cate_id and status = 1 and quantity > 0 order by sold asc limit 6";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) {?>
            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">

                <div class="product__panel-img-wrap">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                </div>
                <h3 class="product__panel-heading">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link"><?php echo $row['pro_name']?></a>
                </h3>
                <?php showStar($row['pro_id']);?>

                <div class="product__panel-price-sale-off">
                    <?php echo $row['sale'],'%'?>
                </div>

                <div class="product__panel-price">
                    <span class="product__panel-price-old ">
                        <?php require_once 'function.php'; echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php require_once 'function.php'; echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>
                </div>
            </div>
            <?php }
                                else { ?>
            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">

                <div class="product__panel-img-wrap">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                </div>
                <h3 class="product__panel-heading">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link"><?php echo $row['pro_name']?></a>
                </h3>

                <?php showStar($row['pro_id']);?>

                <div class="product__panel-price-sale-off">
                    <?php echo $row['sale'],'%'?>
                </div>

                <div class="product__panel-price">
                    <span class="product__panel-price-old product__panel-price-old-hide">
                        <?php require_once 'function.php'; echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php require_once 'function.php'; echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>
                </div>
            </div>
            <?php
                                }} 
                            } 
                                else {
                                    echo "0 results";
                                }
                            ?>
                </div>
            </section>
        </div>
    </section>

    <!--footer-->
    <?php require_once 'footer.php';
        unset($_SESSION['err_ms']);
    ?>
    <script src="js/main.js"></script>

</body>

</html>