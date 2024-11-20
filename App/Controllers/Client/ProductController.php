<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // Hiển thị danh sách sản phẩm
    public static function index()
    {
        $productModel = new Product();

        // Lấy danh mục
        $categories = (new Category())->getAll();

        // Lấy tất cả sản phẩm theo trạng thái mặc định là active (status = 1)
        $products = $productModel->getAllProductByStatus();

        // Lọc sản phẩm theo danh mục
        if (isset($_GET['category']) && $_GET['category'] != 'all') {
            $categoryId = (int)$_GET['category']; // Kiểm tra giá trị category hợp lệ
            $products = $productModel->getAllProductByCategory($categoryId);
        }

        // Lọc sản phẩm theo khoảng giá
        if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
            $minPrice = (int)$_GET['min_price']; // Chuyển đổi giá trị thành số nguyên
            $maxPrice = (int)$_GET['max_price']; // Chuyển đổi giá trị thành số nguyên
            // Kiểm tra giá trị khoảng giá hợp lệ
            if ($minPrice >= 0 && $maxPrice > $minPrice) {
                $products = $productModel->getProductByPriceRange($minPrice, $maxPrice);
            }
        }

        // Dữ liệu truyền vào view
        $data = [
            'categories' => $categories,
            'products' => $products,
        ];

        // Render view
        Header::render();
        Index::render($data);
        Footer::render();
    }


    // Hiển thị chi tiết sản phẩm
    public static function detail($id)
    {
        // Khởi tạo model sản phẩm
        $productModel = new Product();

        // Lấy thông tin sản phẩm từ database
        $product_detail = $productModel->getOneProduct($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product_detail) {
            // Hiển thị thông báo hoặc chuyển hướng nếu không tìm thấy sản phẩm
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


    // Lấy sản phẩm theo danh mục (đã có trong model)
    public static function getProductByCategory($id)
    {
        $productModel = new Product();

        // Lấy sản phẩm theo danh mục
        $products = $productModel->getAllProductByCategory($id);

        // Dữ liệu truyền vào view
        $data = [
            'products' => $products
        ];

        // Render view
        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}