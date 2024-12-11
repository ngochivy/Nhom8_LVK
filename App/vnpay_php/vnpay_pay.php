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
    <h3 class="text-center mb-4 text-primary">TẠO MỚI ĐƠN HÀNG</h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <form action="/vnpay" id="frmCreateOrder" method="post">
                    <input type="hidden" name="method" value="POST">
                    <div class="card-body">
                        <div class="bill-container">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <textarea
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    rows="5"
                                    required><?= is_array($data['name']) ? htmlspecialchars(implode("\n", $data['name'])) : htmlspecialchars($data['name']) ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Số tiền</label>
                            <input
                                class="form-control" id="price" name="price" type="text" min="1" max="100000000" value="<?= $data['price']?> VND" required>
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
                            <button type="submit" class="btn btn-gradient-primary btn-lg rounded-pill">Thanh toán</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
        color: #333;
    }

    h3 {
        font-size: 24px;
        color: #4CAF50;
        font-weight: bold;
    }

    .card {
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }

    .btn-gradient-primary {
        background: linear-gradient(to right, #4CAF50, #8BC34A);
        border: none;
        color: #fff;
        font-size: 16px;
        padding: 12px 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(to right, #388E3C, #81C784);
        transform: scale(1.05);
    }

    .form-check-label {
        font-size: 14px;
        color: #555;
    }

    .card-body {
        padding: 30px;
    }

    .btn-gradient-primary {
        background: linear-gradient(to right, #FF69B4, #FFB6C1); /* Màu hồng nhạt */
        border: none;
        color: #fff;
        font-size: 16px;
        padding: 12px 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(to right, #FF1493, #FF69B4); /* Màu hồng đậm hơn khi hover */
        transform: scale(1.05);
    }
</style>



<?php
    }
}
