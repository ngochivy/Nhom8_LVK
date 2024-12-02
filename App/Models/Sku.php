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



    public function getAllSkuu()
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn lấy tất cả sản phẩm và tên danh mục (JOIN với bảng categories)
            $stmt = $conn->prepare(
                "SELECT skus.*, products.name as product_name,
            product_variant_options.name as product_variant_option_name,
            product_variants.name as product_variant_name
            FROM `skus` INNER JOIN product_variant_options 
            ON skus.product_variant_option_id = product_variant_options.id 
            INNER JOIN products 
            ON skus.product_id = products.id
            INNER JOIN product_variants 
            ON product_variants.id = product_variant_options.product_variant_id"
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
}
