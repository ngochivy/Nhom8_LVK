<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\About;
use App\Views\Client\Pages\Page\Cart;
use App\Views\Client\Pages\Page\Checkout;
use App\Views\Client\Pages\Page\Login;
use App\Views\Client\Pages\Page\Register;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {

        
        Header::render();
        Home::render();
        Footer::render();
    }

    // hiển thị trang giới thiệu
    public static function about() 
    {
        Header::render();
        About::render(); 
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

    public static function login() {
        Header::render();
        // Hiển thị giao diện đăng nhập
        Login::render();
        Footer::render();
    }

    public static function register() {
        Header::render();
        // Hiển thị giao diện đăng ký
        Register::render();
        Footer::render();
    }
}
