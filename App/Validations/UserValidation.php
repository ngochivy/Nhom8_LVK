<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {

        $is_valid = true;
        //Tên đăng nhập

        if (!isset($_POST['username']) || $_POST['username'] == '') {
            NotificationHelper::error('username', 'Tên đăng nhập không được để trống !');
            $is_valid = false;
        }
        //Mật khẩu 

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Mật khẩu không được để trống !');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải ít nhất 3 ký tự !');
                $is_valid = false;
            }
        }

        //Nhập lại mật khẩu

        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Nhập lại mật khẩu không được để trống');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại phải trùng khớp');
                $is_valid = false;
            }
        }


        //email

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        //ho va ten
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Họ và tên không được để trống');
            $is_valid = false;
        }
        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', ' Không được để trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }


    public static function edit(): bool
    {
        $is_valid = true;

        //Mật khẩu 
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải ít nhất 3 ký tự !');
                $is_valid = false;
            }
        //Nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Nhập lại mật khẩu không được để trống');
            $is_valid = false;
        } else {if ($_POST['password'] != $_POST['re_password']) {
            NotificationHelper::error('re_password', 'Mật khẩu nhập lại phải trùng khớp');
            $is_valid = false;
        }
    }


    }

    //email

    if (!isset($_POST['email']) || $_POST['email'] === '') {
        NotificationHelper::error('email', 'Email không được để trống');
        $is_valid = false;
    } else {
        $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($emailPattern, $_POST['email'])) {
            NotificationHelper::error('email', 'Email không đúng định dạng');
            $is_valid = false;
        }
    }

    //ho va ten
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        NotificationHelper::error('name', 'Họ và tên không được để trống');
        $is_valid = false;
    }
    if (!isset($_POST['phone_number']) || $_POST['phone_number'] === '') {
        NotificationHelper::error('phone_number', 'số điện thoại không được để trống');
        $is_valid = false;
    }
    if (!isset($_POST['address']) || $_POST['address'] === '') {
        NotificationHelper::error('address', 'địa chỉ không được để trống');
        $is_valid = false;
    }
    //trạng thái
    if (!isset($_POST['status']) || $_POST['status'] === '') {
        NotificationHelper::error('status', ' Không được để trạng thái');
        $is_valid = false;
    }
    

    return $is_valid;
}
public static function uploadAvatar()
{
    return AuthValidation::uploadAvatar();
}
}