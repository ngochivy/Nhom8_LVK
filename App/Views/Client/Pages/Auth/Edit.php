<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="/public/assets/client/css/style.css" rel="stylesheet">
        <!------ Include the above in your HEAD tag ---------->
        <style>
            .emp-profile {
                padding: 3%;
                margin-top: 0%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }

            .profile-img {
                text-align: center;
            }

            .profile-img img {
                width: 70%;
                height: 100%;
            }

            .profile-img .file {
                position: relative;
                overflow: hidden;
                margin-top: -20%;
                width: 70%;
                border: none;
                border-radius: 0;
                font-size: 15px;
                background: #212529b8;
            }

            .profile-img .file input {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }

            .profile-head h5 {
                color: #333;
            }

            .profile-head h6 {
                color: #0062cc;
            }

            .profile-edit-btn {
                border: none;
                border-radius: 1.5rem;
                width: 70%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }

            .proile-rating {
                font-size: 12px;
                color: #818182;
                margin-top: 5%;
            }

            .proile-rating span {
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }

            .profile-head .nav-tabs {
                margin-bottom: 5%;
            }

            .profile-head .nav-tabs .nav-link {
                font-weight: 600;
                border: none;
            }

            .profile-head .nav-tabs .nav-link.active {
                border: none;
                border-bottom: 2px solid #0062cc;

            }

            .profile-work {
                padding: 14%;
                margin-top: -15%;
            }

            .profile-work p {
                font-size: 12px;
                color: #818182;
                font-weight: 600;
                margin-top: 10%;
            }

            .profile-work a {
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }

            .profile-work ul {
                list-style: none;
            }

            .profile-tab label {
                font-weight: 600;
            }

            .profile-tab p {
                font-weight: 600;
                color: #0062cc;
            }
        </style>
        <div class="container emp-profile">
            <div class="row">
                <?php
                if ($data && $data['image']) :
                ?>
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['image'] ?>" alt="" style="border-radius:10px; width:250px; height:200px; object-fit: cover;" />
                        </div>
                    </div>
                <?php
                else :
                ?>
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?= APP_URL ?>/public/uploads/users/user.png" alt="" style="width:200px; height:200px; object-fit: cover;" />
                        </div>
                    </div>
                <?php
                endif;
                ?>
                <div class="col-md-6" style="height:150px;">
                    <div class="profile-head">
                        <h1>Quản Lý Tài Khoản</h1>
                        <h5>
                            <?= $data['name'] ?>
                        </h5>
                        <h6>
                            <?= $data['email'] ?>
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:50px;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>TRANG</p>
                        <a href="/products">Sản phẩm</a><br />
                        <a href="/cart">Giỏ hàng</a><br />
                        <a href="/logout">Đăng xuất</a>
                        <p>DỊCH VỤ</p>
                        <a href="">Ví điện tử</a><br />
                        <a href="">Địa chỉ giao hàng</a><br />
                        <a href="/change-password">Đổi mật khẩu</a><br />
                        <a href="">Kho voucher</a><br />
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="method" value="PUT" id="">
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels" for="username">Tên đăng nhập</label><input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= $data['username'] ?>" disabled></div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 mt-4"><label class="labels" for="email">Email</label><input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $data['email'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="name">Họ và tên</label><input type="text" id="name" name="name" class="form-control" placeholder="Họ và tên" value="<?= $data['name'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="address">Địa chỉ</label><input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ" value="<?= $data['address'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="phone">Số điện thoại</label><input type="text" id="phone" name="phone" class="form-control" placeholder="Số điện thoại" value="<?= $data['phone_number'] ?>"></div>
                                    <div class="col-md-12 mt-4"><label class="labels" for="image">Ảnh đại diện</label><input type="file" id="image" name="image" class="form-control" placeholder="Chọn ảnh đại diện" value=""></div>

                                </div>

                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập nhật</button></div>
                                <div>

                                    <a href="/change-password" class="text-dark font-weight-bold" style="font-family:roboto;">Đổi mật khẩu</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>


        <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="/public/assets/client/js/main.js"></script>
<?php
    }
}
