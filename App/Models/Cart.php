<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class Cart extends BaseModel
{
    // Bảng Cart không cần thiết vì chúng ta sử dụng session
    protected $table = 'cart'; // Để thuận tiện, nhưng sẽ không dùng để truy vấn trong cơ sở dữ liệu.
    protected $id = 'cart_id';

    public function __construct()
    {
        parent::__construct();
        // Khởi tạo session nếu chưa có
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($productId, $quantity)
    {
        $cart = $this->getCartItems();
        // Kiểm tra xem sản phẩm đã có trong giỏ hay chưa
        if (isset($cart[$productId])) {
            // Nếu có, tăng số lượng lên
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ
            $product = $this->getOne($productId);  // Lấy thông tin sản phẩm từ bảng sản phẩm
            if ($product) {
                $cart[$productId] = [
                    'product_id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity
                ];
            }
        }
        $_SESSION['cart'] = $cart;
    }

    // Lấy tất cả sản phẩm trong giỏ hàng
    public function getCartItems()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    // Xóa một sản phẩm khỏi giỏ hàng
    public function removeFromCart($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateQuantity($productId, $quantity)
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        }
    }

    // Tính tổng giá trị giỏ hàng
    public function getCartTotal()
    {
        $cart = $this->getCartItems();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    // Xóa tất cả sản phẩm trong giỏ hàng
    public function clearCart()
    {
        unset($_SESSION['cart']);
    }
}
