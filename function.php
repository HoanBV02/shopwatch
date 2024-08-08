
<?php
function formatCurrency($number)
{
    return number_format($number, 0, ',', '.');
}

function showNumVotes($pro_id, $star) {
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    $sql = "select count(*) as count from vote where pro_id = $pro_id and star = $star";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
}
//hiển thị tỉ lệ vote sp 
function showVoteRate($pro_id) {
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    //số lượng vote của sản phẩm
    $sql1 = "select count(*) as count from vote where pro_id = $pro_id";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    //tổng số sao 
    $sql2 = "select sum(star) as sumStar from vote where pro_id = $pro_id";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    if($row1['count'] == 0) {
        echo 5;
    } else {
        echo number_format(($row2['sumStar'] / $row1['count']), 1);
    }
}
//right
function showStar($pro_id) {
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    //số lượng vote của sản phẩm
    $sql1 = "select count(*) as count from vote where pro_id = $pro_id";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    //tổng số sao 
    $sql2 = "select sum(star) as sumStar from vote where pro_id = $pro_id";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    if($row1['count'] == 0) {
        $star = 5;
    } else {
        $star = number_format(($row2['sumStar'] / $row1['count']), 1);
    }
    if($star > 4.5) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 4) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 3.5) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 3) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 2.5) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 2) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 1.5) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 1) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star = 1 ) {
        echo '<div class="product__panel-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    }
}
//left product__main-info-rate-wrap
function showStar2($pro_id) {
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    //số lượng vote của sản phẩm
    $sql1 = "select count(*) as count from vote where pro_id = $pro_id";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    //tổng số sao 
    $sql2 = "select sum(star) as sumStar from vote where pro_id = $pro_id";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    if($row1['count'] == 0) {
        $star = 5;
    } else {
        $star = number_format(($row2['sumStar'] / $row1['count']), 1);
    }
    if($star > 4.5) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 4) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 3.5) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 3) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 2.5) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 2) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star > 1.5) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    } elseif($star > 1) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
        <i class="fas fa-star-half product__panel-rate"></i>
    </div>';
    } elseif($star = 1 ) {
        echo '<div class="product__main-info-rate-wrap">
        <i class="fas fa-star product__panel-rate"></i>
    </div>';
    }
    
}
?>

