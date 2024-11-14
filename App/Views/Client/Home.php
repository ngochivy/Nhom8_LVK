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
                        <img class="img-fluid" src="https://th.bing.com/th/id/R.80d43d9d14389650193470a88258142d?rik=qFFEiaOOrLRs1Q&riu=http%3a%2f%2fwww.goldsun.vn%2fpic%2fProductCate%2fthiet-bi-_637160882463804420.jpg&ehk=f0otbp0S8nIVoVhXLQW6GIMOPlgzIVy9xkvQYtCv8ks%3d&risl=&pid=ImgRaw&r=0" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 10% cho đơn hàng đầu tiên</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4" style="font-family:montserrat;">Đồ dùng nhà bếp</h3>
                                <a href="" class="btn btn-light py-2 px-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="https://media3.bosch-home.com/Product_Shots/1200x675/22226362_MGM8856BIN_TrueMixxPro_Indien_Grinder_Flagship_visual_F39_def.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">LVK House</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4" style="font-family:montserrat;">Nâng tầm cuộc sống! Chất lượng, giá tốt</h3>
                                <a href="/products" class="btn btn-light py-2 px-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
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


            <!-- Offer Start -->
            <div class="container-fluid offer pt-5">
                <div class="row px-xl-5">
                    <div class="col-md-6 pb-4">
                        <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                            <img src="/public/assets/client/img/offer-1.png" alt="">
                            <div class="position-relative" style="z-index: 1;">
                                <h5 class="text-uppercase text-primary mb-3">Giảm giá khi mua</h5>
                                <h1 class="mb-4 font-weight-semi-bold" style="font-weight:roboto;">Đồ dùng nhà bếp</h1>
                                <a href="/products?category=1" class="btn btn-outline-primary py-md-2 px-md-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                            <img src="/public/assets/client/img/offer-2.png" alt="">
                            <div class="position-relative" style="z-index: 1;">
                                <h5 class="text-uppercase text-primary mb-3">Nâng tần cuộc sống với</h5>
                                <h1 class="mb-4 font-weight-semi-bold" style="font-family:roboto;">Đồ gia đình thông minh</h1>
                                <a href="/products?category=3" class="btn btn-outline-primary py-md-2 px-md-3 rounded-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Offer End -->


            <!-- Products Start -->
            <div class="container-fluid pt-5">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2" style="font-family:roboto;">Sản phẩm nổi bật</span></h2>
                </div>
                <div class="row px-xl-5 pb-3">
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/1 ?>'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="/public/uploads/products/product-1.webp" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3" style="font-family:roboto;">Bàn chải điện Xiaomi</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>280,000 đ</h6>
                                    <h6 class="text-muted ml-2"><del>300,000 đ</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/2 ?>'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="/public/uploads/products/product-2.webp" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3" style="font-family:roboto;">Bếp lẩu nướng đa năng</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>950,000 đ</h6>
                                    <h6 class="text-muted ml-2"><del>1,000,000 đ</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/3 ?>'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="/public/uploads/products/product-3.webp" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3" style="font-family:roboto;">Bộ kiềm vệ sinh móng tay</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>120,000 đ</h6>
                                    <h6 class="text-muted ml-2"><del>150,000 đ</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/5 ?>'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="/public/uploads/products/product-4.webp" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3" style="font-family:roboto;">Chuông cửa thông minh Xiaomi</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>1,100,000 đ</h6>
                                    <h6 class="text-muted ml-2"><del>1,200,000 đ</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

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
                <div class="text-center">
                    <h2 class="section-title px-5 mb-3"><span class="px-2" style="font-family:roboto;">Bài viết</span></h2>
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









            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
            <script src="/public/assets/client/mail/contact.js"></script>

            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main.js"></script>
        </body>

        </html>

<?php


    }
}
