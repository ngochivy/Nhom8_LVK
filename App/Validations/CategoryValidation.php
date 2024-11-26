<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CategoryValidation{
    public static function create():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['description']) || $_POST['description'] === '') {
            NotificationHelper::error('description', 'Không để trống mô tả !');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái !');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['description']) || $_POST['description'] === '') {
            NotificationHelper::error('description', 'Không để trống mmoo tả !');
            $is_valid = false;
        }
        // Trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái !');
            $is_valid = false;
        }

        return $is_valid;
    }
}