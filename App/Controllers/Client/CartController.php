<?php

namespace App\Controllers;

use App\Models\Product;
use App\Helpers\NotificationHelper;

class CartController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    // Thêm sản phẩm vào giỏ hàng (lưu cookie)
    public function addToCartAction()
    {
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = (int)$_POST['quantity'];

            // Kiểm tra sản phẩm tồn tại
            $product = $this->productModel->getOne($productId);
            if ($product) {
                // Lấy giỏ hàng từ cookie (nếu có)
                $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

                // Thêm hoặc cập nhật sản phẩm vào giỏ hàng
                if (isset($cart[$productId])) {
                    $cart[$productId] += $quantity;
                } else {
                    $cart[$productId] = $quantity;
                }

                // Lưu giỏ hàng vào cookie
                setcookie('cart', json_encode($cart), time() + (86400 * 7), "/"); // Lưu 7 ngày
                NotificationHelper::success('add_cart', 'Sản phẩm đã được thêm vào giỏ hàng');
            } else {
                NotificationHelper::error('add_cart', 'Sản phẩm không tồn tại');
            }
        }

        // Chuyển hướng về trang giỏ hàng
        header('Location: /cart');
    }

    // Hiển thị giỏ hàng (lấy từ cookie)
    public function showCartAction()
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $cartItems = [];
        $cartTotal = 0;

        foreach ($cart as $productId => $quantity) {
            $product = $this->productModel->getOne($productId);
            if ($product) {
                $product['quantity'] = $quantity;
                $product['total_price'] = $quantity * $product['price'];
                $cartItems[] = $product;
                $cartTotal += $product['total_price'];
            }
        }

        // Load view giỏ hàng
        require 'views/cart.php'; // Hoặc sử dụng template engine như Twig
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCartAction($productId)
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");
            NotificationHelper::success('remove_cart', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        }

        // Chuyển hướng lại trang giỏ hàng
        header('Location: /cart');
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCartAction()
    {
        setcookie('cart', '', time() - 3600, "/"); // Xóa cookie
        NotificationHelper::success('clear_cart', 'Giỏ hàng đã được xóa');

        // Chuyển hướng về trang chủ
        header('Location: /');
    }
}
