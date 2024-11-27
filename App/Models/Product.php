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
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE price BETWEEN ? AND ?");
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
                "SELECT {$this->table}.*, categories.name AS category_name FROM {$this->table} INNER JOIN categories on products.category_id= categories.id"
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
    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name as category_name FROM `products` INNER JOIN categories ON products.category_id=categories.id 
            WHERE products.status=" . self::STATUS_ENABLE . " AND categories.status=" . self::STATUS_ENABLE . " AND products.id=?";
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

    public function getVariantsByProduct($productId)
    {
        try {
            $conn = $this->getConnection();

            // Lấy danh sách biến thể
            $stmt = $conn->prepare("
    SELECT pv.id as variant_id, pv.name as variant_name, pvo.id as option_id, pvo.name as option_name, pvo.additional_price
    FROM product_variants pv
    JOIN product_variant_options pvo ON pv.id = pvo.product_variant_id
    WHERE pv.product_id = ?
");
            $stmt->bind_param("i", $productId);
            $stmt->execute();


            $result = $stmt->get_result();
            $variants = [];
            while ($row = $result->fetch_assoc()) {
                $variants[$row['variant_id']]['name'] = $row['variant_name'];
                $variants[$row['variant_id']]['options'][] = [
                    'id' => $row['option_id'],
                    'name' => $row['option_name'],
                    'price' => $row['additional_price'],
                ];
            }
            return $variants;
        } catch (\Throwable $th) {
            error_log("Error in getVariantsByProduct(): " . $th->getMessage());
            return [];
        }
    }

    public function searchProductsByName($query, $limit = 5)
    {
        $conn = $this->getConnection();
        $sql = "SELECT id, name FROM products WHERE name LIKE ? LIMIT ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$query%";
        $stmt->bind_param("si", $searchTerm, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
