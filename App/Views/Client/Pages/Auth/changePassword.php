<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
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
            <title>Change Password</title>
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
                                    <h3>Thay đổi mật khẩu </h3>

                                    <form action="/change-password" method="post">
                                        <input type="hidden" name="method" id="" value="PUT">
                                        <div class="form-group first">
                                            <label for="username">Tên đăng nhập</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= $data['username'] ?>" disabled>
                                        </div>
                                        <div class="form-group last mb-3">
                                            <label  for="old_password">Mật khẩu cũ</label>
                                            <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Mật khẩu cũ">
                                        </div>
                                        <div class="form-group last mb-3">
                                            <label for="new_password">Mật khẩu mới</label>
                                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Mật khẩu mới">
                                        </div>
                                        <div class="form-group last mb-3">
                                            <label for="re_password">Nhập lại mật khẩu mới</label>
                                            <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                        <input type="submit" value="Cập nhật" class="btn btn-block btn-primary rounded-1">
                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>

            <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script src="/public/assets/client/js/main.js"></script>


        </body>

        </html>

<?php
    }
}
