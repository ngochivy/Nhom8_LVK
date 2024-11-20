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


    public function getAllProductByCategory($categoryId)
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE Category_ID = ?");
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
}