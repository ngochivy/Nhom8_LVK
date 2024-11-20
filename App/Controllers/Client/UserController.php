<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Validations\AuthValidation;
use App\Models\User;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Profile;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\ChangePassword;

class UserController
{
    public static function register()
    {
        // Hien thi giao dien form Register
        Header::render();


        //hien thi thong bao
        Notification::render();

        //huy session thong bao
        NotificationHelper::unset();

        Register::render();

        Footer::render();
    }

    // thuc hien dang ky

    public static function registerAction()
    {
        // Kiểm tra nếu các trường bắt buộc không rỗng
        $username = $_POST["Username"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $re_password = $_POST["re_password"];

        if (empty($username) || empty($email) || empty($password) || empty($re_password)) {
            NotificationHelper::error('register_valid', 'Vui lòng điền đầy đủ thông tin.');
            header('location:/register');
            exit;
        }

        // Kiểm tra nếu mật khẩu và xác nhận mật khẩu khớp
        if ($password !== $re_password) {
            NotificationHelper::error('register_valid', 'Mật khẩu và xác nhận mật khẩu không khớp.');
            header('location:/register');
            exit;
        }

        // Kiểm tra tính hợp lệ của email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('register_valid', 'Email không hợp lệ.');
            header('location:/register');
            exit;
        }

        // Đưa dữ liệu vào mảng để lưu vào cơ sở dữ liệu
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password, // Mật khẩu chưa mã hóa, sẽ mã hóa khi lưu
        ];

        // Gọi phương thức đăng ký từ AuthHelper để kiểm tra và lưu dữ liệu vào CSDL
        $result = AuthHelper::register($data);

        if ($result) {
            // Đăng ký thành công, chuyển hướng đến trang đăng nhập
            header('location:/login');
            exit;
        } else {
            // Đăng ký thất bại, chuyển hướng về trang đăng ký
            header('location:/register');
            exit;
        }
    }




    public static function login()
    {
        // Hien thi giao dien form Login
        Header::render();
        Notification::render();

        //huy session thong bao
        NotificationHelper::unset();

        Login::render();
        Footer::render();
    }

    public static function loginAction()
    {
        //bat loi 
        $is_valid = AuthValidation::login();

        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');

            header('Location: /login');
            exit();
        }

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        ];

        $result = AuthHelper::login($data);
        if ($result) {
            NotificationHelper::success('login', 'Đăng nhập thành công');
            header('location:/');
        } else {
            header('location:/login');
        }
    }


    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location:/');
    }


    // public static function edit($id)
    // {
    //     $result = AuthHelper::edit($id);

    //     if (!$result) {
    //         if (isset($_SESSION['error']['login'])) {
    //             header('location: /login');
    //             exit;
    //         }


    //         if (isset($_SESSION['error']['user_id'])) {

    //             $data = $_SESSION['user'];
    //             $user_id = $data['id'];
    //             header("location: /users/edit/$user_id");
    //             exit;
    //         }
    //     }

    //     $data = $_SESSION['user'];

    //     Header::render();
    //     Notification::render();
    //     NotificationHelper::unset();

    //     //giao dien thong tin user

    //     Edit::render($data);

    //     //  var_dump($data);

    //     Footer::render();
    // }

    public static function update($id)
    {
        $is_valid = AuthValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại');
            header("location: /users/$id");
            exit;
        }
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],

        ];

        // Kiem tra co upload hinh anh khong. Neu co: kiem tra co hop le khong.
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        // goi helper de update
        $result = AuthHelper::update($id, $data);

        //kiem tra ket qua tra ve va chuyen huong

        header("Location: /users/$id");
    }


    //Hien thi form doi mat khau
    // public static function changePassword()
    // {
    //     $is_login = AuthHelper::checkLogin();

    //     if (!$is_login) {
    //         NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
    //         header('location: /login');
    //         exit;
    //     }

    //     $data = $_SESSION['user'];

    //     Header::render();
    //     Notification::render();
    //     NotificationHelper::unset();
    //     ChangePassword::render($data);
    //     Footer::render();
    // }

    // Thuc hien doi mat khau
    // public static function changePasswordAction()
    // {
    //     //validation
    //     $is_valid = AuthValidation::changePassword();
    //     if (!$is_valid) {
    //         NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
    //         header('location: /change-password');
    //         exit;
    //     }


    //     $id = $_SESSION['user']['id'];

    //     $data = [
    //         'old_password' => $_POST['old_password'],
    //         'new_password' => $_POST['new_password'],

    //     ];
    //     //goi AuthHelper

    //     $result = AuthHelper::changePassword($id, $data);

    //     header('location: /change-password');
    // }
    // // hiện thị giao diện form lấy lại mật khẩu

    // public static function forgotPassword()
    // {

    //     Header::render();
    //     Notification::render();
    //     NotificationHelper::unset();
    //     ForgotPassword::render();
    //     Footer::render();
    // }

    // thực hiện lấy lại mật khẩu
    // public static function forgotPasswordAction()
    // {
    //     //validation
    //     $is_valid = AuthValidation::forgotPassword();
    //     if (!$is_valid) {
    //         NotificationHelper::error('forgot_password', 'Lấy lại thất bại');
    //         header('location: /forgot-password');
    //         exit;
    //     }
    //     $username = $_POST['username'];
    //     $email = $_POST['email'];

    //     $data = [
    //         'username' => $username

    //     ];

    //     //goi AuthHelper
    //     $result = AuthHelper::forgotPassword($data);

    //     if (!$result) {
    //         NotificationHelper::error('username_exist', 'không tồn tại tài khoản này');
    //         header('location: /forgot-password');
    //         exit;
    //     }
    //     if ($result['email'] != $email) {
    //         NotificationHelper::error('email_exist', 'email không đúng');
    //         header('location: /forgot-password');
    //         exit;
    //     }
    //     $_SESSION['reset_password'] = [
    //         'username' => $username,
    //         'email' => $email
    //     ];
    //     header('location: /reset-password');
    //     // echo 'thành công';

    // }
    // // hiện thị giao diện form đặt lại mật khẩu

    // public static function resetPassword()
    // {
    //     if(!isset($_SESSION['reset_password'])) {
    //         NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form nay');
    //         header('location: /forgot-password');
    //         exit;
    //     }
    //     Header::render();
    //     Notification::render();
    //     NotificationHelper::unset();
    //     ResetPassword::render();
    //     Footer::render();
    // }
    // public static function resetPasswordAction(){
    //     //validation
    //     $is_valid=AuthValidation::resetPassword();

    //     if (!$is_valid) {
    //         NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
    //         header('location: /reset-password ');
    //         exit; 
    //     }


    //     $password=$_POST['password'];
    //     $hash_password=password_hash($password, PASSWORD_DEFAULT);

    //     $data=[
    //         'username'=>$_SESSION['reset_password']['username'],
    //         'email'=>$_SESSION['reset_password']['email'],
    //         'password'=>$hash_password
    //     ];


    //     $result=AuthHelper::resetPassword($data);
    //     if ($result) {
    //         NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
    //         unset($_SESSION['reset_password']);
    //         header('location: /login');
    //     }else{
    //         NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
    //         header('location: /reset-password ');
    //     }


    // }
}
