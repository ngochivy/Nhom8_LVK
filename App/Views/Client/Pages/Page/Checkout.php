<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {

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

        <body>
            <div class="container-xxl bg-white p-0">

                <!-- Tiêu đề Trang Bắt đầu -->
                <div class="container bg-secondary mb-5" style="min-width: 100%;">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
                        <div class="d-inline-flex">
                            <p class="m-0"><a href="">Trang chủ</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Thanh toán</p>
                        </div>
                    </div>
                </div>
                <!-- Tiêu đề Trang Kết thúc -->

                <!-- Thanh toán Bắt đầu -->
                <div class="container-fluid pt-5">
                    <div class="row px-xl-5">
                        <div class="col-lg-8">
                            <div class="mb-4">
                                <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Họ</label>
                                        <input class="form-control" type="text" placeholder="Nguyễn">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tên</label>
                                        <input class="form-control" type="text" placeholder="Văn A">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" placeholder="example@email.com">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="text" placeholder="+84 123 456 789">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select id="province" class="form-control">
                                            <option value="">Chọn tỉnh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Huyện/Quận</label>
                                        <select id="district" class="form-control">
                                            <option value="">Chọn huyện</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Phường/Xã</label>
                                        <select id="ward" class="form-control">
                                            <option value="">Chọn phường</option>
                                        </select>
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label>Địa chỉ chi tiết</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-secondary mb-5">
                                <div class="card-header bg-secondary border-0">
                                    <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                                    <div class="d-flex justify-content-between">
                                        <p>Bàn chải điện Xiaomi</p>
                                        <p>280,000đ</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Bếp lẩu nướng đa năng</p>
                                        <p>950,000đ</p>
                                    </div>
                                    <div class="row d-flex justify-content-between">
                                        <p class="col-6">Chuông cửa thông minh Xiaomi</p>
                                        <p class="col-4" style="text-align:right;">1,100,000đ</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Bộ sạc 5 cổng USB</p>
                                        <p>270,000đ</p>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="d-flex justify-content-between mb-3 pt-1">
                                        <h6 class="font-weight-medium">Tạm tính</h6>
                                        <h6 class="font-weight-medium">2,600,000 đ</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                        <h6 class="font-weight-medium">0 đ</h6>
                                    </div>
                                </div>
                                <div class="card-footer border-secondary bg-transparent">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5 class="font-weight-bold">Tổng cộng</h5>
                                        <h5 class="font-weight-bold">2,600,000 đ</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-secondary mb-5">
                                <div class="card-header bg-secondary border-0">
                                    <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                            <label class="custom-control-label" for="paypal">Ví điện tử (Momo, VNPay,...)</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                            <label class="custom-control-label" for="directcheck">Chuyển khoản trực tiếp</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                            <label class="custom-control-label" for="banktransfer">Chuyển khoản ngân hàng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-secondary bg-transparent">
                                    <button id="checkout-button" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thanh toán Kết thúc -->

            </div>
            <!-- Alert thông báo -->
            <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; display: none; z-index: 1050;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Đặt hàng thành công!
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Gọi API để lấy danh sách các tỉnh khi trang được tải lần đầu
                    $.get('https://provinces.open-api.vn/api/p', function(data) {
                        console.log(data); // Kiểm tra dữ liệu trả về
                        $('#province').empty().append(new Option('Chọn tỉnh', ''));

                        // Thêm các tỉnh vào dropdown
                        if (data && data.length > 0) {
                            data.forEach(function(province) {
                                $('#province').append(new Option(province.name, province.code));
                            });
                        } else {
                            $('#province').append(new Option('Không có tỉnh', ''));
                        }
                    });

                    // Khi người dùng chọn tỉnh
                    $('#province').change(function() {
                        var provinceCode = $(this).val();
                        console.log('Province Code:', provinceCode); // Kiểm tra mã tỉnh

                        if (provinceCode) {
                            // Gọi API lấy huyện
                            $.get('https://provinces.open-api.vn/api/p/' + provinceCode + '/d', function(data) {
                                console.log(data); // Kiểm tra dữ liệu trả về

                                // Xử lý huyện
                                $('#district').empty().append(new Option('Chọn huyện', ''));
                                if (data && data.length > 0) {
                                    data.forEach(function(district) {
                                        $('#district').append(new Option(district.name, district.code));
                                    });
                                } else {
                                    $('#district').append(new Option('Không có huyện', ''));
                                }
                            });
                        } else {
                            $('#district').empty().append(new Option('Chọn huyện', ''));
                            $('#ward').empty().append(new Option('Chọn phường', ''));
                        }
                    });

                    // Khi người dùng chọn huyện
                    $('#district').change(function() {
                        var districtCode = $(this).val();
                        console.log('District Code:', districtCode); // Kiểm tra mã huyện

                        if (districtCode) {
                            // Gọi API lấy phường
                            $.get('https://provinces.open-api.vn/api/d/' + districtCode + '/w', function(data) {
                                console.log(data); // Kiểm tra dữ liệu trả về

                                // Xử lý phường/xã
                                $('#ward').empty().append(new Option('Chọn phường', ''));
                                if (data && data.length > 0) {
                                    data.forEach(function(ward) {
                                        $('#ward').append(new Option(ward.name, ward.code));
                                    });
                                } else {
                                    $('#ward').append(new Option('Không có phường', ''));
                                }
                            });
                        } else {
                            $('#ward').empty().append(new Option('Chọn phường', ''));
                        }
                    });
                });
            </script>
        </body>

        </html>
<?php
    }
}
