<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class About extends BaseView
{
    public static function render($data = null)
    {

?>
 <!-- Favicon -->
 <link rel="icon" href="/favicon.png" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="/public/assets/client/css/style.css" rel="stylesheet">
<link href="/public/assets/client/css/style.min.css" rel="stylesheet">
<body>
    <div class="container-xxl bg-white p-0">


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="/public/assets/client/images/ig1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="/public/assets/client/images/ig2.jpg" style="margin-top: 40%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="/public/assets/client/images/ig5.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="/public/assets/client/images/ig3.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="text-primary" style="font-weight: bold;">Giới thiệu về chúng tôi</h5>
                        <h1 class="mb-4 text-primary" style="font-weight: bold;">LVK House </i>xin chào bạn!</h1>
                        <p class="mb-4">LVK Houe là một thương hiệu tiện ích gia đình chuyên cung cấp các sản phẩm thiết kế đẹp mắt, hiện đại và tiện dụng, phù hợp với nhu cầu sử dụng hàng ngày của mọi gia đình. Sản phẩm của LVK Houe tập trung vào chất lượng, tính bền bỉ và an toàn, từ đồ gia dụng đến các thiết bị nhỏ trong nhà, nhằm tối ưu hoá không gian sống và giúp cuộc sống gia đình trở nên thoải mái, tiện nghi hơn. </p>
                        <p class="mb-4">Các sản phẩm của LVK Houe cũng nổi bật với phong cách tối giản, dễ dàng hoà hợp vào mọi không gian sống, mang lại sự tinh tế và hài hòa cho ngôi nhà.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1  class="flex-shrink-0 display-5 text-primary mb-0" style="font-weight: bold;"  data-toggle="counter-up">5</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">năm</p>
                                        <h6 class="text-uppercase mb-0">Kinh nghiệm</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" style="font-weight: bold;"  data-toggle="counter-up">17</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Chi nhánh</p>
                                        <h6 class="text-uppercase mb-0">Bắc Trung Nam</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4 text-primary" style="font-weight: bold;"></i>ĐỘI NGŨ QUẢN LÍ</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="/public//uploads//users/igkhang.png" alt="">
                            </div>
                            <h5 class="mb-0">Lê Hoàng Khang</h5>
                            <small>Bảo trì website</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.facebook.com/profile.php?id=100067365274482"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="/public//uploads//users/igvy.png" alt="">
                            </div>
                            <h5 class="mb-0">Ngô Chí Vỹ</h5>
                            <small>Quản trị viên</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.facebook.com/ZyNgo19"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle  overflow-hidden m-4">
                                <img class="img-fluid" src="/public//uploads//users/iglinh.png" alt="">
                            </div>
                            <h5 class="mb-0">Trần Nhựt Linh</h5>
                            <small>Thiết kế website</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.facebook.com/profile.php?id=61559591994101"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        

        

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

     <!-- JavaScript Libraries -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>
            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>
            <!-- Contact Javascript File -->
            <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
            <script src="/public/assets/client/mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main.js"></script>
</body>

</html>
                   
        



<?php

    }
}
