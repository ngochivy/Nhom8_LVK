<?php


namespace App\Views\Client;


use App\Views\BaseView;




class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <title>LVK House</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="Free HTML Templates" name="keywords">
            <meta content="Free HTML Templates" name="description">

            <!-- Favicon -->
            <link rel="icon" href="/favicon.png" />

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

            <!-- Customized Bootstrap Stylesheet -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link href="/public/assets/client/css/style.css" rel="stylesheet">
            <link href="/public/assets/client/css/style.min.css" rel="stylesheet">
        </head>

        <body>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="https://media3.bosch-home.com/Product_Shots/1200x675/22226362_MGM8856BIN_TrueMixxPro_Indien_Grinder_Flagship_visual_F39_def.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">LVK House</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4" style="font-family:montserrat;">Nâng tầm cuộc sống! Chất lượng, giá tốt</h3>
                                <a href="/products" class="btn btn-light py-2 px-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="carousel-item" style="height: 410px; justify-content:center !important;">
                        <img class="img-fluid" src="https://th.bing.com/th/id/R.80d43d9d14389650193470a88258142d?rik=qFFEiaOOrLRs1Q&riu=http%3a%2f%2fwww.goldsun.vn%2fpic%2fProductCate%2fthiet-bi-_637160882463804420.jpg&ehk=f0otbp0S8nIVoVhXLQW6GIMOPlgzIVy9xkvQYtCv8ks%3d&risl=&pid=ImgRaw&r=0" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">LVK House</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4" style="font-family:montserrat;">Nâng tầm cuộc sống! Chất lượng, giá tốt</h3>
                                <a href="/products" class="btn btn-light py-2 px-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>



            <!-- Featured Start -->
            <div class="container-fluid pt-5">
                <div class="row px-xl-5 pb-3" style="font-family: montserrat;">
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                            <h5 class="font-weight-semi-bold m-0">Giao hàng miễn phí</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">Miễn phí đổi trả</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                            <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured End -->


            <div class="flash-sale-section container-fluid px-0">
                <div class="flash-sale-container container">
                    <div class="flash-sale-header d-flex align-items-center">
                        <h2 class="text-danger">
                            <span class="flash-icon"><i class="fas fa-bolt"></i></span> FLASH SALE
                        </h2>
                        <div class="flash-timer py-0 pb-1 mb-1 ml-3 ">
                            <span class="time-box bg-dark text-white font-weight-bold p-1" id="hours">00</span>
                            <span class="time-box bg-dark text-white font-weight-bold p-1" id="minutes">00</span>
                            <span class="time-box bg-dark text-white font-weight-bold p-1" id="seconds">00</span>
                        </div>
                        <a href="/products" class="view-all-link py-0 pb-1 mb-1 ms-auto">Xem tất cả &gt;</a>
                    </div>

                    <div id="flashSaleCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            // Chia sản phẩm thành các nhóm 4 sản phẩm
                            $chunks = array_chunk($data['featuredProducts'], 4);
                            foreach ($chunks as $index => $chunk) :
                            ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <div class="row justify-content-start py-2" style="gap: 0px;">
                                        <?php foreach ($chunk as $product) : ?>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex mb-2" style="padding: 0 10px;" onclick="window.location.href='/products/<?= $product['id'] ?>'">
                                                <div class="product-card product-item p-2 d-flex flex-column" style="height: 100%; width: 100%;">

                                                    <!-- Discount Tag -->
                                                    <div class="discount-tag float-lg-right text-danger font-weight-bolder" style="text-align: right;">
                                                        -<?= round(($product['discount_price'] / $product['price']) * 100, 1) ?>%
                                                    </div>

                                                    <!-- Product Image -->
                                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border-0 p-0 mb-2" style="height: 200px;">
                                                        <img src="/public/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid w-100" style="object-fit: cover; height: 100%; border-radius: 8px;">
                                                    </div>

                                                    <!-- Product Info -->
                                                    <div class="product-info flex-grow-1 d-flex flex-column justify-content-between" style="min-height: 150px;">
                                                        <p class="product-name mb-1" style="font-size: 14px; font-weight: bold; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 3rem;">
                                                            <?= $product['name'] ?>
                                                        </p>
                                                        <div class="product-price mb-1 d-flex justify-content-center" style="font-size: 18px; font-weight: bold; color: #d9534f;">
                                                            <p class="text-muted px-2 font-weight-light"><del><?= number_format($product['price'], 0, ',', '.') ?>₫</del></p>
                                                            <?= number_format($product['price'] - $product['discount_price'], 0, ',', '.') ?>₫
                                                        </div>
                                                        <div class="sold-info" style="font-size: 14px; color: #5bc0de;">
                                                            Đã bán <?= rand(1, 200) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>




            <script src="https://uhchat.net/code.php?f=e06ad1"></script>
            <script>
                // Countdown Timer Script
                function startCountdown(durationInSeconds) {
                    let countdownTime = durationInSeconds;

                    const hoursElement = document.getElementById('hours');
                    const minutesElement = document.getElementById('minutes');
                    const secondsElement = document.getElementById('seconds');

                    function updateTimer() {
                        const hours = Math.floor(countdownTime / 3600);
                        const minutes = Math.floor((countdownTime % 3600) / 60);
                        const seconds = countdownTime % 60;

                        hoursElement.textContent = String(hours).padStart(2, '0');
                        minutesElement.textContent = String(minutes).padStart(2, '0');
                        secondsElement.textContent = String(seconds).padStart(2, '0');

                        if (countdownTime <= 0) {
                            clearInterval(countdownInterval);
                            // Action when countdown ends, e.g., show message or end sale
                            alert('Flash Sale has ended!');
                        } else {
                            countdownTime--;
                        }
                    }

                    updateTimer();
                    const countdownInterval = setInterval(updateTimer, 1000);
                }

                // Set the duration for the countdown (e.g., 1 hour = 3600 seconds)
                const countdownDurationInSeconds = 60 * 60; // 1 hour countdown
                startCountdown(countdownDurationInSeconds);
            </script>

            <!-- banner -->
            <div class="container-fluid my-3">
                <div class="row justify-content-center">
                    <div class="col-md-3 py-3 d-flex align-items-stretch">
                        <img class="img-fluid rounded-3 shadow w-100" src="/public/assets/client/img/sung-phun-khu-khuan.png" alt="Súng phun khuẩn">
                    </div>
                    <div class="col-md-5 py-3 d-flex align-items-stretch">
                        <img class="img-fluid rounded-3 shadow w-100" src="/public/assets/client/img/may-khu-trung-bang-song-sieu-am-1.png" alt="Máy khử trùng bằng sóng siêu âm">
                    </div>
                    <div class="col-md-3 py-3 d-flex align-items-stretch">
                        <img class="img-fluid rounded-3 shadow w-100" src="/public/assets/client/img/may-suoi-gom-1.png" alt="Máy sưởi gốm">
                    </div>
                </div>
            </div>



            <!-- Products Start -->
            <div class="container-fluid pt-5">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2" style="font-family:roboto;">Sản phẩm mới nhất</span></h2>
                </div>
                <div class="row px-xl-5 pb-3">
                    <?php foreach ($data['newestProducts'] as $product): ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/<?= $product['id'] ?>'">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
