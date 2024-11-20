<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
    public static function register($data)
    {

        $user = new User();
        //Bat loi ton tai username

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
        NotificationHelper::error('register', 'Đăng ký thất bại');
        return false;
    }



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
            self::updateCookie($is_exist['id']);
        } else {
            //luu sesstion
            self::updateSession($is_exist['id']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');

        return true;
    }
    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //Chuyen array thanh  string json de luu vao cookie user
            $user_data = json_encode($result);

            //luu cookie 
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            //luu session
            $_SESSION['user'] = $result;
        }
    }


    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            //luu session
            $_SESSION['user'] = $result;
        }
    }
    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);

            self::updateCookie($user_data['id']);

            // $_SESSION['user']=(array)$user_data;

            return true;
        }

        if (isset($_SESSION['user'])) {
            self::updateCookie($_SESSION['user']['id']);
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
            NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin !');
            return false;
        }
        $data = $_SESSION['user'];
        $user_id = $data['id'];

        if (isset($_COOKIE['user'])) {
            self::updateCookie($user_id);
        }

        self::updateCookie($user_id);

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

        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }

        //Kiem tra mat khau cu co trung khop voi co so du lieu khong?
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không đúng');
            return false;
        }

        //mã hóa mật khẩu truóc khi lưu
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hash_password,
        ];

        $result_update = $user->updateUser($id, $data_update);

        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);

            NotificationHelper::success('change_password', 'Đổi mật khẩu thành công');
            return true;
        } else {
            NotificationHelper::error('change_password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }
    public static function forgotPassword($data)
    {
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);
        return $result;
    }
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
                exit;
            }
        }
    }
}
