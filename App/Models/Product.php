<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

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
        return $this->getAllByStatus();
    }

    public function getProductByPriceRange($minPrice, $maxPrice)
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE Price BETWEEN ? AND ?");
            $stmt->bind_param("ii", $minPrice, $maxPrice);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getProductByPriceRange(): " . $th->getMessage());
            return [];
        }
    }
    public function getAllProductWithCategoryName()
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn lấy tất cả sản phẩm và tên danh mục (JOIN với bảng categories)
            $stmt = $conn->prepare(
                "SELECT p.id, p.name, p.price, p.discount_price, p.quantity, p.user_manual, p.is_feature, p.status, p.image, c.name
             FROM {$this->table} p
             LEFT JOIN categories c ON p.category_id = c.id"
            );
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            // Xử lý lỗi và ghi lại lỗi nếu có
            error_log("Error in getAllProductWithCategoryName(): " . $th->getMessage());
            return [];
        }
    }





    public function getAllProductByCategory($categoryId)
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE category_id = ?");
            $stmt->bind_param("i", $categoryId);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getAllProductByCategory(): " . $th->getMessage());
            return [];
        }
    }

    public function getFeaturedProducts()
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE is_feature = 1");
            $stmt->execute();

            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getFeaturedProducts(): " . $th->getMessage());
            return [];
        }
    }

    public function getNewestProducts()
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE status = 1 ORDER BY id DESC LIMIT 4");
            $stmt->execute();

            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getNewestProducts(): " . $th->getMessage());
            return [];
        }
    }

    public function getOneProductByName(string $productName)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $productName);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi kiểm tra tên sản phẩm: ' . $th->getMessage());
            return $result;
        }
    }

    public function searchProducts(string $keyword)
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn tìm kiếm
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE name LIKE ?");
            $search = '%' . $keyword . '%';
            $stmt->bind_param('s', $search);
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            // Xử lý lỗi
            error_log("Error in searchProducts(): " . $th->getMessage());
            return [];
        }
    }

    
}
