<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantOption;
use App\Validations\ProductVariantOptionValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\ProductVariantOption\Create;
use App\Views\Admin\Pages\ProductVariantOption\Edit;
use App\Views\Admin\Pages\ProductVariantOption\Index;

class ProductVariantOptionController
{


    // hiển thị danh sách
    public static function index()
    {
   

        $productvariantoption = new ProductVariantOption();
        $data = $productvariantoption->getAllProductVariantOptionName();

<<<<<<< HEAD
=======

>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $product =  new ProductVariant();
        $data = $product -> getAllProductVariant();
        // var_dump($_SESSION);
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
        $is_valid = ProductVariantOptionValidation::create();

        if (!$is_valid) {
<<<<<<< HEAD
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
=======
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header('location: /admin/productvariant/create');
            exit;
        }

        $name=$_POST['name'];
        $product_variant_id=$_POST['product_variant_id'];

        $productvariantoption=new ProductVariantOption();
        $is_exist=$productvariantoption->getOneProductVariantOptionByName($name);
        if ($is_exist) {
<<<<<<< HEAD
            NotificationHelper::error('store', 'Tên loại sản phẩm đã tồn  tại');
=======
            NotificationHelper::error('store', 'Tên biến thể đã tồn  tại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header('location: /admin/productvariantoption/create');
            exit;
        }

        // thực hiện thêm
        $data=[
            'name'=>$name,
            'product_variant_id'=>$product_variant_id,
         
        ];
        $result=$productvariantoption->createProductVariantOption($data);

        // var_dump($result);

        if ($result) {
<<<<<<< HEAD
            NotificationHelper::success('store','Thêm loại sản phẩm thành công');
            header('location: /admin/productvariantoption');
        }
        else {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
=======
            NotificationHelper::success('store','Thêm biến thể thành công');
            header('location: /admin/productvariantoption');
        }
        else {
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header('location: /admin/productvariantoption/create');
            exit;

        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'ProductVariant 1',
        //     'status' => 1
        // ];
        $productvariantoption=new ProductVariantOption();
        $dataVariantOption=$productvariantoption->getOneProductVariantOption($id);
        $productVariant = new ProductVariant;
        $dataVariant = $productVariant -> getAllProductVariant();

        // $product = new Product();
        // $dataProduct = $product -> getAllProduct(); 
         $data = [
            'dataVariant' => $dataVariant,
            'dataVariantOption' => $dataVariantOption,
         ];
        if (!$data) {
<<<<<<< HEAD
            NotificationHelper::error('edit','không thể xem loại sản phẩm này');
=======
            NotificationHelper::error('edit','không thể xem biến thể này');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header('location: /admin/productvariantoption');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();




    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        
        $is_valid = ProductVariantOptionValidation::edit();

        if (!$is_valid) {
<<<<<<< HEAD
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
=======
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header("location: /admin/productvariantoption/$id");
            exit;
        }

       

        $name=$_POST['name'];
        $product_variant_id=$_POST['product_variant_id'];

        $productvariantoption=new ProductVariantOption();
        $is_exist=$productvariantoption->getOneProductVariantOptionByName($name);

        if ($is_exist) {
            if($is_exist['id']!=$id){
<<<<<<< HEAD
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn  tại');
=======
                NotificationHelper::error('update', 'Tên biến thể đã tồn  tại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
                header("location: /admin/productvariantoption/$id");
                exit;
            }
   
        }

        // thực hiện cập nhật
        $data=[
            'name'=>$name,
            'product_variant_id'=>$product_variant_id
        ];
        $result=$productvariantoption->updateProductVariantOption($id,$data);

        if ($result) {
<<<<<<< HEAD
            NotificationHelper::success('update','Cập nhật loại sản phẩm thành công');
            header('location: /admin/productvariantoption');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
=======
            NotificationHelper::success('update','Cập nhật biến thể thành công');
            header('location: /admin/productvariantoption');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672
            header("location: /admin/productvariantoption/$id");
            exit;

        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $productvariantoption=new ProductVariantOption();
        $result=$productvariantoption->deleteProductVariantOption($id);
        // var_dump($result);
        if ($result) {
<<<<<<< HEAD
            NotificationHelper::success('delete','Xóa loại biến thể thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');
=======
            NotificationHelper::success('delete','Xóa  biến thể thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa biến thể thất bại');
>>>>>>> fe25692aaf2c4d04fa4fd0190b7b0a3f9783a672

        }
        header('location: /admin/productvariantoption');
    }
}
