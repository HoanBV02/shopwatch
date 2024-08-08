<head>
    <link rel="stylesheet" href="css/contact.css">
</head>
<?php
session_start();
include 'header.php';
?>
<body>
    
    <button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-down"></i></button>
        <!-- contact -->
        <section class="contact">
            <div class="container">
                <div class="row mt-4 mb-50 pc">
                    <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">
                        
                    </nav>
                </div>
    
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-12 contact__self">
                        <h3 class="mb-4">
                            Liên hệ với chúng tôi
                        </h3>
                        <p>
                            Để không ngừng nâng cao chất lượng dịch vụ và đáp ứng tốt hơn nữa các yêu cầu sử dụng sách của Quý khách, chúng tôi mong muốn nhận được các thông tin phản hồi. Nếu Quý khách có bất kỳ thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông tin dưới đây. Chúng tôi sẽ phản hồi lại Quý khách trong thời gian sớm nhất.
                        </p>
                        <h3 class="mt-4 mb-4">
                            Thông tin liên hệ
                        </h3>
                        
                        <ul class="contact__self-list">
                            <li class="contact__self-item">
                                <a class="contact__self-link" href="#">shopwatch.com</a>
                            </li>
                            <li class="contact__self-item">
                                <a class="contact__self-link" href="#">SĐT: 0933.978.142</a>
                            </li>
                            <li class="contact__self-item">
                                <a class="contact__self-link" href="#">Email: GR5gmail.com</a>
                            </li>
                            <li class="contact__self-item">
                                <a class="contact__self-link" href="#">Địa chỉ: Giải Phóng, Hai Bà Trưng, Hà Nội</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 contact__regist">
                        <h3 class="mb-4">
                            Đăng ký tư vấn miễn phí
                        </h3>
    
                        <p>Quý khách vui lòng để lại thông tin để nhân viên tư vấn liên hệ cho bạn sớm nhất!</p>
                        <p>
                            <?php 
                                if(isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                }
                            ?>
                        </p>
    
                        <form action="action/sendFeedback.php" method="post">
                            <input type="text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên của bạn..." name="name">
    
                            <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email của bạn..." name="email">
    
                            <input type="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại..." name="tel">
                            
                            <textarea name="content" id="" cols="200" rows="15" placeholder="Nội dung cần tư vấn..."></textarea> 
                          <button type="submit" name="send">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

</body>

<?php
    include "footer.php";
    unset($_SESSION['message']);
?>