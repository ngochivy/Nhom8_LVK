<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class CommentController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $data = [
            [
                'id' => 1,
                'content' => 'product 1',
                'date' => '1/1/2025',
                'status' => 1,
                'id_product' => 2,
                'id_user' => 3,
            ],
            [
                'id' => 2,
                'content' => 'content 2',
                'date' => '1/1/2025',
                'status' => 1,
                'id_product' => 1,
                'id_user' => 2,
            ],
            [
                'id' => 3,
                'content' => 'content 3',
                'date' => '1/1/2025',
                'status' => 1,
                'id_product' => 3,
                'id_user' => 1,
            ],


        ];

        Header::render();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
   


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
        $data =             [
            'id' => $id,
            'content' => 'product 1',
            'date' => '1/1/2025',
            'status' => 1,
            'id_product' => 2,
            'id_user' => 3,
        ];
        if ($data) {
            Header::render();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            header('location: /admin/comments');
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
