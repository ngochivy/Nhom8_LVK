<?php

namespace App\Controllers\Client;

use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\Cart;
use App\Helpers\NotificationHelper;

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

    public static function remove()
    {
        // Lấy ID của sản phẩm từ POST
        $productId = $_POST['id'] ?? null;

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
            // Cập nhật lại tổng giá của sản phẩm
            $cart[$productId]['total_price'] = $cart[$productId]['price'] * $quantity;
        }

        // Cập nhật lại cookie với giỏ hàng đã sửa đổi
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/');

        // Chuyển hướng về giỏ hàng sau khi cập nhật
        header('Location: /cart');
        exit();
    }
}