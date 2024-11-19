<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Validations\UserValidation;
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

        $user = new User();
        $data = $user->getAllUser();
        // var_dump($data);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    } // hiển thị giao diện form thêm

    public static function create()
    {
        // var_dump($_SESSION);
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

        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }
    // // xử lý chức năng thêm
    public static function store()
    {

        //validation các trường dữ liệu
        $is_valid = UserValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit;
        }

        $Username = $_POST['Username'];
        // không đc trùng tên đăng nhập

        $user = new User();
        $is_exist = $user->getOneUserByUsername($Username);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên người dùng đã tồn  tại');
            header('location: /admin/users/create');
            exit;
        }

        // thực hiện thêm
        $data = [

            'Username' => $Username,
            'Email' => $_POST['Email'],
            'Address' => $_POST['Address'],
            'Phone_number' => $_POST['Phone_number'],
            'Name' => $_POST['Name'],
            'Password' => password_hash($_POST['Password'], PASSWORD_DEFAULT),
            'Role' => $_POST['Role'],
            'Status' => $_POST['Status']


        ];
        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['Image'] = $is_upload;
        }
        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit;

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

    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $user = new User();
        $data = $user->getOneUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'không thể xem người dùng này');
            header('location: /admin/users');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }
    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        $is_valid = UserValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit;
        }

        $user = new User();
        // thực hiện cập nhật
        $data = [
            'Email' => $_POST['Email'],
            'Name' => $_POST['Name'],
            'Address' => $_POST['Address'],
            'Phone_number' => $_POST['Phone_number'],
            'Role' => $_POST['Role'],
            'Status' => $_POST['Status']
        ];
        if ($_POST['Password'] !== '') {
            $data['Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        }
        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['Image'] = $is_upload;
        }
        $result = $user->updateUser($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit;
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        $user=new User();
        $result=$user->deleteUser($id);
        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete','Xóa người dùng thành công');

        }else{
            NotificationHelper::error('delete', 'Xóa người dùng thất bại');

        }
        header('location: /admin/users');

    }
}
