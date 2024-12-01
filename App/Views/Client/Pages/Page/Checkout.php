<?php

namespace App\Views\Client\Pages\Page;

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

                    <form action="/pay" method="POST">
                        <input type="hidden" name="method" value="POST">
                        <!-- Thanh toán Bắt đầu -->
                        <div class="container-fluid pt-5">
                            <div class="row px-xl-5">
                                <div class="col-lg-8">
                                    <div class="mb-4">
                                        <h4 class="font-weight-semi-bold mb-4">Địa chỉ</h4>
                                        <div class="row">
                                            <!-- Address fields -->
                                            <div class="col-md-6 form-group">
                                                <label>Họ</label>
                                                <input class="form-control" type="text" name="first_name" placeholder="Nhập họ" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Tên</label>
                                                <input class="form-control" type="text" name="last_name" placeholder="Nhập tên" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Nhập email" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" type="tel" name="phone" placeholder="+84 123 456 789" required>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <!-- Order info card -->
                                    <div class="card border-light shadow-sm mb-5">
                                        <div class="card-header bg-light border-0">
                                            <h4 class="font-weight-semi-bold m-0">Thông tin đơn hàng</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $index = 0;
                                            foreach ($data as $item):
                                                $index += $item['price'] * $item['quantity'];
                                            ?>
                                                <div class="card-footer border-light bg-transparent">
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <h6 class="font-weight-bold" style="display: inline-block; width: 100px;">Tên:</h6>
                                                        <h6 style="display: inline-block;"><?= htmlspecialchars($item['name']) ?></h6>
                                                        <input type="hidden" name="name" id="name" value="<?= $item['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="card-footer border-light bg-transparent">
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <h6 class="font-weight-bold">Số lượng: <?= $item['quantity'] ?></h6>
                                                        <input type="hidden" name="quantity" id="quantity" value="<?= $item['quantity'] ?>">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                            <hr class="mt-0">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                                <h6 class="font-weight-medium">0 đ</h6>
                                            </div>
                                        </div>

                                        <div class="card-footer border-light bg-transparent">
                                            <div class="d-flex justify-content-between mt-2">
                                                <h5 class="font-weight-bold">Tổng cộng</h5>
                                                <input type="hidden" name="total_price" id="total_price" value="<?= $index ?>">
                                                <h5 class="font-weight-bold"><?= number_format($index, 0, ',', ',') ?> VND</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment options -->
                                    <div class="card border-light shadow-sm mb-5">
                                        <div class="card-header bg-light border-0">
                                            <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                                        </div>
                                        <div class="payment-options">
                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="in-store" class="custom-radio">
                                                <label for="in-store">
                                                    <div class="option-content">
                                                        <span class="icon"><i class="fas fa-store"></i></span>
                                                        <span class="text">Thanh toán khi nhận hàng</span>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="zalopay" class="custom-radio">
                                                <label for="zalopay">
                                                    <div class="option-content">
                                                        <img src="/public/uploads/checkout/zalopay.png" alt="ZaloPay" class="logo">
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="vnpay" class="custom-radio">
                                                <label for="vnpay">
                                                    <div class="option-content">
                                                        <img src="/public/uploads/checkout/vnpay.png" alt="Vnpay" class="logo">
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="payment-option">
                                                <input type="radio" name="payment" id="banktransfer" class="custom-radio">
                                                <label for="banktransfer">
                                                    <div class="option-content">
                                                        <span class="icon"><i class="fas fa-university"></i></span>
                                                        <span class="text">Chuyển khoản ngân hàng</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="card-footer border-light bg-transparent">
                                            <button id="checkout-button" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán ngay</button>
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
                document.addEventListener('DOMContentLoaded', function() {
                    // Giả sử bạn đã tải dữ liệu JSON vào `locationsData`
                    var locationsData = {
                        "Hà Nội": {
                            "Ba Đình": ["Phường Cống Vị", "Phường Điện Biên", "Phường Đội Cấn"],
                            "Cầu Giấy": ["Phường Dịch Vọng", "Phường Mai Dịch", "Phường Yên Hòa"]
                        },
                        "Hồ Chí Minh": {
                            "Quận 1": ["Phường Bến Nghé", "Phường Bến Thành", "Phường Cô Giang"],
                            "Quận 3": ["Phường Võ Thị Sáu", "Phường Đa Kao"]
                        },
                        "An Giang": {
                            "Tri Tôn": [
                                "Thị trấn Ba Chúc",
                                "Thị trấn Cô Tô",
                                "Thị trấn Tri Tôn",
                                " An Tức",
                                " Châu Lăng",
                                " Lạc Quới",
                                " Lê Trì",
                                " Lương An Trà",
                                " Lương Phi",
                                " Núi Tô",
                                " Ô Lâm",
                                " Tà Đảnh",
                                " Tân Tuyến",
                                " Vĩnh Gia",
                                " Vĩnh Phước"
                            ],
                            "Long Xuyên": [
                                "Phường Mỹ Quý",
                                "Phường Mỹ Hòa",
                                "Phường Bình Đức",
                                " Bình Long",
                                " Bình Thạnh",
                                " Mỹ Phú",
                                " Mỹ Thới"
                            ],
                            "Châu Đốc": [
                                "Phường Vĩnh Mỹ",
                                "Phường Núi Sam",
                                "Phường Châu Phú",
                                " An Hòa",
                                " Châu Phú",
                                " Vĩnh Tế",
                                " Vĩnh Ngươn"
                            ],
                            "Tân Châu": [
                                "Phường Long Châu",
                                "Phường Tân An",
                                "Phường Châu Phú",
                                " Vĩnh Hòa",
                                " Vĩnh Bình",
                                " Tân An",
                                " Long Phú"
                            ],
                            "Châu Thành": [
                                "Thị trấn Châu Thành",
                                " An Hòa",
                                " An Tân",
                                " Bình Hòa",
                                " Bình Tân",
                                " Hòa Lạc",
                                " Phú Lâm"
                            ],
                            "Tịnh Biên": [
                                "Thị trấn Tịnh Biên",
                                " An Cư",
                                " An Hảo",
                                " Vĩnh Trung",
                                " Vĩnh Thanh",
                                " Tân Lập"
                            ],
                            "Chợ Mới": [
                                "Thị trấn Chợ Mới",
                                " Bình Phú",
                                " Bình Mỹ",
                                " Hòa Bình",
                                " Mỹ Hòa",
                                " Long Điền A"
                            ],
                            "Thoại Sơn": [
                                "Thị trấn Núi Sập",
                                " An Hảo",
                                " Cây Dương",
                                " Vĩnh Hòa",
                                " Vĩnh Chánh",
                                " Thoại Giang"
                            ]
                        }




                        // Add more provinces, districts, and wards here
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
