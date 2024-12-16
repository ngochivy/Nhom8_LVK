<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
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


        $comment = new Comment();
        $data = $comment->getAllComment();

        //get username by 
        
        foreach ($data as &$item) {
            $item['username'] = $comment->getUsernamebyUserId($item['user_id']);
        }
        

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


   

    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {


        $comment = new Comment();
        $data = $comment->getOneComment($id);



        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem bình luận này');
            header('location: /admin/comments');
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
        //Validation cac truong du lieu

        $is_valid = CommentValidation::edit();

        if (!$is_valid) {

            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
            exit;
        }


        $Satatus = $_POST['status'];


        $comment = new Comment();





        //thuc hien them cap nhat

        $data = [

            'status' => $Satatus
        ];

        $result = $comment->updateComment($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
            header('location: /admin/comments');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("location: /admin/comments/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment=new Comment();
        $result=$comment->deleteComment($id);

        // var_dump($result);
        if($result) {
            NotificationHelper::success('delete', 'Xoá bình luận thành công');
            header('location: /admin/comments');
        } else{
            NotificationHelper::error('delete', 'Xoá bình luận thất bại');
            header('location: /admin/comments');
        }
    }
}
