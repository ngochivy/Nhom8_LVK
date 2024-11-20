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
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\ResetPassword;
use App\Views\Client\Pages\Auth\Edit;

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

        // password hash
        $password = password_hash($password, PASSWORD_DEFAULT);

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
        // Bắt lỗi validation
        $is_valid = AuthValidation::login();

        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
            exit();
        }

        // Lấy dữ liệu từ form
        $data = [
            'username' => $_POST['username'], // Key đồng bộ với form
            'password' => $_POST['password'], // Key đồng bộ với form
            'remember' => isset($_POST['remember'])
        ];

        // Gọi hàm xử lý đăng nhập
        $result = AuthHelper::login($data);
        if ($result) {
            NotificationHelper::success('login', 'Đăng nhập thành công');
            header('location:/');
            exit();
        } else {
            header('location:/login');
            exit();
        }
    }



    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location:/');
    }


    public static function edit($id)
    {
        // Kiểm tra quyền truy cập
        if (!isset($_SESSION['user']) || $_SESSION['user']['User_ID'] != $id) {
            NotificationHelper::error('user_id', 'Không có quyền truy cập.');
            header('Location: /login');
            exit;
        }

        // Lấy thông tin người dùng từ session
        $data = $_SESSION['user'];

        // Render giao diện
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }


    public static function update($id)
    {
        // Xác thực dữ liệu
        $is_valid = AuthValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại.');
            header("Location: /users/$id");
            exit;
        }

        // Chuẩn bị dữ liệu từ form
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'Phone_number' => $_POST['phone'], // Đúng tên cột
        ];



        // Kiểm tra và xử lý upload ảnh đại diện
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        // Cập nhật thông tin
        $result = AuthHelper::update($id, $data);

        if (!$result) {
            header("Location: /users/$id");
            exit;
        }

        // Chuyển hướng sau khi thành công
        header("Location: /users/$id");
        exit;
    }



    // Hien thi form doi mat khau
    public static function changePassword()
    {
        $is_login = AuthHelper::checkLogin();

        if (!$is_login) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
            header('location: /login');
            exit;
        }

        $data = $_SESSION['user'];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }

    // Thuc hien doi mat khau
    public static function changePasswordAction()
    {
        // Kiểm tra Validation thay vì bắt lỗi trống ở đây
        $is_valid = AuthValidation::changePassword();
        if (!$is_valid) {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('location: /change-password');
            exit;
        }

        // Lấy id người dùng từ session
        $id = $_SESSION['user']['User_ID'];

        // Lấy dữ liệu từ form
        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password'],
        ];

        // Gọi AuthHelper để thực hiện thay đổi mật khẩu
        $result = AuthHelper::changePassword($id, $data);

        // Sau khi xử lý xong, chuyển hướng lại trang đổi mật khẩu
        header('location: /change-password');
    }

    // hiện thị giao diện form lấy lại mật khẩu

    public static function forgotPassword()
    {

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }

    // thực hiện lấy lại mật khẩu
    public static function forgotPasswordAction()
    {
        //validation
        $is_valid = AuthValidation::forgotPassword();
        if (!$is_valid) {
            NotificationHelper::error('forgot_password', 'Lấy lại thất bại');
            header('location: /forgot-password');
            exit;
        }
        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = [
            'username' => $username

        ];

        //goi AuthHelper
        $result = AuthHelper::forgotPassword($data);

        if (!$result) {
            NotificationHelper::error('username_exist', 'không tồn tại tài khoản này');
            header('location: /forgot-password');
            exit;
        }

        if ($result['email'] != $email) {
            NotificationHelper::error('email_exist', 'email không đúng');
            header('location: /forgot-password');
            exit;
        }
        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email
        ];
        header('location: /reset-password');
        // echo 'thành công';

    }
    // hiện thị giao diện form đặt lại mật khẩu

    public static function resetPassword()
    {
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form nay');
            header('location: /forgot-password');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }
    public static function resetPasswordAction()
    {
        //validation
        $is_valid = AuthValidation::resetPassword();

        if (!$is_valid) {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password ');
            exit;
        }


        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $_SESSION['reset_password']['username'],
            'email' => $_SESSION['reset_password']['email'],
            'password' => $hash_password
        ];


        $result = AuthHelper::resetPassword($data);
        if ($result) {
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
        } else {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password ');
        }
    }
}
