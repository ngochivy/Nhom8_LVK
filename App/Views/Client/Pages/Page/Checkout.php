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
                <div class="container-fluid bg-secondary mb-5">
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
                                        <label>Địa chỉ 1</label>
                                        <input class="form-control" type="text" placeholder="123 Đường ABC">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Địa chỉ 2</label>
                                        <input class="form-control" type="text" placeholder="Tòa nhà XYZ">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Quốc gia</label>
                                        <select class="custom-select">
                                            <option selected>Việt Nam</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Thành phố</label>
                                        <input class="form-control" type="text" placeholder="Hà Nội">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <input class="form-control" type="text" placeholder="Hà Nội">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mã ZIP</label>
                                        <input class="form-control" type="text" placeholder="100000">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Tạo tài khoản mới</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Gửi đến địa chỉ khác</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mb-4" id="shipping-address">
                                <h4 class="font-weight-semi-bold mb-4">Địa chỉ nhận hàng</h4>
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
                                        <label>Địa chỉ 1</label>
                                        <input class="form-control" type="text" placeholder="123 Đường ABC">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Địa chỉ 2</label>
                                        <input class="form-control" type="text" placeholder="Tòa nhà XYZ">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Quốc gia</label>
                                        <select class="custom-select">
                                            <option selected>Việt Nam</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Thành phố</label>
                                        <input class="form-control" type="text" placeholder="Hà Nội">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <input class="form-control" type="text" placeholder="Hà Nội">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mã ZIP</label>
                                        <input class="form-control" type="text" placeholder="100000">
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
                                        <p>Áo sơ mi 1</p>
                                        <p>$150</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Áo sơ mi 2</p>
                                        <p>$150</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Áo sơ mi 3</p>
                                        <p>$150</p>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="d-flex justify-content-between mb-3 pt-1">
                                        <h6 class="font-weight-medium">Tạm tính</h6>
                                        <h6 class="font-weight-medium">$150</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                        <h6 class="font-weight-medium">$10</h6>
                                    </div>
                                </div>
                                <div class="card-footer border-secondary bg-transparent">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5 class="font-weight-bold">Tổng cộng</h5>
                                        <h5 class="font-weight-bold">$160</h5>
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
                                            <label class="custom-control-label" for="paypal">PayPal</label>
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


            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGSKkqdYupqj7c39Q2NUmewilKxN0qxF0epwS4cXALYMzKG9" crossorigin="anonymous"></script>
            <script src="/public/assets/client/js/main.js"></script>
            <a href="#" class="btn btn-primary back-to-top" style="display: none; opacity: 0.754003;"><i class="fa fa-angle-double-up"></i></a>
            <script>
                document.getElementById('checkout-button').addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn không cho chuyển trang ngay lập tức

                    // Hiển thị alert thông báo
                    const alertBox = document.getElementById('success-alert');
                    alertBox.style.display = 'block';

                    // Đặt thời gian để tự động chuyển về trang chủ sau khi hiển thị thông báo
                    setTimeout(function() {
                        window.location.href = '/'; // Chuyển về trang chủ
                    }, 1000); // 2000ms tương ứng với 2 giây
                });
            </script>
        </body>
<?php }
}
