<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CommentValidation
{
    public static function editClient(): bool
    {
        $is_valid = true;
        //Tên ten loai san pham 
        if (!isset($_POST['Content']) || $_POST['Content'] === '') {
            NotificationHelper::error('Content', 'Nội dung bình luận không được để trống !');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool
    {
        $is_valid = true;

        //Trang thai
        if (!isset($_POST['Status']) || $_POST['Status'] === '') {
            NotificationHelper::error('Status', 'Trạng thái không được để trống !');
            $is_valid = false;
        }

        return $is_valid;
    }
}
