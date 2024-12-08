<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantOption;
use App\Models\Sku;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Home;
use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HomeController
{
    // hiển thị thống kế
    public static function index()
    {
        $user = new User();
        $total_user = $user -> countTotalUser();

        $category = new Category();
        $total_category = $category -> countTotalCategory();

        $product = new Product();
        $total_product = $product -> countTotalProduct();
        $product_by_category = $product -> countProductByCategory();

        $productvariant = new ProductVariant();
        $total_productvariant = $productvariant -> countTotalProductVariant();
        

        $productvariantoption = new ProductVariantOption();
        $total_productvariantoption = $productvariantoption -> countTotalProductVariantOption();

        $sku = new Sku();
        $total_sku = $sku -> countTotalSku();

        $blog = new Blog();
        $total_blog = $blog -> countTotalBlog();

        $comment = new Comment();
        $total_comment = $comment -> countTotalComment();
        $comment_by_product = $comment -> countCommentByProduct();


        $data = [
            'total_user' => $total_user['total'],
            'total_category' => $total_category['total'],
            'total_product' => $total_product['total'],
            'total_productvariant' => $total_productvariant['total'],
            'total_productvariantoption' => $total_productvariantoption['total'],
            'total_sku' => $total_sku['total'],
            'total_blog' => $total_blog['total'],
            'total_comment' => $total_comment['total'],
            'product_by_category' => $product_by_category,
            'comment_by_product' => $comment_by_product,    
        ];
        Header::render();
        Home::render($data);
        Footer::render();
    }
}
