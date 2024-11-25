<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class BlogValidation
{
    public static function create(): bool
    {
        $is_valid = true;
        //Tên bài viét
        if (!isset($_POST['Title']) || $_POST['Title'] === '') {
            NotificationHelper::error('Title', 'Không để trống tiêu đề bài viết !');
            $is_valid = false;
        }

         //Nôi jdung bài viết
         if (!isset($_POST['Content']) || $_POST['Content'] === '') {
            NotificationHelper::error('Content', 'Không để trống nội dung bài viết !');
            $is_valid = false;
        }

          //Tên tác giả
          if (!isset($_POST['Author_ID']) || $_POST['Author_ID'] === '') {
            NotificationHelper::error('Author_ID', 'Không để trống tên tác giả !');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit(): bool
    {
      return self::create();
    }

    public static function uploadImage()
    {
        if (!file_exists($_FILES['Image']['tmp_name']) || !is_uploaded_file($_FILES['Image']['tmp_name'])) {
            return false;
        }

        // noi luu tru hinh anh trong sourcecode
        $target_dir = 'public/uploads/blogs/';

        //Kiem tra loai file uplaod co hop le khong.
        $imageFileType = strtolower(pathinfo(basename($_FILES['Image']['name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, GIF, JPEG');
            return false;
        }
        // Thay doi ten file thanh dang nam thang gio giay phut 
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // duong dan day du de di chuyen file
        $target_file = $target_dir . $nameImage;

        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_uplaod', 'Upload ảnh thất bại');
            return false;
        }
        return $nameImage;
    }
}