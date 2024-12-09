<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Header;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Page\Checkout;
use App\vnpay_php\vnpay_pay;
use App\vnpay_php\vnpay_create_payment;
use App\vnpay_php\vnpay_return;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;


class PayController
{

    public static function returnPay()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Checkout::render();
        Footer::render();
    }

    public static function checkout()
{
    // Kiểm tra xem có sản phẩm nào trong giỏ hàng không
    if (!isset($_POST['check']) || empty($_POST['check'])) {
        header('Location: /cart');
        exit;
    }

    $data = $_POST;
    $products = [];
    $total = 0;

    // Duyệt qua các sản phẩm đã chọn trong giỏ hàng
    foreach ($data['check'] as $check_id) {
        foreach ($data['id'] as $index => $id) {
            if ($id === $check_id) {
                // Kiểm tra sự tồn tại của các mảng trước khi truy cập vào chúng
                if (isset($data['price'][$index]) && isset($data['sku'][$index])) {
                    $productPrice = $data['price'][$index];  // Giá từ SKU
                    $quantity = $data['quantity'][$index];
                    $sku = $data['sku'][$index];  // Lấy SKU từ POST
                    $total += $productPrice * $quantity;  // Tính tổng tiền của sản phẩm

                    // In ra dữ liệu để kiểm tra
                    echo "SKU: " . $sku . "<br>";  // In SKU để kiểm tra
                    echo "Price: " . $productPrice . " Quantity: " . $quantity . "<br>";

                    // Thêm thông tin sản phẩm vào mảng
                    $products[] = [
                        'id' => $data['id'][$index],
                        'name' => $data['name'][$index],
                        'price' => $productPrice,  // Lưu giá SKU
                        'quantity' => $quantity,
                        'sku' => $sku,  // Đảm bảo SKU chính xác
                        'variants' => isset($data['variants'][$index]) ? $data['variants'][$index] : [],  // Thêm thông tin biến thể vào
                    ];
                } else {
                    // Xử lý khi dữ liệu bị thiếu
                    echo 'Dữ liệu sản phẩm không đầy đủ.';  // In ra thông báo khi dữ liệu bị thiếu
                    exit;
                }
                break; // Dừng vòng lặp khi đã tìm thấy sản phẩm
            }
        }
    }

    // Kiểm tra dữ liệu được truyền qua
    var_dump($products);  // In dữ liệu sản phẩm để kiểm tra

    // Render trang thanh toán với danh sách sản phẩm và tổng tiền
    Header::render();
    Checkout::render($products, $total);  // Truyền cả danh sách sản phẩm và tổng tiền vào
    Footer::render();
}


    public static function pay()
    {

        $oo = new CheckoutController();

        $re = $oo->sendOrderEmail ();
        // echo "hai";
        // die();
        $data = [
            'price' => $_POST['total_price'],
            'name' => $_POST['name']
        ];

        Header::render();
        vnpay_pay::render($data);
        Footer::render();
    }

    public static function vnpay()
    {

        $data = $_POST;
        Header::render();
        vnpay_create_payment::render($data);
        Footer::render();
            // Chuyển hướng đến trang pay
            header('Location: /pay');
    }
    

    // public static function returnPayment()
    // {
    //     // $data = $_POST;
    //     Header::render();
    //     vnpay_return::render();
    //     Footer::render();
    // }
    
   
}
