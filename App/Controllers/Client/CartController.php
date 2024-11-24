<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Helpers\NotificationHelper;

class CartController
{
    private $cartModel;
    private $productModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCartAction()
    {
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Kiểm tra sản phẩm tồn tại
            $product = $this->productModel->getOne($productId);
            if ($product) {
                // Thay 'Product_ID' nếu cột trong cơ sở dữ liệu của bạn là 'Product_ID'
                $this->cartModel->addToCart($product['Product_ID'], $quantity);
                NotificationHelper::success('add_cart', 'Sản phẩm đã được thêm vào giỏ hàng');
            } else {
                NotificationHelper::error('add_cart', 'Sản phẩm không tồn tại');
            }
        }

        // Chuyển hướng về trang giỏ hàng
        header('Location: /cart');
    }


    // Hiển thị giỏ hàng
    public function showCartAction()
    {
        $cartItems = $this->cartModel->getCartItems();
        $cartTotal = $this->cartModel->getCartTotal();

        // Load view giỏ hàng
        require 'views/cart.php';  // Hoặc sử dụng một template engine như Twig
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCartAction($productId)
    {
        $this->cartModel->removeFromCart($productId);
        NotificationHelper::success('remove_cart', 'Sản phẩm đã được xóa khỏi giỏ hàng');

        // Chuyển hướng lại trang giỏ hàng
        header('Location: /cart');
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateQuantityAction()
    {
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $this->cartModel->updateQuantity($productId, $quantity);
            NotificationHelper::success('update_cart', 'Số lượng sản phẩm đã được cập nhật');
        }

        // Chuyển hướng lại trang giỏ hàng
        header('Location: /cart');
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCartAction()
    {
        $this->cartModel->clearCart();
        NotificationHelper::success('clear_cart', 'Giỏ hàng đã được xóa');

        // Chuyển hướng về trang chủ
        header('Location: /');
    }
}
