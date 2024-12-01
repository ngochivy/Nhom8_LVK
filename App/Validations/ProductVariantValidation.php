<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductVariantValidation{
    public static function create():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên loại biến thể !');
            $is_valid = false;
        }
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Không để trống mô tả !');
            $is_valid = false;
        }
      

        return $is_valid;
    }
    public static function edit():bool{
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên loại biến thể !');
            $is_valid = false;
        }

        return $is_valid;
    }
}