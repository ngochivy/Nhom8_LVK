<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;


class Header extends BaseView
{
    public static function render($data = null)
    {

        ob_start();
        // Kiểm tra đăng nhập và xử lý
        $is_login = AuthHelper::checkLogin();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

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
            <!-- Hiệu ứng ảnh -->
            <link href="/public/lib/animate/animate.min.css" rel="stylesheet">

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
            <link href="/public//css//bootstrap.min.css" rel="stylesheet">

            <!-- Customized Bootstrap Stylesheet -->

            <link href="/public/assets/client/css/style.css" rel="stylesheet">
            <link href="/public/assets/client/css/style.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <!-- Topbar Start -->
            <div class="container-fluid">
                <div class="row bg-secondary py-2 px-xl-5">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-dark" href="">FAQs</a>
                            <span class="text-muted px-2">|</span>
                            <a class="text-dark" href="">Hỗ trợ</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-dark pl-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center py-3 px-xl-5">
                    <div class="col-lg-3 d-none d-lg-block">
                        <a href="/" class="text-decoration-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">LVK</span>HOUSE</h1>
                        </a>
                    </div>
                    <div class="col-lg-6 col-6 text-left">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-6 text-right">
                        <a href="" class="btn border">
                            <i class="fas fa-heart text-primary"></i>

                        </a>
                        <a href="/cart" class="btn border">
                            <i class="fas fa-shopping-cart text-primary"></i>

                        </a>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->


            <!-- Navbar Start -->
            <div class="container-fluid ">
                <div class="row border-top px-xl-5">
                    <!-- <div class="col-lg-3 d-none d-lg-block">
                        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px; font-family:montserrat;">
                            <h6 class="m-0">Danh mục</h6>
                            <i class="fa fa-angle-down text-dark"></i>
                        </a>
                        <nav class="collapse navbar  navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                            <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                                <a href="" class="nav-item nav-link">Shirts</a>
                                <a href="" class="nav-item nav-link">Jeans</a>
                                <a href="" class="nav-item nav-link">Swimwear</a>
                                <a href="" class="nav-item nav-link">Sleepwear</a>
                                <a href="" class="nav-item nav-link">Sportswear</a>
                                <a href="" class="nav-item nav-link">Jumpsuits</a>
                                <a href="" class="nav-item nav-link">Blazers</a>
                                <a href="" class="nav-item nav-link">Jackets</a>
                                <a href="" class="nav-item nav-link">Shoes</a>
                            </div>
                        </nav>
                    </div> -->
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0" style="font-family:montserrat; font-weight:500;">
                            <a href="" class="text-decoration-none d-block d-lg-none">
                                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">LVK</span>House</h1>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="/" class="nav-item nav-link ">Trang chủ</a>
                                    <a href="/products" class="nav-item nav-link">Sản phẩm</a>
                                    <a href="/about" class="nav-item nav-link">Giới thiệu</a>
                                    <!-- <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                        <div class="dropdown-menu rounded-0 m-0">
                                            <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                            <a href="checkout.html" class="dropdown-item">Checkout</a>
                                        </div>
                                    </div> -->
                                    <a href="/contact" class="nav-item nav-link">Liên hệ</a>
                                    <a href="/blog" class="nav-item nav-link">Bài viết</a>
                                </div>
                                <!-- <div class="navbar-nav ml-auto py-0">
                                    <a href="/login" class="nav-item nav-link">Đăng nhập</a>
                                    <a href="/register" class="nav-item nav-link">Đăng ký</a>
                                    
                                </div> -->
                                <?php if ($is_login) : ?>
                                    <div class="dropdown mr-3" style="width:81px !important;">
                                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow border-0 text-decoration-none"
                                            href="#"
                                            id="navbarDropdownMenuAvatar"
                                            role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <img src="/public/assets/client/img/profile-user.png" alt="user" style="width:25px;"><span class="text-muted pl-2"><?= $_SESSION['user']['username'] ?></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start"
                                            style=""
                                            aria-labelledby="navbarDropdownMenuAvatar">
                                            <li>
                                                <a class="dropdown-item" href="/users/<?= $_SESSION['user']['id'] ?>">Tài khoản</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/logout">Đăng xuất</a>
                                            </li>
                                        </ul>
                                    </div>



                                <?php else : ?>
                                    <div class="navbar-nav ml-auto py-0">
                                        <a class="nav-item nav-link" href="/login">Đăng nhập</a>
                                        <a class="nav-item nav-link" href="/register">Đăng ký</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
            <!-- Navbar End -->
        </body>

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

<?php
    }
}

ob_end_flush();
