<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <!--  code  HTML hien thi giao dien -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
            <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link href="/public/assets/client/css/style.css" rel="stylesheet">
            <title>Document</title>
       
            

        </head>

        <body>


            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <?php
                        if ($data && $data['Image']) :
                        ?>


                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-3 mt-5" width="300px" src="<?= APP_URL ?>/public/uploads/users/<?= $data['Image'] ?>">
                                <span class="font-weight-bold">Avatar</span><span class="text-black-50"></span>
                                <span> </span>
                            </div>
                        <?php
                        else :
                        ?>
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="400px" src="<?= APP_URL ?>/public/uploads/users/user.png">
                                <span class="font-weight-bold">Avatar</span><span class="text-black-50"></span>
                                <span> </span>
                            </div>


                        <?php
                        endif;
                        ?>

                    </div>
                    <div class="col-md-7 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right text-info">Tài khoản người dùng</h4>
                            </div>
                            <form action="/users/<?= $data['User_ID'] ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="method" value="PUT" id="">
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels" for="username">Tên đăng nhập</label><input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= $data['Username'] ?>" disabled></div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mt-4"><label class="labels" for="email">Email</label><input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $data['Email'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="name">Họ và tên</label><input type="text" id="name" name="name" class="form-control" placeholder="Họ và tên" value="<?= $data['Name'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="address">Địa chỉ</label><input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ" value="<?= $data['Address'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="phone">Số điện thoại</label><input type="text" id="phone" name="phone" class="form-control" placeholder="Số điện thoại" value="<?= $data['Phone_number'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="avatar">Ảnh đại diện</label><input type="file" id="avatar" name="image" class="form-control" placeholder="Chọn ảnh đại diện" value=""></div>

                                </div>

                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập nhật</button></div>
                        </div>

                        <div>
                            
                            <a href="/change-password" class="text-dark font-weight-bold" style="font-family:roboto;">Đổi mật khẩu</a>
                        </div>


                    </div>

                    </form>
                </div>
            </div>
            </div>
            </div>
        </body>

        </html>
<?php
    }
}
