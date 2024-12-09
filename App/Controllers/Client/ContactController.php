<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;



use App\Views\Client\Pages\Page\Contact;

class ContactController
{
    // hiển thị danh sách
    public static function contact()
    {
        // giả sử data là mảng dữ liệu lấy được từ database

        Header::render();
        Contact::render();
        Footer::render();
    }




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
                $mail->setFrom('lvksports7@gmail.com', 'Contact Hỗ Trợ');
                $mail->addAddress('recipient@example.com', 'Người nhận');


                // Cấu hình SMTP

                $mail = new PHPMailer(true);
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->Body = '<meta charset="UTF-8">';



                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lvksports7@gmail.com'; // Địa chỉ Gmail của bạn
                $mail->Password = 'ecek offx dcub fxwu'; // App password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;



                // Người gửi
                $mail->setFrom($email, $name); // Sử dụng email và tên nhập từ form
                // Người nhận (Chủ trang web)
                $mail->addAddress('lvksports7@gmail.com', 'Contact'); // Email của bạn là người nhận

                // Nội dung email gửi đến admin
                $mail->isHTML(true);
                $mail->Subject = "Contact từ $name";
                $mail->Body    = "<p>Bạn đã nhận được tin nhắn từ <strong>$name</strong>  <p>$phone_number</p> ($email):</p><p>$message</p>";

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
                $mailCustomer->setFrom('lvksports7@gmail.com', 'Contact');
                // Người nhận là khách hàng
                $mailCustomer->addAddress($email, $name);

                // Nội dung email gửi cho khách hàng
                $mailCustomer->isHTML(true);
                $mailCustomer->Subject = 'LVK House, Hello You Hihi !';
                $mailCustomer->Body    = "
                 <html lang='vi'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Chúng tôi đã nhận được thông tin của bạn</title>
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            color: #333;
                            background-color: #f4f7fc;
                            margin: 0;
                            padding: 0;
                        }
        
                        .email-container {
                            background-color: #ffffff;
                            border-radius: 8px;
                            padding: 20px;
                            margin: 20px auto;
                            max-width: 600px;
                            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                        }
        
                        h2 {
                            color: #ff6f61;
                            text-align: center;
                            font-size: 24px;
                        }
        
                        .content {
                            padding: 15px;
                            font-size: 16px;
                            line-height: 1.6;
                        }
        
                        .content p {
                            margin: 10px 0;
                        }
        
                        .content strong {
                            color: #333;
                        }
        
                        .btn {
                            display: inline-block;
                            background-color: #ff6f61;
                            color: #fff;
                            padding: 12px 25px;
                            text-decoration: none;
                            font-weight: bold;
                            border-radius: 5px;
                            text-align: center;
                            margin-top: 20px;
                            font-size: 16px;
                            transition: background-color 0.3s ease;
                        }
        
                        .btn:hover {
                            background-color: #e05b4d;
                        }
        
                        .footer {
                            text-align: center;
                            margin-top: 30px;
                            font-size: 14px;
                            color: #888;
                        }
        
                        .footer a {
                            color: #ff6f61;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class='email-container'>
                        <h2>Chào <strong>$name</strong>,</h2>
                        <div class='content'>
                            <p>Cảm ơn bạn đã liên hệ với chúng tôi. Dưới đây là thông tin bạn đã gửi:</p>
                            <p><strong>Số điện thoại:</strong> $phone_number</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Nội dung:</strong> $message</p>
                            <p>Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất. Vui lòng giữ liên lạc.</p>
                        </div>
                        <div class='footer'>
                            <p>Đây là email tự động, vui lòng không trả lời.</p>
                            <p><a href='http://127.0.0.1:8080/contact'>Liên hệ với chúng tôi</a> nếu bạn có bất kỳ câu hỏi nào.</p>
                        </div>
                    </div>
                </body>
            </html>
        ";

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

        // Sau khi gửi email, điều hướng về trang Contact
        header('Location: /contact');
        exit();
    }
}
