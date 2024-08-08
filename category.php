<?php
    include 'header.php';
    $conn = mysqli_connect("localhost", "root", "", "doan") or die("khong the ket noi");
?>

<body>
    <button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></i></button>
    
    <?php
        $sql = "select * from category where status = 1";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
    
    <section id ='category1' class="product__love">
            <div class="container">
                <div class="row bg-white">
                    <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                        <h2 class="product__love-heading upper">
                            <?php echo $row['cate_name']?>
                        </h2>
                    </div>
                </div>
                <div class="row bg-white">
    
                <?php
                    $x = $row['cate_id'];
                    $sql1 = "select * from product, category where product.cate_id = category.cate_id and product.cate_id = $x
                        and product.status = 1 and product.quantity > 0 order by dateadd desc";
                    $result1 = $conn->query($sql1);
                    if($result1 -> num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()) { 
                            if($row1['sale'] != 0) {
                            ?>
       
                    <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">
                        <div class="product__panel-img-wrap">
                            <a href="product.php?pro_id=<?php echo $row1['pro_id']?>"><img src="image/<?php echo $row1['image']?>" alt="" class="product__panel-img" ></a>
                        </div>
                        <h3 class="product__panel-heading">
                            <a href="product.php?pro_id=<?php echo $row1['pro_id']?>" class="product__panel-link"><?php echo $row1['pro_name']?> 
                            </a>
                        </h3>
                        <div class="product__panel-rate-wrap">
                            <i class="fas fa-star product__panel-rate"></i>
                            <i class="fas fa-star product__panel-rate"></i>
                            <i class="fas fa-star product__panel-rate"></i>
                            <i class="fas fa-star product__panel-rate"></i>
                            <i class="fas fa-star product__panel-rate"></i>
                        </div>
    
                        <div class="product__panel-price">
                            <span class="product__panel-price-old ">
                                <?php require_once 'function.php'; echo formatCurrency( $row1['price'])?>đ
                            </span>
                            <span class="product__panel-price-current">
                                <?php require_once 'function.php'; echo formatCurrency(($row1['price'] - ($row1['price'] * $row1['sale'] / 100 )))?>đ  
                            </span>
                        </div> 
    
                        <div class="product__panel-price-sale-off">
                            <?php echo $row1['sale']?>%
                        </div> 
                    </div>
    
                    <?php }
                        else { ?>
                            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row1['pro_id']?>"><img src="image/<?php echo $row1['image']?>" alt="" class="product__panel-img" ></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row1['pro_id']?>" class="product__panel-link"><?php echo $row1['pro_name']?> 
                                </a>
                            </h3>
                            <div class="product__panel-rate-wrap">
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                            </div>
        
                            <div class="product__panel-price">
                                <span class="product__panel-price-current">
                                    <?php require_once 'function.php'; echo formatCurrency(($row1['price'] - ($row1['price'] * $row1['sale'] / 100 )))?>đ    
                                </span>
                            </div> 
        
                            <div class="product__panel-price-sale-off">
                                <?php echo $row1['sale']?>%
                            </div> 
                        </div>
    
                    <?php }
                        }
                    }
                ?>
                    
                </div>
            </div>
        </section>  
    <?php }
    }
?>
        
        <?php include "footer.php"?>
        <script src="js/main.js"></script>
</body>
    