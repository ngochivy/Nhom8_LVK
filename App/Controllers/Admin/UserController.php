<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\user\Index;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'username' => 'chivy',
                'password' => '$2y$10$EZ6qLhq8b63iY/UKjmWss.I9hdZ1dIbu0fDzDYXmuSV',
                'email' => 'ngochivy@gmail.com',
                'name' => 'Chí Vỹ',
                'avt' => '',
                'role' => 1,
                'status' => 1,
            ],
            [
                'id' => 2,
                'username' => 'nhutlinh',
                'password' => '8b353d5cc07e13577608711f4602fcb7',
                'email' => 'trannhutlinh@gmail.com',
                'name' => 'Nhựt Linh',
                'avt' => '',
                'role' => 1,
                'status' => 1,
            ],
            [
                'id' => 3,
                'username' => 'hoangkhang',
                'password' => '$2y$10$XCY6bEgV/pEUuEt//d9i4eQdZ1dIbu0fDzDYXmuSV',
                'email' => 'lehoangkhang@gmail.com',
                'name' => 'Hoàng Khang',
                'avt' => '',
                'role' => 1,
                'status' => 1,
            ],



        ];

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
   
    public static function create()
    {
        Header::render();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }

    // xử lý chức năng thêm
    public static function store()
    {
        echo 'Thực hiện lưu vào database';
    }


    // hiển thị chi tiết
    public static function show() {}


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            'id' => $id,
            'username' => 'chivy',
            'password' => '$2y$10$EZ6qLhq8b63iY/UKjmWss.I9hdZ1dIbu0fDzDYXmuSV',
            'email' => 'ngochivy@gmail.com',
            'name' => 'Chí Vỹ',
            'avt' => '',
            'role' => 1,
            'status' => 1,
        ];
        if ($data) {
            Header::render();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/users');
        }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        echo 'Thực hiện cập nhật vào database';
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        echo 'Thực hiện xoá';
    }
}
