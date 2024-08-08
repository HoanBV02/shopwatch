<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <style>
        .footer__top {
            background: #efefef;
            padding: 1.6rem 0;
        }

        .footer__top-intro {}

        .footer__top-intro-heading,
        .footer__top-policy-heading,
        .footer__top-contact-heading {
            font-size: 1.7rem;
            color: var(--text-color);
            padding: 1.2rem 0;
        }

        .footer__top-intro-content {
            font-size: 1.5rem;
        }

        .footer__top-policy-list {
            list-style: none;
            margin-bottom: 1rem;
        }

        .footer__top-policy-item {}

        .footer__top-policy-link {
            font-size: 1.5rem;
            color: var(--text-color);
        }

        .footer__top-policy-link:hover {
            color: var(--text-color);
            opacity: 0.8;
            text-decoration: none;
        }

        .footer__top-contact-wrap {}

        .footer__top-contact-heading {}

        .footer__top-contact {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }


        .footer__top-contact-icon {
            margin-right: 2.6rem;
        }

        .footer__top-contact-img {}

        .footer__top-contact-phone-wrap {}

        .footer__top-contact-phone {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--black-color);
            margin-bottom: 1rem;
        }

        .footer__top-contact-des {
            font-size: 1.3rem;
            color: var(--text-color);
        }

        .footer__top-contact-social-link {
            margin-right: 1rem;
        }

        .footer__bottom {
            height: 3.4rem;
            background: #666;
            text-align: center;
        }

        .footer__bottom-content {
            font-size: 1.4rem;
            color: var(--white-color);
            margin: 0 auto;
            line-height: 3.4rem;
        }
    </style>
</head>

<body>

    <footer>
        <section class="footer__top">
            <div class="container">
                <div class="row">
                    <article class="footer__top-intro col-lg-5 col-md-4 col-sm-6">
                        <h4 class="footer__top-intro-heading">
                            Về chúng tôi
                        </h4>
                        <div class="footer__top-intro-content">
                            ShopWatch là cửa hàng luôn cung cấp cho các bạn những mẫu 
                            đồng hồ mới nhất, chất lượng nhất. 
                            <br> <br>
                            Địa chỉ: Giải Phóng, Hai Bà Trưng, Hà Nội
                            <br> <br>
                            Điện thoại: 012355555 <br>
                            Email: watchshop@gmail.com <br>
                            Zalo: 012366666 <br>
                        </div>
                    </article>

                    <article class="footer__top-policy col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer__top-policy-heading">
                            Chính sách mua hàng
                        </h4>

                        <ul class="footer__top-policy-list">
                            <li class="footer__top-policy-item">
                                <a href="#" class="footer__top-policy-link">Hình thức đặt hàng</a>
                            </li>
                            <li class="footer__top-policy-item">
                                <a href="#" class="footer__top-policy-link">Phương thức vận chuyển</a>
                            </li>
                            <li class="footer__top-policy-item">
                                <a href="#" class="footer__top-policy-link">Chính sách đổi trả</a>
                            </li>
                            <li class="footer__top-policy-item">
                                <a href="#" class="footer__top-policy-link">Hướng dẫn sử dụng</a>
                            </li>
                        </ul>
                    </article>

                    <article class="footer__top-contact-wrap col-lg-4 col-md-4 col-sm-6">
                        <h4 class="footer__top-contact-heading">
                            Hotline liên hệ
                        </h4>

                        <div class="footer__top-contact">
                            <div class="footer__top-contact-icon">
                                <img src="images/phone_top.png" class="footer__top-contact-img">
                            </div>

                            <div class="footer__top-contact-phone-wrap">
                                <div class="footer__top-contact-phone">
                                    012366666
                                </div>
                                <div class="footer__top-contact-des">
                                    (Giải đáp thắc mắc 24/24)
                                </div>
                            </div>
                        </div>

                        <h4 class="footer__top-contact-heading">
                            Kết nối với chúng tôi
                        </h4>

                        <div class="footer__top-contact-social">
                            <a href="#" class="footer__top-contact-social-link">
                                <img src="images/facebook.png">
                            </a>
                            <a href="#" class="footer__top-contact-social-link">
                                <img src="images/youtube.png">
                            </a>
                            <a href="#" class="footer__top-contact-social-link">
                                <img src="images/tiktok.png">
                            </a>
                            <a href="#" class="footer__top-contact-social-link">
                                <img src="images/zalo.png">
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="footer__bottom">
            <div class="container">
                <div class="row">
                    <span class="footer__bottom-content">@Bản quyền thuộc về WatchShop | Thiết kế bởi WatchShop </span>
                </div>
            </div>
        </section>
    </footer>

</body>