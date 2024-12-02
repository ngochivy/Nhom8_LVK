<?php

namespace App\Controllers\Client;

use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\Cart;
use App\Helpers\NotificationHelper;
use App\Models\Sku;

class CartController
{
    public static function index()
    {
        if (!isset($_SESSION['user'])) {
            // Chuyển hướng tới trang đăng nhập
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }
        // Lấy dữ liệu giỏ hàng từ cookie
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        $data = [
            'cart' => $cart,
        ];
        Header::render();
        Cart::render($data);
        Footer::render();
    }

    public static function add()
    {
        if (!isset($_SESSION['user'])) {
            // Chuyển hướng tới trang đăng nhập
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            header('Location: /login');
            exit();
        }
        $productId = $_POST['id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        if (!$productId) {
            header('Location: /cart');
            exit();
        }

        $product = (new Product())->getOneProductByStatus($productId);

        if (!$product) {
            header('Location: /cart');
            exit();
        }

        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
        } else {

            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'total_price' => $product['price'] * $quantity,
            ];
        }

        // Lưu lại giỏ hàng vào cookie
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/'); // Lưu trong 30 ngày

        header('Location: /cart');
        exit();
    }

    public static function remove($id)
    {
        // Lấy ID của sản phẩm từ POST
        $productId = $id;
        // Nếu không có ID, chuyển hướng về giỏ hàng
        if (!$productId) {
            header('Location: /cart');
            exit();
        }

        // Kiểm tra xem có cookie 'cart' hay không
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productId])) {
        unset($cart[$productId]);  // Xóa sản phẩm khỏi giỏ hàng
        }

        // Cập nhật lại cookie với giỏ hàng đã sửa đổi
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');

        // Chuyển hướng về giỏ hàng sau khi xóa
        header('Location: /cart');
        exit();
    }


    public static function update()
{
    

    // Lấy ID sản phẩm và số lượng từ POST
    $productId = $_POST['id'] ?? null;
    $quantity = $_POST['quantity'] ?? null;

    // Lấy dữ liệu SKU của sản phẩm từ bảng SKU và bảng liên quan
    $sku = (new Sku())->getSkuInnerJoinVariantAndVariantOption($productId);

    // Nếu không có ID hoặc số lượng, chuyển hướng về giỏ hàng
    if (!$productId || !$quantity) {
        header('Location: /cart');
        exit();
    }

    // Kiểm tra xem có cookie 'cart' hay không
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
    if (isset($cart[$productId])) {
        // Cập nhật số lượng
        $cart[$productId]['quantity'] = $quantity;

        // Tìm SKU tương ứng cho sản phẩm hiện tại
        $skuProduct = null;
        foreach ($sku as $skuItem) {
            if ($skuItem['product_id'] == $productId) {
                $skuProduct = $skuItem;
                break;
            }
        }

        if ($skuProduct) {
            // Cập nhật lại tổng giá của sản phẩm từ SKU
            $cart[$productId]['total_price'] = $skuProduct['price'] * $quantity;
        } else {
            // Nếu không tìm thấy SKU tương ứng
            NotificationHelper::error('update_cart', 'Không tìm thấy giá sản phẩm.');
            header('Location: /cart');
            exit();
        }
    }

    // Cập nhật lại cookie với giỏ hàng đã sửa đổi
    setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');

    // Chuyển hướng về giỏ hàng sau khi cập nhật
    header('Location: /cart');
    exit();
}

}