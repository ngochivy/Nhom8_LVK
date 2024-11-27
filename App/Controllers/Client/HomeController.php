<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\About;
use App\Views\Client\Pages\Page\Contact;
use App\Views\Client\Pages\Blog\Index;
use App\Views\Client\Pages\Page\Emblog;
use App\Views\Client\Pages\Page\Cart;
use App\Views\Client\Pages\Page\Checkout;
use App\Views\Client\Pages\Auth\Login;

use App\Views\Client\Pages\Auth\Register;



class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        $productModel = new \App\Models\Product();

        // Lấy danh sách sản phẩm nổi bật
        $featuredProducts = $productModel->getFeaturedProducts();

        //lấy sản phẩm mới nhất
        $newestProducts = $productModel->getNewestProducts();

        // Truyền dữ liệu vào view
        $data = [
            'featuredProducts' => $featuredProducts,
            'newestProducts' => $newestProducts,
        ];

        Header::render();
        Home::render($data);
        Footer::render();
    }



    // hiển thị trang giới thiệu
    public static function about()
    {
        Header::render();
        About::render();
        Footer::render();
    }

    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }

    public static function blog()
    {
        Header::render();
        Index::render();
        Footer::render();
    }
    public static function emblog()
    {
        Header::render();
        Emblog::render();
        Footer::render();
    }

    public static function cart()
    {
        Header::render();
        Cart::render();
        Footer::render();
    }

    public static function checkout()
    {
        Header::render();
        Checkout::render();
        Footer::render();
    }

    public static function login()
    {
        Header::render();
        // Hiển thị giao diện đăng nhập
        Login::render();
        Footer::render();
    }


    public static function register()
    {
        Header::render();
        // Hiển thị giao diện đăng ký
        Register::render();
        Footer::render();
    }
}