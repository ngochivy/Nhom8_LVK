<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Helpers\AuthHelper;

ob_start();
class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
        $is_login = AuthHelper::checkLogin();
        if (isset($data['product']) && !empty($data['product'])) {
            $product = $data['product'];

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
                                    <img class="w-100 h-100" src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-bold" style="font-family:roboto;"><?= $data['product']['name'] ?></h3>

                        <div class="d-flex gap-3" style="font-family:montserrat;">
                            <?php
                            if ($data['product']['discount_price'] > 0) :
                            ?>

                                <h3 class=" mb-0"><strike><?= number_format($data['product']['price']) ?> đ</strike></h3>
                                <h3 class=" mb-4"><strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong></h3>
                            <?php
                            else :
                            ?>
                                <h6></h6>
                                <h3 class="font-weight-semi-bold mb-4"><?= number_format($data['product']['price']) ?> đ</h3>
                            <?php
                            endif;
                            ?>
                        </div>

                        <p class="mb-4" style="min-height:150px;"><?= $data['product']['description'] ?></p>

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
                            <form method="POST" action="/cart/add">
                            <input type="hidden" name="product_id" value="123"> <!-- ID sản phẩm -->
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                            </form>
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
                                <h4 class="mb-3" style="font-family:roboto;"><?= htmlspecialchars($data['product']['name']); ?></h4>
                                <p><?= nl2br(htmlspecialchars($data['product']['description'])); ?></p>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4" style="font-family:roboto;">Bình luận của "<?= htmlspecialchars($data['product']['name']); ?>"</h4>
                                        <?php if (isset($data['comments']) && !empty($data['comments'])) : ?>
                                            <?php foreach ($data['comments'] as $item) : ?>
                                                <div class="media mb-4">
                                                    <?php if ($item['image']) : ?>
                                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['image'] ?>" alt="user" width="50" height="50" style="border-radius: 50%; object-fit: cover;" class="rounded-circle">
                                                    <?php else : ?>
                                                        <img src="<?= APP_URL ?>/public/uploads/users/user.png" alt="user" width="50" class="rounded-circle">
                                                    <?php endif; ?>
                                                    <div class="media-body px-2">
                                                        <h5><?= htmlspecialchars($item['username']) ?><small> - <i><?= htmlspecialchars($item['created_at']) ?></i></small></h5>
                                                        <p><?= htmlspecialchars($item['content']) ?></p>
                                                        <?php
                                                        if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['id'])):
                                                        ?>
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#comment" aria-expanded="false" aria-controls="comment">Sửa</button>
                                                            <form action="#" method="post" onsubmit="return confirm('Bạn có chắc chắn xóa bình luận này?')" style="display: inline-block">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <input type="hidden" name="product_id" value="<?= $data['product']['Product_ID']; ?>" id="">
                                                                <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                            </form>
                                                            <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
                                                                <div class="card card-body mt-5">
                                                                    <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                        <input type="hidden" name="method" value="PUT" id="">
                                                                        <input type="hidden" name="product_id" value="<?= $data['products']['id']; ?>" id="">
                                                                        <div class="form-group">
                                                                            <label for="">Bình luận</label>
                                                                            <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['Content'] ?></textarea>
                                                                        </div>
                                                                        <div class="comment-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Gửi</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <h6 class="text-center text-danger">Chưa có bình luận</h6>
                                        <?php endif; ?>
                                    </div>
                                    <!-- kiem tra dang nhap -->
                                    <?php
                                    if (isset($data) && $is_login):
                                    ?>
                                        <div class="col-md-6">
                                            <h4 class="mb-4">Bình luận</h4>

                                            <form action="/comments" method="post">
                                                <input type="hidden" name="method" value="POST" id="" required>
                                                <input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['id'] ?>" required>
                                                <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['id'] ?>" required>
                                                <div class="form-group">
                                                    <label for="content">Nội dung bình luận *</label>
                                                    <textarea id="content" name="content" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <input type="submit" value="Gửi bình luận" class="btn btn-primary px-3">
                                                </div>
                                            </form>
                                        </div>

                                    <?php
                                    else:
                                    ?>
                                        <h5><a href="/login" class="text-danger text-decoration-none">*Đăng nhập để được phép bình luận</a></h5>

                                    <?php
                                    endif;
                                    ?>
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
        } else {
            echo "<p>Không tìm thấy sản phẩm.</p>";
        }
    }
}
ob_end_flush();