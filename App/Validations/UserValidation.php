<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {

        $is_valid = true;
        //Tên đăng nhập

        if (!isset($_POST['Username']) || $_POST['Username'] == '') {
            NotificationHelper::error('Username', 'Tên đăng nhập không được để trống !');
            $is_valid = false;
        }
        //Mật khẩu 

        if (!isset($_POST['Password']) || $_POST['Password'] === '') {
            NotificationHelper::error('Password', 'Mật khẩu không được để trống !');
            $is_valid = false;
        } else {
            if (strlen($_POST['Password']) < 3) {
                NotificationHelper::error('Password', 'Mật khẩu phải ít nhất 3 ký tự !');
                $is_valid = false;
            }
        }

        //Nhập lại mật khẩu

        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Nhập lại mật khẩu không được để trống');
            $is_valid = false;
        } else {
            if ($_POST['Password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu nhập lại phải trùng khớp');
                $is_valid = false;
            }
        }


        //email

        if (!isset($_POST['Email']) || $_POST['Email'] === '') {
            NotificationHelper::error('Email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['Email'])) {
                NotificationHelper::error('Email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        //ho va ten
        if (!isset($_POST['Name']) || $_POST['Name'] === '') {
            NotificationHelper::error('Name', 'Họ và tên không được để trống');
            $is_valid = false;
        }
        //trạng thái
        if (!isset($_POST['Status']) || $_POST['Status'] === '') {
            NotificationHelper::error('Status', ' Không được để trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }


    public static function edit(): bool
    {
        $is_valid = true;

        //Mật khẩu 
        if (isset($_POST['Password']) && $_POST['Password'] !== '') {
            if (strlen($_POST['Password']) < 3) {
                NotificationHelper::error('Password', 'Mật khẩu phải ít nhất 3 ký tự !');
                $is_valid = false;
            }
        //Nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Nhập lại mật khẩu không được để trống');
            $is_valid = false;
        } else {if ($_POST['Password'] != $_POST['re_password']) {
            NotificationHelper::error('re_password', 'Mật khẩu nhập lại phải trùng khớp');
            $is_valid = false;
        }
    }


    }

    //email

    if (!isset($_POST['Email']) || $_POST['Email'] === '') {
        NotificationHelper::error('Email', 'Email không được để trống');
        $is_valid = false;
    } else {
        $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($emailPattern, $_POST['Email'])) {
            NotificationHelper::error('Email', 'Email không đúng định dạng');
            $is_valid = false;
        }
    }

    //ho va ten
    if (!isset($_POST['Name']) || $_POST['Name'] === '') {
        NotificationHelper::error('Name', 'Họ và tên không được để trống');
        $is_valid = false;
    }
    if (!isset($_POST['Phone_number']) || $_POST['Phone_number'] === '') {
        NotificationHelper::error('Phone_number', 'số điện thoại không được để trống');
        $is_valid = false;
    }
    if (!isset($_POST['Address']) || $_POST['Address'] === '') {
        NotificationHelper::error('Address', 'địa chỉ không được để trống');
        $is_valid = false;
    }
    //trạng thái
    if (!isset($_POST['Status']) || $_POST['Status'] === '') {
        NotificationHelper::error('Status', ' Không được để trạng thái');
        $is_valid = false;
    }
    

    return $is_valid;
}
public static function uploadAvatar()
{
    return AuthValidation::uploadAvatar();
}
}