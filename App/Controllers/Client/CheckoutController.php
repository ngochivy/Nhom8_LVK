<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\Sku;


use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;



use App\Views\Client\Pages\Page\Checkout;

class CheckoutController
{
    // hiển thị danh sách
    public static function checkout()
    {

        // giả sử data là mảng dữ liệu lấy được từ database

        Header::render();
        Checkout::render();
        Footer::render();
    }




    public static function sendOrderEmail()
    {
        // $sku = new Sku();
        // $sku = (new Sku())->getSkuByProductId($item['id']);
        $is_valid = true;

        // Kiểm tra các trường dữ liệu từ form
        if (empty($_POST['first_name'])) {
            NotificationHelper::error('first_name', 'Không để trống họ ');
            $is_valid = false;
        }

        if (empty($_POST['last_name'])) {
            NotificationHelper::error('last_name', 'Không để trống tên');
            $is_valid = false;
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email', 'Email không hợp lệ');
            $is_valid = false;
        }

        if (empty($_POST['phone_number'])) {
            NotificationHelper::error('phone_number', 'Không để trống số điện thoại');
            $is_valid = false;
        }


        if (empty($_POST['province'])) {
            NotificationHelper::error('province', 'Nội dung không được để trống');
            $is_valid = false;
        }

        if (empty($_POST['district'])) {
            NotificationHelper::error('district', 'Nội dung không được để trống');
            $is_valid = false;
        }

        if (empty($_POST['ward'])) {
            NotificationHelper::error('ward', 'Nội dung không được để trống');
            $is_valid = false;
        }

        if (empty($_POST['address'])) {
            NotificationHelper::error('address', 'Nội dung không được để trống');
            $is_valid = false;
        }

        if (empty($_POST['message'])) {
            NotificationHelper::error('message', 'Nội dung không được để trống');
            $is_valid = false;
        }

        // Nếu tất cả đều hợp lệ, gửi email
        if ($is_valid) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email']; // Lấy email từ form nhập
            $phone_number = $_POST['phone_number']; // Lấy số điện thoại từ form nhập
            $province = $_POST['province'];
            $district = $_POST['district'];
            $ward = $_POST['ward'];
            $address = $_POST['address'];
            $message = $_POST['message'];
            $name = $_POST['name'][0];
            $quantity = $_POST['quantity'][0];
            // $prices = $sku['prices'];
            $total_price = $_POST['total_price'];



            // Cấu hình PHPMailer


            try {
                $mail = new PHPMailer(true);
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('lvksports7@gmail.com', 'Contact Support');
                $mail->addAddress('recipient@example.com', 'Người nhận');
                $mail->isHTML(true);
                $mail->Body = '<meta charset="UTF-8">';


                // Cấu hình SMTP


                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lvksports7@gmail.com'; // Địa chỉ Gmail của bạn
                $mail->Password = 'ecek offx dcub fxwu'; // App password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;




                // Người gửi
                $mail->setFrom($email, $first_name); // Sử dụng email và tên nhập từ form
                // Người nhận (Chủ trang web)
                $mail->addAddress('lvksports7@gmail.com', 'Liên hệ'); // Email của bạn là người nhận

                // Nội dung email gửi đến admin
                $mail->isHTML(true);
                $mail->Subject = "Thông báo đơn hàng mới của:  $first_name";
                $mail->Body = "
                 <html lang='vi'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Thông báo đơn hàng mới</title>
                   <style>
    table {
        width: 50%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 16px;
        text-align: left;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>

                     <body>

                    <div class='container'>
                <p>Bạn đã nhận được tin nhắn từ <strong>$first_name $last_name</strong> (<strong>$email</strong>):</p>
                <p><strong>Số điện thoại:</strong> $phone_number</p>
                <p><strong>Tỉnh/Thành phố:</strong> $province</p>
                <p><strong>Huyện/Quận:</strong> $district</p>
                <p><strong>Phường/Xã:</strong> $ward</p>
                <p><strong>Địa chỉ chi tiết:</strong> $address</p>
                <p><strong>Nội dung:</strong> $message</p>

                <table>
  
        <p>Tên sản phẩm</p>
        <strong>$name</strong>
 
   
        <p>Số lượng</p>
        <strong>$quantity</strong>
<p>Tổng tiền
            <strong></strong>" . number_format($total_price, 0, ',', '.') . " đ</p>

</table>

                             </div>
                </body>
                
            ";


                $mailCustomer = new PHPMailer(true);
                $mailCustomer->isSMTP();
                $mailCustomer->Host = 'smtp.gmail.com';
                $mailCustomer->SMTPAuth = true;
                $mailCustomer->Username = 'lvksports7@gmail.com'; // Địa chỉ Gmail của bạn
                $mailCustomer->Password = 'ecek offx dcub fxwu'; // App password
                $mailCustomer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mailCustomer->Port = 587;

                // Người gửi là admin
                $mailCustomer->setFrom('lvksports7@gmail.com', 'LVK House');
                // Người nhận là khách hàng
                $mailCustomer->addAddress($email, $message);

                // Nội dung email gửi cho khách hàng
                $mailCustomer->isHTML(true);
                $mailCustomer->Subject = 'LVK House, ';
                $mailCustomer->Body = "
<html lang='vi'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Thông báo đơn hàng mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            font-size: 16px;
            color: #333;
            margin-top: 20px;
        }
        .content p {
            margin-bottom: 10px;
        }
        .content strong {
            color: #333;
        }
        .table-container {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table-container th {
            background-color: #4CAF50;
            color: white;
        }
        .table-container td {
            background-color: #f9f9f9;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            text-align: center;
color: #888;
        }
            .total {
            color: red;
            }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Thông báo đơn hàng mới từ LVK House</h2>
        </div>
        
        <div class='content'>
            <p><strong>Xin chào $first_name $last_name</strong> (<strong>$email</strong>),</p>
            <p><strong>Số điện thoại:</strong> $phone_number</p>
            <p><strong>Tỉnh/Thành phố:</strong> $province</p>
            <p><strong>Huyện/Quận:</strong> $district</p>
            <p><strong>Phường/Xã:</strong> $ward</p>
            <p><strong>Địa chỉ chi tiết:</strong> $address</p>
            <p><strong>Nội dung:</strong> $message</p>
        </div>

        <div class='table-container'>
            <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td><strong>$name</strong></td>
                </tr>
                <tr>
                    <th>Số lượng</th>
                    <td><strong>$quantity</strong></td>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <td><strong>" . number_format($total_price, 0, ',', ',') . " đ</strong></td>
                </tr>
            </table>
        </div>

        <div class='total'>
            <p><strong>Tổng tiền: </strong>" . number_format($total_price, 0, ',', ',') . " đ</p>
        </div>

        <div class='footer'>
            <p>Trân trọng, <br>Đội ngũ LVK House</p>
        </div>
    </div>
</body>
</html>";

                // Gửi email cho cả admin và khách hàng
                if ($mail->send() && $mailCustomer->send()) {
                    NotificationHelper::success('email', 'Email đã được gửi thành công.');
                } else {
                    NotificationHelper::error('email', 'Không thể gửi email. Lỗi: ' . $mail->ErrorInfo);
                }
            } catch (Exception $e) {
                NotificationHelper::error('email', 'Lỗi: ' . $e->getMessage());
            }
        }

        return $is_valid;

        // Sau khi gửi email, điều hướng về trang liên hệ
        // header('Location: /pay');
        // exit();
    }
}
