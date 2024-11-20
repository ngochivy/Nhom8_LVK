<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class User extends BaseModel
{
    protected $table = 'users';
    protected $id = 'User_ID';

    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }

    public function createUser($data)
    {
        return $this->create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
    public function getAllUserByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneUserByUsername(string $username)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM users WHERE Username=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu bằng Username: ' . $th->getMessage());
            return $result;
        }
    }
    public function updateUserByUsernameAndEmail(array $data)
    {
        try {
            $username = $data['Username'];
            $email = $data['Email'];
            $password = $data['Password'];
            $sql = "UPDATE $this->table SET Password='$password' WHERE Username='$username' AND  Email='$email'";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // trả về số hàng dữ liệu bị ảnh hưởng
            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            NotificationHelper::error('updateUserByUsernameAndEmail', 'lỗi khi thực hiện cập nhật dữ liệu');
            return false;
        }
    }

    public function countTotalUser(){
        return $this->countTotal();
    }
}
