<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{
    public static function create(): bool
    {
        $is_valid = true;
        //Tên sản phẩm
        if (!isset($_POST['Product_name']) || $_POST['Product_name'] === '') {
            NotificationHelper::error('Product_name', 'Không để trống tên sản phẩm !');
            $is_valid = false;
        }

        //giá tiền
        if (!isset($_POST['Price']) || $_POST['Price'] === '') {
            NotificationHelper::error('Price', 'Không để trống giá tiền !');
            $is_valid = false;
        } elseif ((int) $_POST['Price'] <= 0) {
            NotificationHelper::error('Price', 'giá tiền phải lớn hơn 0 !');
            $is_valid = false;
        }

        //giá tiền giảm
        if (!isset($_POST['Discount_price']) || $_POST['Discount_price'] === '') {
            NotificationHelper::error('Discount_price', 'Không để trống giá tiền giảm !');
            $is_valid = false;
        } elseif ((int) $_POST['Discount_price'] <= 0) {
            NotificationHelper::error('Discount_price', 'giá tiền giảm phải lớn hơn hoặc bằng 0 !');
            $is_valid = false;
        }elseif ((int) $_POST['Discount_price']> (int) $_POST['Price']) {
            NotificationHelper::error('Discount_price', 'giảm giá tiền phải nhỏ hơn giá tiền !');
            $is_valid = false;
        }

        // id loại sản phẩm
        if (!isset($_POST['Category_ID']) || $_POST['Category_ID'] === '') {
            NotificationHelper::error('Category_ID', 'Không để trống loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['Quantity']) || $_POST['Quantity'] === '') {
            NotificationHelper::error('Quantity', 'Không để trống số lượng !');
            $is_valid = false;
        }
        // if (!isset($_POST['User_manual']) || $_POST['User_manual'] === '') {
        //     NotificationHelper::error('User_manual', 'Không để trống hướng dẫn !');
        //     $is_valid = false;
        // }
        // Nổi bật
        if (!isset($_POST['is_feature']) || $_POST['is_feature'] === '') {
            NotificationHelper::error('is_feature', 'Không để trống Nổi bật !');
            $is_valid = false;
        }
        // Trạng thái
        //trạng thái
        if (!isset($_POST['Status']) || $_POST['Status'] === '') {
            NotificationHelper::error('Status', ' Không được để trống trạng thái');
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
        $target_dir = 'public/uploads/products/';

        //Kiem tra loai file uplaod co hop le khong.
        $imageFileType = strtolower(pathinfo(basename($_FILES['Image']['Product_name']), PATHINFO_EXTENSION));

        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, GIF, JPEG');
            return false;
        }
        // Thay doi ten file thanh dang nam thang gio giay phut 
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        // duong dan day du de di chuyen file
        $target_file = $target_dir . $nameImage;

        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Upload ảnh thất bại');
            return false;
        }
        return $nameImage;
    }
}
