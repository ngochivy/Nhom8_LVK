<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



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




    public static function sendOderEmail()
    {

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

            // Cấu hình PHPMailer
            $mail = new PHPMailer(true); // Enable exceptions

            try {
                $mail->setFrom('lvksports7@gmail.com', 'Liên Hệ Hỗ Trợ');
                $mail->addAddress('recipient@example.com', 'Người nhận');
                $mail->CharSet = 'UTF-8';
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
                $mail->addAddress('lvksports7@gmail.com', 'Liên Hệ'); // Email của bạn là người nhận

                // Nội dung email gửi đến admin
                $mail->isHTML(true);
                $mail->Subject = "Liên hệ từ $first_name";
                $mail->Body = "
                <p>Bạn đã nhận được tin nhắn từ <strong>$first_name $last_name</strong> (<strong>$email</strong>):</p>
                <p><strong>Số điện thoại:</strong> $phone_number</p>
                <p><strong>Tỉnh/Thành phố:</strong> $province</p>
                <p><strong>Huyện/Quận:</strong> $district</p>
                <p><strong>Phường/Xã:</strong> $ward</p>
                <p><strong>Địa chỉ chi tiết:</strong> $address</p>
                <p><strong>Nội dung:</strong> $message</p>
            ";
            
                // Gửi email cho khách hàng
                $mailCustomer = new PHPMailer(true);
                $mailCustomer->isSMTP();
                $mailCustomer->Host = 'smtp.gmail.com';
                $mailCustomer->SMTPAuth = true;
                $mailCustomer->Username = 'lvksports7@gmail.com'; // Địa chỉ Gmail của bạn
                $mailCustomer->Password = 'ecek offx dcub fxwu'; // App password
                $mailCustomer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mailCustomer->Port = 587;

                // Người gửi là admin
                $mailCustomer->setFrom('lvksports7@gmail.com', 'Liên Hệ');
                // Người nhận là khách hàng
                $mailCustomer->addAddress($email, $message);

                // Nội dung email gửi cho khách hàng
                $mailCustomer->isHTML(true);
                $mailCustomer->Subject = 'Chúng tôi đã nhận được yêu cầu của bạn';
                $mailCustomer->Body    = "<p>Chào <strong>$first_name</strong><strong>$last_name</strong>,</p><p>Cảm ơn bạn đã liên hệ với chúng tôi. Dưới đây là thông tin bạn đã gửi:</p><p><strong>Số điện thoại:</strong><p><strong>Email:</strong> $email</p><p><strong>Số điện thoại:</strong> $phone_number</p><p><strong>Tỉnh/Thành Phố:</strong> $province</p><p><strong>Huyện:</strong> $district</p><p><strong>Phường/Xã:</strong> $ward</p><p><strong>Phường/Xã:</strong> $address</p><p><strong>Nội dung:</strong> $message</p><p>Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.</p>";

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

        // Sau khi gửi email, điều hướng về trang liên hệ
        header('Location: /pay');
        exit();
    }
    
}
