<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantOption;
use App\Models\Sku;
use App\Validations\SkuValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Sku\Create;
use App\Views\Admin\Pages\Sku\Edit;
use App\Views\Admin\Pages\Sku\Index;

class SkuController
{


    // hiển thị danh sách
    public static function index()
    {
   

        $sku = new Sku();
        $data = $sku->getAllSku();

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
        $sku =  new Sku();
        $data = $sku -> getAllSku();

        $product = new Product();
        $data_product= $product->getAllProduct();

        $variant = new ProductVariant();
        $data_variant = $variant -> getAllProductVariant();

        $variantoption = new ProductVariantOption();
        $data_variant_option = $variantoption -> getAllProductVariantOption();



        $data = [
             'product' => $data_product,
             'variant' => $data_variant,
             'variantoption' => $data_variant_option,
        ];

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
        $is_valid = SkuValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('location: /admin/skus/create');
            exit;
        }

        $sku=$_POST['sku'];
        $price=$_POST['price'];
        $product_id=$_POST['product_id'];
        $product_variant_option_id=$_POST['product_variant_option_id'];

        $sku=new Sku();
        $is_exist=$sku->getOneSkuByName($sku);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên loại sản phẩm đã tồn  tại');
            header('location: /admin/skus/create');
            exit;
        }

        // thực hiện thêm
        $data=[
            'sku'=>$sku,
            'price'=>$price,
            'product_id'=>$product_id,
            'product_variant_option_id'=>$product_variant_option_id,
         
        ];
        $result=$sku->createSku($data);

        // var_dump($result);
    // var_dump($data);

        if ($result) {
            NotificationHelper::success('store','Thêm loại sản phẩm thành công');
            header('location: /admin/skus');
        }
        else {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('location: /admin/skus/create');
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
        $sku=new sku();
        $dataSku=$sku->getOneSku($id);
        $productvariantoption = new ProductVariantOption;
        $dataVariantOption = $productvariantoption -> getAllProductVariantOption();

        // $product = new Product();
        // $dataProduct = $product -> getAllProduct(); 
         $data = [
            'dataSku' => $dataSku,
            'dataVariantOption' => $dataVariantOption,
         ];
        if (!$data) {
            NotificationHelper::error('edit','không thể xem loại sản phẩm này');
            header('location: /admin/skus');
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
        
        $is_valid = SkuValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("location: /admin/skus/$id");
            exit;
        }

       

        $sku=$_POST['sku'];
        $price=$_POST['price'];
        $product_id=$_POST['product_id'];
        $product_variant_option_id=$_POST['product_variant_option_id'];

        $productvariantoption=new Sku();
        $is_exist=$productvariantoption->getOneSkuByName($sku);

        if ($is_exist) {
            if($is_exist['id']!=$id){
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn  tại');
                header("location: /admin/skus/$id");
                exit;
            }
   
        }

        // thực hiện cập nhật
        $data=[
            'sku'=>$sku,
            'price'=>$price,
            'product_id'=>$product_id,
            'product_variant_option_id'=>$product_variant_option_id
        ];
        $result=$productvariantoption->updateSku($id,$data);

        if ($result) {
            NotificationHelper::success('update','Cập nhật loại sản phẩm thành công');
            header('location: /admin/skus');
        }
        else {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("location: /admin/skus/$id");
            exit;

        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $productvariantoption=new Sku();
        $result=$productvariantoption->deleteSku($id);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete','Xóa loại biến thể thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');

        }
        header('location: /admin/skus');
    }
}