<<<<<<< HEAD
                                    <img class="img-fluid w-100" src="/public/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" style="height:200px; width:100px; object-fit:cover ;">
=======
                                    <img class="img-fluid w-100" src="/public/uploads/products/<?= $product['Image'] ?>" alt="<?= $product['Product_name'] ?>" style="height:200px; width:100px; object-fit:cover ;">
>>>>>>> 3b23fd1e1a3907859dcee351efa83fa411ff4bce
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?= $product['name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6><?= number_format($product['price'] - $product['discount_price'], 0, ',', '.') ?> đ</h6>
                                        <h6 class="text-muted ml-2"><del><?= number_format($product['price'], 0, ',', '.') ?> đ</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="#" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <!-- Products End -->



            <!-- Subscribe Start -->
            <div class="container-fluid bg-secondary my-5">
                <div class="row justify-content-md-center py-5 px-xl-5">
                    <div class="col-md-6 col-12 py-5">
                        <div class="text-center mb-2 pb-2">
                            <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2" style="font-family:roboto;">Nhận thông báo giảm giá</span></h2>
                            <p>Nhận ngay những thông tin ưu đãi hấp dẫn. Hãy để chúng tôi giúp bạn cập nhật các chương trình khuyến mãi mới nhất.</p>
                        </div>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-4" placeholder="Nhập Email của bạn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- Subscribe End -->


            <div class="container-fluid my-5">

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Centering the section title -->
                    <div class="text-center mx-auto">
                        <h2 class="section-title px-5 mb-3">
                            <span class="px-2" style="font-family:roboto;">Bài viết</span>
                        </h2>
                    </div>
                    <!-- Aligning the 'Xem tất cả' link to the right -->
                    <a href="/blog" class="view-all-link" style="font-family:roboto; margin-right: 20px;">Xem tất cả &gt;</a>
                </div>


                <div class="row mx-4" style="font-family:roboto;">
                    <!-- Bài viết 1 -->
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="https://www.zecible.fr/wp-content/uploads/2018/02/644455-POO5SL-571-scaled.jpg"
                                class="card-img-top img-fluid w-100"
                                style="height: 200px; object-fit: cover;" alt="Blog 1">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Chọn Thiết Bị Nấu Ăn Tiết Kiệm Thời Gian</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Sử dụng nồi cơm điện đa năng và máy xay sinh tố thông minh không chỉ giúp bạn tiết kiệm thời gian mà còn làm cho bữa ăn trở nên dễ dàng và ngon miệng hơn.
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="https://th.bing.com/th/id/R.5e64dc17c45ce6dd64a8d42ab876d5a4?rik=Q0Wh4dKR%2bAaLGg&riu=http%3a%2f%2fbookdirtbusters.com%2fwp-content%2fuploads%2f2019%2f09%2fclean-home.jpeg&ehk=RzfBQ1NQwMrSgcNfxbCMfOP%2bvLV%2bO9h4LfxZ4da%2fAik%3d&risl=&pid=ImgRaw&r=0"
                                class="card-img-top img-fluid w-100"
                                style="height: 200px; object-fit: cover;" alt="Blog 2">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Dọn Dẹp Tiện Lợi Cho Nhà Bận Rộn</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Máy hút bụi thông minh và cây lau nhà tự động là những trợ thủ đắc lực giúp bạn duy trì ngôi nhà luôn sạch sẽ mà không tốn quá nhiều thời gian.
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="https://www.cnet.com/a/img/resize/e2cd457709207d1abf51648466b077b61f8b11d2/hub/2024/06/04/8a97de33-f6d8-46b8-8821-c52cc5897929/best-home-security-system.jpg?auto=webp&width=1200"
                                class="card-img-top img-fluid w-100"
                                style="height: 200px; object-fit: cover;" alt="Blog 3">
                            <div class="card-body">
                                <h5 class="card-title">Kiến Thức Về Công Nghệ Thông Minh Trong Nhà</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Những thiết bị công nghệ như loa thông minh và bóng đèn điều khiển từ xa giúp bạn dễ dàng điều khiển ngôi nhà, tiết kiệm năng lượng và nâng cao chất lượng sống.
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="https://th.bing.com/th/id/R.2926339bcbd95498310983e22be67c38?rik=0poh7t3ysTCxOQ&pid=ImgRaw&r=0"
                                class="card-img-top img-fluid w-100"
                                style="height: 200px; object-fit: cover;" alt="Blog 4">
                            <div class="card-body">
                                <h5 class="card-title">Mẹo Tận Dụng Không Gian Phòng Tắm</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Sử dụng vòi sen massage, gương chống hơi nước và các giá đựng đồ thông minh không chỉ giúp phòng tắm gọn gàng mà còn mang lại trải nghiệm thư giãn tuyệt vời.
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>




            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

            <!-- CounterUp -->
            <script src="https://cdn.jsdelivr.net/npm/jquery-counterup@1.0.0/jquery.counterup.min.js"></script>

            <!-- Bootstrap -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

            <!-- Thư viện khác -->
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- jqBootstrapValidation -->
            <script src="https://cdn.jsdelivr.net/npm/jqbootstrapvalidation@1.4.0/dist/jqBootstrapValidation.min.js"></script>

            <!-- Contact form handler -->
            <script src="/public/assets/client/mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main.js"></script>
        </body>

        </html>

<?php


    }
}
