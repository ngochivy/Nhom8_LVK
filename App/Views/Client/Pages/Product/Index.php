<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

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

        <body>

            <!-- Page Header End -->

            <!-- Shop Section Start -->
            <div class="container-fluid pt-5">
                <div class="row px-xl-5">
                    <!-- Sidebar Start -->
                    <div class="col-lg-3 col-md-12">
                        <!-- Categories -->
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

                        <!-- Price Filter -->
                        <div class="border-bottom mb-4 pb-4">
                            <h5 class="font-weight-semi-bold mb-2" style="font-family:montserrat; font-weight:700;">Giá sản phẩm</h5>
                            <form method="GET">
                                <div class="form-group">
                                    <input type="range" class="form-range" id="max_price" name="max_price" value="<?= isset($_GET['max_price']) ? $_GET['max_price'] : 10000000; ?>" min="0" max="10000000" step="10000" onchange="updatePriceRange()">
                                    <output id="max_price_output"><?= isset($_GET['max_price']) ? number_format($_GET['max_price'], 0, ',', '.') : number_format(10000000, 0, ',', '.'); ?></output> VND
                                </div>
                                <div class="form-group">
                                    <input type="range" class="form-range" id="min_price" name="min_price" value="<?= isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>" min="0" max="10000000" step="10000" onchange="updatePriceRange()">
                                    <output id="min_price_output"><?= isset($_GET['min_price']) ? number_format($_GET['min_price'], 0, ',', '.') : number_format(0, 0, ',', '.'); ?></output> VND
                                </div>
                                <button type="submit" class="btn btn-primary">Áp dụng</button>
                            </form>
                        </div>

                        <script>
                            function updatePriceRange() {
                                document.getElementById('max_price_output').value = document.getElementById('max_price').value;
                                document.getElementById('min_price_output').value = document.getElementById('min_price').value;
                            }
                        </script>

                    </div>
                    <!-- Sidebar End -->

                    <!-- Products Start -->
                    <div class="col-lg-9 col-md-12">
                        <div class="row pb-3">
                            <!-- Search and Filter -->
                            <div class="col-12 pb-1">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <form action="" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </div>

                                        </div>
                                    </form>

                                    <div class="dropdown ml-4">
                                        <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                                            Lọc
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="?sort=latest">Mới nhất</a>
                                            <a class="dropdown-item" href="?sort=name_asc">Tên (A-Z)</a>
                                            <a class="dropdown-item" href="?sort=name_desc">Tên (Z-A)</a>
                                            <a class="dropdown-item" href="?sort=price_asc">Giá (Thấp -> Cao)</a>
                                            <a class="dropdown-item" href="?sort=price_desc">Giá (Cao -> Thấp)</a>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- Product Display -->
                            <div class="col-md-12">
                                <?php if (!empty($data['products'])) : ?>
                                    <div class="row">
                                        <?php foreach ($data['products'] as $item) : ?>
                                            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                                <div class="card product-item border-0 mb-4" onclick="window.location.href='/products/<?= $item['id'] ?>'">
                                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                        <img class="img-fluid w-100" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="height:200px; width:200px; object-fit:cover ;">
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
                                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                                        <form action="/cart/add" method="post">
                                                            <input type="hidden" name="method" id="" value="POST">
                                                            <input type="hidden" name="id" id="" value="<?= $item['id'] ?>" required>
                                                            
                                                                <button type="submit" class="btn btn-sm text-dark ml-1 p-2"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                                            
                                                        </form>
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
                    <!-- Products End -->
                </div>
            </div>
            <!-- Shop Section End -->

            <!-- JavaScript -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script>
                function updatePriceRange() {
                    let maxPrice = document.getElementById('max_price').value;
                    document.getElementById('max_price_output').textContent = new Intl.NumberFormat('vi-VN').format(maxPrice);
                }
            </script>
        </body>

        </html>

<?php
    }
}
