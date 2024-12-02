<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Helpers\AuthHelper;
use App\Models\Sku;

ob_start();
class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
        $is_login = AuthHelper::checkLogin();
        if (isset($data['product']) && !empty($data['product'])) {
            $product = $data['product'];
            $sku = (new Sku())->getSkuInnerJoinVariantAndVariantOption();
            // var_dump($sku);

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
                                    <img class="w-100 h-100" src="<?= APP_URL ?>/public/uploads/products/<?= $sku[0]['image'] ?>" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-bold" style="font-family:roboto;"><?= $sku[0]['name'] ?></h3>
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

                        <div>
                            <?php
                            if ($sku[0]['discount_price'] > 0):
                            ?>
                                <h3 class="product-price" id="price-display"><strong class="text-danger"> <?= number_format($sku[0]['prices'] - $sku[0]['discount_price']) ?>đ</strong> <del class="product-old-price" id="discount_price-display"><strike><?= number_format($sku[0]['prices']) ?> đ</strike> </del> </h3>
                            <?php
                            else :
                            ?>
                                <h3 class="product-price"><?= number_format($sku[0]['prices']) ?> đ</h3>

                            <?php
                            endif;
                            ?>
                        </div>

                        <div class="product-options">
                            <?php if (!empty($sku) && is_array($sku)) : ?>
                                <?php
                                // Nhóm các biến thể theo `product_variant_name`
                                $groupedOptions = [];
                                foreach ($sku as $item) {
                                    $groupedOptions[$item['product_variant_name']][] = [
                                        'id' => $item['product_variant_option_id'],
                                        'name' => $item['product_variant_option_name'],
                                        'price' => $item['prices']
                                    ];
                                }
                                ?>

                                <?php foreach ($groupedOptions as $variantName => $options) : ?>
                                    <label class="row d-flex " style="max-width:400px;">
                                        <h5 class="col-6 py-2"><?= htmlspecialchars($variantName) ?>:</h5>
                                        <select class="col-5 form-select form-select-lg mb-3 input-select variant-select" data-variant="<?= htmlspecialchars($variantName) ?>">
                                            <?php foreach ($options as $option) : ?>
                                                <option value="<?= htmlspecialchars($option['id']) ?>" data-price="<?= htmlspecialchars($option['price']) ?>">
                                                    <?= htmlspecialchars($option['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li><span>Không có biến thể nào</span></li>
                            <?php endif; ?>
                        </div>

                        <script>
								// Theo dõi sự thay đổi trên các dropdown biến thể
								document.querySelectorAll('.variant-select').forEach(select => {
									select.addEventListener('change', updatePrice);
								});

								function updatePrice() {
									let totalPrice = 0;
									let totalDiscountPrice = 0;

									// Lấy giá của tất cả các biến thể đã chọn và cộng lại
									document.querySelectorAll('.variant-select').forEach(select => {
										let selectedOption = select.querySelector('option:checked');
										let price = parseInt(selectedOption.getAttribute('data-price')) || 0;
										let discountPrice = parseInt(selectedOption.getAttribute('data-discount-price')) || 0;

										totalPrice += price; // Cộng tổng giá
										totalDiscountPrice += discountPrice; // Cộng tổng giá giảm (nếu có)
									});

									// Cập nhật giá hiển thị theo tổng giá đã chọn
									document.getElementById('price-display').innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + " đ";

									// Cập nhật giá giảm nếu có
									if (totalDiscountPrice > 0) {
_										// Nếu có giá giảm, hiển thị giá giảm
										document.getElementById('discount_price-display').innerHTML = `<strong class="text-danger">${new Intl.NumberFormat('vi-VN').format(totalPrice - totalDiscountPrice)} đ</strong> <del><strike>${new Intl.NumberFormat('vi-VN').format(totalPrice)} đ</strike></del>`;
									} else {
										// Nếu không có giá giảm, chỉ hiển thị giá gốc
										document.getElementById('discount_price-display').innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + " đ";
									}
								}
							</script>

                     

                        <div class="card-footer d-flex justify-content-between bg-light align-items-center" style="margin-top:150px;">
                            <form action="/cart/add" method="post" class="d-flex align-items-center">
                                <input type="hidden" name="method" value="POST">
                                <input type="hidden" name="id" value="<?= $data['product']['id'] ?>" required>

                                <!-- Lưu các biến thể đã chọn -->
                                <input type="hidden" name="variants" id="selected-variants">

                                <!-- Input số lượng -->
                                <div class="input-group mr-3" style="max-width: 200px;">
                                    <!-- Nút giảm số lượng -->
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary minus" type="button">-</button>
                                    </div>

                                    <!-- Input số lượng -->
                                    <input type="number" name="quantity" value="1" min="1" class="form-control text-center" aria-label="Quantity" style="max-width: 60px;">

                                    <!-- Nút tăng số lượng -->
                                    <div class="input-group-append">
                                        <button class="btn btn-primary plus" type="button">+</button>
                                    </div>
                                </div>
                        
                        
                            <input type="hidden" name="product_id" value="123"> <!-- ID sản phẩm -->
                            
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                        </form>
                        </div>
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
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <!-- Mô tả sản phẩm từ database -->
                            <h4 class="mb-3" style="font-family:roboto;"><?= htmlspecialchars($data['product']['name']); ?></h4>
                            <p><?= $data['product']['description'] ?></p>
                            <h5 class="my-3">Hướng dẫn sử dụng</h5>
                            <p><?= $data['product']['user_manual'] ?></p>
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
                                                                    <input type="hidden" name="product_id" value="<?= $data['products']['id']; ?>" id="">
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
