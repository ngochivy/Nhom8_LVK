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
            <style>
            </style>


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
            <div class="container product-details">
                <div class="row">
                    <div class="col-lg-5 pb-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner border">
                                <div class="carousel-item active">
                                    <img class="w-100 h-100" src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="Image" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-bold" style="font-family:roboto;"><?= $data['product']['name'] ?></h3>
                        <!-- Hiển thị lượt đánh giá và lượt bán -->
                        <div class="d-flex align-items-center mb-1">
                            <div class="d-flex align-items-center">
                                <span class="badge badge-success px-2 py-1"> ★</span>
                                <p class="ml-2 pt-3">đánh giá: 444</p>
                            </div>
                            <div class="ml-4">
                                <p class="pt-3">Sản phẩm đã bán: 123</p>
                            </div>
                        </div>

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
                                <!-- Giá cơ bản của sản phẩm -->
                                <h3 id="base-price" data-base-price="<?= $data['product']['price'] ?>" class="font-weight-semi-bold mb-4"><?= number_format($data['product']['price']) ?> đ</h3>

                                <!-- Giá sau khi chọn biến thể -->
                                <h3 id="final-price" class="font-weight-semi-bold mb-4"><?= number_format($data['product']['price']) ?> đ</h3>

                            <?php
                            endif;
                            ?>
                        </div>

                        <!-- Thông tin vận chuyển -->
                        <div class="d-flex flex-column mt-0">
                            <span>
                            <h5 class="text font-weight-bold mb-2">Vận chuyển: </h5>
                            <i class="fa-solid fa-truck-fast" style="color: #c5837c;"></i> Miễn phí vận chuyển
                            </span>
                            <div>
                                <p class="m-0">Địa chỉ: <strong>Cần Thơ</strong><a href="#" class="px-1 text-decoration-underline">thay đổi</a></p>
                                <p class="m-0">Phí vận chuyển: <strong class="text-dark">0đ</strong></p>
                            </div>
                        </div>


                        <!-- Biến thể -->
                        <?php foreach ($data['variants'] as $variant): ?>
                            <div class="d-flex mb-2 mt-5">
                                <p class="text-dark font-weight-medium mb-0 mr-3"><?= htmlspecialchars($variant['name']) ?>:</p>
                                <form>
                                    <?php foreach ($variant['options'] as $option): ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="option-<?= $option['id'] ?>" name="variant-<?= $variant['name'] ?>" value="<?= $option['id'] ?>" data-price="<?= $option['price'] ?>">
                                            <label class="custom-control-label" for="option-<?= $option['id'] ?>"><?= htmlspecialchars($option['name']) ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>
                        <?php endforeach; ?>

                        <script>
                            // Cập nhật giá khi chọn biến thể
                            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                                radio.addEventListener('change', function() {
                                    let basePrice = parseFloat(document.getElementById('base-price').dataset.basePrice); // Lấy giá cơ bản
                                    let additionalPrice = 0;

                                    // Duyệt qua tất cả các lựa chọn đã chọn và cộng giá
                                    document.querySelectorAll('input[type="radio"]:checked').forEach(selected => {
                                        additionalPrice += parseFloat(selected.dataset.price || 0); // Lấy giá thêm từ thuộc tính data-price
                                    });

                                    // Cập nhật giá cuối cùng
                                    document.getElementById('final-price').innerText = (basePrice + additionalPrice).toLocaleString('vi-VN') + ' đ';
                                });
                            });
                        </script>

                     

                        <div class="d-flex align-items-center mb-4 pt-2">
                            <form method="POST" action="/cart/add">
                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>"> <!-- ID sản phẩm -->
                                <input type="number" name="quantity" value="1" min="1">
                                <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                            </form>
                        </div>

                        <script>
                            // Thêm sự kiện cho nút tăng giảm số lượng
                            document.querySelector('.plus').addEventListener('click', function() {
                                let quantityInput = document.querySelector('input[name="quantity"]');
                                quantityInput.value = parseInt(quantityInput.value) + 1;
                            });

                            document.querySelector('.minus').addEventListener('click', function() {
                                let quantityInput = document.querySelector('input[name="quantity"]');
                                if (quantityInput.value > 1) {
                                    quantityInput.value = parseInt(quantityInput.value) - 1;
                                }
                            });

                            // Cập nhật các biến thể đã chọn
                            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                                radio.addEventListener('change', function() {
                                    let selectedVariants = [];
                                    document.querySelectorAll('input[type="radio"]:checked').forEach(selected => {
                                        selectedVariants.push({
                                            variantId: selected.name.split('-')[1],
                                            optionId: selected.value
                                        });
                                    });

                                    // Lưu thông tin biến thể vào hidden input
                                    document.getElementById('selected-variants').value = JSON.stringify(selectedVariants);
                                });
                            });
                        </script>

                    </div>

                </div>
                <div class="row px-xl-5">
                    <div class="col border-bottom pb-4">
                        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả sản phẩm</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Bình luận</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1" >
                                <!-- Mô tả sản phẩm từ database -->
                                <h4 class="mb-3" style="font-family:roboto;"><?= htmlspecialchars($data['product']['name']); ?></h4>
                                <p>
                                    <?= nl2br(htmlspecialchars($data['product']['description'] ?? 'Mô tả sản phẩm đang được cập nhật.')); ?>
                                </p>

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
                                                        if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])):
                                                        ?>
                                                            <button type="button" class="btn border-0 btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button>
                                                            <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Bạn có chắc chắn xóa bình luận này?')" style="display: inline-block">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <input type="hidden" name="product_id" value="<?= $data['product']['id']; ?>" id="">
                                                                <button type="submit" class="btn border-0 btn-sm">Xoá</button>
                                                            </form>
                                                            <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
                                                                <div class="card card-body mt-5">
                                                                    <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                        <input type="hidden" name="method" value="PUT" id="">
                                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id']; ?>" id="">
                                                                        <div class="form-group">
                                                                            <label for="">Bình luận</label>
                                                                            <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
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
                                            <p>Không có bình luận cho sản phẩm này.</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="/comments" method="post">
                                            <input type="hidden" name="method" value="POST" id="" required>
                                            <input type="hidden" name="product_id" id="product_id" value="<?= $data['product']['id'] ?>" required>
                                            <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['id'] ?>" required>
                                            <h4 class="mb-4">Thêm bình luận</h4>
                                            <textarea name="content" class="form-control" rows="5" required></textarea>
                                            <button type="submit" class="btn btn-primary mt-3">Đăng bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shop Detail End -->


<?php
        }
    }
}
ob_end_flush();
