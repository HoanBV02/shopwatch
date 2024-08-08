<?php
session_start();
include 'header.php';
include "function.php";
unset($_SESSION['pro_id']);
?>
<?php
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
?>
<style>
    header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f1f1f1;
            padding: 20px;
            z-index: 9999;
        }

        #myCarousel {
            width: 80%;
            margin: auto;
            padding-top: 200px;
        }

        .carousel-inner img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    </style>
<?php
$bansql = "SELECT * FROM banner";
$rs = $conn->query($bansql);

if ($rs->num_rows > 0) {
    ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
        <div class="carousel-inner">
            <?php
            $firstBanner = true; 
            while ($rowbn = $rs->fetch_assoc()) {
                ?>
                
                <div class="carousel-item <?php echo $firstBanner ? 'active' : ''; ?>">
                <a href="product.php?pro_id=<?php echo $rowbn["pro_id"]; ?>">
                    <img class="d-block w-100" src="images/<?php echo $rowbn["name"]; ?>.jpg" alt="<?php echo $rowbn["name"]; ?> Banner">
                    </a>
                </div>
           
                <?php
                $firstBanner = false; 
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
} else {
    echo "Không có dữ liệu banner.";
}
?>

<button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></i></button>
<!-- bestselling product -->
<section class="bestselling">
    <div class="container">
        <div class="row">
            <div class="bestselling__heading-wrap">
                <div class="bestselling__heading">Top bán chạy nhất</div>
            </div>
        </div>

        <section class="row">
            <?php
                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by sold desc limit 6";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) { 
                                ?>
            <div class="bestselling__product col-lg-4 col-md-6 col-sm-12">
                <div class="bestselling__product-img-box">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt=""
                        class="bestselling__product-img"></a>
                </div>
                <div class="bestselling__product-text">
                    <h3 class="bestselling__product-title">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="bestselling__product-link">
                            <?php echo $row['pro_name']?>
                        </a>
                    </h3>

                    <?php showStar2($row['pro_id']);?>

                    <span style="font-size: 1.4rem; color: black; text-decoration: line-through;"
                        class="bestselling__product-price">
                        <?php  echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php  echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>

                    <div class="product__panel-price-sale-off">
                        <?php echo $row['sale']?>%
                    </div>

                    <div class="bestselling__product-btn-wrap">
                        <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button
                            class="bestselling__product-btn">Xem hàng</button></a>
                    </div>
                </div>
            </div>
            <?php }
                     else { ?>
            <div class="bestselling__product col-lg-4 col-md-6 col-sm-12">
                <div class="bestselling__product-img-box">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt=""
                        class="bestselling__product-img">
                </div></a>
                <div class="bestselling__product-text">
                    <h3 class="bestselling__product-title">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="bestselling__product-link">
                            <?php echo $row['pro_name']?>
                        </a>
                    </h3>

                    <?php showStar2($row['pro_id']);?>

                    <span style="font-size: 1.6rem" class="product__panel-price-current">
                        <?php echo formatCurrency($row['price'])?>đ
                    </span>

                    <div class="product__panel-price-sale-off">
                        <?php echo $row['sale']?>%
                    </div>

                    <div class="bestselling__product-btn-wrap">
                        <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button
                                class="bestselling__product-btn">Xem hàng</button></a>
                    </div>
                </div>
            </div>
            <?php 
                     }}
                        } else {
                            echo "0 results";
                        }
                    ?>
        </section>
    </div>
</section>

<section class="product">
    <div class="container">
        <div class="row">
            <aside class="product__sidebar col-lg-3 col-md-0 col-sm-12">
                <div class="product__sidebar-heading">
                    <div class=""></div>
                    <h2 style="padding-left: 10%" class="product__sidebar-title">Sản phẩm mới</h2>
                </div>
                <nav class="product__sidebar-list">
    <div class="row">
        <?php
        $sqls = "SELECT * FROM product ORDER BY dateadd DESC LIMIT 4;";
        $results = $conn->query($sqls);

        if ($results->num_rows > 0) {
            // Lặp qua từng hàng dữ liệu
            while ($row = $results->fetch_assoc()) {
              
                ?>

                <div class="product__sidebar-item col-lg-6">
                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt=""
                        class="bestselling__product-img">
                    <a href="" class="product__sidebar-item-name"><?php echo $row['pro_name']; ?></a>
                </div>

                <?php
            }
        }
        ?>
    </div>
</nav>
            </aside>

            <article class="product__content col-lg-9 col-md-12 col-sm-12">
                <nav class="row">
                </nav>

                <div class="row product__panel">
                    <?php
                        $results_per_page = 8;
                        $query = "SELECT * FROM product where status = 1 and quantity > 0 order by dateadd desc";
                        $result = $conn->query($query);
                            
                        $number_of_result = mysqli_num_rows($result);

                        $number_of_page = ceil ($number_of_result / $results_per_page);


                            if (!isset ($_GET['page']) ) {

                                $page = 1;
                                
                                } else {
                                
                                $page = $_GET['page'];
                                
                                }

                        $page_first_result = ($page-1) * $results_per_page;

                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by dateadd desc LIMIT " . $page_first_result . ',' . $results_per_page;

                        $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) {?>
                    <div class="product__panel-item col-lg-3 col-md-4 col-sm-6">
                        <div class="product__panel-item-wrap">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link">
                                    <?php echo $row['pro_name']?>
                                </a>
                            </h3>
                            <?php showStar($row['pro_id']);?>

                            <div class="product__panel-price">
                                <span class="product__panel-price-old">
                                    <?php echo formatCurrency($row['price'])?>đ
                                </span>
                                <span class="product__panel-price-current">
                                    <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                                </span>
                            </div>

                            <div class="product__panel-price-sale-off">
                                <?php echo $row['sale'],'%'?>
                            </div>

                            <div class="bestselling__product-btn-wrap">
                                <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button class="bestselling__product-btn">
                                    Xem hàng</button></a>
                            </div>
                        </div>
                    </div>
                    <?php }
                                    else { ?>
                    <div class="product__panel-item col-lg-3 col-md-4 col-sm-6">
                        <div class="product__panel-item-wrap">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link">
                                    <?php echo $row['pro_name']?>
                                </a>
                            </h3>

                            <?php showStar($row['pro_id']);?>

                            <div class="product__panel-price">
                                <span class="product__panel-price-current">
                                    <?php echo formatCurrency($row['price'])?>đ
                                </span>
                            </div>

                            <div class="product__panel-price-sale-off">
                                <?php echo $row['sale'],'%'?>
                            </div>

                            <div class="bestselling__product-btn-wrap">
                                <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>">
                                <button class="bestselling__product-btn">Xemhàng</button></a>
                            </div>
                        </div>
                    </div>
                    

                    <?php
                                }} 
                            } 
                            ?>
                </div>
                    <div class="pagination">
                        <?php
                            for($page = 1; $page<= $number_of_page; $page++) {?>

                                <a style="text-decoration:none;" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                            
                            <?php }
                        ?>
                    </div>
            </article>
        </div>
    </div>
</section>
<!--end product -->

<!-- product love -->
<section class="product__love">
    <div class="container">
        <div class="row bg-white">
            <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                <h2 class="product__love-heading">
                    Có thể bạn thích
                </h2>
            </div>
        </div>
        <div class="row bg-white">
            <?php
                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by sold asc limit 6";
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
                        <?php echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
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
                        <?php echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
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
    </div>
</section>

<!-- footer -->
<?php require_once 'footer.php'?>

<script src="js/main.js"></script>

</body>

<?php 
$conn->close();
?>