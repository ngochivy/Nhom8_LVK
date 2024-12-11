<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Blog;
use App\Validations\BlogValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Blog\Create;
use App\Views\Admin\Pages\Blog\Edit;
use App\Views\Admin\Pages\Blog\Index;

class BlogController
{


    // hiển thị danh sách
    public static function index()
    {
        $Blog = new Blog();
        $data = $Blog->getAllBlog();

        // Lấy username cho từng bài viết
        foreach ($data as &$item) {
            $item['author_username'] = $Blog->getUsernameByAuthorId($item['author_id']);
        }

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
        $blogModel = new Blog();

        // Lấy danh sách blog
        $blogs = $blogModel->getAllBlog();

        // Lấy danh sách người dùng để chọn tác giả
        $authors = $blogModel->getAllUsers();

        // Header, Notification
        Header::render();
        Notification::render();
        NotificationHelper::unset();

        // Truyền cả blogs và authors vào view Create
        Create::render([
            'blogs' => $blogs,
            'authors' => $authors
        ]);

        Footer::render();
    }



    // xử lý chức năng thêm
    public static function store()
    {
        //validation các trường dữ liệu
        $is_valid = BlogValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm bài viết thất bại');
            header('location: /admin/blogs/create');
            exit;
        }

        // thực hiện thêm
        $data = [
            'title' =>  $_POST['title'],
            'content' => $_POST['content'],
            'author_id' => $_POST['author_id'],
        ];



        $is_upload = BlogValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
        $create = new Blog();
        $result = $create->createBlog($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm bài viết phẩm thành công');
            header('location: /admin/blogs/');
        } else {
            NotificationHelper::error('store', 'Thêm bài viết thất bại');
            header('location: /admin/blogs/');
            exit;
        }
    }


    // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $blog = new Blog();
        $data = $blog->getOneBlog($id);

        if (!$data) {
            NotificationHelper::error('edit', 'không thể xem ');
            header('location: /admin/blogs');
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
        $is_valid = BlogValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header("location: /admin/blogs/$id");
            exit;
        }

        $Title = $_POST['title'];
        $Content = $_POST['content'];
        $Author_ID = $_POST['author_id'];

        $blog = new Blog();
        $is_exist = $blog->getOneBlogByName($Title);

        if ($is_exist) {
            if ($is_exist['id'] != $id) {
                NotificationHelper::error('update', 'Tên bài viết đã tồn tại');
                header("location: /admin/blogs/$id");
                exit;
            }
        }

        // thực hiện cập nhật
        $data = [
            'title' => $Title,
            'content' => $Content,
            'author_id' => $Author_ID
        ];
        $result = $blog->updateBlog($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bài viết thành công');
            header('location: /admin/blogs');
        } else {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header('location: /admin/blogs/create');
            exit;
        }
        $is_upload = BlogValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        $result = $blog->updateBlog($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bài viét thành công');
            header('location: /admin/blogs');
        } else {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header("location: /admin/blogs/$id");
            exit;
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $Blog = new Blog();
        $result = $Blog->deleteBlog($id);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa bài viết thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa bài viết thất bại');
        }
        header('location: /admin/blogs');
    }
}
