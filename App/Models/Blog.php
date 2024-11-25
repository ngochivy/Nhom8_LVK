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
            error_log('Lỗi khi kiểm tra tên sản phẩm: ' . $th->getMessage());
            return $result;
        }
    }

}