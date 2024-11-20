<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {

        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $product = new Product();
        $products = $product->getAllProductByStatus();


        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
   

        $product=new Product();
        $product_detail=$product->getOneProductByStatus($id);

        if(!$product_detail){
            NotificationHelper::error('product_detail','không thể xem sản phẩm này');
            header('location: /products');
            exit;
        }


        // $comment=new Comment();
        // $comments = $comment->get5commentNewestByProductAndStatus($id);
        // $data = [
        //     'product' => $product_detail,
        //     'comments'=>$comments
        // ];

        // // echo '<pre>';
        // // var_dump($data);
        // Header::render();
        // Notification::render();
        // NotificationHelper::unset();
        // Detail::render($data);
        // Footer::render();
    }

    public static function getProductByCategory($id)
    {
        $category= new Category();
        $categories=$category->getAllCategoryByStatus();
        $product=new Product();
        $products=$product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}
