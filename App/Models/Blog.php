<?php

namespace App\Models;

class Blog extends BaseModel
{
    protected $table = 'blogs';
    protected $id = 'id';

    public function getAllBlog()

    {
        return $this->getAll();
    }

    public function getOneBlog($id)
    {
        return $this->getOne($id);
    }

    public function createBlog($data)
    {
        return $this->create($data);
    }


    public function updateBlog($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBlog($id)
    {
        return $this->delete($id);
    }

    public function getAllBlogByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneBlogByName(string $Title)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE title=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $Title);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi kiểm tra tên: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalBlog()
    {
        return $this->countTotal();
    }

    public function getAllUsers()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM users";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy danh sách người dùng: ' . $th->getMessage());
        }
        return $result;
    }

    public function getUsernameByAuthorId($authorId)
{
    try {
        $sql = "SELECT u.username FROM users u WHERE u.id = ?";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        
        // Liên kết biến $authorId với tham số trong câu lệnh SQL
        $stmt->bind_param('i', $authorId);
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result()->fetch_assoc();
        
        return $result ? $result['username'] : null;
    } catch (\Throwable $th) {
        error_log('Lỗi khi lấy username: ' . $th->getMessage());
        return null;
    }
}



}
