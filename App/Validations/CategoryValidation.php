<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CategoryValidation{
    public static function create():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['Category_name']) || $_POST['Category_name'] === '') {
            NotificationHelper::error('Category_name', 'Không để trống tên loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['Category_description']) || $_POST['Category_description'] === '') {
            NotificationHelper::error('Category_description', 'Không để trống mô tả !');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['Status']) || $_POST['Status'] === '') {
            NotificationHelper::error('Status', 'Không để trống trạng thái !');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['Category_name']) || $_POST['Category_name'] === '') {
            NotificationHelper::error('Category_name', 'Không để trống tên loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['Category_description']) || $_POST['Category_description'] === '') {
            NotificationHelper::error('Category_description', 'Không để trống mmoo tả !');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['Status']) || $_POST['Status'] === '') {
            NotificationHelper::error('Status', 'Không để trống trạng thái !');
            $is_valid = false;
        }

        return $is_valid;
    }
}