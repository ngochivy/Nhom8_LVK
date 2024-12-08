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


    public function getOneByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getOneSkuByName($sku)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE sku=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $sku);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
            return $result;
        }
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


    public function getSkuInnerJoinVariantAndVariantOption(int $productId)
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

    public function getSkuAndVariantInfoByProductId($productId)
    {
        // Lấy kết nối cơ sở dữ liệu
        $conn = $this->getConnection();
    
        // Truy vấn lấy SKU, giá, số lượng và tên của product_variant_option theo ID sản phẩm
        $query = "SELECT skus.sku, skus.prices, skus.quantity, products.*, 
                  product_variant_options.name as product_variant_option_name
                  FROM skus
                  INNER JOIN products 
                  ON skus.product_id = products.id
                  INNER JOIN product_variant_options 
                  ON skus.product_variant_option_id = product_variant_options.id
                  WHERE products.id = ? LIMIT 1";  // Chỉ lấy 1 sản phẩm
    
        // Thực hiện truy vấn với phương thức bind_param
        if ($stmt = $conn->prepare($query)) {
            // Liên kết tham số
            $stmt->bind_param('i', $productId);  // Sử dụng 'i' cho kiểu dữ liệu INT
            
            // Thực thi câu truy vấn
            $stmt->execute();
    
            // Lấy kết quả truy vấn
            $result = $stmt->get_result();
    
            // Kiểm tra xem có dữ liệu hay không
            if ($result && $row = $result->fetch_assoc()) {
                // Trả về kết quả dưới dạng mảng
                return $row;
            } else {
                return null;  // Nếu không có dữ liệu
            }
        } else {
            return null;  // Nếu có lỗi trong quá trình chuẩn bị câu truy vấn
        }
    }
    

    public function countTotalSku()
    {
        return $this->countTotal();
    }
}
