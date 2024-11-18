<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>

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
        <link href="/public/assets/client/css/style.css" rel="stylesheet">


        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Trang chủ</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Thông tin sản phẩm</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5">

                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['Image'] ?>" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-bold" style="font-family:roboto;"><?= $data['product']['Product_name'] ?></h3>

                    <div class="d-flex gap-3" style="font-family:montserrat;">
                        <?php
                        if ($data['product']['Discount_price'] > 0) :
                        ?>

                            <h3 class=" mb-0"><strike><?= number_format($data['product']['Price']) ?> đ</strike></h3>
                            <h3 class=" mb-4"><strong class="text-danger"><?= number_format($data['product']['Price'] - $data['product']['Discount_price']) ?> đ</strong></h3>
                        <?php
                        else :
                        ?>
                            <h6></h6>
                            <h3 class="font-weight-semi-bold mb-4"><?= number_format($data['product']['Price']) ?> đ</h3>
                        <?php
                        endif;
                        ?>
                    </div>

                    <p class="mb-4" style="min-height:150px;"><?= $data['product']['Description'] ?></p>

                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Tính năng:</p>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">A</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-2" name="color">
                                <label class="custom-control-label" for="color-2">B</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-3" name="color">
                                <label class="custom-control-label" for="color-3">C</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-4" name="color">
                                <label class="custom-control-label" for="color-4">D</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-5" name="color">
                                <label class="custom-control-label" for="color-5">E</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                    </div>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-bold mb-0 mr-2" style="font-family:montserrat;">Chia sẻ:</p>
                        <div class="d-inline-flex">
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
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row px-xl-5">
                <div class="col border-bottom pb-4">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả sản phẩm</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Bình luận</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <!-- Mô tả sản phẩm từ database -->
                            <h4 class="mb-3" style="font-family:roboto;"><?= htmlspecialchars($data['product']['Product_name']); ?></h4>
                            <p><?= nl2br(htmlspecialchars($data['product']['Description'])); ?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4" style="font-family:roboto;">Bình luận của "<?= htmlspecialchars($data['product']['Product_name']); ?>"</h4>
                                    <div class="media mb-4">
                                        <img src="/public/uploads/users/igkhang.png" alt="Image" class="img-fluid mr-3 mt-1 rounded-circle" style="width: 45px; height:45px;">
                                        <div class="media-body">
                                            <h6>Khang<small> - <i>10 tháng 11, 2025</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Sản phẩm tốt.</p>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#comment" aria-expanded="false" aria-controls="comment">Sửa</button>
                                            <form action="#" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                <input type="hidden" name="method" value="DELETE" id="">
                                                <input type="hidden" name="product_id" value="<?= $data['product']['Product_ID']; ?>" id="">
                                                <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                            </form>
                                            <div class="collapse" id="comment">
                                                <div class="card card-body mt-5">
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="method" value="PUT" id="">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['Product_ID']; ?>" id="">
                                                        <div class="form-group">
                                                            <label for="">Bình luận</label>
                                                            <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận...">Sản phẩm tốt.</textarea>
                                                        </div>
                                                        <div class="comment-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Gửi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Bình luận</h4>
                                    <h5><a href="/login" class="text-danger text-decoration-none">*Đăng nhập để được phép bình luận</a></h5>
                                    <small>Email của bạn sẽ không được công khai. Các trường bắt buộc được đánh dấu *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="name">Tên của bạn *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email của bạn *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Nội dung bình luận *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi bình luận" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Shop Detail End -->

        <!-- Javascript Files -->
        <script src="/public/assets/client/js/jquery-3.5.1.min.js"></script>
        <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="/public/assets/client/js/main.js"></script>

<?php
    }
}
