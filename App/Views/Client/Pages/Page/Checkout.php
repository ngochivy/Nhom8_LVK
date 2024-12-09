<?php

namespace App\Views\Client\Pages\Page;

use App\Models\Sku;
use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($data);
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
        <link href="/public//css//chechkout.css" rel="stylesheet">


        <body>
            <div class="container-xxl bg-white p-0">

                <div class="container-xxl bg-white p-0">

                    <!-- Tiêu đề Trang Bắt đầu -->
                    <div class="container bg-primary text-white mb-5" style="min-width: 100%;">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
                            <div class="d-inline-flex">
                                <p class="m-0"><a href="" class="text-white">Trang chủ</a></p>
                                <p class="m-0 px-2">-</p>
                                <p class="m-0">Thanh toán</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tiêu đề Trang Kết thúc -->

                    <form action="/pay" method="POST" class="checkout-form" method="POST" action="/checkout/send-email">
                        <input type="hidden" name="method" value="POST">
                        <!-- Thanh toán Bắt đầu -->
                        <div class="container-fluid pt-5">
                            <div class="row px-xl-5">
                                <div class="col-lg-8">
                                    <div class="mb-4">
                                        <h4 class="font-weight-semi-bold mb-4">Địa chỉ</h4>
                                        <div class="row">
                                            <form class="checkout-form" method="POST" action="/checkout/send-email">
                                                <!-- Address fields -->
                                                <div class="col-md-6 form-group">
                                                    <label for="first_name">Họ</label>
                                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nhập họ" required>

                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="last_name">Tên</label>
                                                    <input type="text" name="last_name" class="form-control" id="first_name" placeholder="Nhập tên" required>

                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>

                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="phone_number">Số điện thoại</label>
                                                    <input type="phone_number" name="phone_number" class="form-control" id="phone_number" placeholder="Nhập số điện thoại" required>

                                                </div>
                                                <div class="col-md-6 form-option">
                                                    <label>Tỉnh/Thành phố</label>
                                                    <select id="province" class="form-control" name="province" required>
                                                        <option value="">Chọn tỉnh</option>
                                                        <!-- Các tỉnh sẽ được load vào đây -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Huyện/Quận</label>
                                                    <select id="district" class="form-control" name="district" required>
                                                        <option value="">Chọn huyện</option>
                                                        <!-- Các huyện sẽ được load vào đây -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Phường/Xã</label>
                                                    <select id="ward" class="form-control" name="ward" required>
                                                        <option value="">Chọn phường</option>
                                                        <!-- Các phường sẽ được load vào đây -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Địa chỉ chi tiết</label>
                                                    <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ" required>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 150px" required></textarea>
                                                        <label for="message">Thông tin bổ sung...</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <!-- Thông tin đơn hàng -->
                                    <div class="card border-light shadow-sm mb-5">
                                        <div class="card-header bg-light border-0">
                                            <h4 class="font-weight-semi-bold m-0">Thông tin đơn hàng</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $total_price = 0;
                                            // Kiểm tra xem giỏ hàng có tồn tại và có sản phẩm hay không
                                            if (isset($data) && !empty($data)) {
                                                foreach ($data as $item):
                                                    $sku = (new Sku())->getSkuByProductId($item['id']); // Lấy thông tin SKU để lấy giá
                                                    $item_total = $sku['prices'] * $item['quantity']; // Tính tổng tiền của sản phẩm
                                                    $total_price += $item_total; // Cộng dồn vào tổng tiền

                                            ?>
                                                    <div class="mb-2">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="font-weight-bold" style="width: 100px;">Tên:</h6>
                                                            <h6><?= htmlspecialchars($item['name']) ?></h6>
                                                            <input type="hidden" name="name[]" value="<?= $item['name'] ?>"> <!-- Lưu tên sản phẩm -->
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="font-weight-bold" style="width: 100px;">Số lượng:</h6>
                                                            <h6><?= $item['quantity'] ?></h6>
                                                            <input type="hidden" name="quantity[]" value="<?= $item['quantity'] ?>"> <!-- Lưu số lượng sản phẩm -->
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="font-weight-bold" style="width: 100px;">Giá:</h6>
                                                            <h6><?= number_format($sku['prices'], 0, ',', ',') ?> VND</h6> <!-- Hiển thị giá từ SKU -->
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="font-weight-bold" style="width: 100px;">Tổng tiền:</h6>
                                                            <h6><?= number_format($item_total, 0, ',', ',') ?> VND</h6> <!-- Hiển thị tổng tiền của sản phẩm -->
                                                        </div>
                                                    </div>
                                            <?php
                                                endforeach;
                                            } else {
                                                echo "<p>Giỏ hàng của bạn đang trống!</p>";
                                            }
                                            ?>

                                            <hr class="mt-0">

                                            <!-- Phí vận chuyển -->
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                                <h6 class="font-weight-medium">0 đ</h6>
                                            </div>
                                        </div>

                                        <div class="card-footer border-light bg-transparent">
                                            <div class="d-flex justify-content-between mt-2">
                                                <h5 class="font-weight-bold">Tổng cộng</h5>
                                                <input type="hidden" name="total_price" value="<?= $total_price ?>"> <!-- Lưu tổng tiền vào form -->
                                                <h5 class="font-weight-bold"><?= number_format($total_price, 0, ',', ',') ?> VND</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tùy chọn thanh toán -->
                                    <div class="card border-light shadow-sm mb-5">
                                        <div class="card-header bg-light border-0">
                                            <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                                        </div>
                                        <div class="payment-options">
                                            <!-- Thanh toán khi nhận hàng -->
                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="in-store" class="custom-radio" required>
                                                <label for="in-store">
                                                    <div class="option-content">
                                                        <span class="icon"><i class="fas fa-store"></i></span>
                                                        <span class="text">Thanh toán khi nhận hàng</span>
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- Thanh toán qua ZaloPay -->
                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="zalopay" class="custom-radio" required>
                                                <label for="zalopay">
                                                    <div class="option-content">
                                                        <img src="/public/uploads/checkout/zalopay.png" alt="ZaloPay" class="logo">
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- Thanh toán qua VNPAY -->
                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="vnpay" class="custom-radio" required>
                                                <label for="vnpay">
                                                    <div class="option-content">
                                                        <img src="/public/uploads/checkout/vnpay.png" alt="Vnpay" class="logo">
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- Thanh toán qua chuyển khoản ngân hàng -->
                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="banktransfer" class="custom-radio" required>
                                                <label for="banktransfer">
                                                    <div class="option-content">
                                                        <span class="icon"><i class="fas fa-university"></i></span>
                                                        <span class="text">Chuyển khoản ngân hàng</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nút thanh toán -->
                                    <div class="card-footer border-light bg-transparent">
                                        <button id="checkout-button" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit">
                                            Thanh toán ngay
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                </div>
                <!-- Thanh toán Kết thúc -->
                </form>
            </div>


            </div>
            <!-- Alert thông báo -->
            <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; display: none; z-index: 1050;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Đặt hàng thành công!
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                function validateAndSubmit() {

                }
                document.addEventListener('DOMContentLoaded', function() {
                    // Giả sử bạn đã tải dữ liệu JSON vào `locationsData`
                    var locationsData = {
                        "An Giang": {
                            "Tri Tôn": [
                                "Thị trấn Ba Chúc",
                                "Thị trấn Cô Tô",
                                "Thị trấn Tri Tôn",
                                "An Tức",
                                "Châu Lăng",
                                "Lạc Quới",
                                "Lê Trì",
                                "Lương An Trà",
                                "Lương Phi",
                                "Núi Tô",
                                "Ô Lâm",
                                "Tà Đảnh",
                                "Tân Tuyến",
                                "Vĩnh Gia",
                                "Vĩnh Phước"
                            ],
                            "Long Xuyên": [
                                "Phường Mỹ Quý",
                                "Phường Mỹ Hòa",
                                "Phường Bình Đức",
                                "Phường Mỹ Bình",
                                "Phường Mỹ Long",
                                "Phường Mỹ Phước",
                                "Phường Mỹ Thạnh",
                                "Phường Đông Xuyên",
                                "Phường Bình Khánh",
                                "Xã Mỹ Hòa Hưng"
                            ],
                            "Châu Đốc": [
                                "Phường Núi Sam",
                                "Phường Châu Phú A",
                                "Phường Châu Phú B",
                                "Phường Vĩnh Mỹ",
                                "Phường Vĩnh Ngươn",
                                "Xã Vĩnh Tế",
                                "Xã Vĩnh Châu"
                            ],
                            "Tân Châu": [
                                "Phường Long Châu",
                                "Phường Tân An",
                                "Phường Long Hưng",
                                "Xã Long Phú",
                                "Xã Long Hòa",
                                "Xã Long Sơn",
                                "Xã Long An",
                                "Xã Châu Phong",
                                "Xã Phú Lộc",
                                "Xã Phú Vĩnh",
                                "Xã Tân Thạnh"
                            ],
                            "Châu Thành": [
                                "Thị trấn An Châu",
                                "Xã An Hòa",
                                "Xã Bình Hòa",
                                "Xã Bình Thạnh",
                                "Xã Cần Đăng",
                                "Xã Hòa Bình Thạnh",
                                "Xã Vĩnh An",
                                "Xã Vĩnh Bình",
                                "Xã Vĩnh Hanh",
                                "Xã Vĩnh Lợi",
                                "Xã Vĩnh Nhuận",
                                "Xã Vĩnh Thành"
                            ],
                            "Tịnh Biên": [
                                "Thị trấn Tịnh Biên",
                                "Thị trấn Nhà Bàng",
                                "Xã An Cư",
                                "Xã An Hảo",
                                "Xã An Nông",
                                "Xã Nhơn Hưng",
                                "Xã Tân Lập",
                                "Xã Thới Sơn",
                                "Xã Văn Giáo",
                                "Xã Vĩnh Trung",
                                "Xã Vĩnh Xuân"
                            ],
                            "Chợ Mới": [
                                "Thị trấn Chợ Mới",
                                "Thị trấn Mỹ Luông",
                                "Xã An Thạnh Trung",
                                "Xã Bình Phước Xuân",
                                "Xã Hòa An",
                                "Xã Hòa Bình",
                                "Xã Hòa Lạc",
                                "Xã Kiến An",
                                "Xã Kiến Thành",
                                "Xã Long Điền A",
                                "Xã Long Điền B",
                                "Xã Long Giang",
                                "Xã Mỹ An",
                                "Xã Mỹ Hội Đông",
                                "Xã Nhơn Mỹ",
                                "Xã Tấn Mỹ"
                            ],
                            "Thoại Sơn": [
                                "Thị trấn Núi Sập",
                                "Thị trấn Óc Eo",
                                "Thị trấn Phú Hòa",
                                "Xã An Bình",
                                "Xã Bình Thành",
                                "Xã Định Mỹ",
                                "Xã Định Thành",
                                "Xã Mỹ Phú Đông",
                                "Xã Phú Thuận",
                                "Xã Tây Phú",
                                "Xã Thoại Giang",
                                "Xã Vĩnh Chánh",
                                "Xã Vĩnh Khánh",
                                "Xã Vĩnh Phú",
                                "Xã Vĩnh Trạch"
                            ]
                        },
                        "Kiên Giang": {
                            "Thành phố Rạch Giá": [
                                "Phường Vĩnh Thanh Vân",
                                "Phường Vĩnh Thanh",
                                "Phường Vĩnh Quang",
                                "Phường Vĩnh Lạc",
                                "Phường Vĩnh Lợi",
                                "Phường An Hòa",
                                "Phường Rạch Sỏi",
                                "Phường Vĩnh Thông",
                                "Phường Vĩnh Hiệp",
                                "Phường Vĩnh Bảo",
                                "Xã Phi Thông"
                            ],
                            "Thành phố Hà Tiên": [
                                "Phường Đông Hồ",
                                "Phường Bình San",
                                "Phường Pháo Đài",
                                "Phường Tô Châu",
                                "Xã Mỹ Đức",
                                "Xã Thuận Yên",
                                "Xã Tiên Hải"
                            ],
                            "Huyện An Biên": [
                                "Thị trấn Thứ Ba",
                                "Xã Đông Thái",
                                "Xã Đông Yên",
                                "Xã Nam Thái",
                                "Xã Nam Thái A",
                                "Xã Nam Yên",
                                "Xã Tây Yên",
                                "Xã Tây Yên A",
                                "Xã Hưng Yên",
                                "Xã Hưng Yên A"
                            ],
                            "Huyện An Minh": [
                                "Thị trấn Thứ Mười Một",
                                "Xã Đông Hưng",
                                "Xã Đông Hưng A",
                                "Xã Đông Hưng B",
                                "Xã Đông Thạnh",
                                "Xã Tân Thạnh",
                                "Xã Thuận Hòa",
                                "Xã Vân Khánh",
                                "Xã Vân Khánh Đông",
                                "Xã Vân Khánh Tây"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Minh Lương",
                                "Xã Mong Thọ",
                                "Xã Mong Thọ A",
                                "Xã Mong Thọ B",
                                "Xã Giục Tượng",
                                "Xã Vĩnh Hòa Hiệp",
                                "Xã Vĩnh Hòa Phú",
                                "Xã Minh Hòa",
                                "Xã Bình An"
                            ],
                            "Huyện Giang Thành": [
                                "Xã Tân Khánh Hòa",
                                "Xã Phú Lợi",
                                "Xã Phú Mỹ",
                                "Xã Vĩnh Điều",
                                "Xã Vĩnh Phú"
                            ],
                            "Huyện Gò Quao": [
                                "Thị trấn Gò Quao",
                                "Xã Vĩnh Hòa Hưng Nam",
                                "Xã Vĩnh Hòa Hưng Bắc",
                                "Xã Định Hòa",
                                "Xã Thủy Liễu",
                                "Xã Vĩnh Phước A",
                                "Xã Vĩnh Phước B",
                                "Xã Vĩnh Thắng",
                                "Xã Vĩnh Tuy",
                                "Xã Vĩnh Thắng A"
                            ],
                            "Huyện Hòn Đất": [
                                "Thị trấn Hòn Đất",
                                "Thị trấn Sóc Sơn",
                                "Xã Bình Giang",
                                "Xã Bình Sơn",
                                "Xã Mỹ Hiệp Sơn",
                                "Xã Mỹ Thái",
                                "Xã Mỹ Thuận",
                                "Xã Nam Thái Sơn",
                                "Xã Lình Huỳnh",
                                "Xã Sơn Bình",
                                "Xã Sơn Kiên",
                                "Xã Thổ Sơn"
                            ],
                            "Huyện Kiên Hải": [
                                "Xã Hòn Tre",
                                "Xã Lại Sơn",
                                "Xã An Sơn",
                                "Xã Nam Du"
                            ],
                            "Huyện Kiên Lương": [
                                "Thị trấn Kiên Lương",
                                "Xã Kiên Bình",
                                "Xã Bình An",
                                "Xã Bình Trị",
                                "Xã Hòa Điền",
                                "Xã Dương Hòa",
                                "Xã Sơn Hải"
                            ],
                            "Huyện Phú Quốc": [
                                "Phường Dương Đông",
                                "Phường An Thới",
                                "Xã Cửa Cạn",
                                "Xã Cửa Dương",
                                "Xã Gành Dầu",
                                "Xã Hàm Ninh",
                                "Xã Hòn Thơm",
                                "Xã Thổ Châu",
                                "Xã Bãi Thơm"
                            ],
                            "Huyện Tân Hiệp": [
                                "Thị trấn Tân Hiệp",
                                "Xã Tân Hội",
                                "Xã Tân Thành",
                                "Xã Tân Hiệp A",
                                "Xã Tân Hiệp B",
                                "Xã Thạnh Đông",
                                "Xã Thạnh Đông A",
                                "Xã Thạnh Trị",
                                "Xã Thạnh Đông B"
                            ],
                            "Huyện U Minh Thượng": [
                                "Xã An Minh Bắc",
                                "Xã Minh Thuận",
                                "Xã Vĩnh Hòa",
                                "Xã Hòa Chánh",
                                "Xã Thạnh Yên",
                                "Xã Thạnh Yên A"
                            ],
                            "Huyện Vĩnh Thuận": [
                                "Thị trấn Vĩnh Thuận",
                                "Xã Bình Minh",
                                "Xã Tân Thuận",
                                "Xã Vĩnh Bình Bắc",
                                "Xã Vĩnh Bình Nam",
                                "Xã Vĩnh Phong",
                                "Xã Vĩnh Thuận",
                                "Xã Phong Đông"
                            ]
                        },
                        "Bạc Liêu": {
                            "Thành phố Bạc Liêu": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 5",
                                "Phường 7",
                                "Xã Hiệp Thành",
                                "Xã Vĩnh Trạch",
                                "Xã Vĩnh Trạch Đông"
                            ],
                            "Huyện Đông Hải": [
                                "Thị trấn Gành Hào",
                                "Xã An Phúc",
                                "Xã An Trạch",
                                "Xã An Trạch A",
                                "Xã Điền Hải",
                                "Xã Long Điền",
                                "Xã Long Điền Đông",
                                "Xã Long Điền Đông A",
                                "Xã Long Điền Tây"
                            ],
                            "Huyện Hòa Bình": [
                                "Thị trấn Hòa Bình",
                                "Xã Minh Diệu",
                                "Xã Vĩnh Bình",
                                "Xã Vĩnh Hậu",
                                "Xã Vĩnh Hậu A",
                                "Xã Vĩnh Mỹ A",
                                "Xã Vĩnh Mỹ B"
                            ],
                            "Huyện Hồng Dân": [
                                "Thị trấn Ngan Dừa",
                                "Xã Lộc Ninh",
                                "Xã Ninh Hòa",
                                "Xã Ninh Quới",
                                "Xã Ninh Quới A",
                                "Xã Ninh Thạnh Lợi",
                                "Xã Ninh Thạnh Lợi A",
                                "Xã Vĩnh Lộc",
                                "Xã Vĩnh Lộc A"
                            ],
                            "Huyện Phước Long": [
                                "Thị trấn Phước Long",
                                "Xã Hưng Phú",
                                "Xã Phong Thạnh Tây A",
                                "Xã Phong Thạnh Tây B",
                                "Xã Phước Long",
                                "Xã Vĩnh Phú Đông",
                                "Xã Vĩnh Phú Tây"
                            ],
                            "Thị xã Giá Rai": [
                                "Phường 1",
                                "Phường Hộ Phòng",
                                "Phường Láng Tròn",
                                "Xã Phong Tân",
                                "Xã Phong Thạnh",
                                "Xã Phong Thạnh A",
                                "Xã Tân Phong",
                                "Xã Tân Thạnh"
                            ]
                        },
                        "Trà Vinh": {
                            "Thành phố Trà Vinh": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Xã Long Đức"
                            ],
                            "Huyện Càng Long": [
                                "Thị trấn Càng Long",
                                "Xã An Trường",
                                "Xã An Trường A",
                                "Xã Bình Phú",
                                "Xã Đại Phúc",
                                "Xã Đại Phước",
                                "Xã Đức Mỹ",
                                "Xã Huyền Hội",
                                "Xã Nhị Long",
                                "Xã Nhị Long Phú",
                                "Xã Phương Thạnh",
                                "Xã Tân An",
                                "Xã Tân Bình"
                            ],
                            "Huyện Cầu Kè": [
                                "Thị trấn Cầu Kè",
                                "Xã An Phú Tân",
                                "Xã Châu Điền",
                                "Xã Hòa Ân",
                                "Xã Hòa Tân",
                                "Xã Ninh Thới",
                                "Xã Phong Phú",
                                "Xã Phong Thạnh",
                                "Xã Tam Ngãi",
                                "Xã Thông Hòa",
                                "Xã Thạnh Phú"
                            ],
                            "Huyện Cầu Ngang": [
                                "Thị trấn Cầu Ngang",
                                "Thị trấn Mỹ Long",
                                "Xã Hiệp Hòa",
                                "Xã Hiệp Mỹ Đông",
                                "Xã Hiệp Mỹ Tây",
                                "Xã Long Sơn",
                                "Xã Mỹ Hòa",
                                "Xã Mỹ Long Bắc",
                                "Xã Mỹ Long Nam",
                                "Xã Nhị Trường",
                                "Xã Thạnh Hòa Sơn",
                                "Xã Trường Thọ"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Châu Thành",
                                "Xã Đa Lộc",
                                "Xã Hòa Lợi",
                                "Xã Hưng Mỹ",
                                "Xã Long Hòa",
                                "Xã Lương Hòa",
                                "Xã Lương Hòa A",
                                "Xã Mỹ Chánh",
                                "Xã Nguyệt Hóa",
                                "Xã Phước Hảo",
                                "Xã Song Lộc",
                                "Xã Thanh Mỹ"
                            ],
                            "Huyện Duyên Hải": [
                                "Thị trấn Long Thành",
                                "Xã Đôn Châu",
                                "Xã Đôn Xuân",
                                "Xã Đông Hải",
                                "Xã Long Hữu",
                                "Xã Ngũ Lạc",
                                "Xã Trường Long Hòa"
                            ],
                            "Thị xã Duyên Hải": [
                                "Phường 1",
                                "Phường 2",
                                "Xã Dân Thành",
                                "Xã Hiệp Thạnh",
                                "Xã Long Khánh",
                                "Xã Ngũ Lạc"
                            ],
                            "Huyện Tiểu Cần": [
                                "Thị trấn Tiểu Cần",
                                "Thị trấn Cầu Quan",
                                "Xã Hiếu Tử",
                                "Xã Hiếu Trung",
                                "Xã Hùng Hòa",
                                "Xã Long Thới",
                                "Xã Phú Cần",
                                "Xã Tân Hòa",
                                "Xã Tập Ngãi"
                            ],
                            "Huyện Trà Cú": [
                                "Thị trấn Trà Cú",
                                "Thị trấn Định An",
                                "Xã An Quảng Hữu",
                                "Xã Định An",
                                "Xã Đại An",
                                "Xã Hàm Giang",
                                "Xã Hàm Tân",
                                "Xã Lưu Nghiệp Anh",
                                "Xã Ngãi Xuyên",
                                "Xã Phước Hưng",
                                "Xã Tân Hiệp",
                                "Xã Tân Sơn",
                                "Xã Tập Sơn"
                            ]
                        },
                        "Sóc Trăng": {
                            "Thành phố Sóc Trăng": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Phường 9",
                                "Phường 10",
                                "Phường 11",
                                "Phường 12",
                                "Xã An Ninh",
                                "Xã Vĩnh Tân"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Châu Thành",
                                "Xã An Hiệp",
                                "Xã An Lạc Tây",
                                "Xã An Ninh",
                                "Xã Bình Thạnh",
                                "Xã Lương Hòa",
                                "Xã Nhơn Mỹ",
                                "Xã Phú Tâm",
                                "Xã Tài Văn",
                                "Xã Thanh Mỹ"
                            ],
                            "Huyện Kế Sách": [
                                "Thị trấn Kế Sách",
                                "Xã An Lạc Tây",
                                "Xã Ba Trinh",
                                "Xã Châu Thành",
                                "Xã Hồ Đắc Kiện",
                                "Xã Hòa Tú 1",
                                "Xã Hòa Tú 2",
                                "Xã Kế Sách",
                                "Xã Thới Lai",
                                "Xã Vĩnh Tân"
                            ],
                            "Huyện Mỹ Tú": [
                                "Thị trấn Mỹ Tú",
                                "Xã Mỹ Tân",
                                "Xã Mỹ Hương",
                                "Xã Mỹ Long",
                                "Xã Lạc Hòa",
                                "Xã Tân Tiến",
                                "Xã Phú Mỹ",
                                "Xã Đại Ninh"
                            ],
                            "Huyện Ngã Năm": [
                                "Thị trấn Ngã Năm",
                                "Xã Mỹ Bình",
                                "Xã Mỹ Hưng",
                                "Xã Mỹ Long",
                                "Xã Mỹ Xuyên",
                                "Xã Lạc Tấn",
                                "Xã Phú Tân",
                                "Xã Quảng Xuyên"
                            ],
                            "Huyện Long Phú": [
                                "Thị trấn Long Phú",
                                "Xã Châu Thành",
                                "Xã Hòa Thuận",
                                "Xã Lạc Hòa",
                                "Xã Long Phú",
                                "Xã Thạnh Quới",
                                "Xã Vĩnh Thạnh"
                            ],
                            "Huyện Trần Đề": [
                                "Thị trấn Trần Đề",
                                "Xã Long Bình",
                                "Xã Định Thành",
                                "Xã Tài Văn",
                                "Xã Phú Tâm",
                                "Xã Mỹ Tú",
                                "Xã Ngọc Tố",
                                "Xã Hòa Tú"
                            ],
                            "Huyện Vĩnh Châu": [
                                "Thị trấn Vĩnh Châu",
                                "Xã Vĩnh Hiệp",
                                "Xã Vĩnh Hải",
                                "Xã Vĩnh Phú",
                                "Xã Tân Thạnh",
                                "Xã Bình An",
                                "Xã Hoà Phú",
                                "Xã Hòa Bình"
                            ]
                        },
                        "Vĩnh Long": {
                            "Thành phố Vĩnh Long": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Xã Long Phước"
                            ],
                            "Huyện Long Hồ": [
                                "Thị trấn Long Hồ",
                                "Xã Bình Hòa Phước",
                                "Xã Bình Minh",
                                "Xã Phú Quới",
                                "Xã Long Phú",
                                "Xã Long An",
                                "Xã Long Mỹ",
                                "Xã Tân Hạnh",
                                "Xã Hòa Ninh"
                            ],
                            "Huyện Mang Thít": [
                                "Thị trấn Cái Nhum",
                                "Xã Mỹ An",
                                "Xã Mỹ Hòa",
                                "Xã Tân An",
                                "Xã Long Mỹ",
                                "Xã Mang Thít",
                                "Xã Trung Hiệp",
                                "Xã Trung Ngãi",
                                "Xã Tân Ngãi"
                            ],
                            "Huyện Vũng Liêm": [
                                "Thị trấn Vũng Liêm",
                                "Xã Hiệp Hòa",
                                "Xã Hiếu Tử",
                                "Xã Lương Hòa",
                                "Xã Ngãi Tứ",
                                "Xã Vĩnh Bình",
                                "Xã Vĩnh Lộc",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Trà Ôn": [
                                "Thị trấn Trà Ôn",
                                "Xã Cái Nhum",
                                "Xã Hòa Bình",
                                "Xã Lục Sĩ Thành",
                                "Xã Phú Thành",
                                "Xã Tân An",
                                "Xã Trà Sơn",
                                "Xã Thuận Bình",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Tam Bình": [
                                "Thị trấn Tam Bình",
                                "Xã Bình Ninh",
                                "Xã Bình Phước",
                                "Xã Hòa Bình",
                                "Xã Tân Lộc",
                                "Xã Tân Thành",
                                "Xã Phú Lộc",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Vĩnh Thạnh": [
                                "Xã Vĩnh Long",
                                "Xã Vĩnh Phú",
                                "Xã Vĩnh Trà",
                                "Xã Vĩnh Tân",
                                "Xã Vĩnh Xuân"
                            ]
                        },
                        "Vĩnh Long": {
                            "Thành phố Vĩnh Long": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Xã Long Phước"
                            ],
                            "Huyện Long Hồ": [
                                "Thị trấn Long Hồ",
                                "Xã Bình Hòa Phước",
                                "Xã Bình Minh",
                                "Xã Phú Quới",
                                "Xã Long Phú",
                                "Xã Long An",
                                "Xã Long Mỹ",
                                "Xã Tân Hạnh",
                                "Xã Hòa Ninh"
                            ],
                            "Huyện Mang Thít": [
                                "Thị trấn Cái Nhum",
                                "Xã Mỹ An",
                                "Xã Mỹ Hòa",
                                "Xã Tân An",
                                "Xã Long Mỹ",
                                "Xã Mang Thít",
                                "Xã Trung Hiệp",
                                "Xã Trung Ngãi",
                                "Xã Tân Ngãi"
                            ],
                            "Huyện Vũng Liêm": [
                                "Thị trấn Vũng Liêm",
                                "Xã Hiệp Hòa",
                                "Xã Hiếu Tử",
                                "Xã Lương Hòa",
                                "Xã Ngãi Tứ",
                                "Xã Vĩnh Bình",
                                "Xã Vĩnh Lộc",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Trà Ôn": [
                                "Thị trấn Trà Ôn",
                                "Xã Cái Nhum",
                                "Xã Hòa Bình",
                                "Xã Lục Sĩ Thành",
                                "Xã Phú Thành",
                                "Xã Tân An",
                                "Xã Trà Sơn",
                                "Xã Thuận Bình",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Tam Bình": [
                                "Thị trấn Tam Bình",
                                "Xã Bình Ninh",
                                "Xã Bình Phước",
                                "Xã Hòa Bình",
                                "Xã Tân Lộc",
                                "Xã Tân Thành",
                                "Xã Phú Lộc",
                                "Xã Vĩnh Long"
                            ],
                            "Huyện Vĩnh Thạnh": [
                                "Xã Vĩnh Long",
                                "Xã Vĩnh Phú",
                                "Xã Vĩnh Trà",
                                "Xã Vĩnh Tân",
                                "Xã Vĩnh Xuân"
                            ]
                        },
                        "Long An": {
                            "Thành phố Tân An": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Phường 9",
                                "Xã An Vĩnh Ngãi",
                                "Xã Tân Hòa",
                                "Xã Bình Tâm"
                            ],
                            "Huyện Bến Lức": [
                                "Thị trấn Bến Lức",
                                "Xã An Thạnh",
                                "Xã Bình Đức",
                                "Xã Bình Tịnh",
                                "Xã Lương Hòa",
                                "Xã Mỹ Yên",
                                "Xã Nhựt Chánh",
                                "Xã Phước Lý",
                                "Xã Thanh Phú"
                            ],
                            "Huyện Cần Đước": [
                                "Thị trấn Cần Đước",
                                "Xã An Lục Long",
                                "Xã Bình Lãng",
                                "Xã Đông Thạnh",
                                "Xã Long Hậu",
                                "Xã Tân Kim",
                                "Xã Tân Phú",
                                "Xã Phước Tuy",
                                "Xã Trường Hòa"
                            ],
                            "Huyện Cần Giuộc": [
                                "Thị trấn Cần Giuộc",
                                "Xã An Thạnh",
                                "Xã Bình Hòa",
                                "Xã Long An",
                                "Xã Long Hậu",
                                "Xã Phước Lý",
                                "Xã Tân Tập",
                                "Xã Tân An",
                                "Xã Tân Hòa"
                            ],
                            "Huyện Đức Hòa": [
                                "Thị trấn Đức Hòa",
                                "Xã An Ninh Đông",
                                "Xã An Ninh Tây",
                                "Xã Bình Hiệp",
                                "Xã Đức Hòa Đông",
                                "Xã Đức Lập Hạ",
                                "Xã Đức Lập Thượng",
                                "Xã Hòa Khánh Tây",
                                "Xã Hậu Nghĩa",
                                "Xã Mỹ Hạnh Bắc",
                                "Xã Mỹ Hạnh Nam"
                            ],
                            "Huyện Đức Huệ": [
                                "Thị trấn Đông Thành",
                                "Xã Bình Hòa Hưng",
                                "Xã Đức Huệ",
                                "Xã Mỹ Quý Đông",
                                "Xã Mỹ Quý Tây",
                                "Xã Thuận Bình",
                                "Xã Thạnh Hưng",
                                "Xã Hòa Hưng"
                            ],
                            "Huyện Mộc Hóa": [
                                "Thị trấn Mộc Hóa",
                                "Xã Bình Hòa",
                                "Xã Khánh Hưng",
                                "Xã Thạnh An",
                                "Xã Tân Hưng"
                            ],
                            "Huyện Tân Hưng": [
                                "Thị trấn Tân Hưng",
                                "Xã Bình Hiệp",
                                "Xã Hòa Hội",
                                "Xã Hòa Khánh",
                                "Xã Hưng Điền",
                                "Xã Tân Lập",
                                "Xã Tân Thạnh",
                                "Xã Vĩnh Thuận"
                            ],
                            "Huyện Thủ Thừa": [
                                "Thị trấn Thủ Thừa",
                                "Xã Bình Thành",
                                "Xã Hòa Phú",
                                "Xã Mỹ Thạnh",
                                "Xã Thủ Thừa",
                                "Xã Tân Lợi",
                                "Xã Tân Thành"
                            ],
                            "Huyện Tân Trụ": [
                                "Thị trấn Tân Trụ",
                                "Xã Bình Lợi",
                                "Xã Bình Tâm",
                                "Xã Long Sơn",
                                "Xã Nhị Thành",
                                "Xã Quê Mỹ Thạnh",
                                "Xã Tân Trụ"
                            ],
                            "Huyện Vĩnh Hưng": [
                                "Thị trấn Vĩnh Hưng",
                                "Xã Hưng Điền B",
                                "Xã Vĩnh Hưng",
                                "Xã Vĩnh Châu"
                            ]
                        },
                        "Bến Tre": {
                            "Thành phố Bến Tre": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Xã An Khánh",
                                "Xã An Hòa",
                                "Xã Sơn Đông"
                            ],
                            "Huyện Ba Tri": [
                                "Thị trấn Ba Tri",
                                "Xã An Ngãi",
                                "Xã An Thủy",
                                "Xã Bảo Thạnh",
                                "Xã Châu Hòa",
                                "Xã Hưng Phong",
                                "Xã Long Mỹ",
                                "Xã Mỹ Thạnh",
                                "Xã Phú Lễ",
                                "Xã Tân Thủy",
                                "Xã Vĩnh Hòa"
                            ],
                            "Huyện Bình Đại": [
                                "Thị trấn Bình Đại",
                                "Xã Bình Thắng",
                                "Xã Châu Hưng",
                                "Xã Đại Hòa Lộc",
                                "Xã Định Trung",
                                "Xã Phước Hiệp",
                                "Xã Phước Ngãi",
                                "Xã Vang Quới",
                                "Xã Vang Quới Tây",
                                "Xã Thừa Đức",
                                "Xã Long Hòa"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Châu Thành",
                                "Xã An Hiệp",
                                "Xã An Hòa",
                                "Xã Bình Thới",
                                "Xã Hòa Lợi",
                                "Xã Lương Quới",
                                "Xã Tân Thạch",
                                "Xã Quới Sơn",
                                "Xã Thanh Bình"
                            ],
                            "Huyện Giồng Trôm": [
                                "Thị trấn Giồng Trôm",
                                "Xã Bình Hòa",
                                "Xã Bình Thành",
                                "Xã Lương Phú",
                                "Xã Long Mỹ",
                                "Xã Mỹ Thạnh An",
                                "Xã Tân Hào",
                                "Xã Tân Thanh",
                                "Xã Thạnh Phú"
                            ],
                            "Huyện Mỏ Cày Nam": [
                                "Thị trấn Mỏ Cày",
                                "Xã An Thạnh",
                                "Xã Cẩm Sơn",
                                "Xã Hòa Lộc",
                                "Xã Hòa Nghĩa",
                                "Xã Hương Mỹ",
                                "Xã Khánh Thạnh Tân",
                                "Xã Lương Quới",
                                "Xã Minh Đức",
                                "Xã Thạnh Ngãi"
                            ],
                            "Huyện Mỏ Cày Bắc": [
                                "Thị trấn Mỏ Cày Bắc",
                                "Xã An Phước",
                                "Xã Bình Khánh Tây",
                                "Xã Cẩm Sơn",
                                "Xã Hòa Lộc",
                                "Xã Hòa Nghĩa",
                                "Xã Hương Mỹ",
                                "Xã Lương Quới",
                                "Xã Thạnh Ngãi"
                            ],
                            "Huyện Thạnh Phú": [
                                "Thị trấn Thạnh Phú",
                                "Xã An Nhơn",
                                "Xã An Quảng Hữu",
                                "Xã Bình Thạnh",
                                "Xã Châu Hòa",
                                "Xã Lương Hòa",
                                "Xã Phú Khánh",
                                "Xã Thạnh Hải",
                                "Xã Mỹ Thạnh"
                            ],
                            "Huyện Chợ Lách": [
                                "Thị trấn Chợ Lách",
                                "Xã Bình Khánh",
                                "Xã Châu Thành",
                                "Xã Hưng Khánh Trung A",
                                "Xã Hưng Khánh Trung B",
                                "Xã Lương Hòa",
                                "Xã Sơn Định",
                                "Xã Tân Thạnh",
                                "Xã Vĩnh Hòa"
                            ]
                        },
                        "Cà Mau": {
                            "Thành phố Cà Mau": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Phường 9",
                                "Phường 10",
                                "Xã An Xuyên",
                                "Xã Lý Văn Lâm",
                                "Xã Tân Xuyên",
                                "Xã Hòa Tân",
                                "Xã Hòa Thành"
                            ],
                            "Huyện Cái Nước": [
                                "Thị trấn Cái Nước",
                                "Xã An Nhơn",
                                "Xã Đông Hưng",
                                "Xã Hưng Mỹ",
                                "Xã Lợi An",
                                "Xã Phú Hưng",
                                "Xã Tân Hưng",
                                "Xã Trần Văn Thời",
                                "Xã Thạnh Phú"
                            ],
                            "Huyện Đầm Dơi": [
                                "Thị trấn Đầm Dơi",
                                "Xã Tân Dân",
                                "Xã Ngọc Chánh",
                                "Xã Quách Phẩm Bắc",
                                "Xã Quách Phẩm Nam",
                                "Xã Tân Đức",
                                "Xã Trần Thới",
                                "Xã Lộc An"
                            ],
                            "Huyện Năm Căn": [
                                "Thị trấn Năm Căn",
                                "Xã Hàng Vịnh",
                                "Xã Lý Văn Lâm",
                                "Xã Tân Thạnh",
                                "Xã Thanh Tâm",
                                "Xã Tân Hưng"
                            ],
                            "Huyện Phú Tân": [
                                "Thị trấn Phú Tân",
                                "Xã Phú Hưng",
                                "Xã Phú Mỹ",
                                "Xã Rạch Chèo",
                                "Xã Tân Hải",
                                "Xã Tân Lộc",
                                "Xã Thới Bình"
                            ],
                            "Huyện Thới Bình": [
                                "Thị trấn Thới Bình",
                                "Xã Biển Bạch",
                                "Xã Thới Bình",
                                "Xã Tân Lộc",
                                "Xã Hòa Bình",
                                "Xã Tam Giang"
                            ],
                            "Huyện Trần Văn Thời": [
                                "Thị trấn Trần Văn Thời",
                                "Xã An Minh Bắc",
                                "Xã An Minh",
                                "Xã Phú Thuận",
                                "Xã Phú Mỹ",
                                "Xã Minh Hòa"
                            ],
                            "Huyện U Minh": [
                                "Thị trấn U Minh",
                                "Xã Khánh Hòa",
                                "Xã Khánh An",
                                "Xã Khánh Lâm",
                                "Xã Khánh Thuận",
                                "Xã Tân Lộc",
                                "Xã Tân Lập"
                            ],
                            "Huyện Vĩnh Thuận": [
                                "Thị trấn Vĩnh Thuận",
                                "Xã Bình Minh",
                                "Xã Tân Thuận",
                                "Xã Vĩnh Bình Bắc",
                                "Xã Vĩnh Bình Nam",
                                "Xã Vĩnh Phong",
                                "Xã Vĩnh Thuận",
                                "Xã Phong Đông"
                            ]
                        },
                        "Đồng Tháp": {
                            "Thành phố Cao Lãnh": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Phường 6",
                                "Phường 7",
                                "Phường 8",
                                "Phường 9",
                                "Xã An Bình",
                                "Xã Tân Thuận Đông",
                                "Xã Tân Thuận Tây"
                            ],
                            "Thành phố Sa Đéc": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 4",
                                "Phường 5",
                                "Xã Tân Phú Đông",
                                "Xã Tân Quy Đông"
                            ],
                            "Huyện Cao Lãnh": [
                                "Thị trấn Cao Lãnh",
                                "Xã An Bình A",
                                "Xã An Bình B",
                                "Xã Bàu Sen",
                                "Xã Hòa An",
                                "Xã Mỹ Hòa",
                                "Xã Tân Hòa",
                                "Xã Tân Phú Đông",
                                "Xã Tân Thuận Tây"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Cái Tắc",
                                "Xã Bình Thạnh",
                                "Xã Bình Đức",
                                "Xã An Nhơn",
                                "Xã Châu Thành A",
                                "Xã Láng Biển",
                                "Xã Tân Mỹ"
                            ],
                            "Huyện Hồng Ngự": [
                                "Thị trấn Hồng Ngự",
                                "Xã An Lộc",
                                "Xã An Long",
                                "Xã Bình Hòa",
                                "Xã Bình Phú",
                                "Xã Tân Hòa",
                                "Xã Tân Trung"
                            ],
                            "Huyện Lai Vung": [
                                "Thị trấn Lai Vung",
                                "Xã Long Hậu",
                                "Xã Tân Hưng",
                                "Xã Tân Phú",
                                "Xã Tân Thành",
                                "Xã Vĩnh Thới"
                            ],
                            "Huyện Lấp Vò": [
                                "Thị trấn Lấp Vò",
                                "Xã Bình Thạnh",
                                "Xã Bình Thạnh Trung",
                                "Xã Long Thạnh",
                                "Xã Lộc An",
                                "Xã Tân Bình"
                            ],
                            "Huyện Tam Nông": [
                                "Thị trấn Tam Nông",
                                "Xã An Long",
                                "Xã Phú Thọ",
                                "Xã Tân Hòa",
                                "Xã Thường Thới Hậu A",
                                "Xã Thường Thới Hậu B"
                            ],
                            "Huyện Tháp Mười": [
                                "Thị trấn Tháp Mười",
                                "Xã Hòa Tân",
                                "Xã Lê Minh Xuân",
                                "Xã Mỹ Đông",
                                "Xã Tân Khánh Đông",
                                "Xã Tân Khánh Tây"
                            ],
                            "Huyện Thanh Bình": [
                                "Thị trấn Thanh Bình",
                                "Xã Bình Tấn",
                                "Xã Hòa Bình",
                                "Xã Tân Hưng",
                                "Xã Tân Phú"
                            ]
                        },
                        "Hậu Giang": {
                            "Thành phố Vị Thanh": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Phường 5",
                                "Phường 7",
                                "Phường 8",
                                "Phường 9",
                                "Xã Hỏa Tiến",
                                "Xã Tân Tiến",
                                "Xã Vĩnh Tường"
                            ],
                            "Thành phố Ngã Bảy": [
                                "Phường 1",
                                "Phường 2",
                                "Phường 3",
                                "Xã Đại Thành",
                                "Xã Hòa An",
                                "Xã Phú Hữu"
                            ],
                            "Huyện Châu Thành": [
                                "Thị trấn Ngã Bảy",
                                "Xã An Ninh",
                                "Xã Đông Phước",
                                "Xã Hòa Mỹ",
                                "Xã Long Phú",
                                "Xã Phú Tân",
                                "Xã Tân Hòa",
                                "Xã Tân Long"
                            ],
                            "Huyện Long Mỹ": [
                                "Thị trấn Long Mỹ",
                                "Xã Long Bình",
                                "Xã Long Hưng",
                                "Xã Lương Tâm",
                                "Xã Phú Tân",
                                "Xã Tân Phú"
                            ],
                            "Huyện Phụng Hiệp": [
                                "Thị trấn Bảy Ngàn",
                                "Xã Châu Thành A",
                                "Xã Châu Thành B",
                                "Xã Hiệp Hưng",
                                "Xã Long Thạnh",
                                "Xã Phụng Hiệp",
                                "Xã Tân Long"
                            ],
                            "Huyện Vị Thuỷ": [
                                "Thị trấn Vị Thuỷ",
                                "Xã Vị Bình",
                                "Xã Vị Đông",
                                "Xã Vị Thanh",
                                "Xã Vĩnh Tường",
                                "Xã Tân Thạnh"
                            ]
                        },
                        "Cần Thơ": {
                            "Quận Ninh Kiều": [
                                "Phường An Khánh",
                                "Phường An Lạc",
                                "Phường An Hòa",
                                "Phường Cái Khế",
                                "Phường Cái Răng",
                                "Phường Hưng Phú",
                                "Phường Tân An",
                                "Phường Tân Hưng",
                                "Phường Thới Bình"
                            ],
                            "Quận Bình Thủy": [
                                "Phường Bình Thủy",
                                "Phường Long Hòa",
                                "Phường Trà Nóc",
                                "Phường Thới An",
                                "Xã Phú Thứ",
                                "Xã Thới Thuận"
                            ],
                            "Quận Cái Răng": [
                                "Phường Cái Răng",
                                "Phường Hưng Phú",
                                "Phường Lê Bình",
                                "Phường Tân Phú",
                                "Phường Tân An",
                                "Phường Thới An",
                                "Xã Phú An"
                            ],
                            "Quận Ô Môn": [
                                "Phường Châu Văn Liêm",
                                "Phường Thới Long",
                                "Phường Trường Lạc",
                                "Phường Trường Thắng",
                                "Phường Trường An"
                            ],
                            "Huyện Bình Tân": [
                                "Xã Bình Mỹ",
                                "Xã Thới Tân",
                                "Xã Tân Phú",
                                "Xã Vĩnh Bình"
                            ],
                            "Huyện Cờ Đỏ": [
                                "Xã Thạnh Lộc",
                                "Xã Thạnh Phú",
                                "Xã Thới Hòa",
                                "Xã Tân Hòa",
                                "Xã Tân Phú"
                            ],
                            "Huyện Phong Điền": [
                                "Xã Phú Mỹ",
                                "Xã Phú Thứ",
                                "Xã Tân Long",
                                "Xã Tân Lộc",
                                "Xã Tân Hưng"
                            ],
                            "Huyện Thốt Nốt": [
                                "Xã An Thạnh",
                                "Xã An Hòa",
                                "Xã Tân Hòa",
                                "Xã Thới Hòa",
                                "Xã Tân An"
                            ],
                            "Huyện Vĩnh Thạnh": [
                                "Xã Bình Thạnh",
                                "Xã Vĩnh Trinh",
                                "Xã Thới Hòa",
                                "Xã Thới Thuận"
                            ]
                        }


                    };


                    // Populate provinces
                    var provinceSelect = document.getElementById('province');
                    for (var province in locationsData) {
                        var option = document.createElement('option');
                        option.value = province;
                        option.textContent = province;
                        provinceSelect.appendChild(option);
                    }

                    // Update districts when a province is selected
                    provinceSelect.addEventListener('change', function() {
                        var districtSelect = document.getElementById('district');
                        var wardSelect = document.getElementById('ward');

                        // Clear current options
                        districtSelect.innerHTML = '<option value="">Chọn huyện</option>';
                        wardSelect.innerHTML = '<option value="">Chọn phường</option>';

                        var selectedProvince = this.value;
                        if (selectedProvince) {
                            var districts = locationsData[selectedProvince];
                            for (var district in districts) {
                                var option = document.createElement('option');
                                option.value = district;
                                option.textContent = district;
                                districtSelect.appendChild(option);
                            }
                        }
                    });

                    // Update wards when a district is selected
                    document.getElementById('district').addEventListener('change', function() {
                        var wardSelect = document.getElementById('ward');

                        // Clear current options
                        wardSelect.innerHTML = '<option value="">Chọn phường</option>';

                        var selectedProvince = document.getElementById('province').value;
                        var selectedDistrict = this.value;

                        if (selectedProvince && selectedDistrict) {
                            var wards = locationsData[selectedProvince][selectedDistrict];
                            wards.forEach(function(ward) {
                                var option = document.createElement('option');
                                option.value = ward;
                                option.textContent = ward;
                                wardSelect.appendChild(option);
                            });
                        }
                    });
                });
            </script>
        </body>

        </html>
<?php
    }
}
