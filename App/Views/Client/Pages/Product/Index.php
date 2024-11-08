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
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Trang Sản Phẩm</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                /* CSS cho sidebar bộ lọc */
                .filter-sidebar {
                    background-color: #f8f9fa;
                    padding: 15px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .filter-title {
                    font-size: 1.2em;
                    font-weight: bold;
                    color: #333;
                    margin-bottom: 15px;
                    border-bottom: 2px solid #d9534f;
                    padding-bottom: 5px;
                }

                /* Phần lọc giá */
                .price-filter {
                    margin-top: 20px;
                }

                .price-range input[type="range"] {
                    width: 100%;
                    appearance: none;
                    height: 8px;
                    background: #ddd;
                    outline: none;
                    opacity: 0.7;
                    transition: opacity .2s;
                }

                .price-range input[type="range"]:hover {
                    opacity: 1;
                }

                .price-values {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 5px;
                    font-size: 0.9em;
                }

                .btn-filter {
                    margin-top: 10px;
                    background-color: #d9534f;
                    color: #fff;
                    padding: 5px 15px;
                    border-radius: 20px;
                    border: none;
                    cursor: pointer;
                }

                .btn-filter:hover {
                    background-color: #c9302c;
                }

                /* Phần lọc thương hiệu */
                .brand-filter {
                    margin-top: 20px;
                }

                .brand-options label {
                    display: block;
                    font-size: 0.9em;
                    margin: 5px 0;
                    cursor: pointer;
                }

                .brand-options input[type="checkbox"] {
                    margin-right: 8px;
                }

                /* CSS cho sản phẩm */
    .card {
        cursor: pointer;
        transition: transform 0.3s ease;
        position: relative;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .btn-add-to-cart {
        display: none;
        position: absolute;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #ddd;
        width: 200px;
        height: 30px;
        border-radius: 25px;
        font-size: 1em;
        text-align: center;
        line-height: 25px; /* Điều chỉnh để chữ nằm giữa theo chiều dọc */
        cursor: pointer;
    }

    .btn-add-to-cart:hover {
        background-color: red;
        color: white;
    }

    .card:hover .btn-add-to-cart {
        display: block;
    }
            </style>
        </head>

        <body>

            <div class="container mt-5 mb-5">
                <div class="row">
                    <!-- Sidebar Bộ Lọc -->
                    <div class="col-md-3">
                        <div class="filter-sidebar">
                            <!-- Danh mục sản phẩm -->
                            <h3 class="filter-title">Danh mục sản phẩm</h3>
                            <?php Category::render($data['categories']); ?>

                            <!-- Bộ lọc giá -->
                            <div class="price-filter mt-4">
                                <h4 class="filter-title">Giá sản phẩm</h4>
                                <div class="price-range">
                                    <input type="range" min="0" max="100000000" step="100000" id="priceRange" oninput="updatePrice()">
                                    <div class="price-values">
                                        <span id="priceMin">0 đ</span> - <span id="priceMax">100.000.000 đ</span>
                                    </div>
                                    <button class="btn btn-filter" onclick="applyPriceFilter()">Lọc</button>
                                </div>
                            </div>

                            <!-- Bộ lọc thương hiệu -->
                            <div class="brand-filter mt-4">
                                <h4 class="filter-title">Thương hiệu</h4>
                                <div class="brand-options">
                                    <label><input type="checkbox" name="brand" value="Cuckoo"> Cuckoo</label>
                                    <label><input type="checkbox" name="brand" value="Danger"> Danger</label>
                                    <label><input type="checkbox" name="brand" value="Fushen"> Fushen</label>
                                    <label><input type="checkbox" name="brand" value="Justin"> Justin</label>
                                    <label><input type="checkbox" name="brand" value="LG"> LG</label>
                                    <label><input type="checkbox" name="brand" value="Lock&Lock"> Lock&Lock</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phần hiển thị sản phẩm -->
                    <div class="col-md-9">
                        <?php if (count($data) && count($data['products'])) : ?>
                            <h1 class="text-center mb-3">Sản phẩm</h1>
                            <div class="row">
                                <?php foreach ($data['products'] as $item) : ?>
                                    <div class="col-md-4">
                                        <div class="card mb-4 shadow-sm" onclick="window.location.href='/products/<?= $item['id'] ?>'">
                                            <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                            <div class="card-body">
                                                <p class="card-text"><?= $item['name'] ?></p>
                                                <?php if ($item['discount_price'] > 0) : ?>
                                                    <p>
                                                        <span class="text-muted"><strike><?= number_format($item['price']) ?> đ</strike></span>
                                                        <span class="text-danger font-weight-bold"><?= number_format($item['price'] - $item['discount_price']) ?> đ</span>
                                                    </p>
                                                <?php else : ?>
                                                    <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>
                                                <?php endif; ?>
                                                <button class="btn-add-to-cart" onclick="event.stopPropagation(); addToCart(<?= $item['id'] ?>)">Thêm vào giỏ hàng</button>
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

            <script>
                function updatePrice() {
                    const priceRange = document.getElementById("priceRange");
                    const priceMin = document.getElementById("priceMin");
                    const priceMax = document.getElementById("priceMax");

                    const value = parseInt(priceRange.value);
                    priceMin.innerText = value.toLocaleString('vi-VN') + ' đ';
                    priceMax.innerText = (100000000 - value).toLocaleString('vi-VN') + ' đ';
                }

                function applyPriceFilter() {
                    alert('Áp dụng bộ lọc giá!');
                }

                function addToCart(productId) {
                    // Thêm logic thêm vào giỏ hàng, ví dụ:
                    alert('Đã thêm sản phẩm ' + productId + ' vào giỏ hàng!');
                }
            </script>

        </body>

        </html>


<?php

    }
}
