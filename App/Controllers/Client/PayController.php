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
    if (!isset($_POST['check'])) {
        header('Location: /cart');
        exit;
    }

    $data = $_POST;
    $products = [];
    $total = 0;

    foreach ($data['check'] as $check_id) {
        foreach ($data['id'] as $index => $id) {
            if ($id === $check_id) {
                // Lấy thông tin sản phẩm từ POST
                $productPrice = $data['price'][$index];  // Giá từ SKU
                $quantity = $data['quantity'][$index];
                $total += $productPrice * $quantity;

                $products[] = [
                    'id' => $data['id'][$index],
                    'name' => $data['name'][$index],
                    'price' => $productPrice,
                    'quantity' => $quantity,
                ];
                break;
            }
        }
    }

    // Render checkout page với danh sách sản phẩm và tổng tiền
    Header::render();
    Checkout::render($products, $total); // Truyền cả tổng tiền vào
    Footer::render();
}



    public static function pay()
    {
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
    }

    // public static function returnPayment()
    // {
    //     // $data = $_POST;
    //     Header::render();
    //     vnpay_return::render();
    //     Footer::render();
    // }
}
