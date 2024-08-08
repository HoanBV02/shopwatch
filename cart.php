
<?php
    session_start();
    //header
    include 'header.php';
?>
<head>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/contact.css">
	<style>
		.hidden {
            display:none
        }
		.quantity {
			font-size: 1.6rem;
			justify-content: center;
			align-items: center;
		}
		.ms {
			font-size: 25px;
			margin-top: 30px;
		}
		.font-size-20 {
    font-size: 15px;
}
	</style>
</head>

<body>
<button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-down"></i></button>
    <!-- cart -->
	<section class="cart">
		<div class="container">
			<?php
				if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
			?>
			<article class="row cart__head pc">
				<nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
                </nav>
				<div class="col-6 cart__head-name">
					Thông tin sản phẩm
				</div>

				<div class="col-3 cart__head-quantity">
					Số lượng
				</div>

				<div class="col-3 cart__head-price">
					Đơn giá
				</div>

				<div class="col-3 cart__head-total-price">
					Thành tiền
				</div>

			</article>
			<?php } 
			?>
			
			<?php
				$i = 0;
				$totalp = 0;
				if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
					foreach($_SESSION['cart'] as $item) {
						$price = ($item[3] - ($item[3] * $item[5] / 100 )) * $item[4];
						$discount_price = $item[3] - ($item[3] * $item[5] / 100 );
						$totalp += $price;
						?>
						<article class="row cart__body">
							<div class="col-6 cart__body-name">
								<div class="cart__body-name-img">
									<img src="image/<?php echo $item[1]?>">
								</div>
								<a href="product.php?pro_id=<?php echo $item[0] ?>" class="cart__body-name-title">
									<?php echo $item[2]?>
								</a>
							</div>
							<div style="font-size: 20px;" class="col-3 cart__body-quantity">
								<?php echo $item[4]?>
							</div>

							<div class="col-3 cart__body-price">
								<span>
									<?php require_once 'function.php'; echo formatCurrency($discount_price)?>đ
								</span>
							</div>

							<div class="col-3 cart__body-total-price">
								<span>
									<?php require_once 'function.php'; echo formatCurrency($price)?>đ
								</span>
			
								<a href="action/delitem.php?i=<?php echo $i?>">Xóa</a>
							</div>
						</article>
					<?php 
					$i++; }
				} else { ?>
					<center><p class="ms">Hiện tại không có sản phẩm trong giỏ hàng</p></center>
				<?php }
			?>
		
			<?php
				if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
			?>		
			<article class="row cart__foot">
				<!-- <div class="col-6 col-lg-6 col-sm-6 cart__foot-update">
					<button class="cart__foot-update-btn">Cập nhật giỏ hàng</button>
				</div> -->

				<p class="col-3 col-lg-3 col-sm-3 cart__foot-total">
					Tổng cộng: 
				</p>

				<span class="col-3 col-lg-3 col-sm-3 cart__foot-price">
				<?php require_once 'function.php'; echo formatCurrency($totalp)?>đ<br>

					<button class="cart__foot-price-btn">Mua hàng</button>
				</span>
			</article>
			
			<div class="show hidden">
    <div class="col-lg-6 col-md-6 col-sm-12 contact__regist">
        <p class="h3">Vui lòng nhập thông tin để mua hàng</p>
        <form action="action/buy.php" method="post">
            <div class="mb-3">
                <input type="text" required="" class="form-control form-control-lg" id="fullname" placeholder="Họ tên của bạn..." name="fullname">
            </div>

            <div class="mb-3">
                <input type="text" required="" class="form-control form-control-lg" id="address" placeholder="Địa chỉ của bạn..." name="address">
            </div>

            <div class="mb-3">
                <input type="text" class="form-control form-control-lg" id="phone" placeholder="Số điện thoại..." name="phone">
            </div>

			<div class="mb-3">
			<div class="mb-3">
    <select id="paymentMethod" class="form-select font-size-20" name="payment_method">
        <option value="cash_on_delivery"class="form-select font-size-20">Thanh toán khi nhận hàng</option>
        <option value="online_payment"class="form-select font-size-20">Thanh toán trực tuyến</option>
    </select>
</div>>
<button type="submit" class="btn btn-primary btn-lg" name="buy" onclick="handlePayment()">Mua hàng</button>

<div id="paymentCodeContainer"></div>
        </form>
    </div>
</div>


			
			<?php }
			?>
		</div>
	</section>
	
	<script>
    var qrCodeDisplayed = false;

    function handlePayment() {
        var paymentMethod = document.getElementById("paymentMethod").value;
        var fullname = document.getElementById("fullname").value;
        var address = document.getElementById("address").value;

        if (paymentMethod === "online_payment" && (!fullname || !address)) {
            
            alert("Vui lòng nhập đủ thông tin để hiển thị mã QR.");
            return; 
        }

        
        if (!qrCodeDisplayed && paymentMethod === "online_payment") {
            
            var paymentCode = "<h4>Mã code thanh toán trực tuyến:</h4>";
            paymentCode += "<img src='https://api.qrserver.com/v1/create-qr-code/?data=YOUR_PAYMENT_CODE_HERE&size=200x200'>";

            document.getElementById("paymentCodeContainer").innerHTML = paymentCode;

            qrCodeDisplayed = true; 
        }
    }
	</script>

	<script>
            const $ = document.querySelector.bind(document)
            const z = $('.cart__foot-price-btn')
            z.onclick = function() {
                $('.show.hidden').classList.remove('hidden')
                $('.cart__foot-price-btn').classList.add('hidden')
            }
    </script>

</body>