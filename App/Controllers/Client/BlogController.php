<?php

namespace App\Controllers\Client;

use App\Models\Blog;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Blog\Index;


class BlogController
{
    /**
     * Hiển thị danh sách bài viết
     */
    public static function index()
    {
        $blogModel = new Blog();
    
        // Lấy bài viết
        $blogs = $blogModel->getAllBlogByStatus();
    
        // Debug: kiểm tra dữ liệu
        echo "<pre>";
        print_r($blogs);
        echo "</pre>";
        die();
    
        // Dữ liệu truyền vào view
        $data = [
            'blogs' => $blogs,
        ];
    
        // Render view
        Header::render();
        Index::render($data);
        Footer::render();
    }
    
}
