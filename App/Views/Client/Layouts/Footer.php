<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">




        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="" class="text-decoration-none">
                        <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">LVK</span>house</h1>
                    </a>
                    <p><strong>LVK House</strong> – Cửa hàng tiện ích gia đình với sản phẩm chất lượng, tiện nghi, giá tốt, đồng hành nâng tầm cuộc sống gia đình Việt.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Thường Thạnh, Cần Thơ, Việt Nam</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>lvkhouse@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <h5 class=" text-dark mb-4" style="font-family: roboto; font-weight:900;">Trang</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                                <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Sản phẩm</a>
                                <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                                <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Đơn hàng</a>
                                <a class="text-dark mb-2" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Giới thiệu</a>
                                <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class=" text-dark mb-4" style="font-family: roboto; font-weight:900;">Dịch vụ</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Tư vấn mua hàng</a>
                                <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Chính sách bảo hành</a>
                                <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Tư vấn đổi trả</a>
                                <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Điều khoản</a>

                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class=" text-dark mb-4" style="font-family: roboto; font-weight:900;">Đăng ký nhận tin</h5>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 py-4 rounded-1" placeholder="Tên của bạn" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 py-4 rounded-1" placeholder="Email của bạn"
                                        required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block border-0 py-3 rounded-1" type="submit">Đăng ký ngay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">LVK House</a>.

                        <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com"> VietNam</a><br>
                        Bản quyền thuộc về <a href="https://themewagon.com" target="_blank">LVK House</a>
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">

                </div>
            </div>
        </div>
        <!-- Footer End -->

        <script src="//code.tidio.co/rnsskxxqiup0okczkpjjs7znonzqrzmf.js" async></script>
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="/public/assets/client/lib/easing/easing.min.js"></script>
        <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- CounterUp CDN -->
        <script src="https://cdn.jsdelivr.net/npm/jquery.counterup2@1.0.0/jquery.counterup.min.js"></script>


        <!-- Contact Javascript File -->
        <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
        <script src="/public/assets/client/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="/public/assets/client/js/main.js"></script>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).ready(function() {
                // Khởi tạo OwlCarousel
                $(".owl-carousel").owlCarousel();

                // Khởi tạo CounterUp
                $('.counter').counterUp();

                // Khởi tạo jqBootstrapValidation
                $('#contactForm').jqBootstrapValidation();
            });
        </script>




<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>