<?php

namespace App\Helpers;

use App\Models\User;
<<<<<<< HEAD
use App\Helpers\NotificationHelper;
=======
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167

class AuthHelper
{
    public static function register($data)
    {
<<<<<<< HEAD
        $user = new User();

        // Kiểm tra tên đăng nhập đã tồn tại chưa
=======

        $user = new User();
        //Bat loi ton tai username

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
        $is_exist = $user->getOneUserByUsername($data['username']);

        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }
<<<<<<< HEAD

=======
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
        NotificationHelper::error('register', 'Đăng ký thất bại');
        return false;
    }

<<<<<<< HEAD
    public static function login($data)
    {
        $user = new User();

        // Kiểm tra tên đăng nhập có tồn tại không
        $is_exist = $user->getOneUserByUsername($data['username']);

        if (!$is_exist) {
            NotificationHelper::error('Username', 'Tên đăng nhập không tồn tại');
            return false;
        }

        // Kiểm tra mật khẩu
        if (!password_verify($data['password'], $is_exist['Password'])) { // Đảm bảo sử dụng đúng key
            NotificationHelper::error('Password', 'Mật khẩu không đúng');
            return false;
        }

        // Kiểm tra trạng thái tài khoản
        if ($is_exist['Status'] == 0) {
            NotificationHelper::error('Status', 'Tài khoản đã bị khoá');
            return false;
        }

        // Cập nhật cookie hoặc session
        if ($data['remember']) {
            self::updateCookie($is_exist['User_ID']);
        } else {
=======


    public static function login($data)
    {
        //Kiem tra co ton tai username khong? Neu khong: thong bao, tra ve false
        $user = new User();
        //Bat loi ton tai username

        $is_exist = $user->getOneUserByUsername($data['username']);

        if (!$is_exist) {
            NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
            return false;
        }


        //Neu co thi kiem tra password co trung khong, Neu khong: thong bao tra ve false

        //password nguoi dang nhap: $data['password']
        //password trong  co so du lieu: $is_exist['password']

        if (!password_verify($data['password'], $is_exist['password'])) {

            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }


        //Neu co thi kiem tra status == 0. NEu khong thi thong bao tra ve false
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khoá');
            return false;
        }


        //Neu co kiem tra remember . --> lu seetion/ cookie ==> thong bao thanh cong, tra ve true

        if ($data['remember']) {
            //luu cookie /sesstion
            self::updateCookie($is_exist['User_ID']);
        } else {
            //luu sesstion
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            self::updateSession($is_exist['User_ID']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');
<<<<<<< HEAD
        return true;
    }


=======

        return true;
    }
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
<<<<<<< HEAD
            $user_data = json_encode($result);
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
=======
            //Chuyen array thanh  string json de luu vao cookie user
            $user_data = json_encode($result);

            //luu cookie 
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            //luu session
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $_SESSION['user'] = $result;
        }
    }

<<<<<<< HEAD
=======

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
<<<<<<< HEAD
            $_SESSION['user'] = $result;
        }
    }

=======
            //luu session
            $_SESSION['user'] = $result;
        }
    }
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);

            self::updateCookie($user_data['User_ID']);
<<<<<<< HEAD
=======

            // $_SESSION['user']=(array)$user_data;

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            return true;
        }

        if (isset($_SESSION['user'])) {
            self::updateCookie($_SESSION['user']['User_ID']);
            return true;
        }

        return false;
    }

    public static function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
    }

    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
<<<<<<< HEAD
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin!');
            return false;
        }

        $data = $_SESSION['user'];
        $user_id = $data['User_ID'];

=======
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin !');
            return false;
        }
        $data = $_SESSION['user'];
        $user_id = $data['User_ID'];

        if (isset($_COOKIE['user'])) {
            self::updateCookie($user_id);
        }

        self::updateCookie($user_id);

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Không có quyền xem thông tin tài khoản này');
            return false;
        }

        return true;
    }

    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->update($id, $data);

        if (!$result) {
<<<<<<< HEAD
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại.');
            return false;
        }

        // Cập nhật session và cookie nếu tồn tại
        if (isset($_SESSION['user'])) {
            self::updateSession($id);
        }

        if (isset($_COOKIE['user'])) {
            self::updateCookie($id);
        }

        NotificationHelper::success('update_user', 'Cập nhật thông tin thành công.');
        return true;
    }


    public static function changePassword($id, $data)
    {
=======
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại');
            return false;
        }

        if ($_SESSION['user']) {
            self::updateSession($id);
        }

        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }

        NotificationHelper::success('update_user', 'Cập nhật thông tin thành công');
        return true;
    }

    public static function changePassword($id, $data)
    {

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }

<<<<<<< HEAD
        // Kiểm tra mật khẩu cũ
        if (!password_verify($data['old_password'], $result['Password'])) {
=======
        //Kiem tra mat khau cu co trung khop voi co so du lieu khong?
        if (!password_verify($data['old_password'], $result['password'])) {
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không đúng');
            return false;
        }

<<<<<<< HEAD
        // Mã hóa mật khẩu mới
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);
        $data_update = ['password' => $hash_password];
=======
        //mã hóa mật khẩu truóc khi lưu
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hash_password,
        ];
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167

        $result_update = $user->updateUser($id, $data_update);

        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);
<<<<<<< HEAD
=======

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            NotificationHelper::success('change_password', 'Đổi mật khẩu thành công');
            return true;
        } else {
            NotificationHelper::error('change_password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }
<<<<<<< HEAD

    public static function forgotPassword($data)
    {
        $user = new User();
        $result = $user->getOneUserByUsername($data['username']);
=======
    public static function forgotPassword($data)
    {
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);

>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);
        return $result;
    }
<<<<<<< HEAD

    public static function middleware()
    {
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        $admin = $admin[1];

        if ($admin == 'admin') {
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                // Sử dụng ob_start() và ob_end_flush()
                ob_start();
                header('Location: /login');
                ob_end_flush();
                exit;
            }

            if ($_SESSION['user']['role'] != 1) {
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                // Sử dụng ob_start() và ob_end_flush()
                ob_start();
                header('Location: /login');
                ob_end_flush();
=======
// chỉ có admin mới vào được
    public static function middleware()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($admin);
        $admin = $admin[1];
        if ($admin == 'admin') {
            // if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !=1) {
            //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
            //     header('location: /login');
            //     exit;
            // }
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                header('location: /login');
                exit;
            }
            if($_SESSION['user']['role'] !=1){
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
                header('location: /login');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
                exit;
            }
        }
    }
}
