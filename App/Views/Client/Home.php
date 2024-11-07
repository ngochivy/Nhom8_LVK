<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>

        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>LVK - Cửa Hàng Tiện Ích Gia Đình</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                /* Custom styles for a more dynamic homepage */
                .banner {
                    background-image: url('https://sanhangre.net/image/data/danhmuc/2018/do-tien-ich.jpg');
                    /* Example image */
                    background-size: cover;
                    background-position: center;
                    height: 500px;
                    position: relative;
                    color: white;
                    box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.6);
                }

                .banner .overlay {
                    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    text-align: center;
                }

                .section {
                    padding: 50px 0;
                }

                .promotion-banner {
                    background-color: #f8d7da;
                    color: #721c24;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease;
                }

                .promotion-banner:hover {
                    transform: translateY(-5px);
                }

                .intro-section,
                .about-section,
                .contact-section {
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }

                /* Image Section */
                .image-gallery img {
                    width: 100%;
                    height: auto;
                    border-radius: 10px;
                }

                /* Hover effect on buttons */
                .btn-light {
                    transition: transform 0.2s ease;
                }

                .btn-light:hover {
                    transform: scale(1.05);
                }
            </style>
        </head>

        <body>

            <!-- Banner Section -->
            <section class="banner">
                <div class="overlay">
                    <h1 class="display-4">Cửa Hàng Tiện Ích Gia Đình LVK</h1>
                    <p class="lead">Sản phẩm thiết yếu cho mọi gia đình</p>
                    <a href="products" class="btn btn-light">Mua Ngay</a>
                </div>
            </section>

            <!-- About Us Section -->
            <section class="about-section container col text-center my-5">
                <div class="col-12 p-3 d-flex align-items-center">
                    <div class="col-6">
                        <h2>Giới Thiệu Về Chúng Tôi</h2>
                        <p class="lead">Tại LVK, chúng tôi cung cấp những sản phẩm tiện ích gia đình chất lượng cao để giúp công việc hàng ngày của bạn trở nên dễ dàng hơn và thú vị hơn.</p>
                        <p>Khám phá bộ sưu tập các sản phẩm thiết yếu cho gia đình của bạn, từ đồ dùng nhà bếp đến các dụng cụ vệ sinh, tất cả đều được thiết kế với chức năng và phong cách.</p>
                    </div>
                    <div class="col-6">
                        <img src="https://i.pinimg.com/564x/48/64/96/486496947fa9a1ce46a73d47c5969d1d.jpg" class="img-fluid" alt="...">
                    </div>
                </div>
            </section>


            <!-- Special Benefits Section -->
            <section class="section bg-light">
                <div class="container text-center">
                    <h2>Lý Do Nên Mua Hàng Tại LVK</h2>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h5><i class="bi bi-truck"></i> Vận Chuyển Miễn Phí</h5>
                            <p>Miễn phí vận chuyển cho mọi đơn hàng trên $50. Tiết kiệm chi phí vận chuyển cho khách hàng.</p>
                        </div>
                        <div class="col-md-4">
                            <h5><i class="bi bi-check-circle"></i> Sản Phẩm Chất Lượng Cao</h5>
                            <p>Các sản phẩm của chúng tôi được lựa chọn kỹ càng, đảm bảo chất lượng và độ bền cao.</p>
                        </div>
                        <div class="col-md-4">
                            <h5><i class="bi bi-headset"></i> Hỗ Trợ Khách Hàng 24/7</h5>
                            <p>Chúng tôi luôn sẵn sàng hỗ trợ khách hàng qua điện thoại và email bất cứ khi nào bạn cần.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Customer Feedback Section -->
            <section class="section bg-light">
                <div class="container text-center">
                    <h2>Ý Kiến Khách Hàng</h2>
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <img src="public/uploads/users/user1.jpeg" class="rounded-circle mb-3" alt="Profile Image" style="width: 150px; height: 150px;">
                            <p>"Dịch vụ tuyệt vời và sản phẩm rất chất lượng. Tôi sẽ tiếp tục mua sắm tại LVK!"</p>
                            <h5>- Minh Tú -</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="public/uploads/users/user3.jpeg" class="rounded-circle mb-3" alt="Profile Image" style="width: 150px; height: 150px;">
                            <p>"Đồ dùng gia đình tại LVK thực sự hữu ích và dễ sử dụng. Sẽ giới thiệu cho bạn bè!"</p>
                            <h5>- Lan Anh -</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="public/uploads/users/user2.jpeg" class="rounded-circle mb-3" alt="Profile Image" style="width: 150px; height: 150px; ">
                            <p>"Giao hàng nhanh chóng, sản phẩm chính hãng. Rất hài lòng với sự lựa chọn này!"</p>
                            <h5>- Đức Hoàng -</h5>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Blog Section -->
            <section class="section mb-5">
                <div class="container text-center">
                    <h2>Blog Tiện Ích Gia Đình</h2>
                    <p>Khám phá các bài viết hữu ích về tiện ích gia đình, mẹo vặt và cách lựa chọn sản phẩm phù hợp cho gia đình bạn.</p>
                    <div class="row">
                        <div class="col-md-4">
                        <img src="https://i.pinimg.com/564x/3b/43/8e/3b438e9e1cb5b30c3c66d9f30ba46d06.jpg" alt="Blog Post 1" class="img-fluid mb-3" style="width: 400px; height: 250px; object-fit: cover;">
                            <h5>5 Mẹo Vặt Giúp Bạn Tiết Kiệm Thời Gian</h5>
                            <p>Tìm hiểu những mẹo vặt đơn giản nhưng hiệu quả giúp bạn tiết kiệm thời gian trong công việc nhà.</p>
                        </div>
                        <div class="col-md-4">
                        <img src="https://i.pinimg.com/564x/36/2b/00/362b0054ed527890469ce25aa00a8deb.jpg" alt="Blog Post 1" class="img-fluid mb-3" style="width: 400px; height: 250px; object-fit: cover;">
                            <h5>Chọn Dụng Cụ Nhà Bếp Phù Hợp</h5>
                            <p>Hướng dẫn cách chọn lựa các dụng cụ nhà bếp phù hợp cho gia đình bạn, tiết kiệm và hiệu quả.</p>
                        </div>
                        <div class="col-md-4">
                        <img src="https://i.pinimg.com/736x/31/53/38/315338bc1679f3553dce8fd3fb9495a9.jpg" alt="Blog Post 1" class="img-fluid mb-3" style="width: 400px; height: 250px; object-fit: cover;">
                            <h5>Vệ Sinh Nhà Cửa Đúng Cách</h5>
                            <p>Các bước vệ sinh hiệu quả cho không gian sống của bạn, giúp gia đình bạn luôn sạch sẽ và thoải mái.</p>
                        </div>
                    </div>
                </div>
            </section>

           

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    }
}
