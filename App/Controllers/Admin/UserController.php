<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{
    // Hiển thị danh sách người dùng
    public static function index()
    {
        // Khởi tạo model
        $userModel = new User();
        
        // Lấy danh sách tất cả người dùng từ database
        $data = $userModel->getAllUser();

        // Hiển thị giao diện danh sách
        Header::render();
        Index::render($data);
        Footer::render();
    }

    // Hiển thị giao diện form thêm mới
    public static function create()
    {
        Header::render();
        Create::render();
        Footer::render();
    }

    // Xử lý chức năng thêm mới người dùng
    public static function store()
    {
        if ($_POST) {
            // Lấy dữ liệu từ form
            $data = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'email'    => $_POST['email'],
                'name'     => $_POST['name'],
                'role'     => $_POST['role'],
                'status'   => $_POST['status'],
            ];

            // Khởi tạo model
            $userModel = new User();

            // Thêm người dùng mới vào database
            $userModel->createUser($data);

            // Chuyển hướng về danh sách người dùng
            header('Location: /admin/users');
        }
    }

    // Hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // Khởi tạo model
        $userModel = new User();

        // Lấy thông tin người dùng theo ID
        $data = $userModel->getOneUser($id);

        if ($data) {
            // Hiển thị form sửa nếu tìm thấy người dùng
            Header::render();
            Edit::render($data);
            Footer::render();
        } else {
            // Chuyển hướng về danh sách nếu không tìm thấy
            header('Location: /admin/users');
        }
    }

    // Xử lý chức năng sửa thông tin người dùng
    public static function update(int $id)
    {
        if ($_POST) {
            // Lấy dữ liệu từ form
            $data = [
                'username' => $_POST['username'],
                'email'    => $_POST['email'],
                'name'     => $_POST['name'],
                'role'     => $_POST['role'],
                'status'   => $_POST['status'],
            ];

            // Nếu có mật khẩu mới, cập nhật
            if (!empty($_POST['password'])) {
                $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }

            // Khởi tạo model
            $userModel = new User();

            // Cập nhật thông tin người dùng vào database
            $userModel->updateUser($id, $data);

            // Chuyển hướng về danh sách
            header('Location: /admin/users');
        }
    }

    // Thực hiện xóa người dùng
    public static function delete(int $id)
    {
        // Khởi tạo model
        $userModel = new User();

        // Xóa người dùng khỏi database
        $userModel->deleteUser($id);

        // Chuyển hướng về danh sách
        header('Location: /admin/users');
    }
}
