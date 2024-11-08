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
        // giả sử data là mảng dữ liệu lấy được từ database
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
            ],

        ];
        $products = [
            [
                'id' => 1,
                'name' => 'Bàn chải điện Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Động cơ mạnh mẽ',
                'price' => 300000,
                'discount_price' => 20000,
                'image' => 'product-1.webp',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Bếp lẩu nướng đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng',
                'price' => 1000000,
                'discount_price' => 50000,
                'image' => 'product-2.webp',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Bộ kiềm vệ sinh móng tay',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng,Sử dụng bền bỉ',
                'price' => 150000,
                'discount_price' => 30000,
                'image' => 'product-3.webp',
                'status' => 1
            ],
            [
                'id' => 4,
                'name' => 'Bộ sạc 5 cổng USB',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Sử dụng bền bỉ',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => 'product-4.webp',
                'status' => 1
            ],
            [
                'id' => 5,
                'name' => 'Chuông cửa thông minh Xiaomi',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng',
                'price' => 1200000,
                'discount_price' => 100000,
                'image' => 'product-5.webp',
                'status' => 1
            ],
            [
                'id' => 6,
                'name' => 'Máy nấu ăn đa năng',
                'description' => 'Nhập khẩu chính hãng, Bảo hành chính hãng, Nấu nướng đa năng, Sử dụng bền bỉ',
                'price' => 800000,
                'discount_price' => 30000,
                'image' => 'product-6.webp',
                'status' => 1
            ],

        ];
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();

        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $product_detail = [
            'id' => $id,
            'name' => 'Product 1',
            'description' => 'Description Product 1',
            'price' => 100000,
            'discount_price' => 10000,
            'image' => 'product.jpg',
            'status' => 1
        ];
        $data = [
            'product' => $product_detail
        ];
        Header::render();

        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id) {}
}
