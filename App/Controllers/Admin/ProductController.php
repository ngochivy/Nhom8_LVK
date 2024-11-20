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
        $data = $Product->getAllProduct();
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

        //validation các trường dữ liệu
        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }

        $Product_name = $_POST['Product_name'];
        // kiểm tra sản phẩm có tồn tại chưa ==> Khong duoc trung ten
        $Product = new Product();
        $is_exist = $Product->getOneProductByName($Product_name);

        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }

        // thực hiện thêm
        $data = [
            'Product_name' => $Product_name,
            'Price' => $_POST['Price'],
            'Discount_price' => $_POST['Discount_price'],
            'Description' => $_POST['Description'],
            'Quantity' => $_POST['Quantity'],
            'User_manual' => $_POST['User_manual'],
            'is_feature' => $_POST['is_feature'],
            'Status' => $_POST['Status'],
            'Category_ID' => $_POST['Category_ID'],
        ];



        $is_upload=ProductValidation::uploadImage();
        if($is_upload){
            $data['Image']= $is_upload;
        }

        $result = $Product->createProduct($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm loại sản phẩm thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }
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
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }

        $Product_name=$_POST['Product_name'];
      
        $Product=new Product();
        $is_exist=$Product->getOneProductByName($Product_name);

        if ($is_exist) {
            if($is_exist['Product_ID']!=$id){
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn  tại');
                header("location: /admin/products/$id");
                exit;
            }

        }

        // thực hiện cập nhật
        $data = [
            'Product_name' => $Product_name,
            'Price' => $_POST['Price'],
            'Discount_price' => $_POST['Discount_price'],
            'Description' => $_POST['Description'],
            'Quantity' => $_POST['Quantity'],
            'User_manual' => $_POST['User_manual'],
            'is_feature' => $_POST['is_feature'],
            'Status' => $_POST['Status'],
            'Category_id' => $_POST['Category_id'],
        ];

        $is_upload=ProductValidation::uploadImage();
        if($is_upload){
            $data['Image']= $is_upload;
        }

        $result=$Product->updateProduct($id,$data);

        if ($result) {
            NotificationHelper::success('update','Cập nhật loại sản phẩm thành công');
            header('location: /admin/products');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header('location: /admin/products/create');
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
            NotificationHelper::success('delete','Xóa loại sản phẩm thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');

        }
        header('location: /admin/products');
    }
}
