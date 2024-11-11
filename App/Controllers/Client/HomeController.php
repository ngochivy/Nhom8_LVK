<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Page\Gioithieu;

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
    public static function gioithieu() 
    {
        Header::render();
        Gioithieu::render(); 
        Footer::render();
    }
}
