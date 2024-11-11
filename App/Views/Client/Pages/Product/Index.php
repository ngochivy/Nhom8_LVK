<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <title>LVK House - Shop</title>
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

        </head>

        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3" style="font-family:roboto;">Cửa hàng</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="/">Trang chủ</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Cửa hàng</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- product -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <!-- Shop Sidebar Start -->
                <div class="col-lg-3 col-md-12">
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Danh mục</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="?category=all" class="category-link">Tất cả</a>
                            </li>
                            <?php foreach ($data['categories'] as $category): ?>
                                <li class="mb-3">
                                    <a href="?category=<?= $category['id'] ?>" class="category-link"><?= $category['name'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>




                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-2" style="font-family:montserrat; font-weight:700;">Giá sản phẩm</h5>
                        <form method="GET">
                            <!-- Mức giá tối đa -->
                            <div class="form-group">
                                <label for="max_price"></label>
                                <input type="range" class="form-range" id="max_price" name="max_price" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 10000000; ?>" min="0" max="10000000" step="10000" onchange="updatePriceRange()">
                                <output id="max_price_output"><?php echo isset($_GET['max_price']) ? number_format($_GET['max_price'], 0, ',', '.') : number_format(10000000, 0, ',', '.'); ?></output> VND
                            </div>

                            <button type="submit" class="btn btn-primary">Áp dụng</button>
                        </form>
                    </div>


                </div>



                <!-- Shop Product Start -->
                <div class="col-lg-9 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by name">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Lọc
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phần hiển thị sản phẩm -->
                        <div class="col-md-12">
                            <?php if (count($data) && count($data['products'])) : ?>

                                <div class="row">
                                    <?php foreach ($data['products'] as $item) : ?>
                                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                            <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/<?= $item['id'] ?>'">
                                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    <img class="img-fluid w-100" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                                                </div>
                                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3" style="font-family:roboto;"><?= $item['name'] ?></h6>
                                                    <div class="d-flex justify-content-center">
                                                        <?php if ($item['discount_price'] > 0) : ?>
                                                            <h6><?= number_format($item['price'] - $item['discount_price']) ?> đ</h6>
                                                            <h6 class="text-muted ml-2"><del><?= number_format($item['price']) ?> đ</del></h6>
                                                        <?php else : ?>
                                                            <h6><?= number_format($item['price']) ?> đ</h6>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border d-wrap">
                                                    <!-- <a href="/products/<?= $item['id'] ?>" class="btn btn-sm text-dark p-0 w-100">
                                                        <i class="fas fa-eye text-primary mr-1"></i> Xem
                                                    </a> -->
                                                    <a href="#" class="btn btn-sm text-dark p-0" onclick="event.stopPropagation(); addToCart(<?= $item['id'] ?>)">
                                                        <i class="fas fa-shopping-cart text-primary mr-1"></i> Thêm vào giỏ hàng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <h3 class="text-center text-danger">Không có sản phẩm</h3>
                            <?php endif; ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>






        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="/public/assets/client/lib/easing/easing.min.js"></script>
        <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
        <script src="/public/assets/client/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="/public/assets/client/js/main.js"></script>

        <script>
            // Cập nhật giá trị hiển thị khi người dùng thay đổi giá trị của range
            function updatePriceRange() {
                let maxPrice = document.getElementById('max_price').value;

                // Hiển thị giá trị với dấu chấm
                document.getElementById('max_price_output').textContent = formatNumber(maxPrice);
            }

            // Hàm để format số tiền với dấu chấm
            function formatNumber(number) {
                return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
        </script>

        </body>

        </html>


<?php

    }
}
