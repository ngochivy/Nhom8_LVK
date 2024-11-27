<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Controllers\BaseController;


use App\Views\Client\Pages\Page\Contact;

class ContactController 
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        
        Header::render();
        Contact::render();
        Footer::render();
    }
  



    // Xử lý gửi email từ form liên hệ
    public static function sendEmail()
{
    $is_valid = true;

    // Kiểm tra các trường dữ liệu từ form
    if (empty($_POST['name'])) {
        NotificationHelper::error('name', 'Không để trống họ tên');
        $is_valid = false;
    }

    if (empty($_POST['phone_number'])) {
        NotificationHelper::error('phone_number', 'Không để trống số điện thoại');
        $is_valid = false;
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        NotificationHelper::error('email', 'Email không hợp lệ');
        $is_valid = false;
    }

    if (empty($_POST['message'])) {
        NotificationHelper::error('message', 'Nội dung không được để trống');
        $is_valid = false;
    }

    // Nếu tất cả đều hợp lệ, gửi email
    if ($is_valid) {
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number']; // Lấy số điện thoại từ form nhập
        $email = $_POST['email']; // Lấy email từ form nhập
        $message = $_POST['message'];

        // Cấu hình PHPMailer
        $mail = new PHPMailer(true); // Enable exceptions

        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lvksports7@gmail.com'; // Địa chỉ Gmail của bạn
            $mail->Password = 'ecek offx dcub fxwu'; // App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Người gửi
            $mail->setFrom($email, $name); // Sử dụng email và tên nhập từ form

            // Người nhận
            $mail->addAddress('lvksports7@gmail.com', 'Liên Hệ'); // Email của bạn là người nhận

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = "Liên hệ từ $name";
            $mail->Body    = "<p>Bạn đã nhận được tin nhắn từ <strong>$name</strong>  <p>$phone_number</p> ($email):</p><p>$message</p>";

            // Hiển thị thông tin người gửi và người nhận
            echo "Người gửi: $name ($email)<br>";
            echo "Người nhận: lvksports7@gmail.com (Liên Hệ)<br>";

            if ($mail->send()) {
                NotificationHelper::success('email', 'Email đã được gửi thành công.');
            } else {
                NotificationHelper::error('email', 'Không thể gửi email. Lỗi: ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            NotificationHelper::error('email', 'Lỗi: ' . $e->getMessage());
        }
    }

    // Sau khi gửi email, điều hướng về trang liên hệ
    header('Location: /contact');
    exit();
}
}