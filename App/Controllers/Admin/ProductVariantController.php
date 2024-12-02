<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Validations\ProductVariantValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\ProductVariant\Create;
use App\Views\Admin\Pages\ProductVariant\Edit;
use App\Views\Admin\Pages\ProductVariant\Index;

class ProductVariantController
{


    // hiển thị danh sách
    public static function index()
    {
   

        $productvariant = new ProductVariant();
        $data = $productvariant->getAllProductVariantName();

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
        $product =  new Product();
        $data = $product -> getAllProduct();
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
        $is_valid = ProductVariantValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm loại biến thể thất bại');
            header('location: /admin/productvariant/create');
            exit;
        }

        $name=$_POST['name'];
        $product_id=$_POST['product_id'];

        $ProductVariant=new ProductVariant();
        $is_exist=$ProductVariant->getOneProductVariantByName($name);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên loại biến thể đã tồn  tại');
            header('location: /admin/productvariant/create');
            exit;
        }

        // thực hiện thêm
        $data=[
            'name'=>$name,
            'product_id'=>$product_id,
         
        ];
        $result=$ProductVariant->createProductVariant($data);

        // var_dump($result);

        if ($result) {
            NotificationHelper::success('store','Thêm loại biến thể thành công');
            header('location: /admin/productvariant');
        }
        else {
            NotificationHelper::error('store', 'Thêm loại biến thể thất bại');
            header('location: /admin/productvariant/create');
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
        $ProductVariant=new ProductVariant();
        $dataVariant=$ProductVariant->getOneProductVariant($id);
        $product = new Product;
        $dataProduct = $product -> getAllProduct();

        // $product = new Product();
        // $dataProduct = $product -> getAllProduct(); 
         $data = [
            'dataVariant' => $dataVariant,
            'dataProduct' => $dataProduct,
         ];
        if (!$data) {
            NotificationHelper::error('edit','không thể xem loại biến thể này');
            header('location: /admin/productvariant');
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
        
        $is_valid = ProductVariantValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật loại biến thể thất bại');
            header("location: /admin/productvariant/$id");
            exit;
        }

       

        $name=$_POST['name'];
        $product_id=$_POST['product_id'];

        $ProductVariant=new ProductVariant();
        $is_exist=$ProductVariant->getOneProductVariantByName($name);

        if ($is_exist) {
            if($is_exist['id']!=$id){
                NotificationHelper::error('update', 'Tên loại biến thể đã tồn  tại');
                header("location: /admin/productvariant/$id");
                exit;
            }
   
        }

        // thực hiện cập nhật
        $data=[
            'name'=>$name,
            'product_id'=>$product_id
        ];
        $result=$ProductVariant->updateProductVariant($id,$data);

        if ($result) {
            NotificationHelper::success('update','Cập nhật loại biến thể thành công');
            header('location: /admin/productvariant');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật loại biến thể thất bại');
            header("location: /admin/productvariant/$id");
            exit;

        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $ProductVariant=new ProductVariant();
        $result=$ProductVariant->deleteProductVariant($id);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete','Xóa loại biến thể thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa loại biến thể thất bại');

        }
        header('location: /admin/productvariant');
    }
}
