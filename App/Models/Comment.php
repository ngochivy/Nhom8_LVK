<?php

namespace App\Models;

class Comment extends BaseModel


{
    protected $table = 'comments';
    protected $id = 'Comment_ID';

    public function getAllComment()
    {
        return $this->getAll();
    }
    public function getOneComment($id)
    {
        return $this->getOne($id);
    }

    public function createComment($data)
    {
        return $this->create($data);
    }

    public function updateComment($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteComment($id)
    {
        return $this->delete($id);
    }
    public function getAllCommentByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getAllCommentJoinProductAndUser()
    {
        try {
            $sql = "SELECT comments.*, products.Product_name AS product_name, users.Username 
                FROM comments 
                INNER JOIN products ON comments.Product_ID = products.ID 
                INNER JOIN users ON comments.User_ID = users.ID";
            $conn = $this->_conn->MySQLi();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị bình luận: ' . $th->getMessage());
            return [];
        }
    }


    public function getOneCommentJoinProductAndUser(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.Product_name AS product_name, users.Username 
            FROM comments INNER JOIN products ON comments.Product_ID=Products.ID 
            INNER JOIN users ON comments.User_ID=Users.ID
            WHERE comments.Comment_ID=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function get5CommentNewestByProductAndStatus(int $id)
    {
        $result = [];
        try {

            $sql = "SELECT comments.*,users.Username, users.Name, users.Image 
            FROM comments INNER JOIN users ON comments.User_ID=users.User_ID 
            WHERE comments.Product_ID=? AND comments.Status=" . self::STATUS_ENABLE   . " ORDER BY Created_at DESC LIMIT 5;";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    // public function countTotalComment()
    // {
    //     return $this->countTotal();
    // }
    public function countCommentByProduct()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count,products.Product_name FROM comments INNER JOIN products ON comments.Product_ID = Products.ID GROUP BY comments.Product_ID ORDER BY count DESC LIMIT 5;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
