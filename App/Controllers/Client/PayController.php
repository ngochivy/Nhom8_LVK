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
        // var_dump($_POST);
        // die();
        // Lấy dữ liệu gửi đến từ form
        // Kiểm tra dữ liệu đầu vào

        // Kiểm tra nếu không có sản phẩm được chọn
        if (!isset($_POST['check'])) {

            header('Location: /cart');
            exit;
        }

        $data = $_POST;
        // var_dump($_POST);
        $products = [];
        foreach ($data['check'] as $check_id) {
            foreach ($data['id'] as $index => $id) {
                if ($id === $check_id) { // Kiểm tra nếu ID trùng với giá trị check
                    $products[] = [
                        'name' => $data['name'][$index],
                        // 'variant2' => $data['variant2'][$index],
                        // 'variant' => $data['variant'][$index],
                        'price' => $data['price'][$index],
                        'quantity' => $data['quantity'][$index],

                    ];
                    break;
                }
            }
        }


        Header::render();
        Checkout::render($products);
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
