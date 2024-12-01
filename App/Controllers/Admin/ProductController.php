<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {

        $Product = new Product();
        $data = $Product->getAllProductWithCategoryName();
        // $data = $Product->getAllProduct();
        // echo '<pre>';
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
{
    // Kiểm tra validation
    $is_valid = ProductValidation::create();

    if (!$is_valid) {
        NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
        header('location: /admin/products/create');
        exit;
    }

    // Lấy dữ liệu từ form
    if (!isset($_POST['name'], $_POST['price'], $_POST['category_id'])) {
        NotificationHelper::error('store', 'Dữ liệu không hợp lệ');
        header('location: /admin/products/create');
        exit;
    }

    $name = $_POST['name'];
    
    // Kiểm tra sản phẩm có tồn tại chưa
    $Product = new Product();
    $is_exist = $Product->getOneProductByName($name);

    if ($is_exist) {
        NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
        header('location: /admin/products/create');
        exit;
    }

    // Thực hiện thêm sản phẩm
    $data = [
        'name' => $name,
        'price' => $_POST['price'],
        'discount_price' => $_POST['discount_price'],
        'description' => $_POST['description'],
        'quantity' => $_POST['quantity'],
        'user_manual' => $_POST['user_manual'],
        'is_feature' => $_POST['is_feature'],
        'status' => $_POST['status'],
        'category_id' => $_POST['category_id'],
    ];

    // Xử lý ảnh nếu có
    $is_upload = ProductValidation::uploadImage();
    if ($is_upload) {
        $data['image'] = $is_upload;
    }

    // Tạo sản phẩm
    $result = $Product->createProduct($data);

    if ($result) {
        NotificationHelper::success('store', 'Thêm sản phẩm thành công');
        header('location: /admin/products');
    } else {
        NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
        header('location: /admin/products/create');
    }
    exit;
}



    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Product 1',
        //     'status' => 1
        // ];
        $Product=new Product();
        $data_product=$Product->getOneProduct($id);

        $category= new Category();
        $data_category=$category->getAllCategory();
         

        if (!$data_product) {
            NotificationHelper::error('edit','không thể xem loại sản phẩm này');
            header('location: /admin/products');
            exit;
        }

        $data =[
            'product'=>$data_product,
            'category'=>$data_category
        ];
        // echo '<pre>';
        // var_dump($data);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();

    }


    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // Kiểm tra validation trước
        $is_valid = ProductValidation::edit();
    
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }
    
        // Lấy dữ liệu từ POST
        if (!isset($_POST['name'], $_POST['price'], $_POST['category_id'])) {
            NotificationHelper::error('update', 'Dữ liệu không hợp lệ');
            header("location: /admin/products/$id");
            exit;
        }
    
        $product_name = $_POST['name'];
        $Product = new Product();
    
        // Kiểm tra xem sản phẩm đã tồn tại chưa
        $is_exist = $Product->getOneProductByName($product_name);
        if ($is_exist && $is_exist['id'] != $id) {
            NotificationHelper::error('update', 'Tên sản phẩm đã tồn tại');
            header("location: /admin/products/$id");
            exit;
        }
    
        // Cập nhật sản phẩm
        $data = [
            'name' => $product_name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'short_description' => $_POST['short_description'],
            'description' => $_POST['description'],
            'quantity' => $_POST['quantity'],
            'user_manual' => $_POST['user_manual'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
        ];
    
        // Kiểm tra và xử lý upload hình ảnh
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
    
        // Cập nhật sản phẩm trong cơ sở dữ liệu
        $result = $Product->updateProduct($id, $data);
    
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/products');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $Product=new Product();
        $result=$Product->deleteProduct($id);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete','Xóa sản phẩm thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa sản phẩm thất bại');
        }
        header('location: /admin/products');
    }


}

