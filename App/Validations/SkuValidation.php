<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class SkuValidation{
    public static function create(){
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['sku']) || $_POST['sku'] === '') {
            NotificationHelper::error('sku', 'Không để trống Sku !');
            $is_valid = false;
        }
        if (!isset($_POST['prices']) || $_POST['prices'] === '') {
            NotificationHelper::error('prices', 'Không để trống giá !');
            $is_valid = false;
        }        
        if (!isset($_POST['quantity']) || $_POST['quantity'] === '') {
            NotificationHelper::error('quantity', 'Không để trống số lượng !');
            $is_valid = false;
        }
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Không để tên sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['product_variant_option_id']) || $_POST['product_variant_option_id'] === '') {
            NotificationHelper::error('product_variant_option_id', 'Không để tên biến thể !');
            $is_valid = false;
        }
      

        return $is_valid;
    }
    public static function edit(){
        $is_valid = true;
        //Tên loại
        if (!isset($_POST['sku']) || $_POST['sku'] === '') {
            NotificationHelper::error('sku', 'Không để trống Sku !');
            $is_valid = false;
        }
        if (!isset($_POST['prices']) || $_POST['prices'] === '') {
            NotificationHelper::error('prices', 'Không để trống giá !');
            $is_valid = false;
        }        
        if (!isset($_POST['quantity']) || $_POST['quantity'] === '') {
            NotificationHelper::error('quantity', 'Không để trống số lượng !');
            $is_valid = false;
        }
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Không để tên sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['product_variant_option_id']) || $_POST['product_variant_option_id'] === '') {
            NotificationHelper::error('product_variant_option_id', 'Không để tên biến thể !');
            $is_valid = false;
        }

        return $is_valid;
    }
}