<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation
{

    //bat loi form dang ky
    public static function register(): bool
    {
        $is_valid = true;
        //Tên đăng nhập

<<<<<<< HEAD
        if (!isset($_POST['username']) || $_POST['username'] == '') {
            NotificationHelper::error('username', 'Tên đăng nhập không được để trống !');
=======
        if (!isset($_POST['Username']) || $_POST['Username'] == '') {
            NotificationHelper::error('Username', 'Tên đăng nhập không được để trống !');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $is_valid = false;
        }
        //Mật khẩu 

<<<<<<< HEAD
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Mật khẩu không được để trống !');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu phải ít nhất 3 ký tự !');
=======
        if (!isset($_POST['Password']) || $_POST['Password'] === '') {
            NotificationHelper::error('Password', 'Mật khẩu không được để trống !');
            $is_valid = false;
        } else {
            if (strlen($_POST['Password']) < 3) {
                NotificationHelper::error('Password', 'Mật khẩu phải ít nhất 3 ký tự !');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
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

<<<<<<< HEAD
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
=======
        if (!isset($_POST['Email']) || $_POST['Email'] === '') {
            NotificationHelper::error('Email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['Email'])) {
                NotificationHelper::error('Email', 'Email không đúng định dạng');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
                $is_valid = false;
            }
        }

        //ho va ten
<<<<<<< HEAD
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Họ và tên không được để trống');
=======
        if (!isset($_POST['Name']) || $_POST['Name'] === '') {
            NotificationHelper::error('Name', 'Họ và tên không được để trống');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function login(): bool
    {
        $is_valid = true;


        //Tên đăng nhập
<<<<<<< HEAD
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Tên đăng nhập không được để trống !');
=======
        if (!isset($_POST['Username']) || $_POST['Username'] === '') {
            NotificationHelper::error('Username', 'Tên đăng nhập không được để trống !');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $is_valid = false;
        }


        //Mật khẩu 
<<<<<<< HEAD
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Mật khẩu không được để trống !');
=======
        if (!isset($_POST['Password']) || $_POST['Password'] === '') {
            NotificationHelper::error('Password', 'Mật khẩu không được để trống !');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $is_valid = false;
        }





        return $is_valid;
    }



    public static function edit(): bool
    {
        $is_valid = true;


        //email

<<<<<<< HEAD
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

        // address
        if (!isset($_POST['address']) || $_POST['address'] === '') {
            NotificationHelper::error('address', 'Địa chỉ không được để trống');
            $is_valid = false;
        }

        // phone number
        if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Số điện thoại không được để trống');
            $is_valid = false;
        } else {
            $phonePattern = "/^[0-9]{10,11}$/";
            if (!preg_match($phonePattern, $_POST['phone'])) {
                NotificationHelper::error('phone', 'Số điện thoại không đúng định dạng');
=======
        if (!isset($_POST['Email']) || $_POST['Email'] === '') {
            NotificationHelper::error('Email', 'Email không được để trống');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['Email'])) {
                NotificationHelper::error('Email', 'Email không đúng định dạng');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
                $is_valid = false;
            }
        }

        //ho va ten
<<<<<<< HEAD
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Họ và tên không được để trống');
=======
        if (!isset($_POST['Name']) || $_POST['Name'] === '') {
            NotificationHelper::error('Name', 'Họ và tên không được để trống');
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            $is_valid = false;
        }

        return $is_valid;
    }
<<<<<<< HEAD
    public static function uploadAvatar()
    {
        if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
=======

    
    public static function uploadAvatar()
    {
        if (!file_exists($_FILES['Image']['tmp_name']) || !is_uploaded_file($_FILES['Image']['tmp_name'])) {
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            return false;
        }

        // noi luu tru hinh anh trong sourcecode
        $target_dir = 'public/uploads/users/';

        //Kiem tra loai file uplaod co hop le khong.
<<<<<<< HEAD
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));
=======
        $imageFileType = strtolower(pathinfo(basename($_FILES['Image']['name']), PATHINFO_EXTENSION));
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167

        if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, GIF, JPEG');
            return false;
        }
        // Thay doi ten file thanh dang nam thang gio giay phut 
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // duong dan day du de di chuyen file
        $target_file = $target_dir . $nameImage;

<<<<<<< HEAD
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
=======
        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
            NotificationHelper::error('move_uplaod', 'Upload ảnh thất bại');
            return false;
        }
        return $nameImage;
    }


    public static function changePassword(): bool
    {
        $is_valid = true;
        //mat khau cu
        if (!isset($_POST['old_password']) || $_POST['old_password'] === '') {
            NotificationHelper::error('old_password', 'Mật khẩu cũ không được để trống');
            $is_valid = false;
        }

        //Mật khẩu mới

        if (!isset($_POST['new_password']) || $_POST['new_password'] === '') {
            NotificationHelper::error('new_password', 'Mật khẩu mới không được để trống ');
            $is_valid = false;
        }
        //kiem tra độ dài
        else {
            if (strlen($_POST['new_password']) < 3) {
                NotificationHelper::error('new_password', 'Mật khẩu mới phải ít nhất 3 ký tự ');
                $is_valid = false;
            }
        }

        //Nhập lại mật khẩu mới

        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Nhập lại mật khẩu mới không được để trống');
            $is_valid = false;
        } else {
            if ($_POST['new_password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu mới nhập lại phải trùng khớp');
                $is_valid = false;
            }
        }
        return $is_valid;
    }
    public static function forgotPassword(): bool
    {
        $is_valid=true;
        //Tên đăng nhập

        if(!isset($_POST['username']) || $_POST['username']==''){
            NotificationHelper::error('username', 'Tên đăng nhập không được để trống !');
            $is_valid=false;
        }
        
        //email

        if(!isset($_POST['email']) || $_POST['email'] === ''){
            NotificationHelper::error('email', 'Email không được để trống');
            $is_valid=false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid=false;
            }
        }
        return $is_valid;

    }
    public static function resetPassword(): bool
    {
        $is_valid = true;

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

        return $is_valid;
    }
}
