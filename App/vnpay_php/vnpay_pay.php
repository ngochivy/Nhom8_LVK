<?php

namespace App\vnpay_php;

use App\Views\BaseView;

class vnpay_pay extends BaseView
{
    public static function render($data = null)

    {
?>
        <!-- Customized Bootstrap Stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="/public/assets/client/css/style.css" rel="stylesheet">
        <link href="/public/assets/client/css/style.min.css" rel="stylesheet">

        <div class="container mt-5">
            <h3 class="text-center mb-4">Tạo mới đơn hàng</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">


                    <div class="card shadow">
                        <form action="/vnpay" id="frmCreateOrder" method="post">
                            <input type="hidden" name="method" value="POST">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input
                                        class="form-control" id="name" name="name" type="text"
                                        value="<?= is_array($data['name']) ? htmlspecialchars(implode(', ', $data['name'])) : htmlspecialchars($data['name']) ?>"
                                        required>


                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Số tiền</label>
                                    <input
                                        class="form-control" id="price" name="price" type="number" min="1" max="100000000" value="<?= $data['price'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cổng thanh toán</label>
                                    <div class="form-check d-flex align-items-center">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="bankCode" name="bankCode" value="" checked>
                                        <label for="bankCode" class="form-check-label d-flex align-items-center">
                                            <img src="/public/uploads/checkout/vnpay.png" alt="" style="max-width: 100px; height: auto;">
                                        </label>
                                    </div>
                                    <br>

                                </div>

                                <!-- Ngôn ngữ giao diện -->
                                <div class="mb-3">
                                    <label class="form-label">Chọn ngôn ngữ giao diện thanh toán:</label>
                                    <div class="form-check d-flex align-items-center">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="language-vn" name="language" value="vn" checked>
                                        <label for="language-vn" class="form-check-label d-flex align-items-center">
                                            Tiếng Việt
                                            <img src="/public//uploads//checkout//vietnam.png" alt="Cờ Việt Nam" style="width: 20px; height: 15px; margin-left: 5px;">
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input style="margin-top: -10px; width: 20px;" type="radio" id="language-en" name="language" value="en">
                                        <label for="language-en" class="form-check-label d-flex align-items-center">
                                            Tiếng Anh
                                            <img src="/public/uploads/checkout/anh.png" alt="Cờ Anh" style="width: 20px; height: 15px; margin-left: 5px;">
                                        </label>
                                    </div>
                                </div>



                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


<?php
    }
}
