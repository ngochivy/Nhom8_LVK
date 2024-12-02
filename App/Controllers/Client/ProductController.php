<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Sku;
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

        // Tìm kiếm sản phẩm theo từ khóa
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = htmlspecialchars($_GET['keyword']); // Lấy từ khóa và xử lý an toàn
            $products = $productModel->searchProducts($keyword);
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

        // Lọc sản phẩm theo thứ tự
        if (isset($_GET['sort'])) {
            switch ($_GET['sort']) {
                case 'latest': // Sắp xếp theo sản phẩm mới nhất
                    usort($products, function ($a, $b) {
                        return strtotime($b['created_at']) - strtotime($a['created_at']);
                    });
                    break;
                case 'name_asc': // Sắp xếp theo tên từ A-Z
                    usort($products, function ($a, $b) {
                        return strcmp($a['name'], $b['name']);
                    });
                    break;
                case 'name_desc': // Sắp xếp theo tên từ Z-A
                    usort($products, function ($a, $b) {
                        return strcmp($b['name'], $a['name']);
                    });
                    break;
                case 'price_asc': // Sắp xếp theo giá thấp đến cao
                    usort($products, function ($a, $b) {
                        return $a['price'] - $b['price'];
                    });
                    break;
                case 'price_desc': // Sắp xếp theo giá cao đến thấp
                    usort($products, function ($a, $b) {
                        return $b['price'] - $a['price'];
                    });
                    break;
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

        // Khởi tạo model bình luận
        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id);

        // Lấy thông tin sản phẩm từ database
        $product_detail = $productModel->getOneProduct($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product_detail) {
            // Hiển thị thông báo hoặc chuyển hướng nếu không tìm thấy sản phẩm
            echo "Sản phẩm không tồn tại.";
            return;
        }

        // Lấy SKU và thông tin biến thể liên quan
        $skuModel = new Sku();
        $skuData = $skuModel->getSkuInnerJoinVariantAndVariantOption($id);

        // Chuẩn bị dữ liệu truyền vào view
        $data = [
            'product' => $product_detail,
            'skus' => $skuData, // Dữ liệu SKU và biến thể
            'comments' => $comments,
            'is_login' => isset($_SESSION['User']),
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

    public function searchSuggestions()
    {
        $query = $_GET['query'] ?? '';
        $productModel = new Product();
        $products = $productModel->searchProductsByName($query, 5);
        header('Content-Type: application/json');
        echo json_encode($products);
    }
}
