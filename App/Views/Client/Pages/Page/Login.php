<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
            <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link href="/public/assets/client/css/style.css" rel="stylesheet">
            <title>Login #2</title>
        </head>

        <body>
            <div class="container mt-4">
                <div class="row d-flex align-items-center">
                    <!-- Ảnh chiếm 50% -->
                    <div class="col-md-6 order-md-2 p-0">
                        <img class="img-fluid w-100 rounded-2" src="/public/assets/client/images/bg_1.jpg" alt="Background Image">
                    </div>
                    <!-- Form chiếm 50% -->
                    <div class="col-md-6 order-md-1">
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-10">
                                    <h3>Đăng nhập vào <strong class="text-primary">LVK House</strong></h3>
                                    <p class="mb-4">Chào mừng bạn! Đăng nhập để trải nghiệm các dịch vụ và tiện ích tuyệt vời từ chúng tôi.</p>
                                    <form action="#" method="post">
                                        <div class="form-group first">
                                            <label for="username">Email</label>
                                            <input type="text" class="form-control" placeholder="Nhập email" id="username">
                                        </div>
                                        <div class="form-group last mb-3">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="password">
                                        </div>
                                        <div class="d-flex mb-5 align-items-center">
                                            <label class="control control--checkbox mb-0"><span class="caption">Lưu mật khẩu</span>
                                                <input type="checkbox" checked="checked" />
                                                <div class="control__indicator"></div>
                                            </label>
                                            <span class="ms-auto"><a href="#" class="forgot-pass">Quên mật khẩu?</a></span>
                                        </div>
                                        <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary rounded-1">
                                    </form>

                                    <p class="mt-3">Chưa có tài khoản? <a href="/register">Đăng ký ngay</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script src="/public/assets/client/js/main.js"></script>
            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>
        </body>

        </html>

<?php
    }
}
