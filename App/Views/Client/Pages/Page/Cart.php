<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;
use App\Models\Sku;

class Cart extends BaseView
{
    public static function render($data = null)
    {
        $cart = $data['cart'] ?? [];
        $total = array_sum(array_column($cart, 'total_price'));

        var_dump($cart); // Kiểm tra giỏ hàng
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
        <link href="/public/css/cart.css" rel="stylesheet">
        <style>
            body {
                font-family: roboto;
                margin-top: -50px;
            }
        </style>
        <body>
            <div class="container-xxl bg-white p-0">
                <!-- Page Header Start -->
                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng</h1>
                        <div class="d-inline-flex">
                            <p class="m-0"><a href="">Trang chủ</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Giỏ hàng</p>
                        </div>
                    </div>
                </div>
                <!-- Page Header End -->
                <!-- Cart Start -->
                <form action="/checkout" method="post">
                    <input type="hidden" name="method" value="POST">
                    <div class="container-xxl pt-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-8 table-responsive mb-5 mr-0">
                                <?php if (empty($cart)): ?>
                                    <p class="text-center">Giỏ hàng của bạn đang trống!</p>
                                <?php else: ?>
                                    <table class="table table-bordered text-center">
                                        <thead class="bg-primary text-dark">
                                            <tr>
                                                <th>Chọn</th>
                                                <th>Hình ảnh</th>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Tùy chọn</th>
                                                <th style="min-width: 70px;">Giá</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cart as $id => $item):
                                                // Lấy thông tin SKU và biến thể từ cơ sở dữ liệu
                                                $skuInfo = (new Sku())->getSkuAndVariantInfoByProductId($item['id']);
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" name="check[]" value="<?= $item['id'] ?>"></td>
                                                    <td><img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="height:150px; width:150px;"></td>
                                                    <td><?= $item['name'] ?></td>
                                                    <td>
                                                        <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                                        <input type="hidden" name="price[]" value="<?= $skuInfo['prices'] ?>">

                                                        <input type="number"
                                                            name="quantity[]"
                                                            value="<?= $item['quantity'] ?>"
                                                            min="1"
                                                            class="form-control quantity-input"
                                                            data-id="<?= $item['id'] ?>"
                                                            data-price="<?= $skuInfo['prices'] ?>"
                                                            required>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        // Lấy tên biến thể từ giỏ hàng
                                                        $variantNames = [];
                                                        foreach ($item['variants'] as $variant) {
                                                            $variantNames[] = $variant['name']; // Hoặc thay bằng giá trị tên biến thể phù hợp
                                                        }
                                                        echo implode(', ', $variantNames); // Hiển thị tên các biến thể
                                                        ?>
                                                    </td>

                                                    <td><?= number_format($item['total_price'], 0, ',', ',') ?> VND</td>
                                                    <td>
                                                        <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Áp dụng</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-secondary mb-5">
                                    <div class="card-header bg-secondary border-0">
                                        <h4 class="font-weight-semi-bold m-0">Tổng quan</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($cart as $id => $item): ?>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-bold mr-2">Tên:</h6>
                                                <h6 class=""> <?= $item['name'] ?></h6>
                                                <input type="hidden" name="name[]" value="<?= htmlspecialchars($item['name']) ?>">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-bold">Số lượng:</h6>
                                                <h6 class=""><?= $item['quantity'] ?> </h6>
                                                <input type="hidden" name="quantity[]" value="<?= htmlspecialchars($item['quantity']) ?>">
                                            </div>
                                        <?php endforeach; ?>

                                        <div class="d-flex justify-content-between mb-3 pt-4">
                                            <h6 class="font-weight-medium">Tổng tiền hàng</h6>
                                            <h6 class="font-weight-medium"><?= number_format($total, 0, ',', ',') ?> VND</h6>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                            <h6 class="font-weight-medium">0 đ</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer border-secondary bg-transparent">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5 class="font-weight-bold">Tổng</h5>
                                            <h5 class="font-weight-bold"><?= number_format($total, 0, ',', ',') ?> VND</h5>
                                        </div>
                                        <button class="btn btn-block btn-primary my-3 py-3">Mua hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cart End -->
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const quantityInputs = document.querySelectorAll('.quantity-input');
                        const totalElement = document.querySelector('h6.font-weight-medium:last-child');
                        const grandTotalElement = document.querySelector('h5.font-weight-bold:last-child');

                        quantityInputs.forEach(input => {
                            input.addEventListener('input', function() {
                                const productId = this.dataset.id;
                                const productPrice = parseFloat(this.dataset.price);
                                const quantity = parseInt(this.value);

                                // Cập nhật giá tổng cho sản phẩm hiện tại
                                const totalPrice = productPrice * quantity;

                                // Tính tổng giỏ hàng
                                let grandTotal = 0;
                                quantityInputs.forEach(input => {
                                    const price = parseFloat(input.dataset.price);
                                    const quantity = parseInt(input.value);
                                    grandTotal += price * quantity;
                                });

                                // Cập nhật tổng giỏ hàng
                                totalElement.textContent = new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'VND'
                                }).format(grandTotal);
                                grandTotalElement.textContent = new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'VND'
                                }).format(grandTotal);
                            });
                        });
                    });
                </script>

            </div>
        </body>
</html>
<?php
    }
}
