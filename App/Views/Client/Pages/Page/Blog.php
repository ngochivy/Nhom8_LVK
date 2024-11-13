<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Blog extends BaseView
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


        <!-- BLOGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG -->

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



        <!-- Template Stylesheet -->
        <link href="/public/css/style1.css" rel="stylesheet">


        <body>
            <!-- Blog Start -->
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h1 class="display-5 fw-bold h2">TẤT CẢ BÀI VIẾT</h1>
                        <hr class="w-25 mx-auto text-primary" style="opacity: 1;">
                    </div>
                    <div class="row g-3">
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-item bg-primary">
                                <img class="img-fluid w-100" src="https://www.zecible.fr/wp-content/uploads/2018/02/644455-POO5SL-571-scaled.jpg" style="height: 200px; object-fit: cover;" alt="Blog 3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-secondary mt-n4 d-flex flex-column flex-shrink-0 justify-content-center text-center me-4" style="width: 60px; height: 100px;">
                                        <i class="fa fa-calendar-alt text-primary mb-2"></i>
                                        <p class="m-0 text-black">Jan 01</p>
                                        <small class="text-black">2045</small>
                                    </div>
                                    <a class="h6 m-0 text-truncate me-4 fw-bold " href="">Mẹo Chọn Thiết Bị Nấu Ăn Tiết Kiệm Thời Gian</a>
                                </div>
                                <div class="d-flex justify-content-between border-top border-secondary p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-2" src="/public//uploads//users//igkhang.png" width="30" height="30" alt="">
                                        <small class="text-uppercase">Lee Khang</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ms-3"><i class="fa fa-eye text-secondary me-2"></i>12345</small>
                                        <small class="ms-3"><i class="fa fa-comment text-secondary me-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-item bg-primary">
                                <img class="img-fluid w-100" src="https://th.bing.com/th/id/R.5e64dc17c45ce6dd64a8d42ab876d5a4?rik=Q0Wh4dKR%2bAaLGg&riu=http%3a%2f%2fbookdirtbusters.com%2fwp-content%2fuploads%2f2019%2f09%2fclean-home.jpeg&ehk=RzfBQ1NQwMrSgcNfxbCMfOP%2bvLV%2bO9h4LfxZ4da%2fAik%3d&risl=&pid=ImgRaw&r=0" style="height: 200px; object-fit: cover;" alt="Blog 3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-secondary mt-n4 d-flex flex-column flex-shrink-0 justify-content-center text-center me-4" style="width: 60px; height: 100px;">
                                        <i class="fa fa-calendar-alt text-primary mb-2"></i>
                                        <p class="m-0 text-black">Jan 01</p>
                                        <small class="text-black">2045</small>
                                    </div>
                                    <a class="h6 m-0 text-truncate me-4 fw-bold " href="">Mẹo Dọn Dẹp Tiện Lợi Cho Nhà Bận Rộn</a>
                                </div>
                                <div class="d-flex justify-content-between border-top border-secondary p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-2" src="/public//uploads//users//igkhang.png" width="30" height="30" alt="">
                                        <small class="text-uppercase">Lee Khang</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ms-3"><i class="fa fa-eye text-secondary me-2"></i>12345</small>
                                        <small class="ms-3"><i class="fa fa-comment text-secondary me-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-item bg-primary">
                                <img class="img-fluid w-100" src="https://www.cnet.com/a/img/resize/e2cd457709207d1abf51648466b077b61f8b11d2/hub/2024/06/04/8a97de33-f6d8-46b8-8821-c52cc5897929/best-home-security-system.jpg?auto=webp&width=1200" style="height: 200px; object-fit: cover;" alt="Blog 3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-secondary mt-n4 d-flex flex-column flex-shrink-0 justify-content-center text-center me-4" style="width: 60px; height: 100px;">
                                        <i class="fa fa-calendar-alt text-primary mb-2"></i>
                                        <p class="m-0 text-black">Jan 01</p>
                                        <small class="text-black">2045</small>
                                    </div>
                                    <a class="h6 m-0 text-truncate me-4 fw-bold " href="">Kiến Thức Về Công Nghệ Thông Minh Trong Nhà</a>
                                </div>
                                <div class="d-flex justify-content-between border-top border-secondary p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-2" src="/public//uploads//users//igkhang.png" width="30" height="30" alt="">
                                        <small class="text-uppercase">Lee Khang</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ms-3"><i class="fa fa-eye text-secondary me-2"></i>12345</small>
                                        <small class="ms-3"><i class="fa fa-comment text-secondary me-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="blog-item bg-primary">
                                <img class="img-fluid w-100" src="https://th.bing.com/th/id/R.2926339bcbd95498310983e22be67c38?rik=0poh7t3ysTCxOQ&pid=ImgRaw&r=0" style="height: 200px; object-fit: cover;" alt="Blog 3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-secondary mt-n4 d-flex flex-column flex-shrink-0 justify-content-center text-center me-4" style="width: 60px; height: 100px;">
                                        <i class="fa fa-calendar-alt text-primary mb-2"></i>
                                        <p class="m-0 text-black">Jan 01</p>
                                        <small class="text-black">2045</small>
                                    </div>
                                    <a class="h6 m-0 text-truncate me-4 fw-bold " href="">Mẹo Tận Dụng Không Gian Phòng Tắm</a>
                                </div>
                                <div class="d-flex justify-content-between border-top border-secondary p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-2" src="/public//uploads//users//igkhang.png" width="30" height="30" alt="">
                                        <small class="text-uppercase">Lee Khang</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ms-3"><i class="fa fa-eye text-secondary me-2"></i>12345</small>
                                        <small class="ms-3"><i class="fa fa-comment text-secondary me-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                      
                    </div>
                </div>
            </div>
            <!-- Blog End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
            <script src="/public/assets/client/mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main.js"></script>
        </body>

<?php

    }
}
