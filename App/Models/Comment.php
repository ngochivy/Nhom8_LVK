<?php

namespace App\Models;

class Comment extends BaseModel


{
    protected $table = 'comments';
    protected $id = 'id';

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
<<<<<<< HEAD
            $sql = "SELECT comments.*, products.name AS product_name, users.username 
                FROM comments 
                INNER JOIN products ON comments.product_id = products.id 
                INNER JOIN users ON comments.user_id = users.id";
=======
            $sql = "SELECT comments.*, products.Product_name AS product_name, users.Username 
                FROM comments 
                INNER JOIN products ON comments.Product_ID = products.ID 
                INNER JOIN users ON comments.User_ID = users.ID";
>>>>>>> 3b23fd1e1a3907859dcee351efa83fa411ff4bce
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
<<<<<<< HEAD
            $sql = "SELECT comments.*, products.name AS product_name, users.username 
            FROM comments INNER JOIN products ON comments.product_id=products.id 
            INNER JOIN users ON comments.user_id=users.id
            WHERE comments.id=?";
=======
            $sql = "SELECT comments.*, products.Product_name AS product_name, users.Username 
            FROM comments INNER JOIN products ON comments.Product_ID=Products.ID 
            INNER JOIN users ON comments.User_ID=Users.ID
            WHERE comments.Comment_ID=?";
>>>>>>> 3b23fd1e1a3907859dcee351efa83fa411ff4bce
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

<<<<<<< HEAD
            $sql = "SELECT comments.*,users.username, users.name, users.image 
            FROM comments INNER JOIN users ON comments.user_id=users.id 
            WHERE comments.product_id=? AND comments.status=" . self::STATUS_ENABLE   . " ORDER BY created_at DESC LIMIT 5;";
=======
            $sql = "SELECT comments.*,users.Username, users.Name, users.Image 
            FROM comments INNER JOIN users ON comments.User_ID=users.User_ID 
            WHERE comments.Product_ID=? AND comments.Status=" . self::STATUS_ENABLE   . " ORDER BY Created_at DESC LIMIT 5;";
>>>>>>> 3b23fd1e1a3907859dcee351efa83fa411ff4bce

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
