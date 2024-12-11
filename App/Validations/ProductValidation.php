<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation
{
    public static function create(): bool
    {
        $is_valid = true;
        //Tên sản phẩm
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên sản phẩm !');
            $is_valid = false;
        }

        //giá tiền
        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Không để trống giá tiền !');
            $is_valid = false;
        } elseif ((int) $_POST['price'] <= 0) {
            NotificationHelper::error('price', 'giá tiền phải lớn hơn 0 !');
            $is_valid = false;
        }

        //giá tiền giảm
        if (!isset($_POST['discount_price']) || $_POST['discount_price'] === '') {
            NotificationHelper::error('discount_price', 'Không để trống giá tiền giảm !');
            $is_valid = false;
        } elseif ((int) $_POST['discount_price'] <= 0) {
            NotificationHelper::error('discount_price', 'giá tiền giảm phải lớn hơn hoặc bằng 0 !');
            $is_valid = false;
        }elseif ((int) $_POST['discount_price']> (int) $_POST['price']) {
            NotificationHelper::error('discount_price', 'giảm giá tiền phải nhỏ hơn giá tiền !');
            $is_valid = false;
        }

        // id loại sản phẩm
        if (!isset($_POST['category_id']) || $_POST['category_id'] === '') {
            NotificationHelper::error('category_id', 'Không để trống loại sản phẩm !');
            $is_valid = false;
        }
        if (!isset($_POST['quantity']) || $_POST['quantity'] === '') {
            NotificationHelper::error('quantity', 'Không để trống số lượng !');
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
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', ' Không được để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit(): bool
    {
      return self::create();
    }





    // thêm ảnh
    public static function uploadImage()
    {
        // Kiểm tra nếu không có file hoặc file không được upload đúng cách
if (!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            // NotificationHelper::error('no_file', 'Chưa chọn ảnh để upload!');
            return false;
        }
    
        // Đường dẫn lưu trữ file ảnh
        $target_dir = 'public/uploads/products/';
    
        // Lấy phần mở rộng của file (jpg, png, jpeg, gif)
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));
    
        // Kiểm tra nếu file ảnh có đúng định dạng không
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, GIF, JPEG');
            return false;
        }
    
        // Kiểm tra kích thước file (ví dụ, giới hạn 5MB)
        if ($_FILES['image']['size'] > 5 * 1024 * 1024) {  // 5MB
            NotificationHelper::error('size_upload', 'Kích thước ảnh không được vượt quá 5MB');
            return false;
        }
    
        // Kiểm tra MIME type của file ảnh để đảm bảo đây là ảnh thực sự (giảm nguy cơ upload file độc hại)
        $mime_type = mime_content_type($_FILES['image']['tmp_name']);
        if (strpos($mime_type, 'image') === false) {
            NotificationHelper::error('mime_type', 'File phải là ảnh!');
            return false;
        }
    
        // Tạo tên ảnh duy nhất bằng cách sử dụng ngày giờ hiện tại và một mã ngẫu nhiên
        $nameImage = uniqid('product_', true) . '.' . $imageFileType;
    
        // Đường dẫn đầy đủ để lưu trữ file
        $target_file = $target_dir . $nameImage;
    
        // Kiểm tra xem file đã tồn tại chưa
        if (file_exists($target_file)) {
            NotificationHelper::error('file_exists', 'File đã tồn tại!');
            return false;
        }
    
        // Di chuyển file từ thư mục tạm thời đến thư mục đích
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            NotificationHelper::error('move_upload', 'Upload ảnh thất bại');
            return false;
        }
    
        // Trả về tên file ảnh đã lưu
        return $nameImage;
    }
    


}