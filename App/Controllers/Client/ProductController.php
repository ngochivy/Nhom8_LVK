<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {

        // Giả sử data là mảng danh mục lấy được từ database
        $categories = [
            [
                'id' => 1,
                'name' => 'Nhà bếp',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Nhà vệ sinh/nhà tắm',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Đồ dùng thông minh',
                'status' => 1
            ]
        ];

        // Giả sử data là mảng sản phẩm lấy từ database
        $products = [
            [
                'id' => 1,
                'name' => 'Bàn chải điện Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Động cơ mạnh mẽ',
                'price' => 300000,
                'discount_price' => 20000,
                'image' => 'product-1.webp',
                'status' => 1,
                'category_id' => 2,
                'is_feature' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Bếp lẩu nướng đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng',
                'price' => 1000000,
                'discount_price' => 50000,
                'image' => 'product-2.webp',
                'status' => 1,
                'category_id' => 1,
                'is_feature' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Bộ kiềm vệ sinh móng tay',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng,Sử dụng bền bỉ',
                'price' => 150000,
                'discount_price' => 30000,
                'image' => 'product-3.webp',
                'status' => 1,
                'category_id' => 2,
                'is_feature' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Bộ sạc 5 cổng USB',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Sử dụng bền bỉ',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => 'product-4.webp',
                'status' => 1,
                'category_id' => 3,
                'is_feature' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Chuông cửa thông minh Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng',
                'price' => 1200000,
                'discount_price' => 100000,
                'image' => 'product-5.webp',
                'status' => 1,
                'category_id' => 3,
                'is_feature' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Máy nấu ăn đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng, Sử dụng bền bỉ',
                'price' => 800000,
                'discount_price' => 30000,
                'image' => 'product-6.webp',
                'status' => 1,
                'category_id' => 1,
                'is_feature' => 1,

            ],

        ];

        // Kiểm tra xem có truyền category vào query không
        if (isset($_GET['category']) && $_GET['category'] != 'all') {
            $categoryId = $_GET['category'];
            $products = array_filter($products, function ($product) use ($categoryId) {
                return $product['category_id'] == $categoryId;
            });
        }

        // Lọc sản phẩm theo giá range (từ - đến) từ thanh trượt
        if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
            $min_price = $_GET['min_price'];
            $max_price = $_GET['max_price'];

            // Lọc sản phẩm dựa trên khoảng giá
            $products = array_filter($products, function ($product) use ($min_price, $max_price) {
                return $product['price'] >= $min_price && $product['price'] <= $max_price;
            });
        }

       
        // Dữ liệu truyền vào view
        $data = [
            'products' => $products,
            'categories' => $categories,

        ];
        // var_dump($featuredProducts); // Kiểm tra sản phẩm nổi bật
        // Render view
        Header::render();
        Index::render($data);
        Footer::render();
    }

    public static function detail($id)
    {
        // Giả sử đây là danh sách sản phẩm từ cơ sở dữ liệu hoặc từ dữ liệu tĩnh
        $products = [
            [
                'id' => 1,
                'name' => 'Bàn chải điện Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Động cơ mạnh mẽ',
                'price' => 300000,
                'discount_price' => 20000,
                'image' => 'product-1.webp',
                'status' => 1,
                'category_id' => 2,
                'is_feature' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Bếp lẩu nướng đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng',
                'price' => 1000000,
                'discount_price' => 50000,
                'image' => 'product-2.webp',
                'status' => 1,
                'category_id' => 1,
                'is_feature' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Bộ kiềm vệ sinh móng tay',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng,Sử dụng bền bỉ',
                'price' => 150000,
                'discount_price' => 30000,
                'image' => 'product-3.webp',
                'status' => 1,
                'category_id' => 2,
                'is_feature' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Bộ sạc 5 cổng USB',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Sử dụng bền bỉ',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => 'product-4.webp',
                'status' => 1,
                'category_id' => 3,
                'is_feature' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Chuông cửa thông minh Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng',
                'price' => 1200000,
                'discount_price' => 100000,
                'image' => 'product-5.webp',
                'status' => 1,
                'category_id' => 3,
                'is_feature' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Máy nấu ăn đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng, Sử dụng bền bỉ',
                'price' => 800000,
                'discount_price' => 30000,
                'image' => 'product-6.webp',
                'status' => 1,
                'category_id' => 1,
                'is_feature' => 1,

            ],
            // Thêm các sản phẩm khác
        ];

        // Tìm sản phẩm theo id
        $product_detail = null;
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $product_detail = $product;
                break;
            }
        }

        // Kiểm tra nếu sản phẩm không tìm thấy
        if ($product_detail === null) {
            // Xử lý khi không tìm thấy sản phẩm, có thể chuyển hướng hoặc hiển thị thông báo lỗi
            echo "Sản phẩm không tồn tại.";
            return;
        }

        // Dữ liệu truyền vào view
        $data = [
            'product' => $product_detail
        ];

        // Render view
        Header::render();
        Detail::render($data);
        Footer::render();
    }

    public static function getProductByCategory($id) {}
}
