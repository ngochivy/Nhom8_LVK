<?php

namespace App\Models;

class Sku extends BaseModel
{
    protected $table = 'skus';
    protected $id = 'id';

    public function getAllSku()
    {
        return $this->getAll();
    }
    public function getOneSku($id)
    {
        return $this->getOne($id);
    }

    public function createSku($data)
    {
        return $this->create($data);
    }
    public function updateSku($id, $data)
    {
        return $this->update($id, $data);
    }


    public function deleteSku($id)
    {
        return $this->delete($id);
    }
    public function getAllSkuByStatus()
    {
        return $this->getAllByStatus();
    }


    public function getOneSkuByName($name)
    {
        return $this->getOneByName($name);
    }

    //getallsku
    public function getAllSkus()
    {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare("SELECT skus.*, products.name as product_name, 
            product_variant_options.name as product_variant_option_name, 
            product_variants.name as product_variant_name 
            FROM `skus` INNER JOIN product_variant_options 
            ON skus.product_variant_option_id = product_variant_options.id 
            INNER JOIN products ON skus.product_id = products.id 
            INNER JOIN product_variants ON product_variants.id = product_variant_options.product_variant_id;");
            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getAllSkus(): " . $th->getMessage());
            return [];
        }
    }


    public function getSkuInnerJoinVariantAndVariantOption($productId)
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn lấy SKU và các thông tin liên quan chỉ cho sản phẩm có ID cụ thể
            $stmt = $conn->prepare(
                "SELECT skus.*, products.*, 
            product_variant_options.name as product_variant_option_name, 
            product_variants.name as product_variant_name
            FROM `skus` 
            INNER JOIN product_variant_options 
            ON skus.product_variant_option_id = product_variant_options.id 
            INNER JOIN products 
            ON skus.product_id = products.id 
            INNER JOIN product_variants 
            ON product_variants.id = product_variant_options.product_variant_id
            WHERE products.id = ?"
            );
            $stmt->bind_param("i", $productId);  // Giới hạn kết quả theo product_id
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            // Xử lý lỗi và ghi lại lỗi nếu có
            error_log("Error in getSkuInnerJoinVariantAndVariantOption(): " . $th->getMessage());
            return [];
        }
    }

    public function getSkuByProductId($productId)
    {
        $conn = $this->getConnection();

        // Truy vấn lấy SKU và các thông tin liên quan của sản phẩm theo ID
        $query = "SELECT skus.sku, skus.prices, skus.quantity, products.*, 
              product_variant_options.name as product_variant_option_name
              FROM skus
              INNER JOIN products 
              ON skus.product_id = products.id
              INNER JOIN product_variant_options 
              ON skus.product_variant_option_id = product_variant_options.id
              WHERE products.id = ? LIMIT 1";  // Chỉ lấy 1 sản phẩm

        // Thực hiện truy vấn với phương thức bind_param
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $productId);  // Sử dụng 'i' cho kiểu dữ liệu INT
        $stmt->execute();

        // Lấy kết quả và trả về
        return $stmt->get_result()->fetch_assoc(); // Dùng get_result() để lấy kết quả
    }
}
