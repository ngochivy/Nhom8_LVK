<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'Product_ID';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* FROM products 
        INNER JOIN categories ON products.Category_ID=Categories.Category_ID 
        WHERE products.Status=" . self::STATUS_ENABLE . " 
        AND categories.Status=" . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT products.*,categories.Category_name AS Category_name 
            FROM products 
            INNER JOIN categories ON products.Category_ID=categories.Category_ID;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.Category_name AS Category_name FROM products 
            INNER JOIN categories ON products.Category_ID=categories.Category_ID 
            WHERE products.Status=" . self::STATUS_ENABLE . " 
            AND categories.Status=" . self::STATUS_ENABLE . " AND products.Category_ID=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function getOneProductByStatus (int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.Category_name AS Category_name FROM products 
            INNER JOIN categories ON products.Category_ID=categories.Category_ID 
            WHERE products.Status=" . self::STATUS_ENABLE . " 
            AND categories.Status=" . self::STATUS_ENABLE . " AND products.id=?";
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
    // public function countTotalProduct()
    // {
    //     return $this->countTotal();
    // }
    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT  COUNT(*) AS count,categories.Category_name FROM products INNER JOIN categories ON products.Category_ID=categories.Category_ID GROUP BY products.Category_ID;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}